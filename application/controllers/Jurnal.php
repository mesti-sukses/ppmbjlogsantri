<?php

	/*
		* Class ini mengatur tentang apa saja yang dilakukan oleh tim jurnal

		@package controller
		@author Logic_boys
	*/
	class Jurnal extends Admin_Controller
	{

		public function __construct()
		{
			parent::__construct();
			
			if((intval($this->session->userdata('level')) & 4) != 4){
				echo('Anda bukan santri update jurnal');
				exit();
			}
		}

		/*
			* Method ini merupakan method untuk memanggil jurnal target alquran
		*/
		public function index($tahun)
		{
			$this->load->model('Target_Quran_m');

			//load page info
			$this->data['page_info'] = array(
					'css' => array('switch.css'),
					'title' => 'Jurnal Target Quran | '.$this->session->userdata['name'],
					'js' => array('counter.js'),
					'no-nav' => FALSE
				);

			//fetch the data
			$this->data['target'] = $this->Target_Quran_m->get_by(array('angkatan' => $tahun), TRUE);

			//declare form rules
			$rules = $this->Target_Quran_m->rules;
			$this->form_validation->set_rules($rules);

			//run form action when satisfied
			if($this->form_validation->run() == TRUE)
			{

				//ambil target yang sudah di post berupa halaman dan angkatannya
				$angkatanData = $this->Target_Quran_m->array_from_post(array('id','angkatan', 'target'));
				$id = $angkatanData['id'];

				//buat array kosong yang akan menampung halaman yang sudah dikaji
				$progress = array();

				//dari halaman 2 sampai 605 ambil halaman berapa saja yang sudah dikaji sehingga bernilai true dalam post
				for ($i=2; $i <= 605; $i++) 
				{ 

					//lalu masukan dalam array progress
					if($this->input->post($i) != NULL) $progress[$i] = $i;
				}

				//serialize array progress sehingga membentuk string untuk disimpan dalam database
				$angkatanData['target_detail'] = serialize($progress);

				//simpan data dalam database
				$this->Target_Quran_m->save($angkatanData, $id);
				redirect('jurnal/index/'.$tahun, 'refresh');
			}

			//load page
			$this->data['subview'] = 'admin/jurnal/quran';
			$this->load->view('main_layout', $this->data);
		}
	}
?>