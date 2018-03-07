<?php

	/*
		* Class ini mengatur CRUD pada tabel pasus_data yang mengatur data penilaian pasus untuk tiap santri yang ada dalam pasusnya
		* Struktur database pasus_data
		- id: id laporan
		- santri_id: foreign key untuk menunjukkan santri mana yang dinilai
		- detail: menunjukan detail dari penilaian dengan menggunakan fungsi serialize dari array asosiatif
		- ket: catatan dari pasus untuk anggotanya
		- updated: timestamps untuk last update

		@package model
		@author Logic_boys
	*/
	class Detail_Pasus_m extends MY_Model
	{
		protected $_table_name = 'pasus_data';
		protected $_primary_key = 'id';
		protected $_timestamps = TRUE;

		public $rules = array(
				array(
					'field' => 'ket',
					'rules' => 'trim|required'
					)
			);

		/*
			* Method ini berfungsi untuk mencari data penilaian dari pasus dengan id tertentu

			@param $id int,string,dll: id dari santri yang dicari penilaian terakhirnya
			@return: data penilaian terakhir dari pasus untuk santri yang bersangkutan
		*/
		public function get_detail_pasus($id)
		{
			$this->db->select('', FALSE);
			$this->db->from('user as u');
			$this->db->join('pasus_data as p', 'p.santri_id = u.id', 'left');
			$this->db->where(array('u.id' => $id));
			$this->db->order_by('p.updated', 'desc');
			return $this->db->get()->row();
		}
		
	}
?>