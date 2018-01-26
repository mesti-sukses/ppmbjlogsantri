<?php
	class Materi_Hadist_m extends MY_Model{
		protected $_table_name = 'materi_hadist';
		protected $_primary_key = 'id_materi';
		protected $_order_by = 'id';
		public function __construct(){
			parent::__construct();
		}

		public $rules = array(
				array(
					'field' => 'kosong',
					'rules' => 'trim|required'
					)
			);

		public function get_materi_hadist($id = NULL, $idHadist){
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

		public function get_materi_hadist_user($id){
			$this->db->select('u.nama, u.angkatan, h.offset, m.kosong, m.updated', FALSE);
			$this->db->from('materi_hadist as m');
			$this->db->join('user as u', 'm.santri_id = u.id');
			$this->db->join('hadist as h', 'm.hadist_id = h.id');
			$this->db->where(array('m.hadist_id' => $id));
			return $this->db->get()->result();
		}
	}
?>