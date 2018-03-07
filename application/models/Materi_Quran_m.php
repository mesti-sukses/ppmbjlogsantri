<?php
	
	/*
		* Class ini melayani CRUD pada ketercapaian alquran semua santri

		* Struktur database materi_quran
		- santri_id: id santri yang juga merangkap sebagai primary key (karena setiap santri punya ketercapaian cuma satu)
		- ketercapaian: merupakan serialized array asosiatif dari halaman quran yang isi dari santri tersebut
		- kosong: merupakan jumlah halaman kosong dari santri tersebut
		- updated: timestamps untuk melihat kapan santri terakhir update

		@package model
		@author Logic_boys
	*/
	class Materi_Quran_m extends MY_Model
	{
		protected $_table_name = 'materi_quran';
		protected $_primary_key = 'santri_id';
		protected $_timestamps = TRUE;

		public $rules = array(
				array(
					'field' => 'kosong',
					'rules' => 'trim|required'
					)
			);

		/*
			* Method ini digunakan untuk mengambil data ketercapaian quran dari santri secara spesifik

			@param $id int,string: id dari santri yang bersangkutan, jika null maka mengambil data seluruh santri
		*/
		public function get_materi_quran_user_id($id = NULL)
		{
			$this->db->select('', FALSE);
			$this->db->from('materi_quran as m');
			$this->db->join('user as u', 'm.santri_id = u.id');
			$this->db->join('target_quran as t', 'u.angkatan = t.angkatan');
			if($id != NULL){
				$this->db->where(array('u.id' => $id));
				return $this->db->get()->row();
			} else 
				return $this->db->get()->result();
		}
	}
?>