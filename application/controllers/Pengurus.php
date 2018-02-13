<?php
	class Pengurus extends Admin_Controller{
		/*
			Pasus class menghandle pasus
		*/

		public function __construct(){
			parent::__construct();
			
			if((intval($this->session->userdata('level')) & 128) != 128 && (intval($this->session->userdata('level')) & 32) != 32){
				echo('Anda bukan pengurus XD');
				exit();
			}
		}

		//This function load 
		public function list(){
			$this->load->model('Pasus_m');
			$this->load->model('Detail_Pasus_m');

			$this->data['page_info'] = array(
					'css' => array('jquery.dataTables.min.css', 'responsive.dataTables.min.css'),
					'title' => 'List Pasus | '.$this->session->userdata['name'],
					'js' => array('savereport.js', 'jquery.dataTables.min.js', 'dataTables.responsive.min.js'),
					'no-nav' => FALSE
				);

			$this->data['dataPasus'] = $this->Pasus_m->get_non_pasus();

			foreach ($this->data['dataPasus'] as $santri) {
				$temp = $this->Detail_Pasus_m->get_detail_pasus($santri->id);

				$santri->detail = unserialize($temp->detail);
				$santri->ket = $temp->ket;
				$santri->updated = $temp->updated;
			}

			$this->data['subview'] = 'admin/pasus/list';

			$this->load->view('main_layout', $this->data);
		}

		public function report(){

			$this->load->model('Pasus_m');
			$this->load->model('Detail_Pasus_m');

			$this->data['page_info'] = array(
					'css' => array(),
					'title' => 'Laporan Pasus | '.$this->session->userdata['name'],
					'js' => array('jquery-ui.min.js', 'accordion.js'),
					'no-nav' => FALSE
				);

			$this->data['dataPasus'] = $this->Pasus_m->get_non_pasus();

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

		public function download(){
			$this->load->model('Pasus_m');

			$data_pasus = $this->Pasus_m->get_data_raw();

			header("Content-Type: application/csv");
			header('Content-Disposition: attachment; filename="data_pasus.csv"');

			$f = fopen('php://output', 'w');

			$header = array('Nama', 'Pasus', 'Sholat', 'Pengajian', '1/3 Malam', 'Amal Sholih', 'Apel', 'Penampilan', 'Kuliah', 'Sosial Media', 'Olahraga', 'KBM', 'Musyawarah', 'Ketakdziman Pengurus', 'Guru', 'Teman', 'Orang Lain', 'Masjid', 'Keterangan', 'Minggu ke- ');

			fputcsv($f, $header);

			foreach ($data_pasus as $data) {
				$line = array();

				$line[0] = $data->nama;
				$line[1] = ($data->pasus != NULL) ? $data->pasus : "-";

				$detail = unserialize($data->detail);
				$i = 2;
				if($detail != NULL)
					foreach ($detail as $detail_value) {
						$line[$i++] = ($detail_value != 50) ? $detail_value : "Tidak tahu";
					}
				else
					for ( ; $i < 18; $i++) { 
						$line[$i] = "Belum Laporan";
					}

				$line[$i++] = $data->ket;
				$date = strtotime($data->updated);
				$curr = date("W", $date);
				$line[$i++] = $curr;

				fputcsv($f, $line);
			}


		}
	}
?>