<?php

	/*
		* Class ini mengatur tentang administrasi pasus. Bagaimana cara pasus mengordinasi dan menilai anggotanya dsb

		@package controller
		@author Logic_boys
	*/
	class Pasus extends Admin_Controller
	{
		public function __construct()
		{
			parent::__construct();
			
			if(((($this->session->userdata('level')) & 8) != 8) && (($this->session->userdata('level') & 16) != 16) &&(($this->session->userdata('level') & 128) != 128)){
				echo('Anda bukan pasus XD');
				exit();
			}
		}

		/*
			* Method ini merupakan method untuk memanggil list anggota pasus
		*/
		public function index()
		{
			$this->load->model('Pasus_m');
			//Detail pasus untuk mengambil data tiap anggota pasus
			$this->load->model('Detail_Pasus_m');

			//Load page info
			$this->data['page_info'] = array(
					'css' => array('jquery.dataTables.min.css', 'responsive.dataTables.min.css'),
					'title' => 'Anggota Pasus | '.$this->session->userdata['name'],
					'js' => array('savereport.js', 'jquery.dataTables.min.js', 'dataTables.responsive.min.js'),
					'no-nav' => FALSE
				);

			//Fetch data anggota tiap pasus
			//ambil id dari session agar tahu siapa yang login saat ini
			$id = $this->session->userdata('id');
			//ambil data identitas pasus saja
			$this->data['dataPasus'] = $this->Pasus_m->get_complete_pasus_child($id);
			//ambil data penilaian dari tiap anggota pasus
			foreach ($this->data['dataPasus'] as $santri) 
			{
				$temp = $this->Detail_Pasus_m->get_detail_pasus($santri->id);

				$santri->detail = unserialize($temp->detail);
				$santri->ket = $temp->ket;
				$santri->updated = $temp->updated;
			}

			//load page
			$this->data['subview'] = 'admin/pasus/list';
			$this->load->view('main_layout', $this->data);
		}

		/*
			* Method ini merupakan method untuk menambahkan anggota pasus

			@param $id int: id santri yang akan ditambahkan... Ketika berisi null maka tambahkan santri baru
		*/
		public function add($id = NULL)
		{
			if($id == NULL)
			{
				$dataUser = $this->User_m->array_from_post(array('nama'));
				$dataUser['pass'] = $this->User_m->hash('santri');
			}
			else
			{
				$dataUser = (array)$this->User_m->get_by(array('id' => $id), TRUE);
			}

			//set asus menuju ke user yang sedang login (karena yang menambahkan adalah pasus)
			$dataUser['pasus'] = $this->session->userdata('id');
			//jika id sudah ada maka berarti update dan harus ada atribut id dalam data
			if($id != NULL) $id = $dataUser['id'];

			//save data
			$this->User_m->save($dataUser, $id);
			redirect('pasus', 'refresh');
		}

		/*
			* Method ini merupakan method untuk memberikan penilaian pada setiap anggota pasus

			@param $id int: id yang akan diberikan penilaian
		*/
		public function edit($id){
			$this->load->model('Detail_Pasus_m');
			$this->load->model('Pasus_m');

			//load page info
			$this->data['page_info'] = array(
					'css' => array('slider.css'),
					'title' => 'Edit data pasus | '.$this->session->userdata['name'],
					'js' => array('slider.js'),
					'no-nav' => FALSE
				);

			//fetch data pasus anggota
			$this->data['dataSantri'] = $this->Pasus_m->get_complete_child_detail($id);
			$this->data['santri_id'] = $id;

			//declare form requirement
			$rules = $this->Detail_Pasus_m->rules;
			$this->form_validation->set_rules($rules);

			//run if requirement is satisfied
			if($this->form_validation->run() == TRUE)
			{
				//ambil data penilaian
				$dataDetail = $this->Detail_Pasus_m->array_from_post(array(
						'sholat',
						'pengajian',
						'tengah_malam',
						'amal_sholih',
						'apel',
						'penampilan',
						'kuliah',
						'sosmed',
						'olahraga',
						'kbm',
						'musyawarah',
						'pengurus',
						'guru',
						'teman',
						'orang_lain',
						'masjid'
					));
				//ambil data santri
				$dataSave = $this->Detail_Pasus_m->array_from_post(array('santri_id', 'ket'));
				//serialize penilaian untuk dimasukan dalam data santri
				$dataSave['detail'] = serialize($dataDetail);
				//save data
				$this->Detail_Pasus_m->save($dataSave);

				//pengurus juga bisa meniliai santri maka jika itu pengurus maka balik ke dsahboard pengurus
				if(($this->session->userdata('level') & 128) == 128) 
					redirect('pengurus/list');
				else
					redirect('pasus');
			}

			//load page
			$this->data['subview'] = 'admin/pasus/edit';
			$this->load->view('main_layout', $this->data);
		}

		/*
			* Method ini merupakan method untuk melihat report yang sudah dilaporkan oleh pasus

			@param $id int: id yang akan diberikan penilaian
		*/
		public function report($id)
		{
			$this->load->model('Pasus_m');
			$this->load->model('Detail_Pasus_m');

			//load page info
			$this->data['page_info'] = array(
					'css' => array(),
					'title' => 'Laporan Pasus | '.$this->session->userdata['name'],
					'js' => array('jquery-ui.min.js', 'accordion.js'),
					'no-nav' => FALSE
				);

			//ambil data seluruh anggota pasus
			$this->data['dataPasus'] = $this->Pasus_m->get_complete_pasus_child($id);
			//ambil data penilaian setiap anggota pasus
			foreach ($this->data['dataPasus'] as $santri) 
			{
				$temp = $this->Detail_Pasus_m->get_detail_pasus($santri->id);
				$santri->detail = unserialize($temp->detail);
				$santri->status = "info";
				if(is_array($santri->detail)){
					foreach ($santri->detail as $value) {
						if($value < 20){
							$santri->status = "danger";
							break;
						} else if ($value < 40){
							$santri->status = "warning";
						}
					}
				}
				$santri->ket = $temp->ket;
				$santri->updated = $temp->updated;
			}

			//load page
			$this->data['subview'] = 'admin/pasus/report';
			$this->load->view('main_layout', $this->data);
		}

		/*
			* Method ini merupakan method untuk mengubah pasus (migrasi pasus)

			@param $id int: id yang akan diubah
		*/
		public function change($id)
		{
			$this->load->model('User_m');

			//fetch data
			$userData = $this->User_m->get_by(array('id' => $id), TRUE);

			//ambil data pasus baru dari post
			$id_wali = $this->input->post('pasus');
			$userData->pasus = $id_wali;

			//update data
			$this->User_m->save((array)$userData, $id);
			redirect('user/list');
		}

		/*
			* Method ini merupakan method untuk menghapus pasus (bukan menghapus... menjadikan dia menjadi non-pasus)

			@param $id int: id yang akan dihapus
		*/
		public function delete($id){
			$this->load->model('User_m');

			//fetch userdata
			$userData = $this->User_m->get_by(array('id' => $id), TRUE);

			//jadikan pasus menjadi null
			$userData->pasus = NULL;

			//update data
			$this->User_m->save((array)$userData, $id);
			redirect('pasus');
		}
	}
?>