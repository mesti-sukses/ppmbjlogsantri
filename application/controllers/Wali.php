<?php
	class Wali extends Admin_Controller{
		/*
			Class wali untuk mendefinisikan wali ini bisa apa aja sih
		*/

		public function __construct()
		{
			parent::__construct();
			parent::raiseError(1);

			$this->load->model('Materi_Quran_m');
			$this->load->model('Wali_m');
			$this->load->model('User_m');
		}

		/*
			* Method ini merupakan method untuk me list anggota dari wali yang bersangkutan
			* Done refactoring

			@param $id merupakan id dari wali yang bersangkutan, jika id adalah null maka yang dilihat adalah wali yang login saat itu
		*/
		public function index($id = NULL)
		{
			//jika id = null maka yang dilihat adalah wali yang login saat itu
			if($id == NULL) 
			{
				$idx = $this->session->userdata('id');

				//catat waktu wali terakhir melihat list santrinya
				//untuk mengontrol apakah wali ini bekerja dengan baik dalam mengontrol anak didiknya
				$now = date('Y-m-d H:i:s');
				$dataUser = (array) $this->User_m->get_by(array('id' => $idx), TRUE);
				$dataUser['updated'] = $now;

				//save data
				$this->User_m->save($dataUser, $dataUser['id']);
			} 
			else $idx = $id;

			// Fetch the data
			$this->data['santriData'] = $this->Wali_m->get_complete_wali_child($idx);
			$this->data['waliData'] = $this->User_m->get_by('(level & 1) = 1');

			//jika ternyata yang melihat adalah koordinator wali maka ambil list semua santri
			if (((intval($this->session->userdata('level')) & 32) == 32) && $id == NULL)
				$this->data['santriData'] = $this->Wali_m->get_complete_wali_child();

			// Process the data

			// Get form feedback

			// Process form feedback

			// Load The Page
			$title = 'List Santri | '.$this->session->userdata['name'];
			$this->loadPage($title, 'admin/wali/list', 'data_table');
		}

		/*
			* Method ini merupakan method untuk memanggil list wali untuk koordinator wali yang ingin mengontrol apakah walinya mengerjakan tugasnya secara baik atau tidak
			* Done refactoring
		*/
		public function list()
		{
			// Load The Page
			$title = 'List Wali | '.$this->session->userdata['name'];
			$this->loadPage($title, 'admin/wali/list_wali', 'data_table');
		}

		/*
			* Method ini merupakan method untuk memmbandingkan ketercapaian antar santri
			* Jadi santri bisa melihat halaman yang kosong dari banyak orang
			* Tujuannya adalah membentuk mentoring kecil untuk mempelajari halaman quran yang kosong tersebut entah karena santri itu sakit atau pun karena santri tersebut tidak bisa hadir
			* Mereka bisa mengundang guru dari santri pasca untuk mengajarkan halaman yang kosong tersebut
			* Done refactoring
		*/
		public function comparator()
		{
			// Fetch the data
			$this->data['santriData'] = $this->Materi_Quran_m->get_materi_quran_user_id();

			// Process the data

			// Get form feedback
			$rules = array(
				array(
					'field' => 'check[]',
					'rules' => 'trim|required'
					)
			);
			$check = $this->form('', 'check', $rules);

			// Process form feedback
			if($check)
			{
				//ambil data santri yang sudah di checklist
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

			// Load The Page
			$title = 'Pembanding | '.$this->session->userdata('name');
			$this->loadPage($title, 'admin/wali/compare', 'switch_list');
		}

		/*
			* Method ini merupakan method untuk migrasi wali
			* Done refactoring

			@param $id: id adari santri yang bersangkutan
		*/
		public function change($id)
		{
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