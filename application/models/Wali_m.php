<?php
	class Wali_m extends MY_Model{
		public function __construct(){
			parent::__construct();
		}

		public function get_complete_wali_child($id = NULL){
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