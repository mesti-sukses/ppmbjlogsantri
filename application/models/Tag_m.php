<?php
	/**
	 * Untuk menangani database tag yang merupakan label dari setiap tafsir

	 Struktur database :
	* Id_tag (INT) untuk id primary key atau bisa juga nomor surat
	* nama (VARCHAR) nama tag
	* juml (INT) jumlah tafsir yang berada pada tag

	 */
	class Tag_m extends MY_Model
	{
		protected $_table_name = 'tags';
		protected $_primary_key = 'id_tag';

		function __construct()
		{
			parent::__construct();
		}
	}
?>