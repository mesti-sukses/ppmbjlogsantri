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
		}
		
		/*
			* Method ini merupakan method yang langsung dipanggil alias homepage
		*/
		public function index()
		{
			$this->load->model('Post_m');

			//load page info
			$this->data['title'] = "Ma'had Baitul Jannah Official Site";

			//fetch data from database
			$this->data['testimoniData'] = $this->Web_Component_m->get_by(array('location' => 'testimoni'));
			$this->data['dewanGuruData'] = $this->Web_Component_m->get_by(array('location' => 'dgcontent'));
			$this->data['stickyData'] = $this->Post_m->get_full(array('sticky' => 1), TRUE);
			$this->data['postData'] = $this->Post_m->get_full(array('sticky' => 0), FALSE, 2);
			$this->data['ketuaData'] = $this->Web_Component_m->get_by(array('location' => 'ketua'), TRUE);

			//load the page
			$this->data['subview'] = 'home';
			$this->load->view('front/main_layout', $this->data);
		}

		/*
			* Method ini merupakan method untuk mengatur about page
		*/
		public function about()
		{
			//load page info
			$this->data['title'] = "About Us | Ma'had Baitul Jannah";

			//fetch data from database
			$this->data['ketuaData'] = $this->Web_Component_m->get_by(array('location' => 'ketua'), TRUE);
			$this->data['dewanGuruData'] = $this->Web_Component_m->get_by(array('location' => 'dgcontent'));

			//load page
			$this->data['subview'] = 'about';
			$this->load->view('front/main_layout', $this->data);
		}

		/*
			* Method ini merupakan method untuk mengatur contact page
		*/
		public function contact()
		{
			//load page_info
			$this->data['title'] = "Contact Us | Ma'had Baitul Jannah";

			//load page
			$this->data['subview'] = 'contact';
			$this->load->view('front/main_layout', $this->data);
		}

		/*
			* Method ini merupakan method untuk mengatur gallery page
		*/
		public function gallery()
		{
			$this->data['title'] = "Gallery | Ma'had Baitul Jannah";

			$this->data['subview'] = 'gallery';
			$this->load->view('front/main_layout', $this->data);
		}

		/*
			* Method ini merupakan method untuk mengatur page khusus untuk ulasan singkat bagi ketua pondok
		*/
		public function ketua(){
			$this->load->model('Category_m');
			$this->load->model('Web_Component_m');
			$this->load->model('Post_m');

			//fetch from database
			$this->data['catData'] = $this->Category_m->get();
			$this->data['stickyData'] = $this->Post_m->get_full(array('sticky' => 1), TRUE);
			$this->data['postData'] = $this->Web_Component_m->get_by(array('location' => 'ketua'), TRUE);
			$this->data['postData']->name = 'Component';
			$this->data['postData']->title = $this->data['postData']->nama;
			$this->data['postData']->updated = date('Y-m-d H:i:s');
			$this->data['postData']->image = 'principal1.jpg';

			//load page info
			$this->data['title'] = "Ketua Pondok | Ma'had Baitul Jannah Official Site";

			//load page
			$this->data['subview'] = 'post';
			$this->load->view('front/main_layout', $this->data);
		}
	}
?>