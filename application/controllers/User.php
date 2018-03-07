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
		}

		/*
			* Method ini merupakan method untuk fungsi login bagi user
		*/
		public function login()
		{

			//load page info
			$this->data['page_info'] = array(
					'css' => array('login.css'),
					'title' => 'Login | '.config_item('site_name'),
					'js' => array('login.js'),
					'no-nav' => TRUE
				);

			//jika user udah logged in maka langsung redirect ke dashboar
			$dashboard = 'user';
			$this->User_m->loggedin() == FALSE || redirect($dashboard);

			//validation form
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
			$this->data['subview'] = 'login';
			$this->load->view('main_layout', $this->data);
		}

		/*
			* Method ini merupakan method untuk fungsi register
			* Fungsi ini hanya berlaku saat first installation dimana register pertama adalah sebagai ketua siswa
			* Setelah itu fungsi ini tidak akan berfungsi lagi karena ketua siswa bisa melakukan semuanya setelah itu
		*/
		public function register()
		{
			//load page info
			$this->data['page_info'] = array(
					'css' => array('login.css'),
					'title' => 'Admin Register | '. config_item('site_name'),
					'js' => array('login.js'),
					'no-nav' => TRUE
				);

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
			$this->data['subview'] = 'register';
			$this->load->view('main_layout', $this->data);
		}


		/*
			* Method ini merupakan method untuk menampilkan dashboard pada setiap user
		*/
		public function index()
		{

			//load page info
			$this->data['page_info'] = array(
					'css' => array(''),
					'title' => 'Dashboard | '.$this->session->userdata['name'],
					'js' => array(''),
					'no-nav' => FALSE
				);

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

			//load page
			$this->data['subview'] = 'admin/dashboard';
			$this->load->view('main_layout', $this->data);
		}

		//Logout method handle the logout method
		public function logout()
		{
			$this->User_m->logout();
		}

		//Untuk setting page dan profile
		public function setting()
		{
			//load page info
			$this->data['page_info'] = array(
					'css' => array(),
					'title' => 'Profile | '.$this->session->userdata('name'),
					'js' => array(),
					'no-nav' => FALSE
				);

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

			//load page
			$this->data['subview'] = 'admin/setting';
			$this->load->view('main_layout', $this->data);
		}

		//untuk lihat data seluruh santri
		public function list()
		{
			//load page info
			$this->data['page_info'] = array(
					'css' => array('jquery.dataTables.min.css', 'responsive.dataTables.min.css', 'checkbox.css'),
					'title' => 'Data Seluruh Santri',
					'js' => array('checkStatus.js', 'savereport.js', 'jquery.dataTables.min.js', 'dataTables.responsive.min.js'),
					'no-nav' => FALSE
				);

			//fetch data
			$this->data['santriData'] = $this->User_m->get_complete_user_by_id();
			//untuk list wali sehingga migrasi wali menjadi lebih mudah
			$this->data['waliData'] = $this->User_m->get_by('(level & 1) = 1');

			//load page
			$this->data['subview'] = 'admin/super/list';
			$this->load->view('main_layout', $this->data);
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
			* Method ini merupakan method untuk menambahkan fungsi tambah santri @Logic Boys
		*/
		public function add()
		{
			$this->load->model('User_m');

			//ambil data dari post
			$userData = $this->User_m->array_from_post(array('nama', 'angkatan'));
			//hitung hash password
			$userData['pass'] = $this->User_m->hash('santri');
			//jika merupakan reguler maka levelnya 2
			if($this->input->post('reguler') == true) $userData['level'] = 2; else $userData['level'] = 0;
			//ambil id saat insert id
			$id = $this->User_m->save($userData);
			//jika reguler maka create juga materi qurannya
			//karena jika reguler tanpa materi quran pasti akan error
			if($this->input->post('reguler') == true)
			{
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

		/*
			* Method ini merupakan method untuk mengubah status dan level dari user
		*/
		public function status()
		{
			$this->load->model('User_m');
			$id =  $this->input->post('id');

			$userData = $this->User_m->get_by(array('id' => $id), TRUE);
			$level = 0;

			//sistem level menggunakan masking sehingga akan ditambah dengan perpangkatan 2
			//0001 + 10000 = 1001
			//Bisa di mask oleh dua buah dapukan
			//agar wali bisa menjadi pasus, reguler bisa menjadi pasus dsb
			if($this->input->post('wali') == TRUE) $level += 1;
			if($this->input->post('reguler') == TRUE) $level += 2;
			if($this->input->post('jurnal') == TRUE) $level += 4;
			if($this->input->post('pasus') == TRUE) $level += 8;
			if($this->input->post('kesiswaan') == TRUE) $level += 16;
			if($this->input->post('koordinator') == TRUE) $level += 32;
			if($this->input->post('admin') == TRUE) $level += 64;
			if($this->input->post('ustadzah') == TRUE) $level += 128;
			if($this->input->post('hadist') == TRUE) $level += 256;
			if($this->input->post('saringan') == TRUE) $level += 512;

			//save data
			$userData->level = $level;
			$this->User_m->save((array)$userData, $id);
			redirect('user/list');
		}
	}
?>