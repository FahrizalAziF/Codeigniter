<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function cek_login($table, $where)
    {
        $this->db->where($where);
        return $this->db->get_where($table, $where)->row_array();
    }
    function cek_login2($table, $or_where)
    {
        $this->db->where($or_where);
        return $this->db->get_where($table, $or_where)->row_array();
    }
}
