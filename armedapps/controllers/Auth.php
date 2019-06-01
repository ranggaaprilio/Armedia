<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Base_model');
    }

    public function index()
    {
        $this->load->view('front/v_login');
    }
    function cheklogin()
    {

        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $this->rules();

        if ($this->form_validation->run() != false) {
            $where = array('email' => $email, 'password' => md5($password));

            $data = $this->Base_model->edit_data($where, 'owner');
            $d = $this->Base_model->edit_data($where, 'owner')->row();
            $cek = $data->num_rows();

            if ($cek > 0) {
                $session = array('id' => $d->id_owner, 'nama' => $d->nama, 'status' => 'login','foto'=>$d->foto,'group'=>'owner');
                $this->session->set_userdata($session);
                redirect(base_url() . 'SuperAdmin');
            } else {
                $dt = $this->Base_model->edit_data($where, 'dokter');
                $hasil = $this->Base_model->edit_data($where, 'dokter')->row();
                $dokter = $dt->num_rows();

                if ($dokter > 0) {
                    $session = array('id' => $hasil->id_dokter, 'nama' => $hasil->nama, 'status' => 'login','foto'=>$hasil->foto,'group'=>'dokter');
                    $this->session->set_userdata($session);
                    redirect(base_url() . 'dokter');
                } else {
                    $dta = $this->Base_model->edit_data($where, 'admin');
                    $hsl = $this->Base_model->edit_data($where, 'admin')->row();
                    $admin = $dta->num_rows();

                    if ($admin > 0) {
                    $session = array('id' => $hsl->id_admin, 'nama' => $hsl->nama_admin, 'status' => 'login','foto'=>$hsl->foto,'group'=>'admin');
                    $this->session->set_userdata($session);
                    redirect(base_url() . 'pendaftaran');
                    } else {
                        $param=$this->Base_model->edit_data($where, 'pasien');
                        $hlo = $this->Base_model->edit_data($where, 'pasien')->row();
                        $pasien = $param->num_rows();

                        if ($pasien > 0) {
                        $session = array('id' => $hlo->no_rekamedis, 'nama' => $hlo->nama_pasien, 'status' => 'login','foto'=>$hlo->foto,'group'=>'pasien');
                        $this->session->set_userdata($session);
                        } else {
                            $this->session->set_flashdata('alert', 'Login Gagal! Username atau Password Salah');
                            redirect(base_url() . 'Auth?pesan=gagal');
                        }
                    }      
                }
            }
        } else {
            $this->session->set_flashdata('alert', 'Anda Belum mengisi username atau password');
            redirect(base_url() . 'Auth');
        }
    }

    public function rules()
    {
        $this->form_validation->set_rules('email', 'Username ', 'required');
        $this->form_validation->set_rules('password', 'Password ', 'required');
    }

    function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('status_login', 'Anda sudah berhasil keluar dari aplikasi');
        redirect(base_url() . 'auth?pesan=logout');
    }
}

/* End of file Auth.php */
