<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			if ($this->session->userdata('status') != "login") {
				redirect(base_url() . 'auth?pesan=belumlogin');
			}
			// helper tanggal
			$this->load->helper('tanggal');
			// load model crud
			$this->load->model('Base_model');
			// load model untuk kode otomatis
			$this->load->model('Generate_code');
		}

	public function index()
	{
		$this->load->helper('tanggal');


		$date = str_replace('/', '-', date('m-d-Y'));
		$data['tanggal'] = tgl_dashboard($date);
		$data['daftar'] = $this->Base_model->get_data_where('pendaftaran', 'tanggal_daftar', $date)->num_rows();
		$data['show'] = $this->db->query('select * from pendaftaran where tanggal_daftar = "' . $date . '" Limit 3')->result();
		$data['title'] = "Landing on Dashboard";
		$this->load->view('pendaftaran/dashboard', $data);
	}

		/*------------------------------------------------------Start Dokter------------------------------*/
	/*------------------------------------------------------------------------------------------------*/

	//load Tampilan Kelola Dokter
	public function data_dokter()
	{
		$data = array(
			'title' => 'Kelola dokter-Armedia',
			'dokter' => $this->Base_model->get_data('dokter', 'id_dokter')->result(),
			'folder' => 'Dokter',
			'file' => 'Dokter'
		);
		$this->load->view('pendaftaran/template/index', $data);
	}

	private function rules_admin()
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required', [
			'required' => 'Kolom Nama Wajib Diisi'
		]);

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[admin.email]', [
			'required' => 'Kolom Email Wajib Diisi', 'valid_email' => 'Format Email yang anda masukan tidak valid', 'is_unique' => 'Email yang anda masukan telah terdaftar'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[6]|matches[password2]', [
			'required' => 'anda belum mengisi password',
			'min_length' => 'password terlalu pendek'

		]);
		$this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password1]', [
			'required' => 'anda belum mengisi password',
			'matches' => 'password tidak cocok'

		]);
		$this->form_validation->set_rules('telp', 'No Telepon', 'required|numeric', [
			'required' => 'anda belum mengisi No Telepon'
		]);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required', [
			'required' => 'anda belum memilih Cabang'
		]);
	}
	//load Tampilan Tambah + Action Tambah
	public function add_dokter()
	{

		//load rules validasi admin
		$this->rules_admin();
		//Load Model Kode Otomatis Admin
		$this->load->model('Generate_code');

		if ($this->form_validation->run() == false) {

			$data = array(
				'title' => 'Tambah Data Dokter-Armedia',
				'folder' => 'Dokter',
				'file' => 'tambah_dokter'
			);
			$this->load->view('pendaftaran/template/index', $data);
		} else {
			$id_admin = $this->Generate_code->Kode_dokter();
			$nama = $this->input->post('name', TRUE);
			$email = $this->input->post('email', TRUE);
			$password = $this->input->post('password1');
			$telp = $this->input->post('telp');
			$alamat = $this->input->post('alamat');

			$data = array(
				'id_dokter' => $id_admin,
				'nama' => $nama,
				'email' => $email,
				'password' => md5($password),
				'no_telp' => $telp,
				'alamat' => $alamat,
				'foto' => 'default.png'
			);

			$this->Base_model->insert_data($data, 'dokter');
			$this->session->set_flashdata('alert', 'Ditambah');
			redirect(base_url() . 'pendaftaran/Data_dokter');
		}
	}
	//load Tampilan Edit Dokter
	public function edit_dokter($id)
	{
		$where = array('id_dokter' => $id);
		$data = array(
			'title' => 'Armedia - Edit Data Admin',
			'edit' => $this->db->query("select * from dokter where id_dokter='$id'")->result(),
			'folder' => 'dokter',
			'file' => 'edit_dokter'
		);
		$this->load->view('pendaftaran/template/index', $data);
	}

	public function update_dokter()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('name', TRUE);
		$email = $this->input->post('email', TRUE);
		$telp = $this->input->post('telp');
		$alamat = $this->input->post('alamat');

		//Validation Rules Untuk update 
		$this->form_validation->set_rules('name', 'Name', 'trim|required', [
			'required' => 'Kolom Nama Wajib Diisi'
		]);

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
			'required' => 'Kolom Email Wajib Diisi', 'valid_email' => 'Format Email yang anda masukan tidak valid'
		]);

		$this->form_validation->set_rules('telp', 'No Telepon', 'required|numeric', [
			'required' => 'anda belum mengisi No Telepon',
			'numeric' => 'no telepon harus berupa angka'
		]);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required', [
			'required' => 'anda belum memilih alamat'
		]);

		if ($this->form_validation->run() != false) {
			$where = array('id_dokter' => $id);
			$data = array(
				'id_dokter' => $id,
				'nama' => $nama,
				'email' => $email,
				'no_telp' => $telp,
				'alamat' => $alamat
			);
			$this->Base_model->update_data($where, $data, 'dokter');
			$this->session->set_flashdata('alert', 'Diubah');
			redirect('pendaftaran/data_dokter');
		} else {
			$where = array('id_dokter' => $id);
			$data = array(
				'title' => 'Armedia - Edit Data Admin',
				'edit' => $this->db->query("select * from dokter where id_dokter='$id'")->result(),
				'folder' => 'dokter',
				'file' => 'edit_dokter'
			);
			$this->load->view('pendaftaran/template/index', $data);
		}
	}

	//Fungsi Delete Dokter
	public function delete_dokter($id)
	{
		$where = array('id_dokter' => $id);
		$this->Base_model->delete_data($where, 'dokter');
		$this->session->set_flashdata('alert', 'Dihapus');
		redirect('pendaftaran/data_dokter');
	}
	/*--------------------------------------------------------end dokter------------------------------*/
	// -----------------------------------------------------------------------------------------------------

	/*----------------------------------------------------start Jadwal Dokter------------------------*/
	//------------------------------------------------------------------------------------------------------

	//Tampil Jadwal Dokter
	public function jadwal_dokter()
	{
		$data = array(
			'title' => 'Jadwal Dokter- Armedia',
			'jadwal' => $this->Base_model->get_data('jadwal_dokter', 'id_dokter')->result(),
			'folder' => 'Jadwal',
			'file' => 'jadwal_dokter'
		);
		$this->load->view('pendaftaran/template/index', $data);
	}

	//Validation rules Untuk Jadwal
	private function rules_jadwal()
	{
		$this->form_validation->set_rules('id', 'Nama', 'trim|required', [
			'required' => 'Kolom Nama Wajib di isi'
		]);
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required', [
			'required' => 'Kolom Tanggal Wajib di isi'
		]);
		$this->form_validation->set_rules('jam_m', 'Jam Mulai', 'required', [
			'required' => 'Kolom Jam Mulai Wajib di isi'
		]);
		$this->form_validation->set_rules('jam_a', 'Jam Akhir', 'required', [
			'required' => 'Kolom Jam Akhir Wajib di isi'
		]);
	}
	//Fungsi Tambah Jadwal+Action Tambah
	public function add_jadwal()
	{
		$this->load->helper('tanggal');
		$this->load->helper('waktu');

		//load rules validasi jadwal
		$this->rules_jadwal();

		if ($this->form_validation->run() == false) {

			$data = array(
				'title' => 'Jadwal Dokter- Armedia',
				'dokter' => $this->Base_model->get_data('dokter', 'id_dokter')->result(),
				'folder' => 'Jadwal',
				'file' => 'tambah_jadwal'
			);
			$this->load->view('pendaftaran/template/index', $data);
		} else {
			$id_dokter = $this->input->post('id');
			$get = $this->Base_model->get_data_where('dokter', 'id_dokter', $id_dokter)->row();
			$nama = $get->nama;
			$tanggal = format(
					$this->input->post('tanggal')
				);
			$jam_m = f_jam($this->input->post('jam_m'));
			$jam_a = f_jam($this->input->post('jam_a'));

			$data = array(
				'id_dokter' => $id_dokter,
				'nama' => $nama,
				'tanggal' => $tanggal,
				'jam_mulai' => $jam_m,
				'jam_akhir' => $jam_a
			);

			$this->Base_model->insert_data($data, 'jadwal_dokter');
			$this->session->set_flashdata('alert', 'Ditambah');
			redirect(base_url() . 'pendaftaran/jadwal_dokter');
		}
	}
	//Load Tampilan Jadwal
	public function edit_jadwal($id)
	{
		
		$where = array('id_dokter' => $id);
		$data = array(
			'title' => 'Armedia - Edit jadwal',
			'edit' => $this->db->query("select * from jadwal_dokter where id_dokter='$id'")->result(),
			'folder' => 'jadwal',
			'file' => 'edit_jadwal'
		);
		$this->load->view('pendaftaran/template/index', $data);
	}
	//Action Update Jadwal
	public function update_jadwal()
	{
		$this->load->helper('tanggal');
		$this->load->helper('waktu');

		$id = $this->input->post('id');
		$nama = $this->input->post('name', TRUE);
		$tanggal = format(
				$this->input->post('tanggal')
			);
		$jam_m = f_jam($this->input->post('jam_m'));
		$jam_a = f_jam($this->input->post('jam_a'));



		//load Rules JAdwal
		$this->rules_jadwal();

		if ($this->form_validation->run() != false) {
			$where = array('id_dokter' => $id);
			$data = array(
				'id_dokter' => $id,
				'nama' => $nama,
				'tanggal' => $tanggal,
				'jam_mulai' => $jam_m,
				'jam_akhir' => $jam_a
			);
			$this->Base_model->update_data($where, $data, 'jadwal_dokter');
			$this->session->set_flashdata('alert', 'Diubah');
			redirect('pendaftaran/jadwal_dokter');
		} else {
			$where = array('id_dokter' => $id);
			$data = array(
				'title' => 'Armedia - Edit jadwal',
				'edit' => $this->db->query("select * from jadwal_dokter where id_dokter='$id'")->result(),
				'folder' => 'jadwal',
				'file' => 'edit_jadwal'
			);
			$this->load->view('pendaftaran/template/index', $data);
		}
	}
	//Fungsi Kosongkan Semua Jadwal (truncate)
	public function clear_jadwal()
	{
		$this->Base_model->clear_data('jadwal_dokter');
		$this->session->set_flashdata('alert', 'Dikosongkan');
		redirect(base_url() . 'pendaftaran/jadwal_dokter');
	}
	//Fungsi Hapus Jadwal
	public function delete_jadwal($id)
	{
		$where = array('id_dokter' => $id);
		$this->Base_model->delete_data($where, 'jadwal_dokter');
		$this->session->set_flashdata('alert', 'Dihapus');
		redirect('pendaftaran/jadwal_dokter');
	}
	/*--------------------------------------------end jadwal dokter--------------------------------- */
	//---------------------------------------------------------------------------------------------------
	/*--------------------------------------------Start pasien-------------------------------------- */
	//lOAD Tampilan Data Pasien
	public function Data_pasien()
	{
		$data = array(
			'title' => 'Data Pasien- Armedia',
			'pasien' => $this->Base_model->get_data('pasien', 'no_rekamedis')->result(),
			'folder' => 'Pasien',
			'file' => 'data_pasien'
		);
		$this->load->view('pendaftaran/template/index', $data);
	}
	//validation rules Pasien
	private function rules_pasien()
	{
		$this->form_validation->set_rules('ktp', 'No KTP', 'trim|required|numeric', [
			'required' => 'No KTP Wajib di isi', 'numeric' => 'No KTP Wajib Berupa Angka'
		]);
		$this->form_validation->set_rules('name', 'Nama', 'trim|required', [
			'required' => 'Kolom Nama Wajib di isi'
		]);
		$this->form_validation->set_rules('te_lahir', 'Tempat Lahir', 'trim|required', [
			'required' => 'Kolom Tempat Lahir Wajib di isi'
		]);
		$this->form_validation->set_rules('tanggal', 'Tanggal Lahir', 'trim|required', [
			'required' => 'Kolom Tanggal Lahir Wajib di isi'
		]);
		$this->form_validation->set_rules('telp', 'No Telepon', 'required|numeric', [
			'required' => 'anda belum mengisi No Telepon', 'numeric' => 'No Telepon Harus Berupa Angka'
		]);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required', [
			'required' => 'anda belum memilih alamat'
		]);
		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[pasien.email]|valid_email', [
			'required' => 'Kolom Username Wajib Diisi', 'is_unique' => 'Username telah digunakan ', 'valid_email' => 'Format Email yang anda masukan tidak valid'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[6]|matches[password2]', [
			'required' => 'anda belum mengisi password',
			'min_length' => 'password terlalu pendek',
			'matches' => 'password tidak cocok'

		]);
		$this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password1]', [
			'required' => 'anda belum mengisi password',
			'matches' => 'password tidak cocok'

		]);

		$this->form_validation->set_rules('pj', 'PJ', 'trim|required', [
			'required' => 'anda belum mengisi nama penanggung jawab',

		]);
	}
	//Load Tampilan tambah pasien+action 
	public function add_pasien()
	{
		$this->load->helper('tanggal');

		//load rules validasi Pasien
		$this->rules_pasien();

		if ($this->form_validation->run() == false) {
			$data = array(
				'title' => 'Data Pasien- Armedia',
				'dokter' => $this->Base_model->get_data('pasien', 'no_rekamedis')->result(),
				'folder' => 'pasien',
				'file' => 'tambah_pasien'
			);
			$this->load->view('pendaftaran/template/index', $data);
		} else {
			$no_rm = $this->Generate_code->Kode_Rek_Medis();
			$nama = $this->input->post('name');
			$ktp = $this->input->post('ktp');
			$te_l = $this->input->post('te_lahir');
			$ta_l = format($this->input->post('tanggal'));
			$telp = $this->input->post('telp');
			$alamat = $this->input->post('alamat');
			$email = $this->input->post('email');
			$password = $this->input->post('password1');
			$foto = 'default.png';
			$pj=$this->input->post('pj');


			$data = array(
				'no_rekamedis' => $no_rm,
				'no_ktp' => $ktp,
				'nama_pasien' => $nama,
				'tempat_lahir' => $te_l,
				'tanggal_lahir' => $ta_l,
				'no_telp' => $telp,
				'alamat' => $alamat,
				'email' => $email,
				'password' =>  md5($password),
				'foto' => $foto,
				'pj'=>$pj

			);

			$this->Base_model->insert_data($data, 'pasien');
			$this->session->set_flashdata('alert', 'Ditambah');
			redirect(base_url() . 'pendaftaran/Data_pasien');
		}
	}
	//Load Tampilan Edit
	public function edit_pasien($id)
	{
		$where = array('no_rekamedis' => $id);
		$data = array(
			'title' => 'Armedia - Edit Data Pasien',
			'edit' => $this->db->query("select * from pasien where no_rekamedis='$id'")->result(),
			'folder' => 'pasien',
			'file' => 'edit_pasien'
		);
		$this->load->view('pendaftaran/template/index', $data);
	}

	//update action button
	public function update_pasien()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('name');
		$ktp = $this->input->post('ktp');
		$te_l = $this->input->post('te_lahir');
		$ta_l = $this->input->post('tanggal');
		$telp = $this->input->post('telp');
		$alamat = $this->input->post('alamat');
		$pj=$this->input->post('pj');

		$this->form_validation->set_rules('ktp', 'No KTP', 'trim|required|numeric', [
			'required' => 'No KTP Wajib di isi', 'numeric' => 'No KTP Wajib Berupa Angka'
		]);
		$this->form_validation->set_rules('name', 'Nama', 'trim|required', [
			'required' => 'Kolom Nama Wajib di isi'
		]);
		$this->form_validation->set_rules('te_lahir', 'Tempat Lahir', 'trim|required', [
			'required' => 'Kolom Tempat Lahir Wajib di isi'
		]);
		$this->form_validation->set_rules('tanggal', 'Tanggal Lahir', 'trim|required', [
			'required' => 'Kolom Tanggal Lahir Wajib di isi'
		]);
		$this->form_validation->set_rules('telp', 'No Telepon', 'required|numeric', [
			'required' => 'anda belum mengisi No Telepon', 'numeric' => 'No Telepon Harus Berupa Angka'
		]);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required', [
			'required' => 'anda belum memilih alamat'
		]);

		$this->form_validation->set_rules('pj', 'PJ', 'required', [
			'required' => 'anda belum mengisi penanggung jawab'
		]);



		if ($this->form_validation->run() != false) {
			$where = array('no_rekamedis' => $id);
			$data = array(
				'no_rekamedis' => $id,
				'no_ktp' => $ktp,
				'nama_pasien' => $nama,
				'tempat_lahir' => $te_l,
				'tanggal_lahir' => $ta_l,
				'no_telp' => $telp,
				'alamat' => $alamat,
				'pj'=>$pj
			);
			$this->Base_model->update_data($where, $data, 'pasien');
			$this->session->set_flashdata('alert', 'Diubah');
			redirect('pendaftaran/data_pasien');
		} else {
			$where = array('id_dokter' => $id);
			$data = array(
				'title' => 'Armedia - Edit Data Admin',
				'edit' => $this->db->query("select * from pasien where no_rekamedis='$id'")->result(),
				'folder' => 'pasien',
				'file' => 'edit_pasien'
			);
			$this->load->view('pendaftaran/template/index', $data);
		}
	}
	//fungsi hapus pasien
	public function delete_pasien($id)
	{
		$where = array('no_rekamedis' => $id);
		$this->Base_model->delete_data($where, 'pasien');
		$this->session->set_flashdata('alert', 'Dihapus');
		redirect('pendaftaran/data_pasien');
	}

	/*--------------------------------------------end Pasien------------------------------------------*/

	/*----------------------------------------start Daftar--------------------------------------------*/

	public function Data_pendaftaran()
	{
		$data = array(
			'title' => 'Data pendaftaran- Armedia',
			'daftar' => $this->Base_model->get_data('pendaftaran', 'no_registrasi')->result(),
			'folder' => 'daftar',
			'file' => 'daftar'
		);
		$this->load->view('pendaftaran/template/index', $data);
	}

	private function rules_daftar()
	{
		$this->form_validation->set_rules('id', 'Nama Dokter', 'trim|required');
		$this->form_validation->set_rules('tanggal_d', 'tanggal', 'trim|required');
		$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
		
	}

	public function form_daftar($id)
	{
			$where = array('no_rekamedis' => $id);

			$data = array(
				'title' => ' Pendaftaran - Armedia',
				'dokter' => $this->Base_model->get_data('dokter', 'id_dokter')->result(),
				'edit' => $this->db->query("select * from pasien where no_rekamedis='$id'")->result(),
				'folder' =>  'daftar',
				'file' =>  'tambah_daftar'
			);
			$this->load->view('pendaftaran/template/index', $data);
	}

	public function add_daftar()

	{
		$this->load->helper('tanggal');
		$this->rules_daftar();
		$tanggal_input =format($this->input->post('tanggal_d'));
			$no_rm = $this->input->post('no_rm');
			$dokter = $this->input->post('id');
			$no_regist = $this->Generate_code->noRegistrasiotomatis($tanggal_input, $dokter);
			$no_rawat = $dokter . '-' . $tanggal_input . '-' . $no_regist;
			$kategori=$this->input->post('kategori');
	
		

		if ($this->form_validation->run() == false) {
			$where = array('no_rekamedis' => $no_rm);

			$data = array(
				'title' => ' Pendaftaran - Armedia',
				'dokter' => $this->Base_model->get_data('dokter', 'id_dokter')->result(),
				'edit' => $this->db->query("select * from pasien where no_rekamedis='$no_rm'")->result(),
				'folder' =>  'daftar',
				'file' =>  'tambah_daftar'
			);
			$this->load->view('pendaftaran/template/index', $data);
		} else {
			$tanggal_input =format($this->input->post('tanggal_d'));
			$no_rm = $this->input->post('no_rm');
			$dokter = $this->input->post('id');
			$kode = str_replace("-", "", $dokter);
			$no_regist = $this->Generate_code->noRegistrasiotomatis($tanggal_input, $dokter);
			$no_rawat = $kode . '-' . $tanggal_input . '-' . $no_regist;
			$kategori=$this->input->post('kategori');

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
			$this->session->set_flashdata('alert', 'Ditambah');
			redirect(base_url() .  'pendaftaran/Data_pendaftaran');
		}
	}

	public function delete_daftar($id)
	{
		$where = array('no_rawat' => $id);
		$this->Base_model->delete_data($where, 'pendaftaran');
		$this->session->set_flashdata('alert', 'Dihapus');
		redirect('pendaftaran/data_pendaftaran');
	}

	public function clear_daftar()
	{

		$this->Base_model->clear_data('Pendaftaran');
		$this->session->set_flashdata('alert', 'Dikosongkan');
		redirect('pendaftaran/data_pendaftaran');
	}

	/*-------------------------------------------------------end daftar-------------------------------*/
	//--------------------------------------------------------------------------------------------------

	//profile
	public function account($id)
	{
		$data = array(
			'title' => 'Armedia - Profile Pengguna',
			'dokter' => $this->db->query("select * from admin where id_admin='$id'")->result(),
			'folder' => 'profile',
			'file' => 'account',
		);
		
		$this->load->view('pendaftaran/template/index', $data);
	}

	public function update_profile()
	{
		$id=$this->input->post('id');
		$nama=$this->input->post('name');
		$email=$this->input->post('email');

		$this->form_validation->set_rules('name', 'Nama', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');



		if ($this->form_validation->run() == TRUE ) {
			$config['upload_path'] = './assets/img/user';
          	$config['allowed_types'] = 'jpg|png|jpeg';
          	$config['max_size'] = '2048';
          	$config['file_name'] = 'profile'.time();

          	$this->load->library('upload',$config);
          	$image = $this->upload->data();
			
			 if($this->upload->do_upload('foto')){
              //proses upload Gambar
              	$data['foto'] = $image['file_name'];
				$where = array('id_dokter' => $id);
				$data = array(
				'nama' => $nama,
				'email'=>$email,
				'foto' =>$image['file_name']
				 );
              $this->Base_model->update_data($where,$data,'dokter');
            } else{
            	$where = array('id_dokter' => $id);
				$data = array(
				'nama' => $nama,
				'email'=>$email,
			);
              $this->Base_model->update_data($where,$data,'dokter');
            }

			$this->Base_model->update_data($where,$data,'dokter');
			redirect('pendaftaran/account/'.$id,'refresh');
		} else {
			redirect('pendaftaran/account/'.$id,'refresh');
		}
	}

	public function g_pass()
	{
		$id=$this->input->post('id');
		$pass=$this->input->post('password1');
		$r_pass=$this->input->post('password2');



		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[6]|matches[password2]', [
			'required' => 'anda belum mengisi password',
			'min_length' => 'password terlalu pendek',
			'matches' => 'password tidak cocok'

		]);
		$this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password1]', [
			'required' => 'anda belum mengisi password',
			'matches' => 'password tidak cocok'

		]);
		if ($this->form_validation->run() == TRUE ) {

			$where = array('id_admin' => $id );
			$data = array('password' => md5($pass));
			$this->Base_model->update_data($where,$data,'admin');

			$this->session->set_flashdata('alert', 'Diubah');
			redirect('pendaftaran','refresh');

		} else {
			$this->session->set_flashdata('error',form_error('password1'));
			redirect('pendaftaran','refresh');
		}
	}

}

/* End of file Pendaftaran.php */
/* Location: .//D/Web/armedia/armedapps/controllers/Pendaftaran.php */
 ?>