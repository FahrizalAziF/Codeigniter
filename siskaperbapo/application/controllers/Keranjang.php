<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Keranjang extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
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
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $id_akun = $this->session->userdata('id_akun');
        $this->db->join('tbl_produk', 'tbl_produk.id_produk=tbl_keranjang.id_produk');
        $this->db->where('id_akun', $id_akun);
        $this->db->where('status', 'Belum');
        $data['keranjang'] = $this->db->get('tbl_keranjang')->result();
        $this->load->view('pembeli/v_keranjang', $data);
        $this->load->view('template/footer');
    }
    public function addProduk()
    {
        $id_akun = $this->session->userdata('id_akun');
        $post = $this->input->post();

        $this->db->where('id_produk', $post['id_produk']);
        $cekStok = $this->db->get('tbl_produk')->row_array();

        $this->db->where('id_produk', $post['id_produk']);
        $this->db->where('id_akun', $id_akun);
        $this->db->where('status', "Belum");
        $cekKeranjang = $this->db->get('tbl_keranjang')->row_array();

        $jmlh = $cekKeranjang['jumlah'] + 1;

        if ($cekStok['stok_produk'] >= $jmlh) {
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
                    if ($upd) {
                        $this->session->set_flashdata(
                            'message',
                            '<div class="alert alert-info" >
                            <p> Produk ditambahkan</p>
                        </div>'
                        );
                        redirect('Keranjang/');
                    }
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
                    if ($add) {
                        $this->session->set_flashdata(
                            'message',
                            '<div class="alert alert-info" >
                            <p> Produk ditambahkan</p>
                        </div>'
                        );
                        redirect('Keranjang/');
                    }
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" >
                        <p> Mohon login terlebih dahulu</p>
                    </div>'
                );
                redirect('Login');
            }
        } else {

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" >
                    <p> Jumlah stok "' . $cekStok['nama_produk'] . '" tidak mencukupi</p>
                </div>'
            );
            redirect('Keranjang/');
        }
    }

    public function updateProduk()
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
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-info" >
                        <p> Keranjang berhasil diupdate</p>
                    </div>'
                );
                redirect('Keranjang/');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" >
                    <p> Jumlah stok "' . $cek['nama_produk'] . '" tidak mencukupi</p>
                </div>'
            );
            redirect('Keranjang/');
        }
    }

    public function deleteProduk($id_keranjang = null)
    {
        $this->db->where('id_keranjang', $id_keranjang);
        $data = $this->db->delete('tbl_keranjang');
        if ($data) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" >
                    <p> Produk Dihapus dari Keranjang Anda</p>
                </div>'
            );
            redirect('Keranjang/');
        }
    }

    public function addTransaksi()
    {
        $id_akun = $this->session->userdata('id_akun');
        $post = $this->input->post();
        $data = array(
            'id_transaksi' => md5(time() . $id_akun),
            'tgl_checkout' => date("d-m-Y"),
            'total_bayar' => $post['total_bayar'],
            'status' => '1',
            'id_akun' => $id_akun
        );
        $trans = $this->db->insert('tbl_transaksi', $data);
        if ($trans) {
            $this->db->set('status', 'Sudah');
            $this->db->set('id_trans', $data['id_transaksi']);
            $this->db->where('id_akun', $id_akun);
            $this->db->where('status', "Belum");
            $qry = $this->db->update('tbl_keranjang');
            if ($qry) {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" >
                    <p> Checkout berhasil dilakukan, mohon menunggu untuk dihubungi admin kami</p>
                </div>'
                );
                redirect('Keranjang/transaksi');
            }
        }
    }

    public function transaksi()
    {
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $id_akun = $this->session->userdata('id_akun');
        $this->db->join('tbl_status_trans', 'tbl_status_trans.id_status=tbl_transaksi.status');
        $this->db->join('tbl_kurir', 'tbl_kurir.id_kurir=tbl_transaksi.id_kurir', 'left ');
        $this->db->where('tbl_transaksi.id_akun', $id_akun);
        $data['transaksi'] = $this->db->get('tbl_transaksi')->result();
        $this->load->view('pembeli/v_transaksi', $data);
        $this->load->view('template/footer');
    }

    public function hubungiAdmin()
    {
        $this->db->join('tbl_akun', 'tbl_akun.id_akun=tbl_profile.id_akun');
        $this->db->where('id_user', "1");
        $cek = $this->db->get('tbl_profile')->row();

        redirect('https://api.whatsapp.com/send?phone=' . $cek->no_hp . '&text= Halo Admin');
    }
}
