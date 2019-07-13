<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller {

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

	public function index()
	{
		$this->load->helper('tanggal');


		$date = str_replace('/', '-', date('m-d-Y'));
		$data['tanggal'] = tgl_dashboard($date);
		$data['daftar'] = $this->Base_model->get_data_where('pendaftaran', 'tanggal_daftar', date('Y-m-d'))->num_rows();
		$data['show'] = $this->db->query('select * from pendaftaran where tanggal_daftar = "' . date('Y-m-d') . '" Limit 3')->result();
		$data['title'] = "Landing on Dashboard";
		$this->load->view('dokter/dashboard', $data);
	}

//Tampil Jadwal Dokter
	public function jadwal_dokter()
	{
		$data = array(
			'title' => 'Jadwal Dokter- Armedia',
			'jadwal' => $this->Base_model->get_data('jadwal_dokter', 'id_dokter')->result(),
			'folder' => 'Jadwal',
			'file' => 'jadwal_dokter'
		);
		$this->load->view('dokter/template/index', $data);
	}

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
		$this->load->view('dokter/template/index', $data);
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
			$this->load->view('dokter/template/index', $data);
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
			redirect(base_url() . 'dokter/Data_obat');
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
		$this->load->view('dokter/template/index', $data);
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
			redirect('dokter/data_obat');
		}
	}

	public function delete_obat($id)
	{
		$where = array('id_obat' => $id);
		$this->Base_model->delete_data($where, 'obat');
		$this->session->set_flashdata('alert', 'Dihapus');
		redirect('dokter/data_obat');
	}




	// end obat
	// -----------------------------------------------------------------------------------------------------

	//Start Tindakan
	// -------------------------------------------------------------------------------------------------------

	public function Data_tindakan()
	{
		$id=$this->session->userdata('id');
		$data = array(
			'title' => 'Data Tindakan',
			'daftar' => $this->Base_model->get_data_where('pendaftaran', 'id_dokter',$id)->result(),
			'folder' => 'tindakan',
			'file' => 'list'
		);
		$this->load->view('dokter/template/index', $data);
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
		$this->load->view('dokter/template/index', $data);
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
			redirect(base_url() . 'dokter/detail_rawat/' . $no_rawat);
		} else {

			$data = array(
				'title' => 'Armedia - Detail Riwayat',
				'daftar' => $this->db->query("select * from pendaftaran where no_rawat='$no_rawat'")->result(),
				'folder' => 'tindakan',
				'file' => 'h_detail',
			);
			$this->load->view('dokter/template/index', $data);
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
		redirect('dokter/detail_rawat/'.$no_rawat,'refresh');
	}

	public function m_obat($id_obat,$no_rekamedis,$kategori,$no_rawat,$id_balita)
	{
		$data=array(
			'id_obat'=>$id_obat,
			'no_rekamedis'=>$no_rekamedis,
			'kategori'=>$kategori,
			'no_rawat'=>$no_rawat,
			'id_balita'=>$id_balita
		);
		$this->Base_model->insert_data($data,'temp_obat');
		redirect('dokter/detail_riwayat/'.$no_rawat.'/'.$id_balita,'refresh');
	}

	public function pilih_anak($id)
	{
			$data = array(
			'title' => 'Armedia - Pilih anak',
			'daftar' => $this->db->query("select * from pendaftaran where no_rawat='$id'")->row(),
			'no_rawat'=>$id,
			'folder' => 'tindakan',
			'file' => 'p_anak',
		);
		$this->load->view('dokter/template/index', $data);
	}

    public function get_data($no_rawat)
    {
    	$id=$this->input->post('id_balita');
    	$this->detail_riwayat($no_rawat,$id);
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
			redirect('dokter/Data_tindakan');
	}

	public function detail_riwayat($no_rawat,$id)
	{
		$where=['id_balita'=>$id];
		// var_dump($where);die();
		$data = array(
			'title' => 'Armedia - Detail Riwayat',
			'daftar' => $this->db->query("select * from pendaftaran where no_rawat='$no_rawat'")->result(),
			'balita'=> $this->db->get_where('balita',$where)->row(),
			'obat' => $this->Base_model->get_data('obat', 'id_obat')->result(),
			'folder' => 'tindakan',
			'file' => 'b_detail',
		);
		$this->load->view('dokter/template/index', $data);
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
			redirect(base_url() . 'dokter/detail_riwayat/' . $no_rawat.'/'.$id_balita);
		} else {

			$data = array(
				'title' => 'Armedia - Detail Riwayat',
				'daftar' => $this->db->query("select * from pendaftaran where no_rawat='$no_rawat'")->result(),
				'folder' => 'tindakan',
				'file' => 'b_detail',
			);
			$this->load->view('dokter/template/index', $data);
		}
	}
//belom di edit
	public function account($id)
	{
		$data = array(
			'title' => 'Armedia -  Profile pengguna',
			'dokter' => $this->db->query("select * from dokter where id_dokter='$id'")->result(),
			'folder' => 'profile',
			'file' => 'account',
		);
		
		$this->load->view('dokter/template/index', $data);
	}
 
	public function update_profile()
	{
		$id=$this->input->post('id');
		$nama=$this->input->post('name');
		$email=$this->input->post('email');
		$telp=$this->input->post('telp');
		$alamat=$this->input->post('alamat');

		$this->form_validation->set_rules('name', 'Nama', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('telp', 'Telepon', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');



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
				'alamat'=>$alamat,
				'no_telp'=>$telp,
				'foto' =>$image['file_name']
				 );
              $this->Base_model->update_data($where,$data,'dokter');
            } else{
            	$where = array('id_dokter' => $id);
				$data = array(
				'nama' => $nama,
				'email'=>$email,
				'alamat'=>$alamat,
				'no_telp'=>$telp
			);
              $this->Base_model->update_data($where,$data,'dokter');
            }

			$this->Base_model->update_data($where,$data,'dokter');
			redirect('dokter/account/'.$id,'refresh');
		} else {
			redirect('dokter/account/'.$id,'refresh');
		}
	}
}

/* End of file Dokter.php */
/* Location: .//D/Web/armedia/armedapps/controllers/Dokter.php */
 ?>