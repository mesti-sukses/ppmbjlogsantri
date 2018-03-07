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
		}


		/*
			* Method ini merupakan method untuk melihat ketercapaian quran dari santri

			@param $id int: merupakan id santri yang akan di lihat ketercapaiannya. Jika null maka user yang aktif saat itu
		*/
		public function quran($id = NULL)
		{
			$this->load->model('Materi_Quran_m');

			//load page info
			$this->data['page_info'] = array(
					'css' => array('switch.css'),
					'title' => 'Ketercapaian Quran | '.$this->session->userdata['name'],
					'js' => array('counter.js'),
					'no-nav' => FALSE
				);

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

			//declaru rule for form validation
			$rules = $this->Materi_Quran_m->rules;
			$this->form_validation->set_rules($rules);

			//run if rule's satisfied
			if($this->form_validation->run() == TRUE)
			{
				$dataMateriQuran = $this->Materi_Quran_m->array_from_post(array('kosong'));
				$dataMateriQuran['santri_id'] = $id;

				$progress = array();

				for ($i=2; $i <= 605; $i++) { 
					if($this->input->post($i) != NULL) $progress[$i] = $i;
				}

				$dataMateriQuran['ketercapaian'] = serialize($progress);

				$this->Materi_Quran_m->save($dataMateriQuran, $id);
				redirect('user');
			} 
			else $this->data['dump'] = validation_errors();

			//load page
			$this->data['subview'] = 'admin/santri/quran';
			$this->load->view('main_layout', $this->data);
		}

		/*
			* Method ini merupakan method untuk menambahkan hadist yang akan di track ketercapaiannya pada santri

			@param $id int: merupakan id dari hadist yang akan ditambahkan, jika null maka santri akan melihat list hadist yang bisa ditambahkan
		*/
		public function addHadist($id = NULL)
		{
			$this->load->model('Hadist_m');

			//load page info
			$this->data['page_info'] = array(
					'css' => array('jquery.dataTables.min.css', 'responsive.dataTables.min.css'),
					'title' => 'Tambah Hadist | '.$this->session->userdata['name'],
					'js' => array('jquery.dataTables.min.js', 'dataTables.responsive.min.js'),
					'no-nav' => FALSE
				);

			//jika ada id maka artinya menambahkan hadist baru
			if($id)
			{
				$this->load->model('Materi_Hadist_m');

				//fetch hadist data
				$hadistData = $this->Hadist_m->get_by(array('id' => $id), TRUE);
				//add hadist to santri database
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

				//load page
				$this->data['subview'] = 'admin/santri/tambah_hadist';
				$this->load->view('main_layout', $this->data);
			}
		}

		/*
			* Method ini merupakan method untuk melihat ketercapaian hadist santri

			@param $id int: merupakan id hadist yang akan dilihat dan di update ketercapaiannya
		*/
		public function hadist($idHadist)
		{
			$this->load->model('Materi_Hadist_m');

			//load page info
			$this->data['page_info'] = array(
					'css' => array('switch.css'),
					'title' => 'Ketercapaian Hadist | '.$this->session->userdata['name'],
					'js' => array('counter.js'),
					'no-nav' => FALSE
				);

			//ambil data ketercapaian materi hadist
			$this->data['hadistData'] = $this->Materi_Hadist_m->get_materi_hadist($this->session->userdata('id'), $idHadist);

			//ambil data ketercapaian saat mau update
			$id = $this->session->userdata('id');
			$idMateri = $this->data['hadistData']->id_materi;
			$page = $this->data['hadistData']->offset;

			//declare form rule
			$rules = $this->Materi_Hadist_m->rules;
			$this->form_validation->set_rules($rules);

			//run if rule is satisfied
			if($this->form_validation->run() == TRUE)
			{

				//ambil data hadist dari post
				//serialize array
				$dataMateriHadist = $this->Materi_Hadist_m->array_from_post(array('kosong'));
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

			//load page
			$this->data['subview'] = 'admin/santri/hadist';
			$this->load->view('main_layout', $this->data);}
		}
	}
?>