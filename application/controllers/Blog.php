<?php
	/*
		* Class ini mengatur tentang apa saja yang diperlukan oleh blog page
		* Seperti : 
		- Blog page memerlukan web component ini, menu ini dan lain
		- Article page memerlukan data posting, posting terkait dsb

		@package controller
		@author Logic_boys
	*/
	class Blog extends Frontend_Controller
	{

		public function __construct()
		{
			parent::__construct();
			$this->load->model('Web_Component_m');
		}
		
		/*
			* Method ini merupakan method untuk memanggil list blog post
		*/
		public function index()
		{
			$this->load->model('Category_m');
			$this->load->model('Post_m');

			//fetch the data
			$this->data['catData'] = $this->Category_m->get();
			$this->data['stickyData'] = $this->Post_m->get_full(array('sticky' => 1), TRUE);
			$this->data['postData'] = $this->Post_m->get_full(array('sticky' => 0));

			//load page info
			$this->data['title'] = "Blog | ".$this->data['title']->value;

			//load page
			$this->data['subview'] = 'blog';
			$this->load->view('front/main_layout', $this->data);
		}

		/*
			* Method ini merupakan method untuk memanggil info artikel berdasarkan id dari artikel yang bersangkutan

			@param $id int: article id yang akan ditampilkan
		*/
		public function post($id)
		{
			$this->load->model('Category_m');
			$this->load->model('Post_m');

			//fetch the data
			$this->data['catData'] = $this->Category_m->get();
			$this->data['stickyData'] = $this->Post_m->get_full(array('sticky' => 1), TRUE);
			$this->data['postData'] = $this->Post_m->get_full(array('id' => $id), TRUE);

			//load page info
			$this->data['title'] = $this->data['postData']->title." | ".$this->data['title']->value;

			//load page
			$this->data['subview'] = 'post';
			$this->load->view('front/main_layout', $this->data);
		}

		/*
			* Method ini merupakan method untuk memanggil list dari post dengan kategori tertentu melalui kategori id yang bersangkutan

			@param $id int: id dari kategori yang akan ditampilkan
		*/
		public function category($id)
		{
			$this->load->model('Category_m');
			$this->load->model('Post_m');

			//fetch data from database
			$this->data['catData'] = $this->Category_m->get();
			$this->data['stickyData'] = $this->Post_m->get_full(array('sticky' => 1), TRUE);
			$this->data['postData'] = $this->Post_m->get_full(array('categories' => $id));
			$catName = $this->Category_m->get_by(array('cat_id' => $id), TRUE)->name;

			//load page info
			$this->data['title'] = $catName." | ".$this->data['title']->value;

			//load page
			$this->data['subview'] = 'blog';
			$this->load->view('front/main_layout', $this->data);
		}
	}
?>