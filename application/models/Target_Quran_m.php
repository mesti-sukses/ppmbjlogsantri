<?php

	/*
		* Class ini mengatur CRUD pada tabel target quran yang digunakan untuk merekam berapa halaman yang sudah dikaji

		* Struktur database target_quran
		- id: id target yang merupakan primary key
		- angkatan: target tiap angkatan berbeda
		- target: berisi jumlah halaman yang harus terisi dari tiap angkatan
		- target_detail: berisi halaman mana saja yang harus terisi. berbentuk serialized array

		@package model
		@author Logic_boys
	*/
	class Target_Quran_m extends MY_Model
	{
		protected $_table_name = 'target_quran';

		public $rules = array(
				array(
					'field' => 'target',
					'rules' => 'trim|required'
					)
			);
	}
?>