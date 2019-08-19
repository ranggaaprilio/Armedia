<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
{

	public function index()
	{ }

	public function dashboard()
	{
		$data = array(
			'title' => 'Halaman Pasien',
			'folder' => 'Landing',
			'dokter' => $this->Base_model->get_data('dokter', 'id_dokter')->result(),
			'daftar' => 0,
			'file' => 'dashboard'
		);
		$this->load->view('pasien/template/index', $data);
	}

	public function show()
	{
		$id = $this->input->post('id');
		$where = array('tanggal_daftar' => date('Y-m-d'), 'id_dokter' => $id);
		$data = array(
			'title' => 'Halaman Pasien',
			'folder' => 'Landing',
			'dokter' => $this->Base_model->get_data('dokter', 'id_dokter')->result(),
			'daftar' => $this->Base_model->edit_data($where, 'pendaftaran')->result(),
			'file' => 'dashboard'
		);
		$this->load->view('pasien/template/index', $data);
	}

	public function pendaftaran($id)
	{
		$data = array(
			'title' => 'Halaman Pendaftaran',
			'folder' => 'Pendaftaran',
			'pasien' => $this->Base_model->get_data_where('pasien', 'no_rekamedis', $id)->result(),
			'dokter' => $this->Base_model->get_data('dokter', 'id_dokter')->result(),
			'file' => 'daftar'
		);
		$this->load->view('pasien/template/index', $data);
	}

	private function rules_daftar()
	{
		$this->form_validation->set_rules('id', 'Nama Dokter', 'trim|required', [
			'required' => 'Harap pilih dokter terlebih dahulu'
		]);
		$this->form_validation->set_rules('tanggal_d', 'tanggal', 'trim|required', [
			'required' => 'Harap pilih Tanggal pemeriksaan'
		]);
		$this->form_validation->set_rules('kategori', 'kategori', 'trim|required', [
			'required' => 'Harap pilih kategori'
		]);
	}


	public function add_daftar()

	{
		$this->load->model('Generate_code');
		$this->load->helper('tanggal');
		$this->rules_daftar();
		$tanggal_input = $this->input->post('tanggal_d');
		$kode=kode1($this->input->post('tanggal_d'));
		$no_rm = $this->session->userdata('id');
		$dokter = $this->input->post('id');
		$no_regist = $this->Generate_code->noRegistrasiotomatis($tanggal_input, $dokter);
		$no_rawat = $dokter. $kode. $no_regist;
		$kategori = $this->input->post('kategori');




		if ($this->form_validation->run() == false) {
			$where = array('no_rekamedis' => $no_rm);

			$data = array(
				'title' => 'Halaman Pendaftaran',
				'folder' => 'Pendaftaran',
				'pasien' => $this->Base_model->get_data_where('pasien', 'no_rekamedis', $no_rm)->result(),
				'dokter' => $this->Base_model->get_data('dokter', 'id_dokter')->result(),
				'file' => 'daftar'
			);
			$this->load->view('pasien/template/index', $data);
		} else {
			$data = array(
				'no_registrasi' => $no_regist,
				'no_rawat' => $no_rawat,
				'no_rekamedis' => $no_rm,
				'tanggal_daftar' => $tanggal_input,
				'kategori' => $kategori,
				'id_dokter' => $dokter,
				'status' => '1'

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
			'daftar' => $this->Base_model->get_data_where('pendaftaran', 'no_rekamedis', $this->session->userdata('id'))->result(),
			'file' => 'history'
		);
		$this->load->view('pasien/template/index', $data);
	}

	public function r_obat()
	{
		$data = array(
			'title' => 'Riwayat Obat',
			'folder' => 'sejarah',
			'riwayat' => $this->Base_model->get_data_where('tindakan_hamil', 'no_rekamedis', $this->session->userdata('id'))->result(),
			'file' => 'obat'
		);
		$this->load->view('pasien/template/index', $data);
	}

	public function lihat_obat($id)
	{
		$data = array(
			'title' => 'Riwayat Obat',
			'folder' => 'sejarah',
			'id' => $id,
			'riwayat' => $this->Base_model->get_data_where('temp_obat', 'no_rawat', $id)->result(),
			'file' => 'obat_pasien'
		);
		$this->load->view('pasien/template/index', $data);
	}

	public function cek_jadwal()
	{
		$data = array(
			'title' => 'Cek Jadwal Dokter',
			'folder' => 'jadwal',
			'jadwal' => $this->Base_model->get_data('jadwal_dokter', 'id_dokter')->result(),
			'file' => 'jadwal_dokter'
		);
		$this->load->view('pasien/template/index', $data);
	}

	public function data_anak()
	{
		$data = array(
			'title' => 'Data Anak',
			'folder' => 'anak',
			'balita' => $this->Base_model->get_data_where('balita', 'no_rekamedis', $this->session->userdata('id'))->result(),
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
	//TAmbah Data Anak action
	public function tambah()
	{
		$this->load->model('Generate_code');

		$this->form_validation->set_rules('depan', 'Nama Depan', 'trim|required', [
			'required' => 'Nama Depan Wajib Di isi'
		]);
		$this->form_validation->set_rules('belakang', 'Nama Belakang', 'trim|required', [
			'required' => 'Nama Belakang Wajib Di isi'
		]);
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required', [
			'required' => 'Tanggal Lahir Wajib di isi Wajib Di isi'
		]);
		$this->form_validation->set_rules('jekel', 'Jenis Kelamin', 'trim|required', [
			'required' => 'Kolom Jenis kelamin Wajib diisi'
		]);

		if ($this->form_validation->run() == TRUE) {
			$depan = $this->input->post('depan');
			$belakang = $this->input->post('belakang');
			$tanggal = $this->input->post('tanggal');
			$jekel = $this->input->post('jekel');

			$nama = $depan . ' ' . $belakang;
			$no_rm = $this->session->userdata('id');

			$data = array(
				'id_balita' => $this->Generate_code->Kode_balita($no_rm),
				'no_rekamedis' => $no_rm,
				'nama' => $nama,
				'tanggal_lahir' => $tanggal,
				'jekel' => $jekel
			);

			$this->Base_model->insert_data($data, 'balita');
			redirect(base_url() . 'pasien/data_anak', 'refresh');
		} else {
			$data = array(
				'title' => 'Tambah Data Anak',
				'folder' => 'anak',
				'file' => 'tambah_anak'
			);
			$this->load->view('pasien/template/index', $data);
		}
	}

	//Edit Data Anak
	public function edit_data($id)
	{
		$where = array('id_balita' => $id);
		$data = array(
			'title' => 'Armedia - Edit Data Balita',
			'edit' => $this->db->query("select * from balita where id_balita='$id'")->row(),
			'folder' => 'anak',
			'file' => 'edit_anak'
		);
		$this->load->view('pasien/template/index', $data);
	}

	public function update_anak()
	{
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required', [
			'required' => 'Nama Lengkap Wajib Di isi'
		]);
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required', [
			'required' => 'Tanggal Lahir Wajib di isi Wajib Di isi'
		]);
		$this->form_validation->set_rules('jekel', 'Jenis Kelamin', 'trim|required', [
			'required' => 'Kolom Jenis kelamin Wajib diisi'
		]);

		if ($this->form_validation->run() == TRUE) {
			$id = $this->input->post('id');
			$nama = $this->input->post('nama');
			$tanggal = $this->input->post('tanggal');
			$jekel = $this->input->post('jekel');

			$no_rm = $this->session->userdata('id');
			$where = array('id_balita' => $id);
			$data = array(
				'no_rekamedis' => $no_rm,
				'nama' => $nama,
				'tanggal_lahir' => $tanggal,
				'jekel' => $jekel
			);

			$this->Base_model->update_data($where, $data, 'balita');
			redirect(base_url() . 'pasien/data_anak', 'refresh');
		} else {
			$id = $this->input->post('id');
			$where = array('id_balita' => $id);
			$data = array(
				'title' => 'Armedia - Edit Data Balita',
				'edit' => $this->db->query("select * from balita where id_balita='$id'")->row(),
				'folder' => 'anak',
				'file' => 'edit_anak'
			);
			$this->load->view('pasien/template/index', $data);
		}
	}

	public function print_ticket($no_rm)
	{
		$this->load->library('pdf');

		$antrian = $this->Base_model->get_data_where('pendaftaran', 'no_rawat', $no_rm)->row();
		$data = array('antrian' => $antrian);
		$i = $this->pdf;
		$i->setPaper('A5', 'landscape');
		$i->filename = "Antrian " . $no_rm . ".pdf";
		$i->load_view('pasien/sejarah/cetak_antrian', $data);
	}

	public function rb_obat($id)
	{
		$where = ['id_balita' => $id];
		$data = array(
			'title' => 'Riwayat Obat',
			'folder' => 'anak',
			'id_balita' => $id,
			'balita' => $this->db->get_where('balita', $where)->row(),
			'file' => 'r_obat'
		);
		$this->load->view('pasien/template/index', $data);
	}

	public function ubah_data_diri()
	{
		$where = ['no_rekamedis' => $this->session->userdata('id')];
		$data = array(
			'title' => 'Ubah Data Diri',
			'folder' => 'profile',
			'file' => 'profile',
			'pasien' => $this->db->get_where('pasien', $where)->row()

		);
		$this->load->view('pasien/template/index', $data);
	}

	public function update_data()
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
		$this->form_validation->set_rules('pj', 'PJ', 'required', [
			'required' => 'anda belum mengisi penanggung jawab'
		]);
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
			'required' => 'Kolom Username Wajib Diisi', 'valid_email' => 'Format Email yang anda masukan tidak valid'
		]);


		if ($this->form_validation->run() == True) {
			$no_rm = $this->input->post('no_rm');
			$ktp = $this->input->post('ktp');
			$name = $this->input->post('name');
			$te_lahir = $this->input->post('te_lahir');
			$tanggal = $this->input->post('tanggal');
			$telp = $this->input->post('telp');
			$alamat = $this->input->post('alamat');
			$pj = $this->input->post('pj');
			$email = $this->input->post('email');

			$where = ['no_rekamedis' => $no_rm];
			$data = array(

				'no_ktp' => $ktp,
				'nama_pasien' => $name,
				'tempat_lahir' => $te_lahir,
				'tanggal_lahir' => $tanggal,
				'no_telp' => $telp,
				'alamat' => $alamat,
				'pj' => $pj,
				'email' => $email
			);
			$this->Base_model->update_data($where, $data, 'pasien');
			$this->session->set_flashdata('alert', 'Diubah');
			redirect('pasien/ubah_data_diri');
		} else {
			$where = ['no_rekamedis' => $this->session->userdata('id')];
			$data = array(
				'title' => 'Ubah Data Diri',
				'folder' => 'profile',
				'file' => 'profile',
				'pasien' => $this->db->get_where('pasien', $where)->row()

			);
			$this->load->view('pasien/template/index', $data);
		}
	}

	public function ubah_pass()
	{
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[6]|matches[password2]', [
			'required' => 'anda belum mengisi password',
			'min_length' => 'password terlalu pendek',
			'matches' => 'password tidak cocok'

		]);
		$this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password1]', [
			'required' => 'anda belum mengisi password',
			'matches' => 'password tidak cocok'

		]);


		if ($this->form_validation->run() == TRUE) {
			$no_rm = $this->input->post('no_rm');
			$pass = MD5($this->input->post('password1'));

			$where = ['no_rekamedis' => $no_rm];
			$data = array('password' => $pass,);

			$this->Base_model->update_data($where, $data, 'pasien');
			$this->session->set_flashdata('alert', 'Diubah');
			redirect('pasien/ubah_data_diri');
		} else {
			$where = ['no_rekamedis' => $this->session->userdata('id')];
			$data = array(
				'title' => 'Ubah Data Diri',
				'folder' => 'profile',
				'file' => 'profile',
				'pasien' => $this->db->get_where('pasien', $where)->row()

			);
			$this->load->view('pasien/template/index', $data);
		}
	}

	public function upload_foto()
	{
		$id = $this->session->userdata('id');


		$this->form_validation->set_rules('img', 'Foto', 'required');


		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/img/user';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '2048';
			$config['file_name'] = 'profile' . time();

			$this->load->library('upload', $config);
			$image = $this->upload->data();
			if ($this->upload->do_upload('foto')) {
				//proses upload Gambar
				$data['foto'] = $image['file_name'];
				$where = array('no_rekamedis' => $id);
				$data = array(
					'foto' => $image['file_name']
				);
				$this->Base_model->update_data($where, $data, 'pasien');
				redirect('pasien/dashboard/');
			}
		} else {
			redirect('pasien/dashboard/');
		}
	}
}

/* End of file Pasien.php */
/* Location: .//C/wamp64/www/armedia/armedapps/controllers/Pasien.php */
