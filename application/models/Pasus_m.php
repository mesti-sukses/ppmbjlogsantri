<?php

	/*
		* Class ini bukan merupakan class CRUD, tetapi merupakan class untuk mengambil data. Saya memasukkannya dalam class model tersendiri karena ini semua berkaitan dengan joinning tabel pada pasus sehingga membuat class tersendiri akan membuat sedikit lebih readable

		@package model
		@author Logic_boys
	*/
	class Pasus_m extends MY_Model
	{

		public function __construct()
		{
			parent::__construct();
		}

		/*
			* Method ini digunakan untuk mengambil semua anggota dari pasus yang bersangkutan

			@param $id int,string: id dari pasus yang bersangkutan
		*/
		public function get_complete_pasus_child($id)
		{
			$this->db->select('w.id, w.angkatan, w.nama as santri, w.nis as nis, w.alamat as alamat', FALSE);
			$this->db->from('user as u');
			$this->db->join('user as w', 'u.id = w.pasus');
			$this->db->where(array('u.id' => $id));
			return $this->db->get()->result();
		}

		/*
			* Method ini digunakan untuk mengambil data identitas dari anggota pasus tertentu
			* Ini akan dikombinasikan dengan method sebelumnya untuk mengambil data identitas dari satu pasus

			@param $id int,string: id dari santri yang akan diambil peniliannya
		*/
		public function get_complete_child_detail($id)
		{
			$this->db->select('', FALSE);
			$this->db->from('user as u');
			$this->db->join('pasus_data as p', 'u.id = p.santri_id', 'left');
			$this->db->where(array('u.id' => $id));
			return $this->db->get()->row();
		}

		/*
			* Method ini digunakan untuk mengambil data dari pasus
			* Pasus tidak memiliki pasus, sehingga diambil dari list santri yang tanpa pasus untuk mendapatkan list pasus
		*/
		public function get_non_pasus()
		{
			$this->db->select('w.id, w.angkatan, w.nama as santri, w.nis as nis, w.alamat as alamat', FALSE);
			$this->db->from('user as w');
			$this->db->where(array('w.pasus' => NULL));
			return $this->db->get()->result();
		}

		/*
			* Method ini digunakan untuk mengambil data penilaian dari anggota pasus tertentu

			@param $id int,string: id dari pasus yang bersangkutan, bila null maka ambil semuanya
		*/
		public function get_data_raw($id = NULL)
		{
			$this->db->select('u.nama, p.nama as pasus, d.ket, d.updated, d.detail');
			$this->db->from('user u');
			$this->db->join('user as p', 'u.pasus = p.id', 'left');
			$this->db->join('pasus_data as d', 'u.id = d.santri_id', 'left');
			$this->db->order_by('d.updated', 'desc');
			if($id != NULL) $this->db->where(array('u.pasus' => $id));
			return $this->db->get()->result();
		}
	}
?>