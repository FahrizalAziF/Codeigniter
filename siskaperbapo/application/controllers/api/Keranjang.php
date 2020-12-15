<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Keranjang extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }

    function index_get($id)
    {
        // $id = $this->input->post('id_akun');
        $this->db->select('SUM(sub_total) as jumlah_cart');
        $this->db->where('status', 'Belum');
        $this->db->where('id_akun', $id);
        $cart = $this->db->get('tbl_keranjang')->row_array();

        //------------------------------------------------------

        $this->db->join('tbl_produk', 'tbl_produk.id_produk=tbl_keranjang.id_produk');
        $this->db->where('status', 'Belum');
        $this->db->where('id_akun', $id);
        $qry = $this->db->get('tbl_keranjang')->result();

        $this->response(array("result" => $qry, 200, "total" => $cart['jumlah_cart']));
    }

    function cart_get($id_akun)
    {
        $this->db->select('COUNT(id_keranjang) as jumlah_cart');
        $this->db->where('status', 'Belum');
        $this->db->where('id_akun', $id_akun);
        $cart = $this->db->get('tbl_keranjang')->row_array();
        $this->response($cart, 200);
    }

    // function total_get($id_akun)
    // {
    //     $this->db->select('SUM(sub_total) as jumlah_cart');
    //     $this->db->where('status', 'Belum');
    //     $this->db->where('id_akun', $id_akun);
    //     $cart = $this->db->get('tbl_keranjang')->row_array();
    //     $this->response($cart, 200);
    // }

    public function produk_post()
    {
        $post = $this->input->post();
        $id_akun = $post['id_akun'];
        if ($id_akun) {
            $this->db->where('id_akun', $id_akun);
            $this->db->where('id_produk', $post['id_produk']);
            $this->db->where('status', "Belum");
            $cek = $this->db->get('tbl_keranjang')->row();
            if ($cek) {
                $this->db->set('jumlah', $cek->jumlah + 1);
                $this->db->set('sub_total', $cek->sub_total + $post['harga_produk']);
                $this->db->where('id_keranjang', $cek->id_keranjang);
                $upd = $this->db->update('tbl_keranjang');
            } else {
                $this->db->where('id_produk', $post['id_produk']);
                $cek = $this->db->get('tbl_produk')->row();
                $data = array(
                    'id_produk' => $post['id_produk'],
                    'jumlah' => '1',
                    'status' => 'Belum',
                    'id_akun' => $id_akun,
                    'sub_total' => $cek->harga_produk
                );

                $add = $this->db->insert('tbl_keranjang', $data);
            }
            $this->response(array("status" => "success"), 200);
        } else {
            $this->response(array("status" => "fail"), 200);
        }
    }

    public function update_post()
    {
        $post = $this->input->post();
        $this->db->where('id_produk', $post['id_produk']);
        $cek = $this->db->get('tbl_produk')->row_array();

        if ($cek['stok_produk'] >= $post['jumlah']) {
            $sub_total = $post['jumlah'] * $post['harga_produk'];
            $this->db->set('jumlah', $post['jumlah']);
            $this->db->set('sub_total', $sub_total);
            $this->db->where('id_keranjang', $post['id_keranjang']);
            $data = $this->db->update('tbl_keranjang');
            if ($data) {
                $this->response(array("status" => "success"), 200);
            }
        } else {
            $this->response(array("status" => "fail"), 200);
        }
    }

    public function prd_delete($id)
    {
        $this->db->where('id_keranjang', $id);
        $delete = $this->db->delete('tbl_keranjang');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    public function transaksi_post()
    {

        $post = $this->input->post();
        $data = array(
            'id_transaksi' => md5(time() . $post['id_akun']),
            'tgl_checkout' => date("d-m-Y"),
            'total_bayar' => $post['total_bayar'],
            'status' => '1',
            'id_akun' => $post['id_akun']
        );
        $trans = $this->db->insert('tbl_transaksi', $data);
        if ($trans) {
            $this->db->set('status', 'Sudah');
            $this->db->set('id_trans', $data['id_transaksi']);
            $this->db->where('id_akun', $post['id_akun']);
            $this->db->where('status', "Belum");
            $qry = $this->db->update('tbl_keranjang');
            if ($qry) {
                $this->response(array("status" => "success"), 200);
            } else {
                $this->response(array("status" => "fail"), 200);
            }
        }
    }
}
