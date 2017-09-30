<?php
	/*

	* Still don't understand what called MVC, but I just continue my design pattern
	* Controller send page info to views
	* I'll refine this once I understand

	*/
	

	class User extends Admin_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('Santri_m');
			$this->load->model('Angkatan_m');
			$this->load->model('User_m');
			$this->load->model('Progress_m');
		}

		//login function
		public function login(){
			// Page info
			$this->data['page_info'] = array(
					'title' => 'Login | Loggy',
					'no-navigation' => true,
					'css' => array('login.css'),
					'js' => array('login.js')
				);
			$this->data['subview'] = 'components/__login_page';

			//redirect to dashboard
			$dashboard = 'user';
			$this->User_m->loggedin() == FALSE || redirect($dashboard);

			$dashboardSantri ='santri/edit/';
			$this->Santri_m->loggedin() == FALSE || redirect($dashboardSantri.$this->session->userdata('id'));

			//validation form
			$rules = $this->User_m->rules;
			$this->form_validation->set_rules($rules);
			if($this->form_validation->run() == TRUE){
				$loginCheck = $this->User_m->login();
				if($loginCheck){
					redirect($dashboard);
				} else {
					if($this->Santri_m->login() == TRUE){
						redirect($dashboardSantri.$this->session->userdata('id'));
					} else {
						$this -> session -> set_flashdata('error', 'That email password combination does not exist. Please login with your valid email and password');
						redirect('user/login', 'refresh');
					}
				}
			}

			$this->load->view("components/main_layout", $this->data);
		}

		//dashboard that list the santri
		public function index(){

			//Page Info
			$this->data['page_info'] = array(
				'title' => 'Dashboard | '.$this->session->userdata('name'),
				'css' => array('admin.css', 'table.css'),
				'js' => array('savereport.js', 'jquery.sparkline.min.js')
				);
			$this->data['subview'] = 'admin/dashboard';

			$id = intval($this->uri->segment(3));

			$this->data['dataSantri'] = $this->Santri_m->get_by(array('wali' => $this->session->userdata('id')));
			if($this->session->userdata('level') == 0){
				if($id != NULL)
					$this->data['dataSantri'] = $this->Santri_m->get_santri_joinned_wali($id);
				else $this->data['dataSantri'] = $this->Santri_m->get_santri_joinned_wali();
			}
			$this->data['dataAngkatan'] = $this->Angkatan_m->get();

			$this->data['progress'] = array();
			$this->load->model('Progress_m');
			foreach ($this->data['dataSantri'] as $santri) {
				$id = $santri->id;

				$this->data['progress'][$id] = $this->Progress_m->get_by(array('santri_id' => $id));
			}

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

		//setting to update username and password
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

		//untuk log out
		public function logout(){
			$this->User_m->logout();	
		}

		//khusus yang level admin untuk angkatan
		//TO DO : untuk tambah dan hapus wali
		public function admin(){
			//Page Info
			$this->data['page_info'] = array(
				'title' => 'Setting | '.$this->session->userdata('name'),
				'css' => array('admin.css'),
				'js' => array('counter.js')
				);

			$this->data['angkatanList'] = $this->Angkatan_m->get();
			$this->data['subview'] = 'admin/admin';

			//validation
			$rules = $this->Angkatan_m->rules;

			$this->form_validation->set_rules($rules);
			if($this->form_validation->run() == TRUE){
				$angkatanData = $this->Angkatan_m->array_from_post(array('id', 'angkatan', 'target'));

				$id = $angkatanData['id'];

				$progress = array();

				for ($i=2; $i <= 605; $i++) { 
					if($this->input->post($i) != NULL) $progress[$i] = $i;
				}

				$angkatanData['progress'] = serialize($progress);

				$this->Angkatan_m->save($angkatanData, $id);

				redirect('user/admin', 'refresh');
			}

			$this->load->view('components/main_layout', $this->data);
		}

		//untuk save progress via AJAX.
		public function save(){
			$progress = $_POST;

			foreach ($progress as $key => $value) {
				$data['santri_id'] = $key;
				$data['precentage'] = $value;

				$this->Progress_m->save($data);
			}
		}

		public function compare(){
			$this->data['page_info'] = array(
				'title' => 'Pembanding | '.$this->session->userdata('name'),
				'css' => array('admin.css', 'compare.css'),
				'js' => array()
				);

			$this->data['subview'] = 'admin/compare';

			$this->data['dataSantri'] = $this->Santri_m->get_santri();

			$rules = array(
					array(
						'field' => 'check[]',
						'rules' => 'trim|required'
						)
				);

			$this->form_validation->set_rules($rules);
			if($this->form_validation->run() == TRUE){
				$check = $_POST['check'];
				//$this->data['santriCheck'] = $check;
				$data = array();

				foreach ($check as $santri) {
					$dataProgress = unserialize($this->Santri_m->get_by(array('id' => intval($santri)), TRUE)->progress);

					$data =array_merge($data, $dataProgress);
					$this->data['check'] = $data;
				}
			}

			$this->load->view('components/main_layout', $this->data);
		}
	}
?>