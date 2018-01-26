<?php
	class Materi_Quran_m extends MY_Model{
		protected $_table_name = 'materi_quran';
		protected $_primary_key = 'santri_id';
		protected $_timestamps = TRUE;

		public $rules = array(
				array(
					'field' => 'kosong',
					'rules' => 'trim|required'
					)
			);

		//for database management

		//this method to get materi quran for certain user
		public function get_materi_quran_user_id($id = NULL){
			$this->db->select('', FALSE);
			$this->db->from('materi_quran as m');
			$this->db->join('user as u', 'm.santri_id = u.id');
			$this->db->join('target_quran as t', 'u.angkatan = t.angkatan');
			if($id != NULL){
				$this->db->where(array('u.id' => $id));
				return $this->db->get()->row();
			} else 
				return $this->db->get()->result();
		}
	}
?>