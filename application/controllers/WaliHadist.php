<?php

	class WaliHadist extends Admin_Controller
	{
		/*
			Class wali untuk mendefinisikan wali hadist ini bisa apa aja sih
		*/

		public function __construct()
		{
			parent::__construct();
			parent::raiseError(256);
		}

		/*
			* Method ini merupakan method untuk memanggil list kekosongan dan santri mana saja yang sudah menambahkan hadist ini

			@param $id int: id dari hadist yang bersangkutan
		*/
		public function index($id)
		{
			$this->load->model('Materi_Hadist_m');

			//fetch data from database
			$this->data['santriData'] = $this->Materi_Hadist_m->get_materi_hadist_user($id);

			// Load The Page
			$title = 'List Santri | '.$this->session->userdata['name'];
			$this->loadPage($title, 'admin/wali/list_hadist', 'data_table');
		}

		/*
			* Method ini merupakan method untuk menambahkan hadist yang baru saja khatam setelah diajarkan
		*/
		public function addHadist()
		{
			$dataHadist = $this->form('Hadist_m', array('nama', 'offset'));
			if($dataHadist)
				$this->Hadist_m->save($dataHadist);

			$this->data['dataHadist'] = $this->Hadist_m->get();

			// Load The Page
			$title = 'Tambahkan Hadist | '.$this->session->userdata['name'];
			$this->loadPage($title, 'admin/wali/hadist_list', 'data_table');
		}
	}
?>