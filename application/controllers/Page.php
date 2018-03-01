<?php
	/**
	* 
	*/
	class Page extends Frontend_Controller
	{

		public function __construct(){
			parent::__construct();
			$this->load->model('Web_Component_m');
		}
		
		public function index(){
			$this->load->model('Post_m');
			$this->data['title'] = "Ma'had Baitul Jannah Official Site";
			$this->data['testimoniData'] = $this->Web_Component_m->get_by(array('location' => 'testimoni'));
			$this->data['dewanGuruData'] = $this->Web_Component_m->get_by(array('location' => 'dgcontent'));
			$this->data['stickyData'] = $this->Post_m->get_full(array('sticky' => 1), TRUE);
			$this->data['postData'] = $this->Post_m->get_full(array('sticky' => 0), FALSE, 2);
			$this->data['ketuaData'] = $this->Web_Component_m->get_by(array('location' => 'ketua'), TRUE);
			$this->data['subview'] = 'home';

			$this->load->view('front/main_layout', $this->data);
		}

		public function about(){
			$this->data['title'] = "About Us | Ma'had Baitul Jannah";
			$this->data['subview'] = 'about';
			$this->data['ketuaData'] = $this->Web_Component_m->get_by(array('location' => 'ketua'), TRUE);
			$this->data['dewanGuruData'] = $this->Web_Component_m->get_by(array('location' => 'dgcontent'));

			$this->load->view('front/main_layout', $this->data);
		}

		public function contact(){
			$this->data['title'] = "Contact Us | Ma'had Baitul Jannah";
			$this->data['subview'] = 'contact';

			$this->load->view('front/main_layout', $this->data);
		}

		public function gallery(){
			$this->data['title'] = "Gallery | Ma'had Baitul Jannah";
			$this->data['subview'] = 'gallery';

			$this->load->view('front/main_layout', $this->data);
		}

		public function ketua(){
			$this->load->model('Category_m');
			$this->load->model('Web_Component_m');
			$this->load->model('Post_m');
			$this->data['catData'] = $this->Category_m->get();
			$this->data['stickyData'] = $this->Post_m->get_full(array('sticky' => 1), TRUE);
			$this->data['postData'] = $this->Web_Component_m->get_by(array('location' => 'ketua'), TRUE);
			$this->data['postData']->name = 'Component';
			$this->data['postData']->title = $this->data['postData']->nama;
			$this->data['postData']->updated = date('Y-m-d H:i:s');
			$this->data['postData']->image = 'principal1.jpg';
			$this->data['title'] = "Ketua Pondok | Ma'had Baitul Jannah Official Site";
			$this->data['subview'] = 'post';

			$this->load->view('front/main_layout', $this->data);
		}
	}
?>