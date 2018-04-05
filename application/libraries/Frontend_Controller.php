<?php

	/*
		* Class ini membawahi setiap page yang bisa terlihat oleh public
		* Seperti admin controller, class ini juga menyediakan data yang diperlukan oleh semua front end seperti menu, sidebar dll
	*/
	class Frontend_Controller extends MY_Controller{
		
		function __construct(){
			parent::__construct();

			//Social menu ada di footer dan di header setiap front page
			$this->data['socialMenu'] = $this->Menu_m->get_by(array('location' => 'social'));

			// Ambil data config dari database
			$this->data['tagline'] = $this->Web_Config_m->get_by(array('key_config' => 'tagline'), TRUE);
			$this->data['alamat'] = $this->Web_Config_m->get_by(array('key_config' => 'Alamat'), TRUE)->value;
			$this->data['telp'] = $this->Web_Config_m->get_by(array('key_config' => 'telp'), TRUE)->value;
			$this->data['email'] = $this->Web_Config_m->get_by(array('key_config' => 'email'), TRUE)->value;
			$this->data['jam'] = $this->Web_Config_m->get_by(array('key_config' => 'jam'), TRUE)->value;
		}
	}
?>