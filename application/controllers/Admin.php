<?php
	class Admin extends Admin_Controller{
		/*
			Santri Class handle all about santri reguler that can update their quran
		*/

		public function __construct(){
			parent::__construct();
			
			if((intval($this->session->userdata('level')) & 64) != 64){
				echo('Anda bukan admin website');
				exit();
			}
		}

		public function menu(){
			$this->load->model('Menu_m');
			$this->data['page_info'] = array(
					'css' => array('checkbox.css'),
					'title' => 'Menu Web | '.$this->session->userdata['name'],
					'js' => array('editButton.js'),
					'no-nav' => FALSE
				);

			$rules = $this->Menu_m->rules;

			$this->form_validation->set_rules($rules);
			if($this->form_validation->run() == TRUE){
				$id = $this->input->post('id');
				$menuData = $this->Menu_m->array_from_post(array('icon', 'text', 'type', 'location', 'link'));
				if($id) $menuData['id'] = $id;
				$this->Menu_m->save($menuData, $id);
				redirect('admin/menu', 'refresh');
			}

			$this->data['socialMenu'] = $this->Menu_m->get_by(array('location' => 'social'));

			$this->data['subview'] = 'admin/web/menu';

			$this->load->view('main_layout', $this->data);
		}

		public function delMenu($id){
			$this->load->model('Menu_m');
			$this->Menu_m->delete($id);
			redirect('admin/menu');
		}

		public function content(){
			$this->load->model('Web_Component_m');
			$this->data['page_info'] = array(
					'css' => array('summernote.css'),
					'title' => 'Konten Web | '.$this->session->userdata['name'],
					'js' => array('summernote.js', 'editr.js'),
					'no-nav' => FALSE
				);

			$this->data['dewanGuruData'] = $this->Web_Component_m->get_by(array('location' => 'dgcontent'));
			$this->data['testimoniData'] = $this->Web_Component_m->get_by(array('location' => 'testimoni'));
			$this->data['ketuaData'] = $this->Web_Component_m->get_by(array('location' => 'ketua'), TRUE);

			$rules = $this->Web_Component_m->rules;

			$this->form_validation->set_rules($rules);
			if($this->form_validation->run() == TRUE){
				$componentData = $this->Web_Component_m->array_from_post(array('location', 'nama', 'content', 'extra'));
				$componentData['image'] = 'male.png';
				$this->Web_Component_m->save($componentData);
				redirect('admin/content', 'refresh');
			}

			$this->data['subview'] = 'admin/web/content';

			$this->load->view('main_layout', $this->data);
		}

		public function blog(){
			$this->load->model('Post_m');
			$this->data['page_info'] = array(
					'css' => array('jquery.dataTables.min.css', 'responsive.dataTables.min.css'),
					'title' => 'All Posts | '.$this->session->userdata['name'],
					'js' => array('savereport.js', 'jquery.dataTables.min.js', 'dataTables.responsive.min.js'),
					'no-nav' => FALSE
				);

			$this->data['postData'] = $this->Post_m->get_full();

			$this->data['subview'] = 'admin/web/blog';

			$this->load->view('main_layout', $this->data);
		}

		public function post($id = NULL){
			$this->load->model('Post_m');
			$this->load->model('Category_m');
			$this->data['page_info'] = array(
					'css' => array('summernote.css', 'checkbox.css'),
					'title' => 'Konten Web | '.$this->session->userdata['name'],
					'js' => array('summernote.js', 'editr.js', 'image.js'),
					'no-nav' => FALSE
				);

			$rules = $this->Post_m->rules;

			$this->form_validation->set_rules($rules);
			if($this->form_validation->run() == TRUE){
				$postData = $this->Post_m->array_from_post(array('title', 'content', 'sticky', 'categories'));
				if($postData['sticky'] == NULL) $postData['sticky'] = 0;
				if($id != "") {
					$postData['id'] = $id;
					$id = $this->input->post('id');
				} else $id = NULL;

				//file upload
				$config['upload_path'] = './images/Post/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userFile'))
        {
        	if($this->input->post('image') == NULL)
        		$this->data['fileError'] = $this->upload->display_errors();
        	else $postData['image'] = $this->input->post('image');
        }
        else
        {
        	$a = $this->upload->data();
        	rename($a['full_path'], $a['file_path'].$postData['title'].$a['file_ext']);
        	$this->data['uploadData'] = $this->upload->data();

        	$postData['image'] = $postData['title'].$a['file_ext'];
        }
        $this->Post_m->save($postData, $id);
        redirect('admin/blog');
			} else echo validation_errors();

			$this->data['categoryData'] = $this->Category_m->get();
			if($id) {
				$this->data['dataPost'] = $this->Post_m->get_by(array('id' => $id), TRUE);
				$this->data['edit'] = true;
			} else $this->data['edit'] = false;

			$this->data['subview'] = 'admin/web/post';

			$this->load->view('main_layout', $this->data);
		}

		public function category(){
			$this->load->model('Category_m');
			$this->data['page_info'] = array(
					'css' => array('jquery.dataTables.min.css', 'responsive.dataTables.min.css'),
					'title' => 'Kategori | '.$this->session->userdata['name'],
					'js' => array('catList.js', 'jquery.dataTables.min.js', 'dataTables.responsive.min.js'),
					'no-nav' => FALSE
				);

			$rules = $this->Category_m->rules;

			$this->form_validation->set_rules($rules);
			if($this->form_validation->run() == TRUE){
				$id = $this->input->post('cat_id');
				$catData = $this->Category_m->array_from_post(array('name'));
				if($id != "") {
					$catData['cat_id'] = $id;
				} else $id = NULL;
				$this->Category_m->save($catData, $id);
				redirect('admin/category', 'refresh');
			}

			$this->data['catData'] = $this->Category_m->get();

			$this->data['subview'] = 'admin/web/cat_list';

			$this->load->view('main_layout', $this->data);
		}


	}
?>