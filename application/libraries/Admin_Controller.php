<?php
	class Admin_Controller extends MY_Controller{
		
		function __construct(){
			parent::__construct();
			$this->data['meta_title'] = "Loggy";
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->library('session');
			$this->load->model('User_m');
			$this->load->model('Santri_m');
			$this->load->model('Hadist_m');
			
			$exception = array('user/login', 'user/logout', 'admin/migration');

			$this->data['userData'] = $this->User_m->get_by(array('level' => 1));
			$this->data['hadistData'] = $this->Hadist_m->get();

			if(in_array(uri_string(), $exception) == FALSE){
				if($this->session->userdata('loggedin') == FALSE){
					redirect('user/login');
				}
			}
		}
	}
?>