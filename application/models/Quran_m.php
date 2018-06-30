<?php
	/**
	 * Untuk menangani database ayat dan surat serta penjelasan tafsir hikmah dari ayat tersebut

	 Struktur database :
	* Id (INT) untuk id primary key
	* surat (INT) nomor surat yang ditafsir
	* ayat (INT) ayat yang akan ditafsir
	* content (TEXT) isi tafsir dalam database

	 */
	class Quran_m extends MY_Model
	{
		protected $_table_name = 'quran';
		protected $_primary_key = 'id_tafsir';
		protected $_timestamps = TRUE;
		protected $_order_by = 'updated';
		protected $_order_by_order = 'desc';

		public $rules = array(
			array(
				'field' => 'surat',
				'rules' => 'trim|required'
				),
			array(
				'field' => 'ayat',
				'rules' => 'trim|required'
				),
			array(
				'field' => 'tag',
				'rules' => 'trim|required'
				)
		);

		function __construct()
		{
			parent::__construct();
		}

		function get($id = NULL, $single = FALSE){
			$this->db->join('surat as s', 's.id = quran.surat');

			return parent::get($id, $single);
		}

		function get_like($field, $like){
			$this->db->like($field, $like);

			return $this->get();
		}
	}
?>