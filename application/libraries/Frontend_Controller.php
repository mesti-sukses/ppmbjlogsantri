<?php
	class Frontend_Controller extends MY_Controller{
		
		function __construct(){
			parent::__construct();

			$this->data['socialMenu'] = $this->Menu_m->get_by(array('location' => 'social'));
		}
	}
?>