<?php

	/*
		* Class ini mengatur tentang apa saja yang dilakukan oleh wali saringan

		@package controller
		@author Logic_boys
	*/
	use Phpml\Classification\KNearestNeighbors;
	use Phpml\Classification\MLPClassifier;
	class Saringan extends Admin_Controller
	{
		public function __construct()
		{
			parent::__construct();
			
			// Load the model
			$this->load->model('Dataset_m');
			$this->load->model('Detail_Pasus_m');
		}

		public function index(){
			// Fetch the data
			$this->data['dataFP'] = $this->Dataset_m->get();
			$this->data['dataSaringan'] = $this->Detail_Pasus_m->get_saringan();

			// Set rule for form
			$rules = array(
				array(
					'field' => 'check[]',
					'rules' => 'trim|required'
					)
			);
			$check = $this->form('', 'check', $rules);

			// Process the data
			if($check) {
				// dump($check);

				// Get the dataset for prediction
				$dataset = $this->Dataset_m->get();
				$data_train = array();
				$data_target = array();
				foreach ($dataset as $value) {
					$data = array_map('intval', array_values(unserialize($value->nilai)));
					array_push($data_train, $data);
					array_push($data_target, $value->predikat);
				}

				// Get the test data
				$dataTest = $this->Detail_Pasus_m->get_saringan();
				$data_test = array();

				// Test data selection
				foreach ($dataTest as $value) {
					if(in_array($value->santri_id, $check))
						array_push($data_test, array_values(unserialize($value->detail)));
				}

				// Training process
				$mlp = new KNearestNeighbors($k=160);
				$mlp->train(
					$samples=$data_train,
					$labels=$data_target
				);

				// Prediction process
				$res = $mlp->predict($data_test);

				// Alter the prediction to the data
				for ($i=0; $i < count($this->data['dataSaringan']); $i++) { 
					$key = array_search($this->data['dataSaringan'][$i]->santri_id, $check);
					if($key !== FALSE){
						$this->data['dataSaringan'][$i]->predikat = $res[$key];
					}
					else
						$this->data['dataSaringan'][$i]->predikat = NULL;
				}
			}

			// Load the view
			$title = 'Evaluasi dan Prediksi Saringan | '.$this->session->userdata('name');
			$this->loadPage($title, 'admin/saringan/index', 'data_table');
		}
	}
?>