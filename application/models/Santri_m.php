<?php
	class Santri_m extends MY_Model{
		protected $_table_name = 'santri';
		protected $_order_by = 'name';
		protected $_timestamps = TRUE;
		public $rules = array(
				array(
					'field' => 'name',
					'rules' => 'trim|required'
					),
				array(
					'field' => 'angkatan',
					'rules' => 'trim|required'
					)
			);
		public function __construct(){
			parent::__construct();
		}

		public function get_report(){
			return $this->db->get('santri');
		}
	}
?>