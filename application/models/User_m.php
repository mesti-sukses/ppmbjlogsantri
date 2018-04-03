<?php

	/*
		* Class ini mengatur CRUD pada tabel user yang berfungsi untuk mengatur semua aktivitas user dari berbagai level

		* Struktur database user
		- id: id user
		- nis: merupakan nomor induk santri
		- nama: merupakan nama santri
		- alamat: metupakan alamat santri
		- pasus: foreign key untuk pasus santri (yang merujuknya menuju tabel sendiri karena santri bisa menjadi pasus)
		- wali: foreign key untuk wali santri
		- level: merupakan akses level dari user yang bersangkutan
		- pass: hash dari password user yang bersangkutan
		- angkatan: angkatan dari user yang bersangkutan
		- updated: timestamps

		@package model
		@author Logic_boys
	*/
	class User_m extends MY_Model
	{
		protected $_table_name = 'user';
		protected $_order_by = 'nama';

		public $rules = array(
			array(
				'field' => 'pass',
				'rules' => 'trim|required'
				),
			array(
				'field' => 'user',
				'rules' => 'trim|required|xss_clean'
				)
			);

		public $rules_register = array(
			array(
				'field' => 'pass',
				'rules' => 'trim|required'
				),
			array(
				'field' => 'nama',
				'rules' => 'trim|required|xss_clean'
				)
			);
		public $rules_setting = array(
			array(
				'field' => 'pass',
				'rules' => 'trim|required'
				),
			array(
				'field' => 'nama',
				'rules' => 'trim|required|xss_clean'
				)
			);

		public function __construct()
		{
			parent::__construct();
		}

		//check the user is logged in or not
		public function loggedin()
		{
			return (boolean)$this->session->userdata('loggedin');
		}

		//Method ini menangani fungsi login
		public function login()
		{

			//ambil data user berdasarkan login form yang dimasukkan oleh user saat login
			$user = $this -> get_by(array(
				'nama' => $this->input->post('user'),
				'pass' => $this->hash($this->input->post('pass'))
			), TRUE);

			//jika ada user dalam tabel maka masukkan dalam session
			if(count($user))
			{
				//logged in
				$data = array(
					'name' => $user -> nama,
					'id' => $user -> id,
					'level' => $user -> level,
					'loggedin' => TRUE
				);
				$this->session->set_userdata($data);
				return TRUE;
			}
		}

		//untuk menghitung hash password dari user
		public function hash($string)
		{
			return hash('sha512', $string.config_item('encryption_key'));
		}

		//logout dengan menghancurkan session
		public function logout()
		{
			$this->session->sess_destroy();
			redirect('user/login');
		}

		//this method to get complete user data termasuk nama pasus dan wali
		//@param $id int: id dari user yang ingin diambil datanya. Jika null maka ambil semuanya
		public function get_complete_user_by_id($id = NULL)
		{
			$this->db->select('u.id, u.nama, u.nis, u.alamat, u.kelas, u.angkatan, u.pasus, u.wali, p.nama as nama_pasus, w.nama as nama_wali, u.level', FALSE);
			$this->db->from('user as u');
			$this->db->join('user as w', 'u.wali = w.id', 'left');
			$this->db->join('user as p', 'u.pasus = p.id', 'left');
			if($id != NULL) 
			{
				$this->db->where(array('u.id' => $id));
				return $this->db->get()->row();
			}
			return $this->db->get()->result();
		}
	}
?>