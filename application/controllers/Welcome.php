<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {
	public function index()
	{
		$this->data['page_info'] = array(
			'title' => 'Install Loggy',
			'no-navigation' => true,
			'css' => array('admin.css'),
			'js' => array()
		);
		$this->data['subview'] = 'install';

		$rules = array(
			array(
					'field' => 'host_name',
					'rules' => 'trim|required'
					),
				array(
					'field' => 'db_user',
					'rules' => 'trim|required'
					),
				array(
					'field' => 'db_pass',
					'rules' => 'trim|required'
					),
				array(
					'field' => 'db_name',
					'rules' => 'trim|required'
					),
				array(
					'field' => 'base_url',
					'rules' => 'trim|required'
					)
			);

		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() == TRUE){
			$this->load->model('User_m');

			$configData = $this->User_m->array_from_post(array('host_name', 'db_user', 'db_pass', 'db_name', 'base_url'));

			$configData['route'] = 'page';

			$this->User_m->saveConfigFile($configData, 'db_config.php');

			redirect('welcome/user');

			// $this->load->library('migration');

			// if($this->migration->version(1)){
			// 	echo "Success";
			// } else {
			// 	show_error($this->migration->error_string());
			// }
		} else {
			$this->data['error'] = validation_errors();
		}

		$this->load->view('components/main_layout', $this->data);
	}

	public function user(){
		$this->data['page_info'] = array(
			'title' => 'Install Loggy',
			'no-navigation' => true,
			'css' => array('admin.css'),
			'js' => array()
		);
		$this->data['subview'] = 'user';

		$this->load->view('components/main_layout', $this->data);
	}
}
