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
		}

		public function index(){
			$this->load->model('Dataset_m');
			$this->load->model('Detail_Pasus_m');

			$dataset = $this->Dataset_m->get();
			$data_train = array();
			$data_target = array();
			foreach ($dataset as $value) {
				$data = array_map('intval', array_values(unserialize($value->nilai)));
				array_push($data_train, $data);
				array_push($data_target, $value->predikat);
			}

			// dump($data_train);
			$dataTest = $this->Detail_Pasus_m->get_saringan();
			$data_test = array();
			foreach ($dataTest as $value) {
				array_push($data_test, array_values(unserialize($value->detail)));
			}
			$mlp = new KNearestNeighbors($k=160);
			$mlp->train(
				$samples=$data_train,
				$labels=$data_target
			);
			$res = $mlp->predict($data_test);
			for ($i=0; $i < count($res) ; $i++) { 
				echo $dataTest[$i]->nama." : ".$res[$i]."<br>";
			}
		}
	}
?>