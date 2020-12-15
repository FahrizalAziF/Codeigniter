<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_saran extends CI_Model
{
    private $_table = "saran_buku";



    public $nama_pengguna;
    public $judul_buku;
    public $deskripsi;
    public $tanggal;
    public $id_kategori;




    public function rules()
    {
        return [
            [
                'field' => 'nama_pengguna',
                'label' => 'Name',
                'rules' => 'required'
            ],

            [
                'field' => 'judul_buku',
                'label' => 'Halaman',
                'rules' => 'required'
            ]
        ];
    }

    public function getLimit()
    {
        $this->db->select("saran_buku.*, kategori.kategori");
        $this->db->from('saran_buku');
        $this->db->join('kategori', 'saran_buku.id_kategori=kategori.id_kategori');
        $this->db->order_by('id_saran', 'DESC');
        $this->db->limit(3);
        $query = $this->db->get()->result();
        return $query;
    }

    public function getAll()
    {
        $this->db->select("saran_buku.*, kategori.kategori");
        $this->db->from('saran_buku');
        $this->db->join('kategori', 'saran_buku.id_kategori=kategori.id_kategori');
        $this->db->order_by('id_saran', 'DESC');
        $this->db->limit(20);
        $query = $this->db->get()->num_rows();
        return $query;
    }

    function dataBaru($number, $offset)
    {
        $this->db->join('kategori', 'saran_buku.id_kategori=kategori.id_kategori');
        $this->db->order_by('id_saran', 'DESC');
        return $query = $this->db->get('saran_buku', $number, $offset)->result();
    }

    public function saveSaran()
    {
        $tgl = date('d-m-Y');
        $post = $this->input->post();
        $this->nama_pengguna = $post["nama_pengguna"];
        $this->judul_buku = $post["judul_buku"];
        $this->deskripsi = $post["deskripsi"];
        $this->id_kategori = $post["id_kategori"];
        $this->tanggal = $tgl;
        $this->db->insert($this->_table, $this);
    }
}
