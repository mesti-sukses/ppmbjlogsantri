<?php $this->load->view('component/header', $this->data) ?>

<?php
	if(!$page_info['no-nav']) $this->load->view('component/navigation');
?>

<?php $this->load->view($subview) ?>

<?php $this->load->view('component/footer', $this->data) ?>