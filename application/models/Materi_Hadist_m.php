<?php

	/*
		* Class ini mengatur ketercapaian materi tiap santri untuk setiap hadistnya

		* Struktur database materi_hadist
		- id_materi: id materi
		- santri_id: foreign key untuk id santri yang bersangkutan
		- hadist_id: foreign key untuk ketercapaian hadist yang bersangkutan
		- ketercapaian: berisi serialized array dari halaman yang sudah isi
		- kosong: berisi jumlah halaman yang kosong dari santri
		- updated: timestamps yang diupdate tiap kali santri mengisi ketercapaian

		@package model
		@author Logic_boys
	*/
	class Materi_Hadist_m extends MY_Model
	{
		protected $_table_name = 'materi_hadist';
		protected $_primary_key = 'id_materi';

		public $rules = array(
				array(
					'field' => 'kosong',
					'rules' => 'trim|required'
					)
			);

		public function __construct()
		{
			parent::__construct();
		}

		/*
			* Method ini digunakan untuk mengambil data ketercapaian hadist dari hadist dan santri yang bersangkutan

			@param $id int,string: untuk menunjukkan bahwa yang dicari adalah ketercapaian dari santri tertentu
			Jika parameter ini berisi null maka akan mengembalikan nilai semua santri dari hadist yang bersangkutan
			@param $idHadist int,string: untuk menunjukkan idhadist dari hadist yang dicari
		*/
		public function get_materi_hadist($id = NULL, $idHadist)
		{
			$this->db->select('', FALSE);
			$this->db->from('materi_hadist as m');
			$this->db->join('user as u', 'm.santri_id = u.id');
			$this->db->join('hadist as h', 'm.hadist_id = h.id');
			if($id != NULL){
				$this->db->where(array('u.id' => $id, 'm.hadist_id' => $idHadist));
				return $this->db->get()->row();
			} else 
				return $this->db->get()->result();
		}

		/*
			* Method ini digunakan untuk mengambil data kekosongan hadist tertentu dari seluruh santri
			* Method ini digunakan untuk melihat tabel ketercapaian semua santri dalam satu hadist tertentu

			@param $id int,string: id dari hadist yang bersangkutan
		*/
		public function get_materi_hadist_user($id)
		{
			$this->db->select('u.nama, u.angkatan, h.offset, m.kosong, m.updated', FALSE);
			$this->db->from('materi_hadist as m');
			$this->db->join('user as u', 'm.santri_id = u.id');
			$this->db->join('hadist as h', 'm.hadist_id = h.id');
			$this->db->where(array('m.hadist_id' => $id));
			return $this->db->get()->result();
		}

		/*
			* Method ini digunakan untuk mengambil data kekosongan dari santri yang bersangkutan

			@param $id int,string: id dari santri yang bersangkutan
		*/
		public function get_materi_hadist_single_user($id)
		{
			$this->db->select('h.offset, m.kosong');
			$this->db->from('materi_hadist as m');
			$this->db->join('hadist as h', 'm.hadist_id = h.id');
			$this->db->where(array('m.santri_id' => $id));
			return $this->db->get()->result();
		}
	}
?>