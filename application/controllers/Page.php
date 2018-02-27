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
			$this->data['title'] = "Ma'had Baitul Jannah Official Site";
			$this->data['testimoniData'] = $this->Web_Component_m->get_by(array('location' => 'testimoni'));
			$this->data['dewanGuruData'] = $this->Web_Component_m->get_by(array('location' => 'dgcontent'));
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
	}
?>