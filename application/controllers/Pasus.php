<?php

	/*
		* Class ini mengatur tentang administrasi pasus. Bagaimana cara pasus mengordinasi dan menilai anggotanya dsb

		@package controller
		@author Logic_boys
	*/
	class Pasus extends Admin_Controller
	{
		public function __construct()
		{
			parent::__construct();
			
			// Access Control
			if(((($this->session->userdata('level')) & 8) != 8) && (($this->session->userdata('level') & 16) != 16) &&(($this->session->userdata('level') & 128) != 128)){
				echo('Anda bukan pasus XD');
				exit();
			}

			// Load the model
			$this->load->model('User_m');
			$this->load->model('Pasus_m');
			$this->load->model('Detail_Pasus_m');
		}

		/*
			* Method ini merupakan method untuk memanggil list anggota pasus
			* Done refactoring
		*/
		public function index()
		{
			// Fetch the Data
			$id = $this->session->userdata('id');
			$this->data['dataPasus'] = $this->Pasus_m->get_complete_pasus_child($id);

			// Process the data
			foreach ($this->data['dataPasus'] as $santri) 
			{
				// Fetch more data
				$temp = $this->Detail_Pasus_m->get_detail_pasus($santri->id);

				// Process the data
				$santri->detail = unserialize($temp->detail);
				$santri->ket = $temp->ket;
				$santri->updated = $temp->updated;
			}

			// Load The Page
			$title = 'Anggota Pasus | '.$this->session->userdata['name'];
			$this->loadPage($title, 'admin/pasus/list', 'data_table');
		}

		/*
			* Method ini merupakan method untuk memberikan penilaian pada setiap anggota pasus
			* Done refactoring

			@param $id int: id yang akan diberikan penilaian
		*/
		public function edit($id)
		{
			//fetch data pasus anggota
			$this->data['dataSantri'] = $this->Pasus_m->get_complete_child_detail($id);
			$this->data['santri_id'] = $id;

			// Get form data
			$data = array(
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
					);
			$dataDetail = $this->form('Detail_Pasus_m', $data);

			// Process form data
			if($dataDetail)
			{
				//ambil data santri
				$dataSave = $this->Detail_Pasus_m->array_from_post(array('santri_id', 'ket'));

				//serialize penilaian untuk dimasukan dalam data santri
				$dataSave['detail'] = serialize($dataDetail);

				//save data
				$this->Detail_Pasus_m->save($dataSave);

				//pengurus juga bisa meniliai santri maka jika itu pengurus maka balik ke dsahboard pengurus
				if(($this->session->userdata('level') & 128) == 128) 
					redirect('pengurus/list');
				else
					redirect('pasus');
			}

			// Load page
			$title = 'Edit data pasus | '.$this->session->userdata['name'];
			$this->loadPage($title, 'admin/pasus/edit', 'slider');
		}

		/*
			* Method ini merupakan method untuk melihat report yang sudah dilaporkan oleh pasus
			* Done refactoring

			@param $id int: id yang akan diberikan penilaian
		*/
		public function report($id)
		{
			// Fetch the data
			$this->data['dataPasus'] = $this->Pasus_m->get_complete_pasus_child($id);

			// Process the data
			foreach ($this->data['dataPasus'] as $santri) 
			{

				// Fetch the data
				$temp = $this->Detail_Pasus_m->get_detail_pasus($santri->id);

				// Process the data
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

			//load page
			$title = 'Laporan Pasus | '.$this->session->userdata['name'];
			$this->loadPage($title, 'admin/pasus/report', 'accordion');
		}

		/*
			* Method ini merupakan method untuk mengubah pasus (migrasi pasus)

			@param $id int: id yang akan diubah
		*/
		public function change($id)
		{
			//fetch data
			$userData = $this->User_m->get_by(array('id' => $id), TRUE);

			//ambil data pasus baru dari post
			$id_wali = $this->input->post('pasus');
			$userData->pasus = $id_wali;

			//update data
			$this->User_m->save((array)$userData, $id);
			redirect('user/list');
		}

		/*
			* Method ini merupakan method untuk menghapus pasus (bukan menghapus... menjadikan dia menjadi non-pasus)

			@param $id int: id yang akan dihapus
		*/
		public function delete($id)
		{
			//fetch userdata
			$userData = $this->User_m->get_by(array('id' => $id), TRUE);

			//jadikan pasus menjadi null
			$userData->pasus = NULL;

			//update data
			$this->User_m->save((array)$userData, $id);
			redirect('pasus');
		}
	}
?>