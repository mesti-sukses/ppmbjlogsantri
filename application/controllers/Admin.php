<?php

	/*
		* Class ini mengatur semua hal yang berhubungan dengan admin web termasuk penambahan konten, tambah kategori, menu dan lains sebagainya
		* Inherit dari Admin_Controller karena membutuhkan library admin

		@package controller
		@author Logic_boys
	*/
	class Admin extends Admin_Controller
	{

		public function __construct()
		{
			parent::__construct();
			
			if((intval($this->session->userdata('level')) & 64) != 64)
			{
				echo('Anda bukan admin website');
				exit();
			}
		}

		/*
			* Method ini merupakan controller yang mengatur menu dari website melalui admin
		*/
		public function menu()
		{
			$this->load->model('Menu_m');

			//loading page data info including title, required css, and required js
			$this->data['page_info'] = array(
					'css' => array('checkbox.css'),
					'title' => 'Menu Web | '.$this->session->userdata['name'],
					'js' => array('editButton.js'),
					'no-nav' => FALSE
				);

			//declare rule for this form
			$rules = $this->Menu_m->rules;
			$this->form_validation->set_rules($rules);

			//run the form action if the rule is satisfied
			if($this->form_validation->run() == TRUE)
			{

				//fetch data from post input
				$id = $this->input->post('id');
				$menuData = $this->Menu_m->array_from_post(array('icon', 'text', 'type', 'location', 'link'));
				if($id) $menuData['id'] = $id;

				//save data
				$this->Menu_m->save($menuData, $id);
				redirect('admin/menu', 'refresh');
			} else echo validation_errors();

			//need social menu to edit them
			$this->data['socialMenu'] = $this->Menu_m->get_by(array('location' => 'social'));

			//load the page
			$this->data['subview'] = 'admin/web/menu';
			$this->load->view('main_layout', $this->data);
		}

		/*
			* Method ini merupakan controller yang mengatur penghapusan menu
		*/
		public function delMenu($id)
		{
			$this->load->model('Menu_m');

			$this->Menu_m->delete($id);
			redirect('admin/menu');
		}

		/*
			* Method ini merupakan controller yang mengatur content dari web component melalui admin page
			* Web component termasuk footer, tentang guru pondok dll
		*/
		public function content()
		{
			$this->load->model('Web_Component_m');

			//load page info
			$this->data['page_info'] = array(
					'css' => array('summernote.css'),
					'title' => 'Konten Web | '.$this->session->userdata['name'],
					'js' => array('summernote.js', 'editr.js'),
					'no-nav' => FALSE
				);

			//fetch required data
			$this->data['dewanGuruData'] = $this->Web_Component_m->get_by(array('location' => 'dgcontent'));
			$this->data['testimoniData'] = $this->Web_Component_m->get_by(array('location' => 'testimoni'));
			$this->data['ketuaData'] = $this->Web_Component_m->get_by(array('location' => 'ketua'), TRUE);

			//declare form rule
			$rules = $this->Web_Component_m->rules;
			$this->form_validation->set_rules($rules);

			//run the form action if required rule is satisfied
			if($this->form_validation->run() == TRUE)
			{

				//get data from post
				$componentData = $this->Web_Component_m->array_from_post(array('location', 'nama', 'content', 'extra'));
				$componentData['image'] = 'male.png';

				//save the data
				$this->Web_Component_m->save($componentData);
				redirect('admin/content', 'refresh');
			}

			//load the page
			$this->data['subview'] = 'admin/web/content';
			$this->load->view('main_layout', $this->data);
		}

		/*
			* Method ini merupakan controller yang mengatur list dan pengeditan serta penghapusan postingan dari blog
		*/
		public function blog()
		{
			$this->load->model('Post_m');

			//load the page info
			$this->data['page_info'] = array(
					'css' => array('jquery.dataTables.min.css', 'responsive.dataTables.min.css'),
					'title' => 'All Posts | '.$this->session->userdata['name'],
					'js' => array('savereport.js', 'jquery.dataTables.min.js', 'dataTables.responsive.min.js'),
					'no-nav' => FALSE
				);

			//fetch required data
			$this->data['postData'] = $this->Post_m->get_full();

			//load the page
			$this->data['subview'] = 'admin/web/blog';
			$this->load->view('main_layout', $this->data);
		}

		/*
			* Method ini merupakan controller yang mengatur pengeditan posting secara individual termasuk kategori postingan, isi postingan, gambar posting dan lain sebagainya
		*/
		public function post($id = NULL)
		{
			$this->load->model('Post_m');
			$this->load->model('Category_m');

			//load the page info
			$this->data['page_info'] = array(
					'css' => array('summernote.css', 'checkbox.css'),
					'title' => 'Konten Web | '.$this->session->userdata['name'],
					'js' => array('summernote.js', 'editr.js', 'image.js'),
					'no-nav' => FALSE
				);

			//set form rule
			$rules = $this->Post_m->rules;
			$this->form_validation->set_rules($rules);

			//run form action after meet the requirement
			if($this->form_validation->run() == TRUE){

				//fetch data from form post
				$postData = $this->Post_m->array_from_post(array('title', 'content', 'sticky', 'categories'));
				if($postData['sticky'] == NULL) $postData['sticky'] = 0;

				//check if this is an edit or new post
				if($id != "") {
					$postData['id'] = $id;
					$id = $this->input->post('id');
				} else $id = NULL;

				//file upload
				$config['upload_path'] = './images/Post/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';

        //load the library
        $this->load->library('upload', $config);

        //check if the upload success or not
        if (!$this->upload->do_upload('userFile'))
        {

        	//if the image sent is null (it means that the image is nothing) then send error
        	if($this->input->post('image') == NULL)
        		$this->data['fileError'] = $this->upload->display_errors();
        	//but if it's an edit data and the image has a value just pass this check
        	else $postData['image'] = $this->input->post('image');
        }
        else
        {

        	//rename the image to the title of the post
        	$a = $this->upload->data();
        	rename($a['full_path'], $a['file_path'].$postData['title'].$a['file_ext']);
        	$this->data['uploadData'] = $this->upload->data();

        	//set the image name to the image attribute
        	$postData['image'] = $postData['title'].$a['file_ext'];
        }

        //save to the database
        $this->Post_m->save($postData, $id);
        redirect('admin/blog');
			} 

			//output error if required form is not satisfied
			else echo validation_errors();

			//fetch the required data
			$this->data['categoryData'] = $this->Category_m->get();
			//check if it is an edit or create new
			if($id) 
			{
				$this->data['dataPost'] = $this->Post_m->get_by(array('id' => $id), TRUE);
				$this->data['edit'] = true;
			} 
			else $this->data['edit'] = false;

			//load the page
			$this->data['subview'] = 'admin/web/post';
			$this->load->view('main_layout', $this->data);
		}

		/*
			* Method ini merupakan controller yang mengatur pengeditan kategori, penghapusan kategori
		*/
		public function category()
		{
			$this->load->model('Category_m');

			//load page info
			$this->data['page_info'] = array(
					'css' => array('jquery.dataTables.min.css', 'responsive.dataTables.min.css'),
					'title' => 'Kategori | '.$this->session->userdata['name'],
					'js' => array('catList.js', 'jquery.dataTables.min.js', 'dataTables.responsive.min.js'),
					'no-nav' => FALSE
				);

			//set the form rule
			$rules = $this->Category_m->rules;
			$this->form_validation->set_rules($rules);

			//run if satisfied
			if($this->form_validation->run() == TRUE)
			{

				//get the input post
				$id = $this->input->post('cat_id');
				$configData = $this->Category_m->array_from_post(array('name'));
				if($id != "") 
				{
					$configData['cat_id'] = $id;
				} 
				else $id = NULL;

				//save the input post
				$this->Category_m->save($configData, $id);
				redirect('admin/category', 'refresh');
			}

			//fetch the required data
			$this->data['catData'] = $this->Category_m->get();

			//load the page
			$this->data['subview'] = 'admin/web/cat_list';
			$this->load->view('main_layout', $this->data);
		}

		/*
			* Method ini merupakan controller yang mengatur config dari website
		*/
		public function config()
		{
			$this->load->model('Web_Config_m');

			//load the page info
			$this->data['page_info'] = array(
					'css' => array('jquery.dataTables.min.css', 'responsive.dataTables.min.css'),
					'title' => 'Website Configuration | '.$this->session->userdata['name'],
					'js' => array('catList.js', 'jquery.dataTables.min.js', 'dataTables.responsive.min.js'),
					'no-nav' => FALSE
				);

			//set the form rule
			$rules = $this->Web_Config_m->rules;
			$this->form_validation->set_rules($rules);

			//run if satisfied
			if($this->form_validation->run() == TRUE)
			{

				//get the input post
				$configData = $this->Web_Config_m->array_from_post(array('value', 'key_config', 'id'));

				//save the input post
				$this->Web_Config_m->save($configData, $configData['id']);
				redirect('admin/config', 'refresh');
			}

			//fetch required data
			$this->data['configData'] = $this->Web_Config_m->get();

			//load the page
			$this->data['subview'] = 'admin/web/site_config';
			$this->load->view('main_layout', $this->data);
		}
	}
?>