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
		// $this->load->view('pasien/landing/welcome', $data);
}

	public function pendaftaran($id)
	{
		$data = array(
			'title' => 'Halaman Pendaftaran',
			'folder' => 'Pendaftaran',
			'pasien'=> $this->Base_model->get_data_where('pasien','no_rekamedis',$id)->result(),
			'dokter'=>$this->Base_model->get_data('dokter','id_dokter')->result(),
			'file' => 'daftar'
		);
		$this->load->view('pasien/template/index', $data);
	}

}

/* End of file Pasien.php */
/* Location: .//C/wamp64/www/armedia/armedapps/controllers/Pasien.php */ ?>