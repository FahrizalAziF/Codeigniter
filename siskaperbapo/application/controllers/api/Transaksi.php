<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Transaksi extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }

    function index_get($id_akun)
    {
        // $id = $this->input->post('id_akun');
        $this->db->select('COUNT(id_transaksi) as jumlah_trans');
        $this->db->where('id_akun', $id_akun);
        $this->db->where('status!=', '3');
        $cart = $this->db->get('tbl_transaksi')->row_array();


        $this->response(array("total" => $cart['jumlah_trans']));
    }

    function cek_get($id_transaksi)
    {
        // $id = $this->input->post('id_akun');
        $this->db->join('tbl_kurir', 'tbl_kurir.id_kurir=tbl_transaksi.id_kurir', 'left ');
        $this->db->join('tbl_status_trans', 'tbl_status_trans.id_status=tbl_transaksi.status');
        $this->db->where('id_transaksi', $id_transaksi);
        $qry = $this->db->get('tbl_transaksi')->row_array();
        $this->response($qry, 200);
    }

    function trans_post()
    {
        $post = $this->input->post();
        $this->db->where('nama_status', $post['nama_status']);
        $cek = $this->db->get('tbl_status_trans')->row_array();


        $this->db->join('tbl_status_trans', 'tbl_status_trans.id_status=tbl_transaksi.status');
        $this->db->where('status', $cek['id_status']);
        $this->db->where('id_akun', $post['id_akun']);
        $qry = $this->db->get('tbl_transaksi')->result();
        $this->response(array("result" => $qry, 200));
    }

    function detail_trans_post()
    {
        $post = $this->input->post();
        $json = array();

        $this->db->select('SUM(sub_total) as total_bayar');
        $this->db->where('id_akun', $post['id_akun']);
        $this->db->where('id_trans', $post['id_trans']);
        $jmlh = $this->db->get('tbl_keranjang')->row_array();

        $this->db->where('id_akun', $post['id_akun']);
        $this->db->where('id_trans', $post['id_trans']);
        $qry = $this->db->get('tbl_keranjang')->result();

        foreach ($qry as $q) {
            $this->db->where('id_produk', $q->id_produk);
            $p = $this->db->get('tbl_produk')->row_array();

            $json[] = array(
                'nama_produk' => $p['nama_produk'],
                'harga_produk' => $p['harga_produk'],
                'foto_produk' => $p['foto_produk'],
                'jumlah' => $q->jumlah,
                'sub_total' => $q->sub_total,
            );
        }
        $this->response(array("result" => $json, 200, "total" => $jmlh['total_bayar']));
    }
}
