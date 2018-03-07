<?php

	/*
		* Class ini mengatur CRUD pada tabel post yang berfungsi untuk mengatur semua data posting yang ada dalam blog

		* Struktur database blog_post
		- id: id hadist
		- title: merupakan judul dari artikel
		- categories: berisi id dari kategori artikel
		- sticky: berisi boolean apakah artikel merupakan sticky (ada di sidebar dan halaman awal) atau bukan
		- image: berisi nama file gambar yang berada pada direktori /images/Post
		- updated: timestamps article
		- content: isi artikel

		@package model
		@author Logic_boys
	*/
	class Post_m extends MY_Model
	{
		protected $_table_name = 'blog_post';
		protected $_order_by = 'id';
		protected $_timestamps = TRUE;

		public $rules = array(
				array(
					'field' => 'title',
					'rules' => 'trim|required'
					),
				array(
					'field' => 'categories',
					'rules' => 'trim|required'
				)
			);
		
		public function __construct()
		{
			parent::__construct();
		}

		/*
			* Method ini digunakan untuk mengambil data posting full termasuk kategori dan lain sebagainya

			@param $where array,string: untuk filter post berdasarkan column
			@param $single boolean: untuk menentukan apakah ingin satu post atau series post
			@param $limit int: untuk membatasi jumlah post yang diperlukan. 0 akan mengambil semua post
		*/
		public function get_full($where = NULL, $single = FALSE, $limit = 0)
		{
			$this->db->select();
			$this->db->from('blog_post as p');
			$this->db->order_by('updated', 'desc');
			$this->db->join('category as c', 'p.categories = c.cat_id');
			if($where) $this->db->where($where);
			if($limit != 0) $this->db->limit($limit);
			if($single) return $this->db->get()->row(); else
			return $this->db->get()->result();
		}
	}
?>