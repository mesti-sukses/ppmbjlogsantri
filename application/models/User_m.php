<?php
	class User_m extends MY_Model{
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

		public function __construct(){
			parent::__construct();
		}

		public function loggedin(){
			return (boolean)$this->session->userdata('loggedin');
		}

		public function login(){
			$user = $this -> get_by(array(
				'nama' => $this->input->post('user'),
				'pass' => $this->hash($this->input->post('pass'))
			), TRUE);
			if(count($user)){
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

		public function hash($string){
			return hash('sha512', $string.config_item('encryption_key'));
		}

		public function logout(){
			$this->session->sess_destroy();
			redirect('user/login');
		}

		//for database management

		//this method to get complete user data
		public function get_complete_user_by_id($id){
			$this->db->select('u.nama, u.nis, u.alamat, u.kelas, u.angkatan, p.nama as nama_pasus, w.nama as nama_wali', FALSE);
			$this->db->from('user as u');
			$this->db->join('user as w', 'u.wali = w.id', 'left');
			$this->db->join('user as p', 'u.pasus = p.id', 'left');
			$this->db->where(array('u.id' => $id));
			return $this->db->get()->row();
		}
	}
?>