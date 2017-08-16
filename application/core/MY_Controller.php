<?php
	class MY_Controller extends CI_Controller{
		
		public $data = array();
		
		function __construct(){
			parent::__construct();
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this -> data['errors'] = array();
			$this -> data['site_name'] = config_item('site_name');
		}
	}
?>