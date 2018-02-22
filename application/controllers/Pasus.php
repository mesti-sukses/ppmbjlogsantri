<?php
	class Pasus extends Admin_Controller{
		/*
			Pasus class menghandle pasus
		*/

		public function __construct(){
			parent::__construct();
			
			if(((($this->session->userdata('level')) & 8) != 8) && (($this->session->userdata('level') & 16) != 16) &&(($this->session->userdata('level') & 128) != 128)){
				echo('Anda bukan pasus XD');
				exit();
			}
		}

		//This function load 
		public function index(){
			$this->load->model('Pasus_m');
			$this->load->model('Detail_Pasus_m');

			$this->data['page_info'] = array(
					'css' => array('jquery.dataTables.min.css', 'responsive.dataTables.min.css'),
					'title' => 'Anggota Pasus | '.$this->session->userdata['name'],
					'js' => array('savereport.js', 'jquery.dataTables.min.js', 'dataTables.responsive.min.js'),
					'no-nav' => FALSE
				);

			$id = $this->session->userdata('id');

			$this->data['dataPasus'] = $this->Pasus_m->get_complete_pasus_child($id);

			foreach ($this->data['dataPasus'] as $santri) {
				$temp = $this->Detail_Pasus_m->get_detail_pasus($santri->id);

				$santri->detail = unserialize($temp->detail);
				$santri->ket = $temp->ket;
				$santri->updated = $temp->updated;
			}

			$this->data['subview'] = 'admin/pasus/list';

			$this->load->view('main_layout', $this->data);
		}

		public function add($id = NULL){
			if($id == NULL){
				$dataUser = $this->User_m->array_from_post(array('nama'));
				$dataUser['pass'] = $this->User_m->hash('santri');
			} else{
				$dataUser = (array)$this->User_m->get_by(array('id' => $id), TRUE);
			}

			$dataUser['pasus'] = $this->session->userdata('id');
			if($id != NULL) $id = $dataUser['id'];

			if($this->User_m->save($dataUser, $id)) echo "Success"; else echo "Fail";
			

			redirect('pasus/list', 'refresh');
		}

		public function edit($id){
			$this->data['page_info'] = array(
					'css' => array('slider.css'),
					'title' => 'Edit data pasus | '.$this->session->userdata['name'],
					'js' => array('slider.js'),
					'no-nav' => FALSE
				);

			$this->load->model('Pasus_m');

			$this->data['dataSantri'] = $this->Pasus_m->get_complete_child_detail($id);
			$this->data['santri_id'] = $id;

			$this->load->model('Detail_Pasus_m');

			$rules = $this->Detail_Pasus_m->rules;
			$this->form_validation->set_rules($rules);

			if($this->form_validation->run() == TRUE){
				$dataDetail = $this->Detail_Pasus_m->array_from_post(array(
						'sholat',
						'pengajian',
						'tengah_malam',
						'amal_sholih',
						'apel',
						'penampilan',
						'kuliah',
						'sosmed',
						'olahraga',
						'kbm',
						'musyawarah',
						'pengurus',
						'guru',
						'teman',
						'orang_lain',
						'masjid'
					));

				$dataSave = $this->Detail_Pasus_m->array_from_post(array('santri_id', 'ket'));
				$dataSave['detail'] = serialize($dataDetail);

				$this->Detail_Pasus_m->save($dataSave);

				if(($this->session->userdata('level') & 128) == 128) redirect('pengurus/list');
				else
					redirect('pasus');
			}

			$this->data['subview'] = 'admin/pasus/edit';

			$this->load->view('main_layout', $this->data);
		}

		public function report($id){

			$this->load->model('Pasus_m');
			$this->load->model('Detail_Pasus_m');

			$this->data['page_info'] = array(
					'css' => array(),
					'title' => 'Laporan Pasus | '.$this->session->userdata['name'],
					'js' => array('jquery-ui.min.js', 'accordion.js'),
					'no-nav' => FALSE
				);

			$this->data['dataPasus'] = $this->Pasus_m->get_complete_pasus_child($id);

			foreach ($this->data['dataPasus'] as $santri) {
				$temp = $this->Detail_Pasus_m->get_detail_pasus($santri->id);

				$santri->detail = unserialize($temp->detail);

				$santri->status = "info";

				if(is_array($santri->detail)){
					foreach ($santri->detail as $value) {
						if($value < 20){
							$santri->status = "danger";
							break;
						} else if ($value < 40){
							$santri->status = "warning";
						}
					}
				}

				$santri->ket = $temp->ket;
				$santri->updated = $temp->updated;
			}

			$this->data['subview'] = 'admin/pasus/report';

			$this->load->view('main_layout', $this->data);
		}

		public function change($id){
			$this->load->model('User_m');
			$userData = $this->User_m->get_by(array('id' => $id), TRUE);
			$id_wali = $this->input->post('pasus');
			$userData->pasus = $id_wali;
			$this->User_m->save((array)$userData, $id);
			redirect('user/list');
		}

		public function delete($id){
			$this->load->model('User_m');
			$userData = $this->User_m->get_by(array('id' => $id), TRUE);
			$userData->pasus = NULL;
			$this->User_m->save((array)$userData, $id);
			redirect('pasus');
		}
	}
?>