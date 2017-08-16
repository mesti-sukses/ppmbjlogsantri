<?php
  $this->load->view('components/header', $this->data);
  $this->load->view($subview, $this->data);
  $this->load->view('components/footer', $this->data); 
?>