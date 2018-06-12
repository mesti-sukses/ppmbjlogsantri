<?php

	/*
		* Class ini mengatur tentang apa saja yang dilakukan santri reguler
		- Bukan kelas HB
		- Seseorang yang memiliki target

		@package controller
		@author Logic_boys
	*/
	class Santri extends Admin_Controller
	{
		public function __construct()
		{
			parent::__construct();

			$this->load->model('Materi_Quran_m');
			$this->load->model('Hadist_m');
			$this->load->model('Materi_Hadist_m');
		}


		/*
			* Method ini merupakan method untuk melihat ketercapaian quran dari santri
			* Done refactoring

			@param $id int: merupakan id santri yang akan di lihat ketercapaiannya. Jika null maka user yang aktif saat itu
		*/
		public function quran($id = NULL)
		{
			//set id for current user
			if($id == NULL)
			{
				$id = $this->session->userdata('id');
			}
			else 
			{
				if((intval($this->session->userdata('level')) & 1) != 1)
				{
					echo ('Hayoo... Mau ngapain..!');
					exit();
				}
			}

			//fetch data
			$this->data['quranData'] = $this->Materi_Quran_m->get_materi_quran_user_id($id);

			// Get feedback form
			$dataMateriQuran = $this->form('Materi_Quran_m', array('kosong'));

			// Process form data
			if($dataMateriQuran)
			{
				$dataMateriQuran = $this->Materi_Quran_m->array_from_post(array('kosong'));
				$dataMateriQuran['santri_id'] = $id;

				$progress = array();

				for ($i=2; $i <= 605; $i++) { 
					if($this->input->post($i) != NULL) $progress[$i] = $i;
				}

				$dataMateriQuran['ketercapaian'] = serialize($progress);

				$this->Materi_Quran_m->save($dataMateriQuran, $id);
				redirect('santri/quran/'.$id);
			} 
			else $this->data['dump'] = validation_errors();

			// Load The Page
			$title = 'Ketercapaian Quran | '.$this->session->userdata['name'];
			$this->loadPage($title, 'admin/santri/quran', 'switch_list');
		}

		/*
			* Method ini merupakan method untuk menambahkan hadist yang akan di track ketercapaiannya pada santri
			* Done refactoring

			@param $id int: merupakan id dari hadist yang akan ditambahkan, jika null maka santri akan melihat list hadist yang bisa ditambahkan
		*/
		public function addHadist($id = NULL)
		{
			//jika ada id maka artinya menambahkan hadist baru
			if($id)
			{
				//fetch hadist data
				$hadistData = $this->Hadist_m->get_by(array('id' => $id), TRUE);

				// Process the data
				$dataHadist['santri_id'] = $this->session->userdata('id');
				$dataHadist['hadist_id'] = $id;
				$dataHadist['ketercapaian'] = serialize(array());
				$dataHadist['kosong'] = $hadistData->offset;

				//save the data
				$this->Materi_Hadist_m->save($dataHadist);
				redirect('santri/addhadist');

			} else { //jika tidak ada $id maka lihat daftar hadist

				//fetch data hadist
				$this->data['hadistData'] = $this->Hadist_m->get_hadist_added();

				// Load The Page
				$title = 'Tambah Hadist | '.$this->session->userdata['name'];
				$this->loadPage($title, 'admin/santri/tambah_hadist', 'data_table');
			}
		}

		/*
			* Method ini merupakan method untuk melihat ketercapaian hadist santri
			* Done refactoring

			@param $id int: merupakan id hadist yang akan dilihat dan di update ketercapaiannya
		*/
		public function hadist($idHadist)
		{
			// Fetch the data
			$this->data['hadistData'] = $this->Materi_Hadist_m->get_materi_hadist($this->session->userdata('id'), $idHadist);
			$id = $this->session->userdata('id');
			$idMateri = $this->data['hadistData']->id_materi;
			$page = $this->data['hadistData']->offset;

			// Get feedback form
			$dataMateriHadist = $this->form('Hadist_m', array('kosong'));

			// Process form data
			if($dataMateriHadist)
			{

				//ambil data hadist dari post
				//serialize array
				$dataMateriHadist['id_materi'] = $idMateri;
				$dataMateriHadist['santri_id'] = $id;
				$dataMateriHadist['hadist_id'] = $idHadist;

				$progress = array();

				for ($i=1; $i <= $page; $i++) 
				{ 
					if($this->input->post($i) != NULL) $progress[$i] = $i;
				}

				$dataMateriHadist['ketercapaian'] = serialize($progress);
				/*dump($dataMateriHadist);
				dump($idMateri);
				dump($this->data['hadistData']);*/

				//save ke database
				$this->Materi_Hadist_m->save($dataMateriHadist, $idMateri);

				redirect('user');
			} 
			else {$this->data['dump'] = validation_errors();

				// Load The Page
				$title = 'Ketercapaian Hadist | '.$this->session->userdata['name'];
				$this->loadPage($title, 'admin/santri/hadist', 'switch_list');
			}
		}
	}
?>