<?php
	class MY_Controller extends CI_Controller{
		
		public $data = array();
		
		function __construct(){
			parent::__construct();
			$this->load->model('Menu_m');
			$this->data['mainMenu'] = $this->Menu_m->get_by(array('location' => 'main'));
		}
	}
?>