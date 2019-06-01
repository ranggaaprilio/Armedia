<?php
$this->load->view('superadmin/template/head');
$this->load->view('superadmin/template/topbar');
$this->load->view('superadmin/template/sidebar');
$this->load->view('superadmin/'.$folder.'/'.$file);
$this->load->view('superadmin/template/js');
$this->load->view('superadmin/template/foot');
