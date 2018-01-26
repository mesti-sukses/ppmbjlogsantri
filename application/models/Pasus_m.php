<?php
	class Pasus_m extends MY_Model{

		public function __construct(){
			parent::__construct();
		}

		public function get_complete_pasus_child($id){
			$this->db->select('w.id, w.angkatan, w.nama as santri, w.nis as nis, w.alamat as alamat', FALSE);
			$this->db->from('user as u');
			$this->db->join('user as w', 'u.id = w.pasus');
			$this->db->where(array('u.id' => $id));
			return $this->db->get()->result();
		}

		public function get_complete_child_detail($id){
			$this->db->select('', FALSE);
			$this->db->from('user as u');
			$this->db->join('pasus_data as p', 'u.id = p.santri_id', 'left');
			$this->db->where(array('u.id' => $id));
			return $this->db->get()->row();
		}

		public function get_non_pasus(){
			$this->db->select('w.id, w.angkatan, w.nama as santri, w.nis as nis, w.alamat as alamat', FALSE);
			$this->db->from('user as w');
			$this->db->where(array('w.pasus' => NULL));
			return $this->db->get()->result();
		}

		public function get_data_raw(){
			$this->db->select('u.nama, p.nama as pasus, d.ket, d.updated, d.detail');
			$this->db->from('user u');
			$this->db->join('user as p', 'u.pasus = p.id', 'left');
			$this->db->join('pasus_data as d', 'u.id = d.santri_id', 'left');

			return $this->db->get()->result();
		}
	}
?>