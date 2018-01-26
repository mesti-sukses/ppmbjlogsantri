<?php
	class Santri extends Admin_Controller{
		/*
			Santri Class handle all about santri reguler that can update their quran
		*/

		public function __construct(){
			parent::__construct();
		}

		//This function load 
		public function quran($id = NULL){
			$this->load->model('Materi_Quran_m');

			$this->data['page_info'] = array(
					'css' => array('switch.css'),
					'title' => 'Ketercapaian Quran | '.$this->session->userdata['name'],
					'js' => array('counter.js'),
					'no-nav' => FALSE
				);

			if($id == NULL){
				$id = $this->session->userdata('id');
			} else {
				if((intval($this->session->userdata('level')) & 1) != 1){
					echo ('Hayoo... Mau ngapain..!');
					exit();
				}
			}

			$this->data['quranData'] = $this->Materi_Quran_m->get_materi_quran_user_id($id);

			$rules = $this->Materi_Quran_m->rules;
			$this->form_validation->set_rules($rules);

			if($this->form_validation->run() == TRUE){
				$dataMateriQuran = $this->Materi_Quran_m->array_from_post(array('kosong'));
				$dataMateriQuran['santri_id'] = $id;

				$progress = array();

				for ($i=2; $i <= 605; $i++) { 
					if($this->input->post($i) != NULL) $progress[$i] = $i;
				}

				$dataMateriQuran['ketercapaian'] = serialize($progress);

				$this->Materi_Quran_m->save($dataMateriQuran, $id);

				redirect('user');
			} else $this->data['dump'] = validation_errors();

			$this->data['subview'] = 'admin/santri/quran';

			$this->load->view('main_layout', $this->data);
		}

		public function addHadist($id = NULL){
			$this->load->model('Hadist_m');
			$this->data['page_info'] = array(
					'css' => array('table.css'),
					'title' => 'Tambah Hadist | '.$this->session->userdata['name'],
					'js' => array(),
					'no-nav' => FALSE
				);

			if($id){
				$this->load->model('Materi_Hadist_m');
				$hadistData = $this->Hadist_m->get_by(array('id' => $id), TRUE);

				$dataHadist['santri_id'] = $this->session->userdata('id');
				$dataHadist['hadist_id'] = $id;
				$dataHadist['ketercapaian'] = serialize(array());
				$dataHadist['kosong'] = $hadistData->offset;

				$this->Materi_Hadist_m->save($dataHadist);

				redirect('santri/addhadist');
			} else {

				$this->data['hadistData'] = $this->Hadist_m->get_hadist_added();

				$this->data['subview'] = 'admin/santri/tambah_hadist';

				$this->load->view('main_layout', $this->data);
			}
		}

		public function hadist($idHadist){
			$this->load->model('Materi_Hadist_m');

			$this->data['page_info'] = array(
					'css' => array('switch.css'),
					'title' => 'Ketercapaian Hadist | '.$this->session->userdata['name'],
					'js' => array('counter.js'),
					'no-nav' => FALSE
				);

			$this->data['hadistData'] = $this->Materi_Hadist_m->get_materi_hadist($this->session->userdata('id'), $idHadist);

			$id = $this->session->userdata('id');
			$idMateri = $this->data['hadistData']->id_materi;
			$page = $this->data['hadistData']->offset;

			$rules = $this->Materi_Hadist_m->rules;
			$this->form_validation->set_rules($rules);

			if($this->form_validation->run() == TRUE){
				$dataMateriHadist = $this->Materi_Hadist_m->array_from_post(array('kosong'));
				$dataMateriHadist['id_materi'] = $idMateri;
				$dataMateriHadist['santri_id'] = $id;
				$dataMateriHadist['hadist_id'] = $idHadist;

				$progress = array();

				for ($i=1; $i <= $page; $i++) { 
					if($this->input->post($i) != NULL) $progress[$i] = $i;
				}

				$dataMateriHadist['ketercapaian'] = serialize($progress);
				dump($dataMateriHadist);
				dump($idMateri);
				dump($this->data['hadistData']);

				$this->Materi_Hadist_m->save($dataMateriHadist, $idMateri);

				redirect('user');
			} else {$this->data['dump'] = validation_errors();

			$this->data['subview'] = 'admin/santri/hadist';

			$this->load->view('main_layout', $this->data);}
		}
	}
?>