<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Produk extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    function index_get()
    {
        $this->db->join('tbl_satuan', 'tbl_satuan.id_satuan=tbl_produk.id_satuan');
        $this->db->join('tbl_toko', 'tbl_toko.id_toko=tbl_produk.id_toko');
        $this->db->limit('10');
        $this->db->order_by('id_produk', 'DESC');
        $qry = $this->db->get('tbl_produk')->result();
        if ($qry) {
            $this->response(array("result" => $qry, 200));
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function kategori_get()
    {
        $qry = $this->db->get('tbl_kategori')->result();
        if ($qry) {
            $this->response(array("result" => $qry, 200));
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function produk_get()
    {
        $this->db->join('tbl_satuan', 'tbl_satuan.id_satuan=tbl_produk.id_satuan');
        $this->db->join('tbl_toko', 'tbl_toko.id_toko=tbl_produk.id_toko');
        $this->db->order_by('rand()');
        $qry = $this->db->get('tbl_produk')->result();
        if ($qry) {
            $this->response(array("result" => $qry, 200));
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function perkategori_post()
    {
        $post = $this->input->post();
        $this->db->where('nama_kategori', $post['nama_kategori']);
        $cek = $this->db->get('tbl_kategori')->row_array();

        $this->db->join('tbl_satuan', 'tbl_satuan.id_satuan=tbl_produk.id_satuan');
        $this->db->where('id_kategori', $cek['id_kategori']);
        $this->db->where('id_toko', $post['id_toko']);
        $qry = $this->db->get('tbl_produk')->result();

        $this->response(array("result" => $qry, 200));
    }

    function kategori_post()
    {
        $post = $this->input->post();
        $this->db->where('nama_kategori', $post['nama_kategori']);
        $cek = $this->db->get('tbl_kategori')->row_array();

        $this->db->join('tbl_satuan', 'tbl_satuan.id_satuan=tbl_produk.id_satuan');
        $this->db->where('id_kategori', $cek['id_kategori']);
        $qry = $this->db->get('tbl_produk')->result();

        $this->response(array("result" => $qry, 200));
    }

    function pertoko_post()
    {
        $post = $this->input->post();
        $this->db->where('nama_toko', $post['nama_toko']);
        $cek = $this->db->get('tbl_toko')->row_array();

        $this->db->join('tbl_satuan', 'tbl_satuan.id_satuan=tbl_produk.id_satuan');
        $this->db->where('id_kategori', $post['id_kategori']);
        $this->db->where('id_toko', $cek['id_toko']);
        $qry = $this->db->get('tbl_produk')->result();

        $this->response(array("result" => $qry, 200));
    }

    function pencarian_post(){
        $post = $this->input->post();
        $this->db->join('tbl_satuan', 'tbl_satuan.id_satuan=tbl_produk.id_satuan');
        $this->db->join('tbl_toko', 'tbl_toko.id_toko=tbl_produk.id_toko');
        $this->db->like('nama_produk', $post['nama_produk']);
        $qry = $this->db->get('tbl_produk')->result();
        $this->response(array("result" => $qry, 200));
    }
}
