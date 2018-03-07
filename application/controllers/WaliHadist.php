<?php

	class WaliHadist extends Admin_Controller
	{
		/*
			Class wali untuk mendefinisikan wali hadist ini bisa apa aja sih
		*/

		public function __construct()
		{
			parent::__construct();
			if ((intval($this->session->userdata('level')) & 256) != 256){
				echo "Anda bukan wali hadist";
				exit();
			}
		}

		/*
			* Method ini merupakan method untuk memanggil list kekosongan dan santri mana saja yang sudah menambahkan hadist ini

			@param $id int: id dari hadist yang bersangkutan
		*/
		public function index($id)
		{
			$this->load->model('Materi_Hadist_m');

			//load page info
			$this->data['page_info'] = array(
					'css' => array('jquery.dataTables.min.css', 'responsive.dataTables.min.css'),
					'title' => 'List Santri | '.$this->session->userdata['name'],
					'js' => array('savereport.js', 'jquery.dataTables.min.js', 'dataTables.responsive.min.js'),
					'no-nav' => FALSE
				);

			//fetch data from database
			$this->data['santriData'] = $this->Materi_Hadist_m->get_materi_hadist_user($id);

			//load page
			$this->data['subview'] = 'admin/wali/list_hadist';
			$this->load->view('main_layout', $this->data);
		}

		/*
			* Method ini merupakan method untuk menambahkan hadist yang baru saja khatam setelah diajarkan
		*/
		public function addHadist()
		{

			//load page info
			$this->data['page_info'] = array(
					'css' => array('jquery.dataTables.min.css', 'responsive.dataTables.min.css'),
					'title' => 'Tambahkan Hadist | '.$this->session->userdata['name'],
					'js' => array('savereport.js', 'jquery.dataTables.min.js', 'dataTables.responsive.min.js'),
					'no-nav' => FALSE
				);

			//set rules
			$rules = $this->Hadist_m->rules;
			$this->form_validation->set_rules($rules);

			//run if rule is satisfied
			if($this->form_validation->run() == TRUE)
			{
				$dataHadist = $this->Hadist_m->array_from_post(array('nama', 'offset'));
				$this->Hadist_m->save($dataHadist);
			}

			$this->data['dataHadist'] = $this->Hadist_m->get();

			//load page
			$this->data['subview'] = 'admin/wali/hadist_list';
			$this->load->view('main_layout', $this->data);
		}
	}
?>