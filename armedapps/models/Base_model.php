<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Base_model extends CI_Model
{

    // function Ambil data dari
    function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function get_data_where($table, $field, $where)
    {
        $this->db->where($field, $where);
        return $this->db->get($table);
    }
    // function db_Ambil data
    function get_data($table, $order)
    {
        $this->db->order_by($order, 'ASC');
        return $this->db->get($table);
    }
    // funtion tambah data
    function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }
    //function ubah data
    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    //function delete data
    function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function clear_data($table)
    {
        return $this->db->truncate($table);
    }

}

/* End of file Base_model.php */
/* Location: .//C/xampp/htdocs/armedia/armedapps/models/Base_model.php */
