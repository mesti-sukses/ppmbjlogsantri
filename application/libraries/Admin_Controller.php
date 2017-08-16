<?php
	class Admin_Controller extends MY_Controller{
		
		function __construct(){
			parent::__construct();
			$this->data['meta_title'] = "Loggy";
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->library('session');
			$this->load->model('User_m');
			
			$exception = array('user/login', 'user/logout', 'admin/migration');
			if(in_array(uri_string(), $exception) == FALSE){
				if($this->User_m->loggedin() == FALSE){
					redirect('user/login');
				}
			}
		}
	}
?>