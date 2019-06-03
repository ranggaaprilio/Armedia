<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {

	public function index()
	{
		
	}

	public function dashboard()
	{
		$data = array(
			'title' => 'Halaman Pasien',
			'folder' => 'Landing',
			'file' => 'dashboard'
		);
		$this->load->view('pasien/template/index', $data);
	}

}

/* End of file Pasien.php */
/* Location: .//C/wamp64/www/armedia/armedapps/controllers/Pasien.php */ ?>