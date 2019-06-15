<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Generate_code extends CI_Model
{
    //generate for id_admin
    function Kode_Admin()
    {
        $this->db->select('right(id_admin,3) as kode', false);
        $this->db->order_by('id_admin', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('admin');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }

        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodeadmin = 'ADM' . $kodemax;

        return $kodeadmin;
    }
    //generate for id_dokter
    function Kode_Dokter()
    {
        $this->db->select('right(id_dokter,3) as kode', false);
        $this->db->order_by('id_dokter', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('dokter');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }

        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodedokter = 'DKIA'. $kodemax;

        return $kodedokter;
    }
    //kode_rekamedis
    function Kode_Rek_medis()
    {
        $this->db->select('right(no_rekamedis,3) as kode', false);
        $this->db->order_by('no_rekamedis', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('pasien');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }

        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodedokter = 'RMKIA'. $kodemax;

        return $kodedokter;
    }
    //koderegistrasi
    function noRegistrasiotomatis($date, $id_dokter)
    {

        $today = $date;
        $this->db->select('right(no_rawat,4) as kode', false);
        $this->db->where('tanggal_daftar', $today);
        $this->db->where('id_dokter', $id_dokter);
        $this->db->order_by('no_rawat', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('pendaftaran');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }

        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);

        return $kodemax;
    }
    //kode_obat
    function Kode_obat($id, $jenis)
    {
        $this->db->select('right(id_obat,3) as kode', false);
        $this->db->where('jenis_obat', $jenis);
        $this->db->order_by('id_obat', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('obat');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }

        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodeobat = $id . $kodemax;

        return $kodeobat;
    }

    function Kode_balita($no_rm)
    {
        $this->db->select('right(id_balita,2) as kode', false);
        $this->db->where('no_rekamedis', $no_rm);
        $this->db->order_by('id_balita', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('balita');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }

        $kodemax = str_pad($kode, 2, "0", STR_PAD_LEFT);
        $kodebalita = $no_rm . $kodemax;

        return $kodebalita;
    }
}

/* End of file Generate_code.php */
