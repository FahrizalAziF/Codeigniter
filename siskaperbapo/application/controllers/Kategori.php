<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Kategori extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function kategori_produk($id_kategori = null)
    {
        $this->load->view('template/header');
        $this->load->view('template/navbar');

        $this->db->select('COUNT(id_produk)as jml,nama_kategori');
        $this->db->join('tbl_produk', 'tbl_produk.id_kategori=tbl_kategori.id_kategori');
        $this->db->where('tbl_kategori.id_kategori', $id_kategori);
        $data['kategori'] = $this->db->get('tbl_kategori')->row();

        $this->db->join('tbl_satuan', 'tbl_satuan.id_satuan=tbl_produk.id_satuan');
        $this->db->where('id_kategori', $id_kategori);
        $data['produk'] = $this->db->get('tbl_produk')->result();
        $this->load->view('pembeli/v_kategori', $data);
        $this->load->view('template/footer');
    }
}
