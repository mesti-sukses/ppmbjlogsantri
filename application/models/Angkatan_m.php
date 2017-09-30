<?php
	class Angkatan_m extends MY_Model{
		protected $_table_name = 'angkatan';
		protected $_order_by = 'id';

		public $rules = array(
				array(
					'field' => 'angkatan',
					'rules' => 'trim|required'
					),
				array(
					'field' => 'target',
					'rules' => 'trim|required'
					)
			);

		public function __construct(){
			parent::__construct();
		}
	}
?>