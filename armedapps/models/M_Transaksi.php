<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Transaksi extends CI_Model {

public function generate($dari,$sampai)
	{
		// var_dump($dari,$sampai);die();
		$query=$this->db->query("SELECT * from pendaftaran WHERE tanggal_daftar BETWEEN '$dari' AND '$sampai' and status='2' ");
		return $query->result();
	}	

}

/* End of file M_Transaksi.php */
/* Location: .//C/wamp64/www/armedia/armedapps/models/M_Transaksi.php */ ?>