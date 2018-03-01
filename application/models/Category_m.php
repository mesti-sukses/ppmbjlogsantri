<?php
	class Category_m extends MY_Model{
		protected $_table_name = 'category';
		protected $_primary_key = 'cat_id';
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