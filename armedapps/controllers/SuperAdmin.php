<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuperAdmin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != "login") {
			redirect(base_url() . 'auth?pesan=belumlogin');
		}
		// load model crud
		$this->load->model('Base_model');
		// load model untuk kode otomatis
		$this->load->model('Generate_code');
	}
	// landing page
	public function index($offset = 0)
	{
		$this->load->helper('tanggal');


		$date = str_replace('/', '-', date('m-d-Y'));
		$data['tanggal'] = tgl_dashboard($date);
		$data['daftar'] = $this->Base_model->get_data_where('pendaftaran', 'tanggal_daftar', $date)->num_rows();
		$data['show'] = $this->db->query('select * from pendaftaran where tanggal_daftar = "' . $date . '" Limit 3')->result();
		$data['title'] = "Landing on Dashboard";
		$this->load->view('superadmin/dashboard', $data);
	}

	//start coding admin
	/*------------------------------------------------------------------------------------------------*/

	//Load Tampil Admin
	public function daftar_admin()
	{
		$data = array(
			'title' => 'Kelola Admin-Armedia',
			'admin' => $this->Base_model->get_data('admin', 'tgl_input')->result(),
			'folder' => 'admin',
			'file' => 'admin'
		);
		$this->load->view('superadmin/template/index', $data);
	}

	// Tambah Admin
	public function add_admin()
	{

		//load rules validasi admin
		$this->rules_admin();

		if ($this->form_validation->run() == false) {
			$data = array(
				'title' => 'Tambah Pengguna-Armedia',
				'folder' => 'admin',
				'file' => 'tambah_admin'
			);
			$this->load->view('superadmin/template/index', $data);
		} else {
			$id_admin = $this->Generate_code->Kode_admin();
			$nama = $this->input->post('name', TRUE);
			$email = $this->input->post('email', TRUE);
			$password = $this->input->post('password1');
			$telp = $this->input->post('telp');
			$alamat = $this->input->post('alamat');
			$tgl = date('Y-m-d');

			$data = array(
				'id_admin' => $id_admin,
				'nama_admin' => $nama,
				'email' => $email,
				'password' => md5($password),
				'no_telp' => $telp,
				'alamat' => $alamat,
				'tgl_input' => $tgl,
				'foto' => 'default.png'
			);

			$this->Base_model->insert_data($data, 'admin');
			$this->session->set_flashdata('alert', 'Ditambah');
			redirect(base_url() . 'superadmin/Daftar_admin');
		}
	}

	//form valiation tambah admin
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
	//load Tampilan Edit Admin
	public function edit_admin($id)
	{
		$where = array('id_admin' => $id);
		$data = array(
			'title' => 'Armedia - Edit Data Admin',
			'edit' => $this->db->query("select * from admin where id_admin='$id'")->result(),
			'folder' => 'admin',
			'file' => 'edit_admin'
		);
		$this->load->view('superadmin/template/index', $data);
	}

	//Action update Admin
	public function update_admin()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('name', TRUE);
		$email = $this->input->post('email', TRUE);
		$telp = $this->input->post('telp');
		$alamat = $this->input->post('alamat');

		$this->form_validation->set_rules('name', 'Name', 'trim|required', [
			'required' => 'Kolom Nama Wajib Diisi'
		]);

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
			'required' => 'Kolom Email Wajib Diisi', 'valid_email' => 'Format Email yang anda masukan tidak valid'
		]);

		$this->form_validation->set_rules('telp', 'No Telepon', 'required|numeric', [
			'required' => 'anda belum mengisi No Telepon'
		]);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required', [
			'required' => 'anda belum memilih alamat'
		]);

		if ($this->form_validation->run() != false) {
			$where = array('id_admin' => $id);
			$data = array(
				'id_admin' => $id,
				'nama_admin' => $nama,
				'email' => $email,
				'no_telp' => $telp,
				'alamat' => $alamat
			);
			$this->Base_model->update_data($where, $data, 'admin');
			$this->session->set_flashdata('alert', 'Diubah');
			redirect('SuperAdmin/daftar_admin');
		} else {
			$where = array('id_admin' => $id);
			$data = array(
				'title' => 'Armedia - Edit Data Admin',
				'edit' => $this->db->query("select * from admin where id_admin='$id'")->result(),
				'folder' => 'admin',
				'file' => 'edit_admin'
			);
			$this->load->view('superadmin/template/index', $data);
		}
	}
	//Hapus Admin
	public function delete_admin($id)
	{
		$where = array('id_admin' => $id);
		$this->Base_model->delete_data($where, 'admin');
		$this->session->set_flashdata('alert', 'Dihapus');
		redirect('SuperAdmin/daftar_admin');
	}
	/*--------------------------------------------------------end admin------------------------------*/
	/*------------------------------------------------------------------------------------------------*/

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
		$this->load->view('superadmin/template/index', $data);
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
			$this->load->view('superadmin/template/index', $data);
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
			redirect(base_url() . 'Superadmin/Data_dokter');
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
		$this->load->view('superadmin/template/index', $data);
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
			redirect('SuperAdmin/data_dokter');
		} else {
			$where = array('id_dokter' => $id);
			$data = array(
				'title' => 'Armedia - Edit Data Admin',
				'edit' => $this->db->query("select * from dokter where id_dokter='$id'")->result(),
				'folder' => 'dokter',
				'file' => 'edit_dokter'
			);
			$this->load->view('superadmin/template/index', $data);
		}
	}

	//Fungsi Delete Dokter
	public function delete_dokter($id)
	{
		$where = array('id_dokter' => $id);
		$this->Base_model->delete_data($where, 'dokter');
		$this->session->set_flashdata('alert', 'Dihapus');
		redirect('SuperAdmin/data_dokter');
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
		$this->load->view('superadmin/template/index', $data);
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
			$this->load->view('superadmin/template/index', $data);
		} else {
			$id_dokter = $this->input->post('id');
			$get = $this->Base_model->get_data_where('dokter', 'id_dokter', $id_dokter)->row();
			$nama = $get->nama;
			$tanggal = format(
				$this->input->post('tanggal')
			);
			$jam_m = f_jam($this->input->post('jam_m'));
			$jam_a = f_jam($this->input->post('jam_a')) ;
			$data = array(
				'id_dokter' => $id_dokter,
				'nama' => $nama,
				'tanggal' => $tanggal,
				'jam_mulai' => $jam_m,
				'jam_akhir' => $jam_a
			);

			$this->Base_model->insert_data($data, 'jadwal_dokter');
			$this->session->set_flashdata('alert', 'Ditambah');
			redirect(base_url() . 'Superadmin/jadwal_dokter');
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
		$this->load->view('superadmin/template/index', $data);
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
		$jam_a = f_jam($this->input->post('jam_a')) ;



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
			redirect('SuperAdmin/jadwal_dokter');
		} else {
			$where = array('id_dokter' => $id);
			$data = array(
				'title' => 'Armedia - Edit jadwal',
				'edit' => $this->db->query("select * from jadwal_dokter where id_dokter='$id'")->result(),
				'folder' => 'jadwal',
				'file' => 'edit_jadwal'
			);
			$this->load->view('superadmin/template/index', $data);
		}
	}
	//Fungsi Kosongkan Semua Jadwal (truncate)
	public function clear_jadwal()
	{
		$this->Base_model->clear_data('jadwal_dokter');
		$this->session->set_flashdata('alert', 'Dikosongkan');
		redirect(base_url() . 'Superadmin/jadwal_dokter');
	}
	//Fungsi Hapus Jadwal
	public function delete_jadwal($id)
	{
		$where = array('id_dokter' => $id);
		$this->Base_model->delete_data($where, 'jadwal_dokter');
		$this->session->set_flashdata('alert', 'Dihapus');
		redirect('SuperAdmin/jadwal_dokter');
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
		$this->load->view('superadmin/template/index', $data);
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
			$this->load->view('superadmin/template/index', $data);
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
				'foto' => $foto

			);

			$this->Base_model->insert_data($data, 'pasien');
			$this->session->set_flashdata('alert', 'Ditambah');
			redirect(base_url() . 'Superadmin/Data_pasien');
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
		$this->load->view('superadmin/template/index', $data);
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


		if ($this->form_validation->run() != false) {
			$where = array('no_rekamedis' => $id);
			$data = array(
				'no_rekamedis' => $id,
				'no_ktp' => $ktp,
				'nama_pasien' => $nama,
				'tempat_lahir' => $te_l,
				'tanggal_lahir' => $ta_l,
				'no_telp' => $telp,
				'alamat' => $alamat
			);
			$this->Base_model->update_data($where, $data, 'pasien');
			$this->session->set_flashdata('alert', 'Diubah');
			redirect('SuperAdmin/data_pasien');
		} else {
			$where = array('id_dokter' => $id);
			$data = array(
				'title' => 'Armedia - Edit Data Admin',
				'edit' => $this->db->query("select * from pasien where no_rekamedis='$id'")->result(),
				'folder' => 'pasien',
				'file' => 'edit_pasien'
			);
			$this->load->view('superadmin/template/index', $data);
		}
	}
	//fungsi hapus pasien
	public function delete_pasien($id)
	{
		$where = array('no_rekamedis' => $id);
		$this->Base_model->delete_data($where, 'pasien');
		$this->session->set_flashdata('alert', 'Dihapus');
		redirect('SuperAdmin/data_pasien');
	}

	/*--------------------------------------------end Pasien------------------------------------------*/
	//-------------------------------------------------------------------------------------------------
	/*----------------------------------------start Daftar--------------------------------------------*/

	public function Data_pendaftaran()
	{
		$data = array(
			'title' => 'Data pendaftaran- Armedia',
			'daftar' => $this->Base_model->get_data('pendaftaran', 'no_registrasi')->result(),
			'folder' => 'daftar',
			'file' => 'daftar'
		);
		$this->load->view('superadmin/template/index', $data);
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
			$this->load->view('superadmin/template/index', $data);
	}

	public function add_daftar()

	{
		$this->load->helper('tanggal');
		$this->rules_daftar();
		$tanggal_input =format($this->input->post('tanggal_d'));
			$no_rm = $this->input->post('no_rm');
			$dokter = $this->input->post('id');
			$kode = str_replace("-", "", $dokter);
			$no_regist = $this->Generate_code->noRegistrasiotomatis($tanggal_input, $dokter);
			$no_rawat = $kode . '-' . $tanggal_input . '-' . $no_regist;
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
			$this->load->view('superadmin/template/index', $data);
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
			redirect(base_url() .  'Superadmin/Data_pendaftaran');
		}
	}

	public function delete_daftar($id)
	{
		$where = array('no_rawat' => $id);
		$this->Base_model->delete_data($where, 'pendaftaran');
		$this->session->set_flashdata('alert', 'Dihapus');
		redirect('SuperAdmin/data_pendaftaran');
	}

	public function clear_daftar()
	{

		$this->Base_model->clear_data('Pendaftaran');
		$this->session->set_flashdata('alert', 'Dikosongkan');
		redirect('SuperAdmin/data_pendaftaran');
	}

	/*-------------------------------------------------------end daftar-------------------------------*/
	//--------------------------------------------------------------------------------------------------
	//Start Obat
	/*------------------------------------------------------------------------------------------------*/

	public function data_obat()
	{
		$data = array(
			'title' => 'Kelola Obat-Armedia',
			'obat' => $this->Base_model->get_data('obat', 'id_obat')->result(),
			'folder' => 'Obat',
			'file' => 'Obat'
		);
		$this->load->view('superadmin/template/index', $data);
	}
	//form valiation tambah obat
	private function rules_obat()
	{
		$this->form_validation->set_rules('name', 'Name', 'required', [
			'required' => 'Kolom Nama Obat Wajib Diisi'
		]);
		$this->form_validation->set_rules('jenis', 'Jenis', 'required', [
			'required' => 'Dosis Harus Diisi'
		]);

		$this->form_validation->set_rules('dosis_aturan_obat', 'Dosis', 'required', [
			'required' => 'Dosis Harus Diisi'
		]);

		$this->form_validation->set_rules('satuan', 'satuan', 'required', [
			'required' => 'Aturan Pakai Harus Diisi'
		]);
	}
	public function add_obat()
	{
		//load rules validasi admin
		$this->rules_obat();

		if ($this->form_validation->run() == false) {


			$data = array(
				'title' => 'Kelola Obat-Armedia',
				'folder' => 'Obat',
				'file' => 'tambah_obat'
			);
			$this->load->view('superadmin/template/index', $data);
		} else {

			$nama = $this->input->post('name');
			$jenis = $this->input->post('jenis');
			$satuan = $this->input->post('satuan');
			$dosis_aturan_obat = $this->input->post('dosis_aturan_obat');




			$id = "";

			switch ($jenis) {
				case "Kapsul":
					$id = "KP";
					break;
				case "Tablet":
					$id = "TB";
					break;
				case "Bedak":
					$id = "BD";
					break;
				case "Makanan PG":
					$id = "MP";
					break;
				case "Suntik KB":
					$id = "KB";
					break;
				case "Cairan Alkohol":
					$id = "CA";
					break;
				case "Suplemen":
					$id = "SM";
					break;
				default:
					$id = "OT";
					break;
			};


			$id_obat = $this->Generate_code->Kode_obat($id, $jenis);

			$data = array(
				'id_obat' => $id_obat,
				'nama_obat' => $nama,
				'jenis_obat' => $jenis,
				'dosis_aturan_obat' => $dosis_aturan_obat,
				'satuan' => $satuan
			);

			$this->Base_model->insert_data($data, 'obat');
			$this->session->set_flashdata('alert', 'Ditambah');
			redirect(base_url() . 'Superadmin/Data_obat');
		}
	}
	public function edit_obat($id)
	{
		$data = array(
			'title' => 'Armedia - Edit Data Obat',
			'edit' => $this->db->query("select * from obat where id_obat='$id'")->result(),
			'folder' => 'obat',
			'file' => 'edit_obat',
		);
		$this->load->view('superadmin/template/index', $data);
	}

	public function update_obat()
	{

		$this->rules_obat();
		$id_obat = $this->input->post('id_obat');
		$nama = $this->input->post('name');
		$jenis = $this->input->post('jenis');
		$satuan = $this->input->post('satuan');
		$dosis_aturan_obat = $this->input->post('dosis_aturan_obat');


		if ($this->form_validation->run() != false) {
			$where = array('id_obat' => $id_obat);
			$data = array(
				'id_obat' => $id_obat,
				'nama_obat' => $nama,
				'jenis_obat' => $jenis,
				'dosis_aturan_obat' => $dosis_aturan_obat,
				'satuan' => $satuan
			);

			$this->Base_model->update_data($where, $data, 'obat');
			$this->session->set_flashdata('alert', 'Diubah');
			redirect('SuperAdmin/data_obat');
		}
	}

	public function delete_obat($id)
	{
		$where = array('id_obat' => $id);
		$this->Base_model->delete_data($where, 'obat');
		$this->session->set_flashdata('alert', 'Dihapus');
		redirect('SuperAdmin/data_obat');
	}




	// end obat
	// -----------------------------------------------------------------------------------------------------
	//Start Tindakan
	// -------------------------------------------------------------------------------------------------------

	public function Data_tindakan()
	{
		$data = array(
			'title' => 'Data Tindakan',
			'daftar' => $this->Base_model->get_data('pendaftaran', 'no_rawat')->result(),
			'folder' => 'tindakan',
			'file' => 'list'
		);
		$this->load->view('superadmin/template/index', $data);
	}
	public function detail_rawat($id)
	{
		$data = array(
			'title' => 'Armedia - Detail Riwayat',
			'daftar' => $this->db->query("select * from pendaftaran where no_rawat='$id'")->result(),
			'obat' => $this->Base_model->get_data('obat', 'id_obat')->result(),
			'folder' => 'tindakan',
			'file' => 'h_detail',
		);
		$this->load->view('superadmin/template/index', $data);
	}

	//input riwayat ibu hamil action
	public	function input_rekam_hamil()
	{
		$this->form_validation->set_rules('hasil', 'Hasil', 'required', [
			'required' => 'Hasil Diagnosa Harus Diisi'
		]);
		$this->form_validation->set_rules('tindakan', 'Tindakan', 'required', [
			'required' => 'Kolom Tindakan Harus Diisi'
		]);
		$this->form_validation->set_rules('trimester', 'Trimester', 'required', [
			'required' => 'Kolom Trimester Harus Diisi'
		]);

		if ($this->form_validation->run() == TRUE) {
			$no_rm = $this->input->post('no_rm');
			$tindakan = $this->input->post('tindakan');
			$id_dokter = $this->input->post('id');
			$no_rawat = $this->input->post('no_rawat');
			$hasil = $this->input->post('hasil');
			$trimester=$this->input->post('trimester');
			$tanggal = $this->input->post('tanggal');

			$data = array(
				'no_rekamedis' => $no_rm,
				'nama_tindakan' => $tindakan,
				'id_dokter' => $id_dokter,
				'trimester'=>$trimester,
				'no_rawat' => $no_rawat,
				'hasil_periksa' => $hasil,
				'tanggal' => $tanggal
			);
			$this->Base_model->insert_data($data, 'tindakan_hamil');
			$this->session->set_flashdata('alert', 'Ditambah');
			redirect(base_url() . 'superadmin/detail_rawat/' . $no_rawat);
		} else {

			$data = array(
				'title' => 'Armedia - Detail Riwayat',
				'daftar' => $this->db->query("select * from pendaftaran where no_rawat='$no_rawat'")->result(),
				'folder' => 'tindakan',
				'file' => 'h_detail',
			);
			$this->load->view('superadmin/template/index', $data);
		}
	}
	public function masukan_obat($id_obat,$no_rekamedis,$kategori,$no_rawat)
	{
		$data=array(
			'id_obat'=>$id_obat,
			'no_rekamedis'=>$no_rekamedis,
			'kategori'=>$kategori,
			'no_rawat'=>$no_rawat
		);
		$this->Base_model->insert_data($data,'temp_obat');
		redirect('superadmin/detail_rawat/'.$no_rawat,'refresh');
	}

	public function m_obat($id_obat,$no_rekamedis,$kategori,$no_rawat)
	{
		$data=array(
			'id_obat'=>$id_obat,
			'no_rekamedis'=>$no_rekamedis,
			'kategori'=>$kategori,
			'no_rawat'=>$no_rawat
		);
		$this->Base_model->insert_data($data,'temp_obat');
		redirect('superadmin/detail_riwayat/'.$no_rawat,'refresh');
	}


	//selesai berobat
	public function selesai($no_rawat)
	{
		$where = array('no_rawat' => $no_rawat);
			$data = array(
				'status' => '2'
			);

			$this->Base_model->update_data($where, $data, 'pendaftaran');
			$this->session->set_flashdata('alert', 'Diselesaikan');
			redirect('superadmin/Data_tindakan');
	}

	public function detail_riwayat($id)
	{
		$data = array(
			'title' => 'Armedia - Detail Riwayat',
			'daftar' => $this->db->query("select * from pendaftaran where no_rawat='$id'")->result(),
			'obat' => $this->Base_model->get_data('obat', 'id_obat')->result(),
			'folder' => 'tindakan',
			'file' => 'b_detail',
		);
		$this->load->view('superadmin/template/index', $data);
	}

	//input riwayat balita action
	public	function input_rekam_balita()
	{
		$this->form_validation->set_rules('hasil', 'Hasil', 'required', [
			'required' => 'Hasil Diagnosa Harus Diisi'
		]);
		$this->form_validation->set_rules('tindakan', 'Tindakan', 'required', [
			'required' => 'Kolom Tindakan Harus Diisi'
		]);

		if ($this->form_validation->run() == TRUE) {
			$no_rm = $this->input->post('no_rm');
			$tindakan = $this->input->post('tindakan');
			$id_dokter = $this->input->post('id');
			$no_rawat = $this->input->post('no_rawat');
			$id_balita=$this->input->post('id_balita');
			$hasil = $this->input->post('hasil');
			$tanggal = $this->input->post('tanggal');

			$data = array(
				'no_rekamedis' => $no_rm,
				'id_balita'=>$id_balita,
				'nama_tindakan' => $tindakan,
				'id_dokter' => $id_dokter,
				'no_rawat' => $no_rawat,
				'hasil_periksa' => $hasil,
				'tanggal' => $tanggal
			);
			$this->Base_model->insert_data($data, 'tindakan_balita');
			$this->session->set_flashdata('alert', 'Ditambah');
			redirect(base_url() . 'superadmin/detail_riwayat/' . $no_rawat);
		} else {

			$data = array(
				'title' => 'Armedia - Detail Riwayat',
				'daftar' => $this->db->query("select * from pendaftaran where no_rawat='$no_rawat'")->result(),
				'folder' => 'tindakan',
				'file' => 'b_detail',
			);
			$this->load->view('superadmin/template/index', $data);
		}
	}

	//Halaman Profile

	public function account($id)
	{
		$data = array(
			'title' => 'Armedia - Detail Riwayat',
			'owner' => $this->db->query("select * from owner where id_owner='$id'")->result(),
			'folder' => 'profile',
			'file' => 'account',
		);
		
		$this->load->view('superadmin/template/index', $data);
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
				$where = array('id_owner' => $id);
				$data = array(
				'nama' => $nama,
				'email'=>$email,
				'foto' =>$image['file_name']
				 );
              $this->Base_model->update_data($where,$data,'owner');
            } else{
            	$where = array('id_owner' => $id);
				$data = array(
				'nama' => $nama,
				'email'=>$email,
			);
              $this->Base_model->update_data($where,$data,'owner');
            }

			$this->Base_model->update_data($where,$data,'owner');
			redirect('superadmin/account/'.$id,'refresh');
		} else {
			redirect('superadmin/account/'.$id,'refresh');
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

			$where = array('id_owner' => $id );
			$data = array('password' => md5($pass));
			$this->Base_model->update_data($where,$data,'owner');

			$this->session->set_flashdata('alert', 'Diubah');
			redirect('superadmin','refresh');

		} else {
			$this->session->set_flashdata('error',form_error('password1'));
			redirect('superadmin','refresh');
		}
	}

}


/* Author:Rangga Aprilio Utama */
/* End of file SuperAdmin.php */
/* Location: .//C/xampp/htdocs/armedia/armedapps/controllers/SuperAdmin.php */
