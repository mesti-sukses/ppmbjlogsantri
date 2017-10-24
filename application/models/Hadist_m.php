<?php
	class Hadist_m extends MY_Model{
		protected $_table_name = 'hadist';
		protected $_order_by = 'id';

		public $rules = array(
				array(
					'field' => 'name',
					'rules' => 'trim|required'
					)
			);

		public function __construct(){
			parent::__construct();
		}
	}
?>