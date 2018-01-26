<?php
	class Target_Quran_m extends MY_Model{
		protected $_table_name = 'target_quran';

		public $rules = array(
				array(
					'field' => 'target',
					'rules' => 'trim|required'
					)
			);
	}
?>