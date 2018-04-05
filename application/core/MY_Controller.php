<?php

	/*
		* Merupakan class yang membawahi semua controller
		* Melayani data yang akan dibawa oleh semua page dalam web seperti main menu dll

		@package controller
		@author Logic_Boys
	*/
	class MY_Controller extends CI_Controller{
		
		public $data = array();
		
		function __construct(){
			parent::__construct();

			//Untuk mengambil list main menu yang berguna di setiap page dari database menu
			$this->load->model('Menu_m');
			$this->load->model('Web_Config_m');
			$this->data['mainMenu'] = $this->Menu_m->get_by(array('location' => 'main'));
			$this->data['title'] = $this->Web_Config_m->get_by(array('key_config' => 'title'), TRUE);
		}
	}
?>