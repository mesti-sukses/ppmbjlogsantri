<?php

	/*
		* Sama seperti model Pasus, ini untuk mengatur user dengan level wali dan fungsi disini hanya dieksekusi oleh wali

		@package model
		@author Logic_boys
	*/
	class Wali_m extends MY_Model
	{
		public function __construct()
		{
			parent::__construct();
		}

		/*
			* Method ini digunakan untuk mengambil data anak didik dari wali yang bersangkutan

			@param $id int,string: berisi id dari wali atau jika null maka ambil semua
		*/
		public function get_complete_wali_child($id = NULL)
		{
			$this->db->select('w.id, u.nama as wali, w.angkatan, w.nama as santri, kosong, q.updated, target', FALSE);
			$this->db->from('user as u');
			$this->db->join('user as w', 'u.id = w.wali');
			$this->db->join('materi_quran as q', 'w.id = q.santri_id');
			$this->db->join('target_quran as t', 'w.angkatan = t.angkatan');
			if($id != NULL) $this->db->where(array('u.id' => $id));
			return $this->db->get()->result();
		}
	}
?>