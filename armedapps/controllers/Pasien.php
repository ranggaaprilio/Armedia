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
			'dokter'=>$this->Base_model->get_data('dokter','id_dokter')->result(),
			'daftar'=>0,
			'file' => 'dashboard'
		);
		$this->load->view('pasien/template/index', $data);
	}
	
	public function show()
	{
		$id=$this->input->post('id');
		$where = array('tanggal_daftar' => date('Y-m-d') , 'id_dokter' =>$id );
		$data = array(
			'title' => 'Halaman Pasien' ,
			'folder' => 'Landing',
			'dokter'=>$this->Base_model->get_data('dokter','id_dokter')->result(),
			'daftar'=> $this->Base_model->edit_data($where,'pendaftaran')->result(),
			'file'=>'dashboard'
		 );
		$this->load->view('pasien/template/index', $data);
		
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

		private function rules_daftar()
	{
		$this->form_validation->set_rules('id', 'Nama Dokter', 'trim|required',[
			'required'=>'Harap pilih dokter terlebih dahulu'
		]);
		$this->form_validation->set_rules('tanggal_d', 'tanggal', 'trim|required',[
			'required'=>'Harap pilih Tanggal pemeriksaan'
		]);
		$this->form_validation->set_rules('kategori', 'kategori', 'trim|required',[
			'required'=>'Harap pilih kategori'
		]);
		
	}


	public function add_daftar()

	{
		$this->load->model('Generate_code');
		$this->rules_daftar();
		$tanggal_input =$this->input->post('tanggal_d');
			$no_rm = $this->session->userdata('id');
			$dokter = $this->input->post('id');
			$no_regist = $this->Generate_code->noRegistrasiotomatis($tanggal_input, $dokter);
			$no_rawat = $dokter . '-' . $tanggal_input . '-' . $no_regist;
			$kategori=$this->input->post('kategori');

	
		

		if ($this->form_validation->run() == false) {
			$where = array('no_rekamedis' => $no_rm);

			$data = array(
				'title' => 'Halaman Pendaftaran',
				'folder' => 'Pendaftaran',
				'pasien'=> $this->Base_model->get_data_where('pasien','no_rekamedis',$no_rm)->result(),
				'dokter'=>$this->Base_model->get_data('dokter','id_dokter')->result(),
				'file' => 'daftar'
			);
			$this->load->view('pasien/template/index', $data);
		} else {
			$data = array(
				'no_registrasi' => $no_regist,
				'no_rawat' => $no_rawat,
				'no_rekamedis' => $no_rm,
				'tanggal_daftar' => $tanggal_input,
				'kategori'=>$kategori,
				'id_dokter' => $dokter,
				'status'=>'1'

			);

			$this->Base_model->insert_data($data, 'pendaftaran');
			$this->session->set_flashdata('alert', 'Terdaftar');
			redirect(base_url() .  'pasien/dashboard');
		}
	}

	public function history()
	{
		$data = array(
			'title' => 'History pemeriksaaan',
			'folder' => 'sejarah',
			'daftar'=> $this->Base_model->get_data_where('pendaftaran', 'no_rekamedis',$this->session->userdata('id'))->result(),
			'file' => 'history'
		);
		$this->load->view('pasien/template/index', $data);
	}

	public function r_obat()
	{
			$data = array(
			'title' => 'Riwayat Obat',
			'folder' => 'sejarah',
			'riwayat'=> $this->Base_model->get_data_where('tindakan_hamil', 'no_rekamedis',$this->session->userdata('id'))->result(),
			'file' => 'obat'
		);
		$this->load->view('pasien/template/index', $data);
	}

	public function lihat_obat($id)
	{
		$data = array(
			'title' => 'Riwayat Obat',
			'folder' => 'sejarah',
			'id'=>$id,
			'riwayat'=> $this->Base_model->get_data_where('temp_obat', 'no_rawat',$id)->result(),
			'file' => 'obat_pasien'
		);
		$this->load->view('pasien/template/index', $data);
	}

	public function cek_jadwal()
	{
		$data = array(
			'title' => 'Cek Jadwal Dokter',
			'folder' => 'jadwal',
			'jadwal'=> $this->Base_model->get_data('jadwal_dokter', 'id_dokter')->result(),
			'file' => 'jadwal_dokter'
		);
		$this->load->view('pasien/template/index', $data);
	}

	public function data_anak()
	{
		$data = array(
			'title' => 'Data Anak',
			'folder' => 'anak',
			'balita'=> $this->Base_model->get_data_where('balita', 'no_rekamedis',$this->session->userdata('id'))->result(),
			'file' => 'data_anak'
		);
		$this->load->view('pasien/template/index', $data);
	}

	public function add_balita()
	{
		$data = array(
			'title' => 'Tambah Data Anak',
			'folder' => 'anak',
			'file' => 'tambah_anak'
		);
		$this->load->view('pasien/template/index', $data);
	}

	public function tambah()
	{
		$this->load->model('Generate_code');

		$this->form_validation->set_rules('depan', 'Nama Depan', 'trim|required',[
		'required'=>'Nama Depan Wajib Di isi'
		]);
		$this->form_validation->set_rules('belakang', 'Nama Belakang', 'trim|required',[
		'required'=>'Nama Belakang Wajib Di isi'
		]);
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required',[
		'required'=>'Tanggal Lahir Wajib di isi Wajib Di isi'
		]);
		$this->form_validation->set_rules('jekel', 'Jenis Kelamin', 'trim|required',[
		'required'=>'Kolom Jenis kelamin Wajib diisi'
		]);

		if ($this->form_validation->run() == TRUE ) {
			$depan=$this->input->post('depan');
			$belakang=$this->input->post('belakang');
			$tanggal=$this->input->post('tanggal');
			$jekel=$this->input->post('jekel');

			$nama=$depan.' '.$belakang;
			$no_rm=$this->session->userdata('id');

			$data = array(
				'id_balita' => $this->Generate_code->Kode_balita($no_rm) , 
				'no_rekamedis'=>$no_rm,
				'nama' => $nama,
				'tanggal_lahir'=>$tanggal,
				'jekel'=>$jekel
			);

			$this->Base_model->insert_data($data,'balita');
			redirect(base_url().'pasien/data_anak','refresh');
		} else {
			$data = array(
			'title' => 'Tambah Data Anak',
			'folder' => 'anak',
			'file' => 'tambah_anak'
		);
		$this->load->view('pasien/template/index', $data);
		}
	}

}

/* End of file Pasien.php */
/* Location: .//C/wamp64/www/armedia/armedapps/controllers/Pasien.php */ ?>