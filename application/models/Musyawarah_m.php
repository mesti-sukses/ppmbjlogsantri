<?php

	/*
		* Class ini mengatur CRUD pada tabel musyawarah untuk menampung hasil musyawarah forum perngajar

		* Struktur database musyawarah_fp
		- id: id usulan
		- usulan: merupakan judul usulan yang diusulkan
		- pengusul: berisi id dari pengusul
		- terlaksana: boolean berisi sudah terlaksana atau belum
		- pembahasan: untuk pembahasan dari musyawarah tersebut
		- updated: timestamps article

		@package model
		@author Logic_boys
	*/
	class Musyawarah_m extends MY_Model
	{
		protected $_table_name = 'musyawarah_fp';
		protected $_order_by = 'usulan_id';
		protected $_primary_key = 'usulan_id';
		protected $_timestamps = TRUE;

		// TODO : Ambil aturan pengisian 
		public $rules = array(
				array(
					'field' => 'usulan',
					'rules' => 'trim|required'
					),
				array(
					'field' => 'pengusul',
					'rules' => 'trim|required'
				)
			);
		public $rules_pembahasan = array(
				array(
					'field' => 'content',
					'rules' => 'trim|required'
					)
			);
		
		public function __construct()
		{
			parent::__construct();
		}

		/*
			Method ini untuk mengambil hasil musywarah sak pengusulnya

			TODO : implementasikan method ini
		*/
		public function get($id = NULL, $single = FALSE){
			$this -> db	-> join('user as u', 'musyawarah_fp.pengusul = u.id');

			return parent::get($id, $single);
		}
	}
?>