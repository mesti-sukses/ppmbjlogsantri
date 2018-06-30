<?php

	/**
	 * Merupakan class yang bertanggung jawab dengan media yang ada pada web
	 * Struktur database media
	 *
	 * id_media merupakan primary key dari tabel
	 * file_name merupakan nama file dari media
	 * alt merupakan alternate text dari media
	 */
	class Media_m extends MY_Model {

		protected $_table_name = 'media';
		protected $_primary_key = 'id_media';

		public $rules = array(
			array(
				'field' => 'alt',
				'rules' => 'trim|required|xss_clean'
				)
			);

		public function __construct()
		{
			parent::__construct();
		}

	}

/* End of file Media_m.php */
/* Location: ./application/models/Media_m.php */
?>