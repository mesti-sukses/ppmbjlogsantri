<?php
	class Jurnal extends Admin_Controller{
		/*
			Santri Class handle all about santri reguler that can update their quran
		*/

		public function __construct(){
			parent::__construct();
			
			if((intval($this->session->userdata('level')) & 4) != 4){
				echo('Anda bukan santri update jurnal');
				exit();
			}
		}

		//This function load 
		public function index(){
			$this->load->model('Target_Quran_m');

			$this->data['page_info'] = array(
					'css' => array('switch.css'),
					'title' => 'Jurnal Target Quran | '.$this->session->userdata['name'],
					'js' => array('counter.js'),
					'no-nav' => FALSE
				);

			$this->data['targetQuran'] = $this->Target_Quran_m->get();

			$rules = $this->Target_Quran_m->rules;

			$this->form_validation->set_rules($rules);
			if($this->form_validation->run() == TRUE){
				$angkatanData = $this->Target_Quran_m->array_from_post(array('id','angkatan', 'target'));

				$id = $angkatanData['id'];

				$progress = array();

				for ($i=2; $i <= 605; $i++) { 
					if($this->input->post($i) != NULL) $progress[$i] = $i;
				}

				$angkatanData['target_detail'] = serialize($progress);

				$this->Target_Quran_m->save($angkatanData, $id);

				redirect('user', 'refresh');
			}

			$this->data['subview'] = 'admin/jurnal/quran';

			$this->load->view('main_layout', $this->data);
		}
	}
?>