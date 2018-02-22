<?php
	class Wali extends Admin_Controller{
		/*
			Class wali untuk mendefinisikan wali ini bisa apa aja sih
		*/

		public function __construct(){
			parent::__construct();
			if ((intval($this->session->userdata('level')) & 1) != 1){
				echo "Anda bukan wali";
				exit();
			}
		}

		public function index($id = NULL){
			$this->data['page_info'] = array(
					'css' => array('jquery.dataTables.min.css', 'responsive.dataTables.min.css'),
					'title' => 'List Santri | '.$this->session->userdata['name'],
					'js' => array('savereport.js', 'jquery.dataTables.min.js', 'dataTables.responsive.min.js'),
					'no-nav' => FALSE
				);

			if($id == NULL) {
				$idx = $this->session->userdata('id');
				$now = date('Y-m-d H:i:s');
				$dataUser = (array)$this->User_m->get_by(array('id' => $idx), TRUE);
				$dataUser['updated'] = $now;
				$this->User_m->save($dataUser, $dataUser['id']);
			} else $idx = $id;

			$this->load->model('Wali_m');
			$this->load->model('User_m');

			$this->data['santriData'] = $this->Wali_m->get_complete_wali_child($idx);
			$this->data['waliData'] = $this->User_m->get_by('(level & 1) = 1');

			if (((intval($this->session->userdata('level')) & 32) == 32) && $id == NULL)
				$this->data['santriData'] = $this->Wali_m->get_complete_wali_child();

			$this->data['subview'] = 'admin/wali/list';

			$this->load->view('main_layout', $this->data);
		}

		public function list(){
			$this->data['page_info'] = array(
					'css' => array('jquery.dataTables.min.css', 'responsive.dataTables.min.css'),
					'title' => 'List Wali | '.$this->session->userdata['name'],
					'js' => array('savereport.js', 'jquery.dataTables.min.js', 'dataTables.responsive.min.js'),
					'no-nav' => FALSE
				);

			$this->data['subview'] = 'admin/wali/list_wali';

			$this->load->view('main_layout', $this->data);
		}

		public function comparator(){
			$this->load->model('Materi_Quran_m');

			$this->data['page_info'] = array(
				'title' => 'Pembanding | '.$this->session->userdata('name'),
				'css' => array('switch.css'),
				'js' => array(),
				'no-nav' => FALSE
				);

			$this->data['santriData'] = $this->Materi_Quran_m->get_materi_quran_user_id();

			$rules = array(
					array(
						'field' => 'check[]',
						'rules' => 'trim|required'
						)
				);

			$this->form_validation->set_rules($rules);
			if($this->form_validation->run() == TRUE){
				$check = $_POST['check'];
				$this->data['santriCheck'] = $check;
				$data = array();
				$dataTarget = array();
				$dataName = array();
				$j = 0;

				foreach ($check as $santri) {
					$dataProgress = unserialize($this->Materi_Quran_m->get_materi_quran_user_id($santri)->ketercapaian);

					$dataTargetAll = unserialize($this->Materi_Quran_m->get_materi_quran_user_id($santri)->target_detail);

					$data =array_merge($data, $dataProgress);
					$dataTarget = array_merge($dataTarget, $dataTargetAll);

					$this->data['checkProgress'] = $data;
					$this->data['checkTarget'] = $dataTarget;
					$dataName[$j++] = $this->Materi_Quran_m->get_materi_quran_user_id($santri)->nama;
				}

				$this->data['name'] = $dataName;
			}

			$this->data['subview'] = 'admin/wali/compare';

			$this->load->view('main_layout', $this->data);
		}

		public function change($id){
			$this->load->model('User_m');
			$userData = $this->User_m->get_by(array('id' => $id), TRUE);
			$id_wali = $this->input->post('wali');
			$userData->wali = $id_wali;
			$this->User_m->save((array)$userData, $id);
			redirect('wali');
		}
	}
?>