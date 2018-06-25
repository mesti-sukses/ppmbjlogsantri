<?php
	/*
		* Class ini mengatur tentang apa saja yang diperlukan oleh page
		* Beberapa contohnya 
		- Homepage membutuhkan social menu dan list 3 artikel pertama
		- About page membutuhkan data guru
		- Dsb

		@package controller
		@author Logic_boys
	*/
	class Page extends Frontend_Controller
	{

		public function __construct()
		{
			parent::__construct();

			$this->load->model('Web_Component_m');
			$this->load->model('Post_m');
			$this->load->model('Category_m');
		}
		
		/*
			* Method ini merupakan method yang langsung dipanggil alias homepage
		*/
		public function index()
		{
			//fetch data from database
			$this->data['testimoniData'] = $this->Web_Component_m->get_by(array('location' => 'testimoni'));
			// dump($this->data['testimoniData']);
			$this->data['dewanGuruData'] = $this->Web_Component_m->get_by(array('location' => 'dgcontent'));
			$this->data['stickyData'] = $this->Post_m->get_full(array('sticky' => 1), TRUE);
			$this->data['postData'] = $this->Post_m->get_full(array('sticky' => 0), FALSE, 2);
			$this->data['ketuaData'] = $this->Web_Component_m->get_by(array('location' => 'ketua'), TRUE);

			//load the page
			$this->data['title'] = $this->data['title']->value;
			$this->data['slogan'] = $this->Web_Config_m->get_by(array('key_config' => 'slogan'), TRUE);
			$this->data['subview'] = 'home';
			$this->load->view('front/main_layout', $this->data);
		}

		/*
			* Method ini merupakan method untuk mengatur about page
		*/
		public function about()
		{
			//fetch data from database
			$this->data['ketuaData'] = $this->Web_Component_m->get_by(array('location' => 'ketua'), TRUE);
			$this->data['dewanGuruData'] = $this->Web_Component_m->get_by(array('location' => 'dgcontent'));

			//load page
			$this->data['title'] = "About Us | ".$this->data['title']->value;
			$this->data['subview'] = 'about';
			$this->load->view('front/main_layout', $this->data);
		}

		/*
			* Method ini merupakan method untuk mengatur contact page
		*/
		public function contact()
		{
			//load page
			$this->data['title'] = "Contact Us | ".$this->data['title']->value;
			$this->data['subview'] = 'contact';
			$this->load->view('front/main_layout', $this->data);
		}

		/*
			* Method ini merupakan method untuk mengatur gallery page
		*/
		public function gallery()
		{
			$this->data['title'] = "Gallery | ".$this->data['title']->value;
			$this->data['clientId'] = $this->Web_Config_m->get_by(array('key_config' => 'client_id'), TRUE)->value;
			$this->data['accessToken'] = $this->Web_Config_m->get_by(array('key_config' => 'accessToken'), TRUE)->value;

			$this->data['subview'] = 'gallery';
			$this->load->view('front/main_layout', $this->data);
		}

		/*
			* Method ini merupakan method untuk mengatur page khusus untuk ulasan singkat bagi ketua pondok
		*/
		public function ketua()
		{
			//fetch from database
			$this->data['catData'] = $this->Category_m->get();
			$this->data['stickyData'] = $this->Post_m->get_full(array('sticky' => 1), TRUE);
			$this->data['postData'] = $this->Web_Component_m->get_by(array('location' => 'ketua'), TRUE);
			$this->data['postData']->name = 'Component';
			$this->data['postData']->title = $this->data['postData']->nama;
			$this->data['postData']->updated = date('Y-m-d H:i:s');
			$this->data['postData']->image = 'principal1.jpg';

			//load page
			$this->data['subview'] = 'post';
			$this->data['title'] = "Ketua Pondok | ".$this->data['title']->value;
			$this->load->view('front/main_layout', $this->data);
		}
	}
?>