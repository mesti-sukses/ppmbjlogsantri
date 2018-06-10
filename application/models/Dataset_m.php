<?php
	/*
		* Class ini mengatur CRUD pada tabel data set yang digunakan untuk menganalisis kelulusan saringan
		
		* Struktur database dataset
		- id: untuk id unik setiap kategori
		- nama: nama santri
		- nilai: penilaian santri dari setiap pasus
		- predikat: lulus atau tidaknya santri

		@package model
		@author Logic_boys
	*/
	class Dataset_m extends MY_Model
	{
		protected $_table_name = 'dataset';
		protected $_primary_key = 'id';

		public function __construct()
		{
			parent::__construct();
		}
	}
?>