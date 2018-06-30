<?php
	/**
	 * Untuk menangani database surat nama surat dan jumlah ayat serta berapa ayat yang sudah diberi keterangan dan dikasih hikmah (kalo ada)

	 Struktur database :
	* Id (INT) untuk id primary key atau bisa juga nomor surat
	* nama (VARCHAR) nama surat
	* juml (INT) jumlah ayat pada surat
	* tafser (TEXT) ada atau enggak tafsernya di database

	 */
	class Surat_m extends MY_Model
	{
		protected $_table_name = 'surat';

		function __construct()
		{
			parent::__construct();
		}
	}
?>