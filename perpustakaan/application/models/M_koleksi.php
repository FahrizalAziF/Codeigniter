<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_koleksi extends CI_Model
{

    private $_table = 'koleksi';


    public $id_buku;
    public $id_user;





    function __construct()
    {
        parent::__construct();
    }
    public function rules()
    {
        return [
            [
                'field' => 'nama_depan',
                'label' => 'Name',
                'rules' => 'required'
            ],

            [
                'field' => 'id_buku',
                'label' => 'Halaman',
                'rules' => 'required'
            ]
        ];
    }

    public function getAll($nama = null)
    {
        $this->db->select('*');
        $this->db->from('koleksi');
        $this->db->join('buku', 'buku.id_buku=koleksi.id_buku');
        $this->db->where('koleksi.id_user', $nama);
        $query = $this->db->get()->result();
        return $query;
    }

    public function addKoleksi($table2, $where)
    {
        return $this->db->get_where($table2, $where);
    }
    public function cekKoleksi($table2, $where2)
    {
        return $this->db->get_where($table2, $where2);
    }
    public function saveKoleksi()
    {
        $post = $this->input->post();
        $this->id_user = $post['id_user'];
        $this->id_buku = $post['id_buku'];
        $this->db->insert($this->_table, $this);
    }
    public function delete($id_buku)
    {

        return $this->db->delete($this->_table, array("id_buku" => $id_buku));
    }

    public function jumKoleksi($nama)
    {
        $this->db->select('COUNT(id_buku) as jum');
        $this->db->from('koleksi');
        $this->db->where('id_user', $nama);
        return $this->db->get()->row();
    }
}
