<?php
	class WaliHadist extends Admin_Controller{
		/*
			Class wali untuk mendefinisikan wali ini bisa apa aja sih
		*/

		public function __construct(){
			parent::__construct();
			if ((intval($this->session->userdata('level')) & 256) != 256){
				echo "Anda bukan wali hadist";
				exit();
			}
		}

		public function index($id){
			$this->load->model('Materi_Hadist_m');
			$this->data['page_info'] = array(
					'css' => array('table.css'),
					'title' => 'List Santri | '.$this->session->userdata['name'],
					'js' => array('savereport.js', 'jquery.dataTables.min.js'),
					'no-nav' => FALSE
				);

			$this->data['santriData'] = $this->Materi_Hadist_m->get_materi_hadist_user($id);

			$this->data['subview'] = 'admin/wali/list_hadist';

			$this->load->view('main_layout', $this->data);
		}

		public function addHadist(){
			$this->data['page_info'] = array(
					'css' => array('table.css'),
					'title' => 'Dashboard | '.$this->session->userdata['name'],
					'js' => array('savereport.js', 'jquery.dataTables.min.js'),
					'no-nav' => FALSE
				);

			$rules = $this->Hadist_m->rules;
			$this->form_validation->set_rules($rules);
			if($this->form_validation->run() == TRUE){
				$dataHadist = $this->Hadist_m->array_from_post(array('nama', 'offset'));
				$this->Hadist_m->save($dataHadist);
			}

			$this->data['dataHadist'] = $this->Hadist_m->get();

			$this->data['subview'] = 'admin/wali/hadist_list';

			$this->load->view('main_layout', $this->data);
		}
	}
?>