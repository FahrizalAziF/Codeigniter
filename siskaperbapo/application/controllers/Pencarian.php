<?php

use PhpParser\Node\Expr\FuncCall;

defined('BASEPATH') or exit('No direct script access allowed');


class Pencarian extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('M_produk');
        $id_akun = $this->session->userdata('id_akun');
        if (!$id_akun) {
            $this->session->set_flashdata(
                'message',
                '<div class="container text-center alert alert-danger col-md-6" >
                    <p> Mohon login terlebih dahulu</p>
                </div>'
            );
            redirect('Login');
        }
    }

    public function index()
    {
        $post = $this->input->post();
        $produk = $post['produk'];
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $data['nama'] = $produk;
        $this->db->join('tbl_satuan', 'tbl_satuan.id_satuan=tbl_produk.id_satuan');
        $this->db->like('nama_produk', $produk);
        $this->db->order_by('rand()');
        $data['produk'] = $this->db->get('tbl_produk')->result();
        $this->load->view('pembeli/v_pencarian', $data);
        $this->load->view('template/footer');
    }
}
