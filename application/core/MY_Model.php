<?php
	/*
		* Class MY_Model merupakan base class dari semua model
		* Melayani fungsi CRUD untuk setiap tabel dalam database yang didefiniskan dalam folder model

		@package model
		@author Logic_Boys
	*/

	class MY_Model extends CI_Model{

		/*
			* Beberapa parameter yang diperlukan dalam query didefiniskan sebagai atribut dalam class ini

			* _table_name: untuk menyimpan nama tabel
			* _primary_key: untuk menyimpan column yang bertindak sebagai primary key
			* _primary_filter: berisi method untuk memfilter primary key
			* _order_by: untuk menyimpan column yang bertindak sebagai acuan urutan
			* _order_by_order: untuk menyimpan tipe urutan yang diperlukan
			* _timestamps: berisi boolean untuk beberapa database yang memerlukan stempel waktu
		*/
		protected $_table_name = '';
		protected $_primary_key = 'id';
		protected $_primary_filter = 'intval';
		protected $_order_by = '';
		protected $_order_by_order = 'asc';
		protected $_timestamps = FALSE;

		/*
			* Beberapa tabel memiliki aturan input sendiri. Seperti harus ada tanggal, harus ada beberapa hal yang perlu dan beberapa hal yang optional

			* Format mengikuti validation form dari CodeIgniter
			* Lebih lengkapnya lihat di http://
		*/
		public $rules = array();
		
		function __construct(){
			parent::__construct();
		}
		
		/*
			* Fungsi untuk mengambil data dari data form yang diinputkan melalu data post

			@param $fields array berisi array dari name post yang akan diambil datanya
			@return $data array berisi array assosiatif dari value dan name dari input text
		*/
		public function array_from_post($fields){
			$data = array();

			foreach($fields as $field)
			{
				$data[$field] = $this->input->post($field);
			}

			return $data;
		}
		
		/*
			* Untuk melayani fungsi get, atau read, atau select dalam database

			@param $id string,int untuk mengeset id mana yang harus dicari dalam database
			@param $single boolean ketika dia true maka yang diambil adalah yang pertama, jika false maka diambil semua
			@result array/stdClass berisi data yang sudah di fetch dari database
				Saat single maka tipe datanya adalah stdClass dengan atribut column
				Saat all maka tipe datanya adalah array of stdClass yang berisi data yang sudah di fetch dari database
		*/
		public function get($id = NULL, $single = FALSE){

			if($id != NULL)
			{
				// kasih filter pada $id untuk keamanan
				$filter = $this->_primary_filter;
				$id = $filter($id);

				$this -> db -> where ($this -> _primary_key, $id);
				$method = 'row';
			} 
			else if($single == TRUE)
			{
				$method = 'row';
			}
			else 
			{
				$method = 'result';
			}
			
			$this -> db -> order_by($this->_order_by, $this->_order_by_order);
			
			return $this->db->get($this->_table_name)->$method();
		}
		
		/*
			* Melayani fungsi select dengan where pada query

			@param $where array berisi array asosiatif yang merupakan pasangan (column => value) yang diinginkan
				Contoh : Where ID=2 maka $where = array('id' => 2)
		*/
		public function get_by($where, $single = FALSE){
			$this->db->where($where);

			return $this->get(NULL, $single);
		}

		/*
			^ Melayani fungsi untuk get_by_id
			* Sepertinya ini tidak begitu penting -_-
		*/
		public function get_by_id($id){
			return $this->get_by(array('id' => $id), TRUE);
		}
		
		/*
			* Melayani fungsi update sama create (pokoknya yang berhubungan dengan simpan dan tulis data)

			@param $data array data yang akan ditulis dalam database dengan format assosatif column => value
			@param $id int,string berisi data $id mana ketika orang itu mau di update
			@return $id int,string berisi data id yang sudah di insert ataupun $id yang baru di update
		*/
		public function save($data, $id = NULL){

			//Saat timestamps nya true maka catat waktu saat ini dan masukan menuju database
			if($this->_timestamps == TRUE)
			{
				$now = date('Y-m-d H:i:s');
				$data['updated'] = $now;
			}
			
			if($id === NULL)
			{
				if(!isset($data[$this->_primary_key]))
				{
					$data[$this->_primary_key] = NULL;
				}

				$this -> db -> set($data);
				$this -> db -> insert($this->_table_name);
				$id = $this->db->insert_id();
			}
			else
			{
				$filter = $this->_primary_filter;
				$id = $filter($data[$this->_primary_key]);

				//set untuk update data
				$this -> db -> set($data);
				$this -> db -> where($this->_primary_key, $id);
				$this -> db -> update($this->_table_name);
			}
			
			return $id;
		}
		
		/*
			* Melayani fungsi delete pada database

			@param $id int,string bernilai id manakah data yang akan dihapus
		*/
		public function delete($id){
			$filter = $this->_primary_filter;
			$id = $filter($id);

			if(!$id) return FALSE;

			$this->db->where($this->_primary_key, $id);
			$this->db->limit(1);
			$this->db->delete($this->_table_name);
		}
	}
?>