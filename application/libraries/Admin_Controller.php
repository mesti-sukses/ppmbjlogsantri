<?php
	class Admin_Controller extends MY_Controller{
		
		/*
			Admin controller handle all about admin page, authentification and authorization
			See in libraries directory
		*/
		
		function __construct(){
			parent::__construct();
			$this -> load -> model('Hadist_m');
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->library('session');
			$this->load->model('User_m');

			$this->data['dataWali'] = $this->User_m->get_by(array('level' => 1));

			$this->data['dataPasusAll'] = $this->User_m->get_by(array('pasus' => NULL));

			$this->data['data_hadist_menu'] = $this->Hadist_m->get_hadist_list($this->session->userdata('id'));
			$this->data['data_hadist_menu_all'] = $this->Hadist_m->get();
			
			$exception = array('user/login', 'user/logout');
			if(in_array(uri_string(), $exception) == FALSE){
				if($this->User_m->loggedin() == FALSE){
					redirect('user/login');
				}
			}
		}
	}
?>