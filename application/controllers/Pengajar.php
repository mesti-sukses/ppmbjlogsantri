<?php

	/*
		* Class ini mengatur tentang apa saja yang bisa dilakukan oleh pasca saringan (yaitu orang yang tidak terdaftar sebagai santri reguler)

		Alur pengisian :
		- Saat musyawarah usulan akan diberikan, sekretaris input usulan dan kemudian save
		- Setelah itu tiap usulan dibahas setelah di sort berdasarkan keterbahasan
		- Tombol edit akan membuka form pembahasan
		- Sekretaris menginput pembahasan

		Saat evaluasi :
		- Sekretaris akan sort berdasarkan updated dan check untuk melihat PR dari pengusul yang sudah terbahas atau belum
		- Jika ditanya tentang keterbahasan maka sort berdasarkan keterbahasan (ini mudah)

		Format seperti biasanya
		- Laporan
		- Evaluasi
		()
		- Usulan belum terbahas
		()
		- Usulan
		- Pembahasan

		@package controller
		@author Logic_boys
	*/
	class Pengajar extends Admin_Controller
	{

		public function __construct()
		{
			parent::__construct();
			
			if((intval($this->session->userdata('level')) & 2) == 2){
				echo('Anda bukan pengajar ataupun pasca saringan');
				exit();
			}
		}

		/*
			Method ini untuk menampilkan list usulan apa aja yang sudah dilakukan oleh FP

			TODO :
			- (done) List di tampilkan dalam bentuk tabel
			- (done) Tombol tambahkan list akan memicu ke modal yang meminta inputan berupa nama pengusul (combo box) dan usulan
			- (done) Untuk sekretaris juga ditambah tombol edit dan delete
			- (done) Kolom : check, usulan, pengusul, terbahas/belum, updated, action
			- (d0ne) Action bisa juga view yang akan memicu ke halaman dimana format laporan di simpan
			- Tambahkan rule untuk tambah usulan
		*/

		public function index()
		{
			$this->load->model('Musyawarah_m');

			//fetch data
			$this->data['musyawarahData'] = $this->Musyawarah_m->get();
			$this->data['dataFP'] = $this->User_m->get_by('(level & 2) != 2');

			//set form rule
			$rules = $this->Musyawarah_m->rules;
			$this->form_validation->set_rules($rules);

			//run form action after meet the requirement
			if($this->form_validation->run() == TRUE)
			{
				$dataUsulan = $this->Musyawarah_m->array_from_post(array('usulan', 'pengusul'));
				$dataUsulan['terlaksana'] = 0;
				$dataUsulan['created'] = date('Y-m-d H:i:s');

				$this->Musyawarah_m->save($dataUsulan);

				redirect('pengajar/index', 'refresh');
			}

			// Load The Page
			$title = 'Semua Usulan | '.$this->session->userdata['name'];
			$this->loadPage($title, 'admin/fp/list', 'data_table');
		}

		/*
			Method ini untuk menampilkan form pengisian usulan

			TODO :
			- (done) Form seperti form blog post cuma lebih lebar dikit
			- (done) Side bar berisi list FP dengan tanda centang untuk pengusul (radio)
		*/

		public function edit($id)
		{
			$this->load->model('Musyawarah_m');

			// fetch data
			$this->data['dataUsulan'] = $this->Musyawarah_m->get($id, TRUE);
			$this->data['dataFP'] = $this->User_m->get_by('(level & 2) != 2');

			//set form rule
			$rules = $this->Musyawarah_m->rules_pembahasan;
			$this->form_validation->set_rules($rules);

			//run form action after meet the requirement
			if($this->form_validation->run() == TRUE)
			{

				// get the required data only
				// karena data yang didapat sekalian nama pengusulnya
				// dan yang kita butuhkan hanya id pengusul, yang lain tinggal
				// makanya diambil satu persatu
				$dataUsulan['usulan_id'] = $this->data['dataUsulan']->usulan_id;
				$dataUsulan['pengusul'] = $this->input->post('pengusul');
				$dataUsulan['usulan'] = $this->data['dataUsulan']->usulan;
				$dataUsulan['terlaksana'] = $this->data['dataUsulan']->terlaksana;
				$dataUsulan['created'] = $this->data['dataUsulan']->created;
				$dataUsulan['terlaksana'] = ($this->input->post('terlaksana') != NULL) ? $this->input->post('terlaksana') : 0;
				$dataUsulan['pembahasan'] = $this->input->post('content');

				$this->Musyawarah_m->save($dataUsulan, $dataUsulan['usulan_id']);

				redirect('pengajar');
			}

			// Load The Page
			$title = 'Pembahasan Usulan | '.$this->session->userdata['name'];
			$this->loadPage($title, 'admin/fp/post', 'admin_editor');
		}

		/*
			Method ini berfungsi untuk menampilkan hasil dari musyawarah

			TODO :
			- Format laporan : Usulan, Pengusul, Status (terbahas, terlaksana, dll), Tanggal Usulan, Pembahasan
		*/

		public function view($id)
		{
			$this->load->model('Musyawarah_m');

			// fetch data
			$this->data['dataUsulan'] = $this->Musyawarah_m->get($id, TRUE);

			// Load The Page
			$title = 'Usulan | '.$this->session->userdata['name'];
			$this->loadPage($title, 'admin/fp/view', 'admin_editor');
		}
	}
?>