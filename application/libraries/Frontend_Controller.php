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
		}
	}
?>