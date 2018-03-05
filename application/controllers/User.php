<?php
	class User extends Admin_Controller{
		/*
			User class handle the whole user in the site including wali bacaan, ketua siswa, and other santri
		*/

		public function __construct(){
			parent::__construct();
		}

		//Login method handle the login page and send data from page to User database that handled by User model
		public function login(){
			$this->data['page_info'] = array(
					'css' => array('login.css'),
					'title' => 'Login | '.config_item('site_name'),
					'js' => array('login.js'),
					'no-nav' => TRUE
				);

			$this->data['subview'] = 'login';

			$dashboard = 'user';
			$this->User_m->loggedin() == FALSE || redirect($dashboard);

			//validation form
			$rules = $this->User_m->rules;
			$this->form_validation->set_rules($rules);
			if($this->form_validation->run() == TRUE){
				$loginCheck = $this->User_m->login();
				if($loginCheck){
					redirect($dashboard);
				} else {
					$this -> session -> set_flashdata('error', 'Password salah');
					redirect('user/login', 'refresh');
				}
			}

			$this->load->view('main_layout', $this->data);
		}

		public function register(){
			$this->data['page_info'] = array(
					'css' => array('login.css'),
					'title' => 'Admin Register | '. config_item('site_name'),
					'js' => array('login.js'),
					'no-nav' => TRUE
				);

			$this->data['subview'] = 'register';

			$data = $this->User_m->get_by(array('level' => 16));
			if(count($data)) redirect('/');

			//validation form
			$rules = $this->User_m->rules_register;
			$this->form_validation->set_rules($rules);
			if($this->form_validation->run() == TRUE){
				$data = $this->User_m->array_from_post(array('nama', 'pass'));
				$data['pass'] = $this->User_m->hash($data['pass']);
				$data['level'] = 16;
				$this->User_m->save($data);
				redirect('user/login');
			}

			$this->load->view('main_layout', $this->data);
		}


		//Index method handle the dashboard that used by the controller
		public function index(){
			$this->data['page_info'] = array(
					'css' => array(''),
					'title' => 'Dashboard | '.$this->session->userdata['name'],
					'js' => array(''),
					'no-nav' => FALSE
				);

			$this->data['userData'] = $this->User_m->get_complete_user_by_id($this->session->userdata('id'));

			if(($this->session->userdata('level') & 2) == 2){
				$this->load->model('Materi_Quran_m');
				$this->load->model('Materi_Hadist_m');

				$this->data['materiQuran'] = $this->Materi_Quran_m->get_materi_quran_user_id($this->session->userdata('id'));

				$this->data['materiHadist'] = $this->Materi_Hadist_m->get_materi_hadist_single_user($this->session->userdata('id'));
			}

			if(($this->session->userdata('level') & 8) == 8){
				$this->load->model('Pasus_m');

				$this->data['anggotaPasus'] = $this->Pasus_m->get_data_raw($this->session->userdata('id'));
				$this->data['jumlahPasus'] = count($this->Pasus_m->get_complete_pasus_child($this->session->userdata('id')));
			}

			if(($this->session->userdata('level') & 1) == 1){
				$this->load->model('Wali_m');

				$this->data['anggotaWali'] = $this->Wali_m->get_complete_wali_child($this->session->userdata('id'));
			}

			$this->data['subview'] = 'admin/dashboard';

			$this->load->view('main_layout', $this->data);
		}

		//Logout method handle the logout method
		public function logout(){
			$this->User_m->logout();
		}

		//Untuk setting page dan profile
		public function setting(){

			$this->data['page_info'] = array(
					'css' => array(),
					'title' => 'Profile | '.$this->session->userdata('name'),
					'js' => array(),
					'no-nav' => FALSE
				);

			$this->data['subview'] = 'admin/setting';

			$this->data['userData'] = $this->User_m->get_by(array('id' => $this->session->userdata('id')), TRUE);

			//validation form
			$rules = $this->User_m->rules_setting;
			$this->form_validation->set_rules($rules);
			if($this->form_validation->run() == TRUE){
				$newData = $this->User_m->array_from_post(array('nis', 'nama', 'alamat', 'angkatan', 'pass'));
				
				$id = $this->session->userdata('id');
				$newData['id'] = $id;

				$newData['pass'] = $this->User_m->hash($newData['pass']);

				$this->User_m->save($newData, $id);
				redirect('user');
			}

			$this->load->view('main_layout', $this->data);
		}

		public function list(){
			$this->data['page_info'] = array(
					'css' => array('jquery.dataTables.min.css', 'responsive.dataTables.min.css', 'checkbox.css'),
					'title' => 'Data Seluruh Santri',
					'js' => array('checkStatus.js', 'savereport.js', 'jquery.dataTables.min.js', 'dataTables.responsive.min.js'),
					'no-nav' => FALSE
				);

			$this->data['santriData'] = $this->User_m->get_complete_user_by_id();
			$this->data['waliData'] = $this->User_m->get_by('(level & 1) = 1');

			$this->data['subview'] = 'admin/super/list';

			$this->load->view('main_layout', $this->data);
		}

		public function delete($id){
			$this->load->model('Detail_Pasus_m');
			$this->load->model('Materi_Quran_m');
			$this->load->model('Materi_Hadist_m');

			$hadistSantri = $this->Materi_Hadist_m->get_by(array('santri_id' => $id));
			foreach ($hadistSantri as $value) {
				$this->Materi_Hadist_m->delete($value->id_materi);
			}

			$nilaiSantri = $this->Detail_Pasus_m->get_by(array('santri_id' => $id));
			foreach ($nilaiSantri as $value) {
				$this->Detail_Pasus_m->delete($value->id);
			}
			$this->Materi_Quran_m->delete($id);

			$this->User_m->delete($id);
			redirect('user/list');
		}

		public function add(){
			$this->load->model('User_m');
			$userData = $this->User_m->array_from_post(array('nama', 'angkatan'));
			if($this->input->post('reguler') == true) $userData['level'] = 2; else $userData['level'] = 0;
			$userData['pass'] = $this->User_m->hash('santri');
			$id = $this->User_m->save($userData);
			dump($id);
			if($this->input->post('reguler') == true){
				$this->load->model('Materi_Quran_m');
				$quranData = array(
					'santri_id' => $id,
					'ketercapaian' => serialize(array()),
					'kosong' => 0
				);
				$this->Materi_Quran_m->save($quranData);
			}
			redirect('user/list');
		}

		public function status(){
			$this->load->model('User_m');
			$id =  $this->input->post('id');
			$userData = $this->User_m->get_by(array('id' => $id), TRUE);
			$level = 0;
			if($this->input->post('wali') == TRUE) $level += 1;
			if($this->input->post('reguler') == TRUE) $level += 2;
			if($this->input->post('jurnal') == TRUE) $level += 4;
			if($this->input->post('pasus') == TRUE) $level += 8;
			if($this->input->post('kesiswaan') == TRUE) $level += 16;
			if($this->input->post('koordinator') == TRUE) $level += 32;
			if($this->input->post('ustadzah') == TRUE) $level += 128;
			if($this->input->post('hadist') == TRUE) $level += 256;
			$userData->level = $level;
			$this->User_m->save((array)$userData, $id);
		}
	}
?>