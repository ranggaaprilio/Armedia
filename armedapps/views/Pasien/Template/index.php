<?php 
$this->load->view('pasien/template/header');
$this->load->view('pasien/template/topbar');
$this->load->view('pasien/'.$folder.'/'.$file);
$this->load->view('pasien/template/footer');
 ?>