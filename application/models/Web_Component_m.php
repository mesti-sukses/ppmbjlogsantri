<?php
	class Web_Component_m extends MY_Model{
		protected $_table_name = 'web_component';
		protected $_order_by = 'id';
		public $rules = array(
				array(
					'field' => 'location',
					'rules' => 'trim|required'
					),
				array(
					'field' => 'nama',
					'rules' => 'trim|required'
				),
				array(
					'field' => 'content',
					'rules' => 'trim|required'
				),
				array(
					'field' => 'extra',
					'rules' => 'trim|required'
				)
			);
		public function __construct(){
			parent::__construct();
		}
	}
?>