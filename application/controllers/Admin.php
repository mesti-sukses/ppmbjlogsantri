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

			// Give permission
			parent::raiseError(64);

			// Load the model
			$this->load->model('Post_m');
			$this->load->model('Web_Component_m');
			$this->load->model('Web_Config_m');
			$this->load->model('Category_m');
			$this->load->model('Menu_m');
			$this->load->model('Media_m');
		}

		/*
			* Method ini merupakan controller yang mengatur menu dari website melalui admin
			* Done Refactoring
		*/
		public function menu($location, $id=NULL)
		{
			// Fetch the required data
			$this->data[$location] = $this->Menu_m->get_by(array('location' => $location));
			if($id)
				$this->data[$location.'NewData'] = $this->Menu_m->get_by(array('id' => $id), TRUE);

			// Process the data

			// Get some form feedback
			$menuData = $this->form('Menu_m', array('icon', 'text', 'type', 'location', 'link'));

			// Process form feedback
			if($menuData)
			{
				if($id) $menuData['id'] = $id;

				// Save data
				$this->Menu_m->save($menuData, $id);
				redirect('admin/menu/'.$location, 'refresh');

			} else echo validation_errors();

			// Load The Page
			$title = 'Menu Web | '.$this->session->userdata['name'];
			$this->loadPage($title, 'admin/web/menu/'.$location, 'table_with_modal');
		}

		/*
			* Method ini merupakan controller yang mengatur penghapusan menu
			* DOne Refactoring
		*/
		public function delMenu($location, $id)
		{
			$this->Menu_m->delete($id);
			redirect('admin/menu/'.$location);
		}

		/*
			* Method ini merupakan controller yang mengatur content dari web component melalui admin page
			* Web component termasuk footer, tentang guru pondok dll
			* Done refactoring
		*/
		public function content($location, $id=NULL)
		{
			// Fetch required data
			$this->data[$location] = $this->Web_Component_m->get_by(array('location' => $location), $location == 'ketua');
			$this->data['mediaData'] = $this->Media_m->get();
			if($id) 
				$this->data[$location.'NewData'] = $this->Web_Component_m->get_by(array('id' => $id), TRUE);

			// Process the data

			// Get the feedback form
			$componentData = $this->form('Web_Component_m', array('location', 'nama', 'content', 'extra', 'image'));
			if($componentData)
			{
				// Process the form data
				if($location == 'ketua') $id = $this->data[$location]->id;
				if($id) $componentData['id'] = $id;
				$this->Web_Component_m->save($componentData, $id);

				// redirect to previouse page
				redirect('admin/content/'.$location, 'refresh');

			} else echo validation_errors();

			// Load The Page
			$title = $location.' | '.$this->session->userdata['name'];
			$this->loadPage($title, 'admin/web/content/'.$location, 'admin_editor');
		}

		/*
			* Method ini merupakan controller yang mengatur list dan pengeditan serta penghapusan postingan dari blog
			* Done refactoring
		*/
		public function blog()
		{
			// fetch required data
			$this->data['postData'] = $this->Post_m->get_full();

			// Process the data

			// Get some form feedback

			// Process the feedback data

			// Load The Page
			$title = 'All Posts | '.$this->session->userdata['name'];
			$this->loadPage($title, 'admin/web/blog', 'data_table');
		}

		/*
			* Method ini merupakan controller yang mengatur pengeditan posting secara individual termasuk kategori postingan, isi postingan, gambar posting dan lain sebagainya
		*/
		public function post($id = NULL)
		{
			$this->load->model('Post_m');
			$this->load->model('Category_m');

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

				$image = $this->upload('userFile', './images/Post/', $postData['title']);

				if($image != FALSE){
					$postData['image'] = $image;

					//save to the database
			        $this->Post_m->save($postData, $id);
			        redirect('admin/blog');
			    }
				else
					$this->data['fileError'] = $this->upload->display_errors();
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

			// Load The Page
			$title = 'Konten Web | '.$this->session->userdata['name'];
			$this->loadPage($title, 'admin/web/post', 'admin_editor');
		}

		/*
			* Method ini merupakan controller yang mengatur pengeditan kategori, penghapusan kategori
			* Done refactoring
		*/
		public function category($id = NULL)
		{
			// Fetch the required data
			$this->data['catData'] = $this->Category_m->get();
			if($id)
				$this->data['editCatData'] = $this->Category_m->get_by(array('cat_id' => $id), TRUE);

			// Process the data

			// Get Form Feedback
			$catData = $this->form('Category_m', array('name'));

			// Process the Form Data
			if($catData)
			{
				if($id)
					$catData['cat_id'] = $id;

				// Save the input post
				$this->Category_m->save($catData, $id);
				redirect('admin/category', 'refresh');
			}

			// Load The Page
			$title = 'Kategori | '.$this->session->userdata['name'];
			$this->loadPage($title, 'admin/web/cat_list', 'data_table');
		}

		/*
			* Method ini merupakan controller yang mengatur config dari website
			* Done Refactoring
		*/
		public function config($id = NULL)
		{
			// Fetch required data
			$this->data['configData'] = $this->Web_Config_m->get();
			if($id)
				$this->data['editConfigData'] = $this->Web_Config_m->get_by(array('id' => $id), TRUE);

			// Process the data

			// Get some form feedback
			$configData = $this->form('Web_Config_m', array('value', 'key_config'));

			// Process the form data
			if($configData)
			{
				// Save the input post
				if($id)
					$configData['id'] = $id;

				$this->Web_Config_m->save($configData, $id);
				redirect('admin/config', 'refresh');
			}

			// Load The Page
			$title = 'Website Configuration | '.$this->session->userdata['name'];
			$this->loadPage($title, 'admin/web/site_config', 'data_table');
		}

		public function delPost($id)
		{
			$tile = $this->Post_m->get($id, TRUE)->image;
			$ath = FCPATH.'images/Post/'.$tile;

			unlink($ath);

			$this->Post_m->delete($id);
			redirect('admin/blog');
		}
	}
?>