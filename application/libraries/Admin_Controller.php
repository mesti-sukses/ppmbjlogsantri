<?php
	class Admin_Controller extends MY_Controller{
		
		/*
			* Class ini membawahi admin page yang mengatur semua hal yang diperlukan dalam admin page
			* Jadi setiap admin page harus inherit kepada class ini karena semua hal yang dibutuhkan admin page ada pada class ini
			* Contoh : untuk masuk ke admin page perlu password, ada menu khusus untuk admin dll

			@package admin
			@author Logic_Boys
		*/
		
		function __construct()
		{
			parent::__construct();

			//Helper dan library yang harus di load agar tidak bolak-balik me load library yang sama di setiap class
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->library('session');

			//Untuk mengambil list hadist yang sudah dikaji dari database hadist. Ini diperlukan untuk admin menu
			//ada dua data hadist yang diperlukan, yaitu data hadist untuk wali hadist yang merupakan data keseluruhan hadist dalam pondok
			//serta data hadist yang sudah dikaji oleh santri yang sedang login
			$this -> load -> model('Hadist_m');
			$this->data['data_hadist_menu_all'] = $this->Hadist_m->get();
			$this->data['data_hadist_menu'] = $this->Hadist_m->get_hadist_list($this->session->userdata('id'));

			//Untuk mengambil nama wali dan pasus yang diperlukan untuk side menu admin
			$this->load->model('User_m');
			$this->data['dataWali'] = $this->User_m->get_by('(level & 1) = 1');
			$this->data['dataPasusAll'] = $this->User_m->get_by('(level & 8) = 8');

			//Untuk mengambil tahun angkatan dari reguler untuk dijadikan jurnal
			$this->load->model('Target_Quran_m');
			$this->data['targetAngkatan'] = $this->Target_Quran_m->get();
			
			//baris dibawah untuk redirect ke halaman login setelah user mengakses halaman manapun yang dibawah class ini
			//selain URL untuk login, logout, dan register maka akan diredirect menuju login
			//contoh : ketika akan membuka list santri maka dicek apakah user sudah login atau belum
			$exception = array('user/login', 'user/logout', 'user/register', 'user/genconfig');
			if(in_array(uri_string(), $exception) == FALSE){
				if($this->User_m->loggedin() == FALSE){
					redirect('user/login');
				}
			}
		}

		public function raiseError($level)
		{
			if((intval($this->session->userdata('level')) & $level) != $level)
			{
				echo('Access Denied');
				exit();
			}
		}

		public function upload($name, $path, $rename = FALSE){
			//file upload
			$config['upload_path'] = $path;
	        $config['allowed_types'] = 'gif|jpg|png|jpeg';

    		//load the library
    		$this->load->library('upload', $config);

	        //check if the upload success or not
	        if (!$this->upload->do_upload($name))
	        {

	        	//if the image sent is null (it means that the image is nothing) then send error
	        	if($this->input->post('image') == NULL){
	        		dump($this->upload->display_errors());
	        		return FALSE;
	        	}
	        	//but if it's an edit data and the image has a value just pass this check
	        	else 
	        		return $this->input->post('image');
	        }
	        else
	        {

	        	//rename the image to the title of the post
	        	$a = $this->upload->data();
	        	if($rename != FALSE){
	        		rename($a['full_path'], $a['file_path'].$rename.$a['file_ext']);
	        		return $rename.$a['file_ext'];
	        	}

	        	return $a['file_name'];
	        }
		}
	}
?>