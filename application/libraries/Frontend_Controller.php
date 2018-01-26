<?php
	class Frontend_Controller extends MY_Controller{
		
		function __construct(){
			parent::__construct();
			if(config_item('db_edit') != "no-db"){
				$this->load->model('page_m');
				$this->data['menu'] = $this->page_m->get_nested();
				$this->data['news_archive_link'] = $this->page_m->get_archive_link();
			}
		}
	}
?>