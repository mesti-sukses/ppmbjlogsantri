<?php
	class Hadist_m extends MY_Model{
		protected $_table_name = 'hadist';
		protected $_order_by = 'id';
		public $rules = array(
				array(
					'field' => 'nama',
					'rules' => 'trim|required'
					),
				array(
					'field' => 'offset',
					'rules' => 'trim|required'
				)
			);
		public function __construct(){
			parent::__construct();
		}

		public function get_hadist_list($id){
			$this->db->select('m.santri_id, h.nama, h.id');
			$this->db->from('hadist as h');
			$this->db->join('materi_hadist as m', 'm.hadist_id = h.id');
			$this->db->where(array('santri_id' => $id));
			return $this->db->get()->result();
		}

		public function get_hadist_added(){
			$id = $this->session->userdata('id');
			$this->db->select('m.santri_id, h.nama, h.id, h.offset');
			$this->db->from('hadist as h');
			$this->db->join('(SELECT * FROM materi_hadist WHERE santri_id ='.$id.') as m', 
				'm.hadist_id = h.id', 
				'left');
			//$this->db->where(array('santri_id' => $this->session->userdata('id')));
			return $this->db->get()->result();
		}
	}
?>