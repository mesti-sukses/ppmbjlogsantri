<?php

	/*
		* Merupakan class yang membawahi semua controller
		* Melayani data yang akan dibawa oleh semua page dalam web seperti main menu dll

		@package controller
		@author Logic_Boys
	*/
	class MY_Controller extends CI_Controller{
		
		public $data = array();
		public $template = array(
			'admin_editor' => array(
				'css' => array('summernote.css', 'checkbox.css'),
				'js' => array('summernote.js', 'editr.js', 'image.js')
			),
			'table_with_modal' => array(
				'css' => array('checkbox.css'),
				'js' => array('editButton.js')
			),
			'switch_list' => array(
				'css' => array('switch.css'),
				'js' => array('counter.js')
			),
			'data_table' => array(
				'css' => array('jquery.dataTables.min.css', 'responsive.dataTables.min.css'),
				'js' => array('catList.js', 'savereport.js', 'jquery.dataTables.min.js', 'dataTables.responsive.min.js')
			)
		);
		
		function __construct()
		{
			parent::__construct();

			//Untuk mengambil list main menu yang berguna di setiap page dari database menu
			$this->load->model('Menu_m');
			$this->load->model('Web_Config_m');
			$this->data['mainMenu'] = $this->Menu_m->get_by(array('location' => 'main'));
			$this->data['title'] = $this->Web_Config_m->get_by(array('key_config' => 'title'), TRUE);
		}

		// Untuk mengambil view page
		protected function loadPage($title, $subview, $temp, $nav=FALSE)
		{
			$css = $this -> template[$temp]['css'];
			$js = $this -> template[$temp]['js'];
			$this->data['page_info'] = array(
				'css' => $css,
				'title' => $title,
				'js' => $js,
				'no-nav' => $nav
			);

			$this->data['subview'] = $subview;
			$this->load->view('main_layout', $this->data);
		}

		// Untuk form validation
		protected function form($model, $fields, $rules=NULL){
			//set rules
			if($model != '')
				$rules = $this->$model->rules;
			$this->form_validation->set_rules($rules);

			//run if rule is satisfied
			if($this->form_validation->run() == TRUE)
			{
				if($model != '')
					$data = $this->$model->array_from_post($fields);
				else
					$data = $this->input->post($fields);
				return $data;
			} else return FALSE;
		}
	}
?>