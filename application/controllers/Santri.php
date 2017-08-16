<?php
	class Santri extends Admin_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('Santri_m');
			$this->load->model('Angkatan_m');
		}

		public function edit($id){
			$this->data['page_info'] = array(
					'title' => 'Santri Database',
					'css' => array('admin.css'),
					'js' => array('counter.js')
				);
			$this->data['subview'] = 'admin/santri';

			$this->data['santriData'] = $this->Santri_m->get_by(array('id' => $id), TRUE);
			$this->data['angkatanData'] = $this->Angkatan_m->get_by(array('angkatan' => $this->data['santriData']->angkatan), TRUE);

			$rules = $this->Santri_m->rules;
			$this->form_validation->set_rules($rules);

			//form validation
			if($this->form_validation->run() == TRUE){
				$dataSantri = $this->Santri_m->array_from_post(array('name', 'angkatan', 'kosong'));
				$progress = array();

				for ($i=2; $i <= 605; $i++) { 
					if($this->input->post($i) != NULL) $progress[$i] = $i;
				}

				$dataSantri['progress'] = serialize($progress);

				$this->Santri_m->save($dataSantri, $id);

				redirect('admin/dashboard');
			}

			$this->load->view('components/main_layout', $this->data);
		}
	}
?>