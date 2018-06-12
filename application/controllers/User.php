<?php

	/*
		* Class ini mengatur tentang seluruh user yang bisa masuk kedalam admin

		@package controller
		@author Logic_boys
	*/
	class User extends Admin_Controller
	{

		public function __construct()
		{
			parent::__construct();

			// Load the model
			$this->load->model('User_m');
			$this->load->model('Materi_Quran_m');
			$this->load->model('Target_Quran_m');
		}

		/*
			* Method ini merupakan method untuk fungsi login bagi user
			* Done refactoring
		*/
		public function login()
		{
			//jika user udah logged in maka langsung redirect ke dashboar
			$dashboard = 'user';
			$this->User_m->loggedin() == FALSE || redirect($dashboard);

			// validation form
			$rules = $this->User_m->rules;
			$this->form_validation->set_rules($rules);

			//run when rule is satisfied
			if($this->form_validation->run() == TRUE)
			{
				//check login melalui fungsi dalam user
				$loginCheck = $this->User_m->login();

				//jika true maka langsung balik ke dashboar
				if($loginCheck)
				{
					redirect($dashboard);
				} 
				else 
				{
					$this -> session -> set_flashdata('error', 'Password salah'); //jika salah maka buat pesan kesalahan
					redirect('user/login', 'refresh');
				}
			}

			//load page
			$title = 'Login | '.$this->data['title']->value;
			$this->loadPage($title, 'login', 'login', TRUE);
		}

		/*
			* Method ini merupakan method untuk fungsi register
			* Fungsi ini hanya berlaku saat first installation dimana register pertama adalah sebagai ketua siswa
			* Setelah itu fungsi ini tidak akan berfungsi lagi karena ketua siswa bisa melakukan semuanya setelah itu
		*/
		public function register()
		{
			//cari ketua siswa. Ketika sudah ada ketua siswa maka tidak bisa daftar ketua siswa lagi
			//Apaan ketua siswa ada 2
			$data = $this->User_m->get_by(array('level' => 16));
			if(count($data)) redirect('/');

			//validation form
			$rules = $this->User_m->rules_register;
			$this->form_validation->set_rules($rules);

			if($this->form_validation->run() == TRUE){
				$data = $this->User_m->array_from_post(array('nama', 'pass'));
				$data['pass'] = $this->User_m->hash($data['pass']);

				//level ketua siswa adalah 16
				$data['level'] = 16;

				//save data
				$this->User_m->save($data);
				redirect('user/login');
			}

			//load page
			$title = 'Admin Register | '.$this->data['title']->value;
			$this->loadPage($title, 'register', 'login', TRUE);
		}


		/*
			* Method ini merupakan method untuk menampilkan dashboard pada setiap user
		*/
		public function index()
		{
			//ambil data lengkap user (termasuk wali dan pasus yang merupakan foreign key)
			$this->data['userData'] = $this->User_m->get_complete_user_by_id($this->session->userdata('id'));

			//jika levelnya 2 (santri reguler) maka tampilkan kekurangan quran dan hadist
			if(($this->session->userdata('level') & 2) == 2)
			{
				$this->load->model('Materi_Quran_m');
				$this->load->model('Materi_Hadist_m');

				//ambil data materi quran dan hadist
				$this->data['materiQuran'] = $this->Materi_Quran_m->get_materi_quran_user_id($this->session->userdata('id'));
				$this->data['materiHadist'] = $this->Materi_Hadist_m->get_materi_hadist_single_user($this->session->userdata('id'));
			}

			//jika levelnya 8 (pasus) maka tampilkan juga anggota pasus yang belum dinilai minggu ini
			if(($this->session->userdata('level') & 8) == 8)
			{
				$this->load->model('Pasus_m');

				$this->data['anggotaPasus'] = $this->Pasus_m->get_data_raw($this->session->userdata('id'));
				$this->data['jumlahPasus'] = count($this->Pasus_m->get_complete_pasus_child($this->session->userdata('id')));
			}

			//jika levelnya 1 (wali quran) maka tampilkan anggota reguler yang minggu ini belum di update
			if(($this->session->userdata('level') & 1) == 1){
				$this->load->model('Wali_m');

				$this->data['anggotaWali'] = $this->Wali_m->get_complete_wali_child($this->session->userdata('id'));
			}

			// Load The Page
			$title = 'Dashboard | '.$this->session->userdata['name'];
			$this->loadPage($title, 'admin/dashboard', 'data_table');
		}

		//Logout method handle the logout method
		public function logout()
		{
			$this->User_m->logout();
		}

		//Untuk setting page dan profile
		public function setting()
		{
			//fetch data from database
			$this->data['userData'] = $this->User_m->get_by(array('id' => $this->session->userdata('id')), TRUE);

			//validation form
			$rules = $this->User_m->rules_setting;
			$this->form_validation->set_rules($rules);

			//run form action if rule is satisfied
			if($this->form_validation->run() == TRUE)
			{
				//ambil data baru
				$newData = $this->User_m->array_from_post(array('nis', 'nama', 'alamat', 'angkatan', 'pass'));
				
				//masukkan id data baru untuk update
				$id = $this->session->userdata('id');
				$newData['id'] = $id;
				$newData['pass'] = $this->User_m->hash($newData['pass']);

				//save data
				$this->User_m->save($newData, $id);
				redirect('user');
			}

			// Load The Page
			$title = 'Profile | '.$this->session->userdata('name');
			$this->loadPage($title, 'admin/setting', 'data_table');
		}

		// Untuk lihat data seluruh santri
		// Done refactoring
		public function list($id = NULL)
		{
			// Fetch the required data
			$this->data['santriData'] = $this->User_m->get_complete_user_by_id();
			if($id)
				$this->data['santriDataEdit'] = $this->User_m->get_complete_user_by_id($id);

			// Process data

			// Get the form data
			$rules_level = array(
				array(
					'field' => 'level[]',
					'rules' => 'trim|required'
					)
			);
			$rules_add = array(
				array(
					'field' => 'nama',
					'rules' => 'trim|required'
					),
				array(
					'field' => 'angkatan',
					'rules' => 'trim|required'
					)
			);
			$newNama = $this->form('', 'nama', $rules_add);
			$newLevel = $this->form('', 'level', $rules_level);

			// Process form data
			if($newLevel){

				$sum = 0;
				foreach ($newLevel as $value) {
					$sum += $value;
				}

				$newUserData = $this->User_m->get_by(array('id' => $id), TRUE);
				$newUserData->level = $sum;

				$this->User_m->save((array)$newUserData, $id);
				redirect('user/list');
			}
			if($newNama)
			{
				$newUser = array();
				$newUser['nama'] = $newNama;
				$newUser['pass'] = $this->User_m->hash('santri');
				$newUser['angkatan'] = $this->input->post('angkatan');
				if($this->input->post('reguler') == true) $newUser['level'] = 2; else $newUser['level'] = 0;
				$newId = $this->User_m->save($newUser);
				if($this->input->post('reguler') == true)
				{
					$quranData = array(
						'santri_id' => $newId,
						'ketercapaian' => serialize(array()),
						'kosong' => 0
					);

					$angkatanData = $this->Target_Quran_m->get_by(array('angkatan' => $newUser['angkatan']));
					if(count($angkatanData) == 0) {
						$angkatanData = array(
							'angkatan' => $newUser['angkatan'],
							'target' => 0,
							'target_detail' => serialize(array())
						);

						$this->Target_Quran_m->save($angkatanData);
					}

					$this->Materi_Quran_m->save($quranData);
				}

				// redirect('user/list');
			}

			// Load The Page
			$title = 'Data Seluruh Santri';
			$this->loadPage($title, 'admin/super/list', 'data_table');
		}

		//untuk delete santri
		//$id untuk id santri yang akan di delete
		public function delete($id)
		{
			$this->load->model('Detail_Pasus_m');
			$this->load->model('Materi_Quran_m');
			$this->load->model('Materi_Hadist_m');

			//delete ketercapaian hadist yang berhubungan dengan santri
			$hadistSantri = $this->Materi_Hadist_m->get_by(array('santri_id' => $id));
			foreach ($hadistSantri as $value) 
			{
				$this->Materi_Hadist_m->delete($value->id_materi);
			}

			//deleter penilaian pasus yang berhubungan dengan santri
			$nilaiSantri = $this->Detail_Pasus_m->get_by(array('santri_id' => $id));
			foreach ($nilaiSantri as $value) 
			{
				$this->Detail_Pasus_m->delete($value->id);
			}

			//delete materi quran yang berhubungan dengan santri
			$this->Materi_Quran_m->delete($id);

			//delete santri dan balik lagi ke awal
			$this->User_m->delete($id);
			redirect('user/list');
		}

		/*
			* Method ini untuk generate config file dengan menggunakan form login
		*/
		public function genconfig()
		{
			//load page info
			$this->data['page_info'] = array(
					'css' => array('login.css'),
					'title' => 'Generate Config | Acadiquis',
					'js' => array('login.js'),
					'no-nav' => TRUE
				);
			$this->data['no_menu'] = TRUE;

			//check if current config is true
			$config = $this->Web_Config_m->get();
			if(count($config)){
				redirect('admin/config');
			}

			//validation form
			$rules = $this->Web_Config_m->rules_generate;
			$this->form_validation->set_rules($rules);

			if($this->form_validation->run() == TRUE){
				$key_config = $this->input->post('key_config');
				$value = $this->input->post('value');

				//level ketua siswa adalah 16
				for ($i=0; $i < 9; $i++) { 
					//save data
					$data['key_config'] = $key_config[$i];
					$data['value'] = $value[$i];

					$this->Web_Config_m->save($data);
				}

				redirect('user/register');
			}

			//load page
			$this->data['subview'] = 'gen_config';
			$this->load->view('main_layout', $this->data);
		}
	}
?>