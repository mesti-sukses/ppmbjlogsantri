<?php

class Media extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();

		// Give permission
		parent::raiseError(64);

		// Load the model
		$this->load->model('Media_m');
	}

	public function index()
	{
		// Fetch the data
		$this->data['mediaData'] = $this->Media_m->get();

		// Process the data
		
		$title = "Media Library | ".$this->data['title']->value;
		$this->loadPage($title, 'admin/media/index', 'media');
	}

	public function add($id = NULL)
	{
		// Fetch the data
		if($id)
			$this->data['mediaData'] = $this->Media_m->get($id, TRUE);

		// Get form data
		$mediaData = $this->form('Media_m', array('alt'));
		if($mediaData){
			$imageName = $this->upload('file-name', './media_content/', FALSE);

			if($imageName != FALSE){
				$mediaData['file_name'] = $imageName;

				$this->Media_m->save($mediaData);
				redirect('index.php/media','refresh');
			} else {
				dump("Error");
			}
		}

		// Load the page
		$title = "Upload Media | ".$this->data['title']->value;
		$this->loadPage($title, 'admin/media/edit', 'admin_editor');
	}

	public function delete($id){
		$mediaData = $this->Media_m->get($id);
		$file_name = $mediaData->file_name;
		$ath = FCPATH.'media_content/'.$file_name;
		unlink($ath);
		$this->Media_m->delete($id);

		redirect('index.php/media','refresh');
	}

}

/* End of file Media.php */
/* Location: ./application/controllers/Media.php */