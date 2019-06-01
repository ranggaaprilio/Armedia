<?php
$this->load->view('dokter/template/head');
$this->load->view('dokter/template/topbar');
$this->load->view('dokter/template/sidebar');
$this->load->view('dokter/'.$folder.'/'.$file);
$this->load->view('dokter/template/js');
$this->load->view('dokter/template/foot');
