<?php
	/**
	 * Untuk menangani database comment untuk menambahkan beberapa tambahan mangkulan dari orang lain

	 Struktur database :
	* Id_comment (INT) untuk id primary key
	* id_tafsir (INT) nomor tafsir yang akan ditambahkan
	* nama (VARCHAR) nama guru yang menambahkan
	* komentar (TEXT) isi tambahan

	 */
	class Comment_m extends MY_Model
	{
		protected $_table_name = 'comment';
		protected $_primary_key = 'id_comment';
		protected $_timestamps = TRUE;

		public $rules = array(
			array(
				'field' => 'nama',
				'rules' => 'trim|required'
				),
			array(
				'field' => 'komentar',
				'rules' => 'trim|required'
				)
		);
		function __construct()
		{
			parent::__construct();
		}
	}
?>