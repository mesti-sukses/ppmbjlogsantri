<?php
	class User extends Admin_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('Santri_m');
			$this->load->model('Angkatan_m');
			$this->load->model('User_m');
			$this->load->model('Progress_m');
		}

		public function login(){
			// Page info
			$this->data['page_info'] = array(
					'title' => 'Login | Loggy',
					'no-navigation' => true,
					'css' => array('login.css'),
					'js' => array()
				);
			$this->data['subview'] = 'components/__login_page';

			//redirect to dashboard
			$dashboard = 'admin/user';
			$this->User_m->loggedin() == FALSE || redirect($dashboard);

			//validation form
			$rules = $this->User_m->rules;
			$this->form_validation->set_rules($rules);
			if($this->form_validation->run() == TRUE){
				$loginCheck = $this->User_m->login();
				if($loginCheck){
					redirect($dashboard);
				} else {
					$this -> session -> set_flashdata('error', 'That email password combination does not exist. Please login with your valid email and password');
					redirect('user/login', 'refresh');
				}
			}

			$this->load->view("components/main_layout", $this->data);
		}

		public function index(){

			//Page Info
			$this->data['page_info'] = array(
				'title' => 'Dashboard | '.$this->session->userdata('name'),
				'css' => array('admin.css', 'table.css'),
				'js' => array('savereport.js')
				);
			$this->data['subview'] = 'admin/dashboard';
			$this->data['dataSantri'] = $this->Santri_m->get_by(array('wali' => $this->session->userdata('id')));
			if($this->session->userdata('level') == 0) $this->data['dataSantri'] = $this->Santri_m->get();
			$this->data['dataAngkatan'] = $this->Angkatan_m->get();

			//validation
			$rules = $this->Santri_m->rules;
			$this->form_validation->set_rules($rules);
			if($this->form_validation->run() == TRUE){
				$santriData = $this->Santri_m->array_from_post(array('name', 'angkatan'));
				$santriData['progress'] = serialize(array());
				$santriData['wali'] = $this->session->userdata('id');

				$id = $this->Santri_m->save($santriData);
				redirect('santri/edit/'.$id, 'refresh');
			}
			
			//Load View
			$this->load->view('components/main_layout', $this->data);
		}

		public function setting(){

			//Page Info
			$this->data['page_info'] = array(
				'title' => 'Setting | '.$this->session->userdata('name'),
				'css' => array('admin.css'),
				'js' => array('')
				);
			$this->data['subview'] = 'admin/setting';

			//validation
			$rules = $this->User_m->rules;
			$this->form_validation->set_rules($rules);
			if($this->form_validation->run() == TRUE){
				$userData = $this->User_m->array_from_post(array('user', 'password'));

				$newUserData['name'] = $userData['user'];
				$newUserData['pass'] = $this->User_m->hash($userData['password']);
				$newUserData['level'] = $this->session->userdata('level');

				$this->User_m->save($newUserData, $this->session->userdata('id'));

				redirect('user', 'refresh');
			}
			
			//Load View
			$this->load->view('components/main_layout', $this->data);
		}

		public function logout(){
			$this->User_m->logout();	
		}

		public function admin(){
			//Page Info
			$this->data['page_info'] = array(
				'title' => 'Setting | '.$this->session->userdata('name'),
				'css' => array('admin.css'),
				'js' => array('')
				);
			$this->data['subview'] = 'admin/admin';

			//validation
			$rules = $this->Angkatan_m->rules;
			$this->form_validation->set_rules($rules);
			if($this->form_validation->run() == TRUE){
				$angkatanData = $this->Angkatan_m->array_from_post(array('id', 'target'));

				$id = $angkatanData['id'];
				$old = (array)$this->Angkatan_m->get_by(array('id' => $id), TRUE);

				$old['target'] = $angkatanData['target'];

				$this->Angkatan_m->save($old, $id);
			}

			$this->load->view('components/main_layout', $this->data);
		}

		public function save(){
			$progress = $_POST;

			foreach ($progress as $key => $value) {
				$data['santri_id'] = $key;
				$data['precentage'] = intval(substr($value, 2));

				$this->Progress_m->save($data);
			}
		}
	}
?>