<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Application extends CI_Controller
{

	public function index()
	{
		$this->load->view('front/index');
	}

	function regist()
	{
		$this->load->view('front/regist');
	}

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
		$this->form_validation->set_rules('pj', 'PJ', 'required', [
			'required' => 'anda belum mengisi penanggung jawab'
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
		$this->load->model('Generate_code');

		//load rules validasi Pasien
		$this->rules_pasien();

		if ($this->form_validation->run() == false) {
			
			$this->load->view('front/regist');
		} else {
			$no_rm = $this->Generate_code->Kode_Rek_Medis();
			$nama = $this->input->post('name');
			$ktp = $this->input->post('ktp');
			$te_l = $this->input->post('te_lahir');
			$ta_l = $this->input->post('tanggal');
			$telp = $this->input->post('telp');
			$alamat = $this->input->post('alamat');
			$email = $this->input->post('email');
			$pj=$this->input->post('pj');
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
				'pj'=>$pj,
				'email' => $email,
				'password' =>  md5($password),
				'foto' => $foto

			);

			$this->Base_model->insert_data($data, 'pasien');
			$this->session->set_flashdata('alert', 'Selamat Pendaftaran Akun Anda berhasil');
			redirect(base_url() . 'auth');
		}
	}
}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */ 