<?php
	class Wali extends Admin_Controller{
		/*
			Class wali untuk mendefinisikan wali ini bisa apa aja sih
		*/

		public function __construct()
		{
			parent::__construct();
			if ((intval($this->session->userdata('level')) & 1) != 1){
				echo "Anda bukan wali";
				exit();
			}
		}

		/*
			* Method ini merupakan method untuk me list anggota dari wali yang bersangkutan

			@param $id merupakan id dari wali yang bersangkutan, jika id adalah null maka yang dilihat adalah wali yang login saat itu
		*/
		public function index($id = NULL)
		{
			$this->load->model('Wali_m');
			$this->load->model('User_m');

			//load page info
			$this->data['page_info'] = array(
					'css' => array('jquery.dataTables.min.css', 'responsive.dataTables.min.css'),
					'title' => 'List Santri | '.$this->session->userdata['name'],
					'js' => array('savereport.js', 'jquery.dataTables.min.js', 'dataTables.responsive.min.js'),
					'no-nav' => FALSE
				);

			//jika id = null maka yang dilihat adalah wali yang login saat itu
			if($id == NULL) 
			{
				$idx = $this->session->userdata('id');

				//catat waktu wali terakhir melihat list santrinya
				//untuk mengontrol apakah wali ini bekerja dengan baik dalam mengontrol anak didiknya
				$now = date('Y-m-d H:i:s');
				$dataUser = (array)$this->User_m->get_by(array('id' => $idx), TRUE);
				$dataUser['updated'] = $now;

				//save data
				$this->User_m->save($dataUser, $dataUser['id']);
			} 
			else $idx = $id;

			//fetch data from database
			$this->data['santriData'] = $this->Wali_m->get_complete_wali_child($idx);
			$this->data['waliData'] = $this->User_m->get_by('(level & 1) = 1');

			//jika ternyata yang melihat adalah koordinator wali maka ambil lis semua santri
			if (((intval($this->session->userdata('level')) & 32) == 32) && $id == NULL)
				$this->data['santriData'] = $this->Wali_m->get_complete_wali_child();

			//load the page
			$this->data['subview'] = 'admin/wali/list';
			$this->load->view('main_layout', $this->data);
		}

		/*
			* Method ini merupakan method untuk memanggil list wali untuk koordinator wali yang ingin mengontrol apakah walinya mengerjakan tugasnya secara baik atau tidak
		*/
		public function list()
		{

			//load page info
			$this->data['page_info'] = array(
					'css' => array('jquery.dataTables.min.css', 'responsive.dataTables.min.css'),
					'title' => 'List Wali | '.$this->session->userdata['name'],
					'js' => array('savereport.js', 'jquery.dataTables.min.js', 'dataTables.responsive.min.js'),
					'no-nav' => FALSE
				);

			//load page
			$this->data['subview'] = 'admin/wali/list_wali';
			$this->load->view('main_layout', $this->data);
		}

		/*
			* Method ini merupakan method untuk memmbandingkan ketercapaian antar santri
			* Jadi santri bisa melihat halaman yang kosong dari banyak orang
			* Tujuannya adalah membentuk mentoring kecil untuk mempelajari halaman quran yang kosong tersebut entah karena santri itu sakit atau pun karena santri tersebut tidak bisa hadir
			* Mereka bisa mengundang guru dari santri pasca untuk mengajarkan halaman yang kosong tersebut
		*/
		public function comparator()
		{
			$this->load->model('Materi_Quran_m');

			//load page info
			$this->data['page_info'] = array(
				'title' => 'Pembanding | '.$this->session->userdata('name'),
				'css' => array('switch.css'),
				'js' => array(),
				'no-nav' => FALSE
				);

			//fetch data materi quran seluruh santri
			$this->data['santriData'] = $this->Materi_Quran_m->get_materi_quran_user_id();

			//set rule untuk form validation
			$rules = array(
					array(
						'field' => 'check[]',
						'rules' => 'trim|required'
						)
				);
			$this->form_validation->set_rules($rules);

			//run saat rule sudah terpenuhi
			if($this->form_validation->run() == TRUE)
			{
				//ambil data santri yang sudah di checklist
				$check = $_POST['check'];
				$this->data['santriCheck'] = $check;

				//untuk menyimpan array ketercapaian setiap user
				$data = array();
				//untuk menyimpan array target setiap santri yang di checklist
				$dataTarget = array();
				//untuk menyimpan nama dari setiap santri yang di checklist
				$dataName = array();
				$j = 0;

				foreach ($check as $santri) 
				{
					//ambil data dari database (ketercapaian dan target)
					$dataProgress = unserialize($this->Materi_Quran_m->get_materi_quran_user_id($santri)->ketercapaian);
					$dataTargetAll = unserialize($this->Materi_Quran_m->get_materi_quran_user_id($santri)->target_detail);

					//gabung datanya dengan array kosong diatas sehingga nanti array nya akan gabung semua
					$data =array_merge($data, $dataProgress);
					$dataTarget = array_merge($dataTarget, $dataTargetAll);

					//transfer untuk dibawa ke view
					$this->data['checkProgress'] = $data;
					$this->data['checkTarget'] = $dataTarget;

					//masukkan namanya ke dalam array
					$dataName[$j++] = $this->Materi_Quran_m->get_materi_quran_user_id($santri)->nama;
				}

				$this->data['name'] = $dataName;
			}

			//load page
			$this->data['subview'] = 'admin/wali/compare';
			$this->load->view('main_layout', $this->data);
		}

		/*
			* Method ini merupakan method untuk migrasi wali

			@param $id: id adari santri yang bersangkutan
		*/
		public function change($id){
			$this->load->model('User_m');

			//ambil data user dari database
			$userData = $this->User_m->get_by(array('id' => $id), TRUE);

			//ubah walinya
			$id_wali = $this->input->post('wali');
			$userData->wali = $id_wali;

			//simpan
			$this->User_m->save((array)$userData, $id);
			redirect('wali');
		}
	}
?>