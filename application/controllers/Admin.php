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
	}
?>