<?php

	/*
		* Class ini mengatur CRUD pada tabel menu yang menampung data menu yang digunakan untuk semua page

		* Struktur database menu
		- id: id menu item
		- type: mengatur apakah menu item itu merupakan menu internal ataukan external
		- icon: mengatur apakah icon dari menu tersebut menggunakan format font dari font awesome
		- location: mengatur dimana lokasi sebuah menu. apakah itu main menu, footer menu atau yang lainnya
		- text: mengatur text dari sebuah menu
		- link: mengatur link tujuan ketika menu itu di klik

		@package model
		@author Logic_boys
	*/
	class Menu_m extends MY_Model
	{
		protected $_table_name = 'menu';
		protected $_order_by = 'id';

		public $rules = array(
				array(
					'field' => 'icon',
					'rules' => 'trim|required'
					),
				array(
					'field' => 'text',
					'rules' => 'trim|required'
				),
				array(
					'field' => 'type',
					'rules' => 'trim|required'
				),
				array(
					'field' => 'link',
					'rules' => 'trim|required'
				)
			);

		public function __construct()
		{
			parent::__construct();
		}
	}
?>