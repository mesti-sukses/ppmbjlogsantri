<?php
	/**
	* 
	*/
	class Blog extends Frontend_Controller
	{

		public function __construct(){
			parent::__construct();
			$this->load->model('Web_Component_m');
		}
		
		public function index(){
			$this->load->model('Category_m');
			$this->load->model('Post_m');
			$this->data['catData'] = $this->Category_m->get();
			$this->data['stickyData'] = $this->Post_m->get_full(array('sticky' => 1), TRUE);
			$this->data['postData'] = $this->Post_m->get_full(array('sticky' => 0));
			$this->data['title'] = "Blog | Ma'had Baitul Jannah Official Site";
			$this->data['subview'] = 'blog';

			$this->load->view('front/main_layout', $this->data);
		}

		public function post($id){
			$this->load->model('Category_m');
			$this->load->model('Post_m');
			$this->data['catData'] = $this->Category_m->get();
			$this->data['stickyData'] = $this->Post_m->get_full(array('sticky' => 1), TRUE);
			$this->data['postData'] = $this->Post_m->get_full(array('id' => $id), TRUE);
			$this->data['title'] = $this->data['postData']->title." | Ma'had Baitul Jannah Official Site";
			$this->data['subview'] = 'post';

			$this->load->view('front/main_layout', $this->data);
		}

		public function category($id){
			$this->load->model('Category_m');
			$this->load->model('Post_m');
			$this->data['catData'] = $this->Category_m->get();
			$this->data['stickyData'] = $this->Post_m->get_full(array('sticky' => 1), TRUE);
			$this->data['postData'] = $this->Post_m->get_full(array('categories' => $id));
			$catName = $this->Category_m->get_by(array('cat_id' => $id), TRUE)->name;
			$this->data['title'] = $catName." | Ma'had Baitul Jannah Official Site";
			$this->data['subview'] = 'blog';

			$this->load->view('front/main_layout', $this->data);
		}
	}
?>