<?php
	/*
		* Class ini mengatur CRUD pada tabel kategori yang akan mengatur kategori artikel yang sudah di post oleh admin web
		
		* Struktur database category
		- cat_id: untuk id unik setiap kategori
		- name: judul kategori

		@package model
		@author Logic_boys
	*/
	class Category_m extends MY_Model
	{
		protected $_table_name = 'category';
		protected $_primary_key = 'cat_id';

		public $rules = array(
				array(
					'field' => 'name',
					'rules' => 'trim|required'
					)
			);
		
		public function __construct()
		{
			parent::__construct();
		}
	}
?>