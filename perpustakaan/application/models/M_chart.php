<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_chart extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getKoleksi()
    {
        $this->db->select('*');
        $this->db->from('pengunjung');
        $this->db->group_by('level');
        $result = $this->db->get()->result();
        return $result;
    }

    function getMhs()
    {
        $this->db->select('*');
        $this->db->from('fakultas');
        $this->db->group_by('id_fakultas');
        $result = $this->db->get()->result();
        return $result;
    }

    function getBuku()
    {
        $this->db->select('SUM(pembaca) as total,kategori.kategori');
        $this->db->from('buku');
        $this->db->join('kategori', 'kategori.id_kategori=buku.id_kategori');
        $this->db->group_by('buku.id_kategori');
        $result = $this->db->get()->result();
        return $result;
    }
}
