<?php

	/*
		* Class ini mengatur CRUD pada tabel web_component yang berfungsi untuk component web yang ada selain posting

		* Struktur database web_component
		- id: id komponen
		- location: lokasi komponen. Ada yang di homepage, di daerah dewan guru dll
		- nama: merupakan judul komponen
		- content: isi komponen
		- image: gambar komponen
		- extra: meta data tambahan untuk komponen

		@package model
		@author Logic_boys
	*/
	class Web_Component_m extends MY_Model
	{
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

		public function __construct()
		{
			parent::__construct();
		}
	}
?>