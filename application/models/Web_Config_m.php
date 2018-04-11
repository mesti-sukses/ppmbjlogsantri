<?php
	/*
		* Class ini mengatur CRUD pada tabel web_config yang akan mengatur beberapa konfigurasi website
		
		* Struktur database category
		- id: id dari config
		- key_config: ini yang key yang buat menentukan config yang mana
		- value: nilai dari key tersebut

		@package model
		@author Logic_boys
	*/
	class Web_Config_m extends MY_Model
	{
		protected $_table_name = 'web_config';
		protected $_primary_key = 'id';

		public $rules = array(
				array(
					'field' => 'value',
					'rules' => 'trim|required'
					)
			);

		public $rules_generate = array(
				array(
					'field' => 'value[]',
					'rules' => 'trim|required'
					),
				array(
					'field' => 'key_config[]',
					'rules' => 'trim|required'
					)
			);
		
		public function __construct()
		{
			parent::__construct();
		}
	}
?>