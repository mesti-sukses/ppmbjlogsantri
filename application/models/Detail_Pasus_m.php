<?php
	class Detail_Pasus_m extends MY_Model{
		protected $_table_name = 'pasus_data';
		protected $_primary_key = 'id';
		protected $_timestamps = TRUE;

		public $rules = array(
				array(
					'field' => 'ket',
					'rules' => 'trim|required'
					)
			);

		//for database management

		//this method to get materi quran for certain user
		public function get_detail_pasus($id){
			$this->db->select('', FALSE);
			$this->db->from('user as u');
			$this->db->join('pasus_data as p', 'p.santri_id = u.id', 'left');
			$this->db->where(array('u.id' => $id));
			$this->db->order_by('p.updated', 'desc');
			return $this->db->get()->row();
		}
		
	}
?>