<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tes_kode extends CI_Controller
{

    public function index()
    {
    	$this->load->helper('waktu');
        
       $kode=f_jam('11:08 PM');
        var_dump($kode);
    }
}

/* End of file Controllername.php */
