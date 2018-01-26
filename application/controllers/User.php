<?php
	class User extends Admin_Controller{
		/*
			User class handle the whole user in the site including wali bacaan, ketua siswa, and other santri
		*/

		public function __construct(){
			parent::__construct();
		}

		//Login method handle the login page and send data from page to User database that handled by User model
		public function login(){
			$this->data['page_info'] = array(
					'css' => array('login.css'),
					'title' => 'Login | '.config_item('site_name'),
					'js' => array('login.js'),
					'no-nav' => TRUE
				);

			$this->data['subview'] = 'login';

			$dashboard = 'user';
			$this->User_m->loggedin() == FALSE || redirect($dashboard);

			//validation form
			$rules = $this->User_m->rules;
			$this->form_validation->set_rules($rules);
			if($this->form_validation->run() == TRUE){
				$loginCheck = $this->User_m->login();
				if($loginCheck){
					redirect($dashboard);
				} else {
					$this -> session -> set_flashdata('error', 'Password salah');
					redirect('user/login', 'refresh');
				}
			}

			$this->load->view('main_layout', $this->data);
		}

		//Index method handle the dashboard that used by the controller
		public function index(){
			$this->data['page_info'] = array(
					'css' => array(''),
					'title' => 'Dashboard | '.$this->session->userdata['name'],
					'js' => array(''),
					'no-nav' => FALSE
				);

			$this->data['userData'] = $this->User_m->get_complete_user_by_id($this->session->userdata('id'));

			$this->data['subview'] = 'admin/dashboard';

			$this->load->view('main_layout', $this->data);
		}

		//Logout method handle the logout method
		public function logout(){
			$this->User_m->logout();
		}

		//Untuk setting page dan profile
		public function setting(){

			$this->data['page_info'] = array(
					'css' => array(),
					'title' => 'Profile | '.$this->session->userdata('name'),
					'js' => array(),
					'no-nav' => FALSE
				);

			$this->data['subview'] = 'admin/setting';

			$this->data['userData'] = $this->User_m->get_by(array('id' => $this->session->userdata('id')), TRUE);

			//validation form
			$rules = $this->User_m->rules_setting;
			$this->form_validation->set_rules($rules);
			if($this->form_validation->run() == TRUE){
				$newData = $this->User_m->array_from_post(array('nis', 'nama', 'alamat', 'angkatan', 'pass'));
				
				$id = $this->session->userdata('id');
				$newData['id'] = $id;

				$newData['pass'] = $this->User_m->hash($newData['pass']);

				$this->User_m->save($newData, $id);
				redirect('user');
			}

			$this->load->view('main_layout', $this->data);
		}
	}
?>