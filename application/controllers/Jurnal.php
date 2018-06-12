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
			
			// Access Control
			parent::raiseError(4);

			// Load the model
			$this->load->model('Target_Quran_m');
		}

		/*
			* Method ini merupakan method untuk memanggil jurnal target alquran
		*/
		public function index($tahun)
		{

			// Fetch the data
			$this->data['target'] = $this->Target_Quran_m->get_by(array('angkatan' => $tahun), TRUE);

			// Process the Data

			// Get Form Feedback
			$angkatanData = $this->form('Target_Quran_m', array('id','angkatan', 'target'));
			$rules = $this->Target_Quran_m->rules;
			$this->form_validation->set_rules($rules);

			// Process the Form Feedback
			if($angkatanData)
			{

				//ambil target yang sudah di post berupa halaman dan angkatannya
				$id = $angkatanData['id'];

				//buat array kosong yang akan menampung halaman yang sudah dikaji
				$progress = array();

				//dari halaman 2 sampai 605 ambil halaman berapa saja yang sudah dikaji sehingga bernilai true dalam post
				for ($i=2; $i <= 605; $i++) 
				{ 

					//lalu masukan dalam array progress
					if($this->input->post($i) != NULL) $progress[$i] = $i;
				}

				// serialize array progress sehingga membentuk string untuk disimpan dalam database
				$angkatanData['target_detail'] = serialize($progress);

				// simpan data dalam database
				$this->Target_Quran_m->save($angkatanData, $id);
				redirect('jurnal/index/'.$tahun, 'refresh');
			}

			// Load The Page
			$title = 'Jurnal Target Quran | '.$this->session->userdata['name'];
			$this->loadPage($title, 'admin/jurnal/quran', 'switch_list');
		}
	}
?>