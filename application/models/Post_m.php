<?php
	class Post_m extends MY_Model{
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
		public function __construct(){
			parent::__construct();
		}

		public function get_full($where = NULL, $single = FALSE, $limit = 0){
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