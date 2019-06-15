<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Application extends CI_Controller
{

	public function index()
	{
		$this->load->view('front/index');
	}
}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */ 