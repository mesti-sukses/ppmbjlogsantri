<?php
	$this->load->view('front/page_head', $this->data);
	$this->load->view('front/'.$subview, $this->data);
	$this->load->view('front/page_tail', $this->data);
?>