<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Toko extends CI_Controller
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
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $id_akun = $this->session->userdata('id_akun');
        $this->db->where('id_akun', $id_akun);
        $data['pasar'] = $this->db->get('tbl_pasar')->row();

        if ($data['pasar']->id_pasar) {
            $data['kategori'] = $this->db->get('tbl_kategori')->result();

            $this->db->join('tbl_akun', 'tbl_akun.id_akun=tbl_toko.id_akun');
            $this->db->where('id_pasar', $data['pasar']->id_pasar);
            $data['toko'] = $this->db->get('tbl_toko')->result();
            $this->load->view('admin/v_list_toko', $data);
        } else {

            redirect('Login');
        }

        $this->load->view('template/footer');
    }

    public function produkList()
    {
        // POST data
        $postData = $this->input->post();
        // Get data
        $data = $this->M_produk->getProduk($postData);

        echo json_encode($data);
    }

    public function konfirmasi()
    {
        $post = $this->input->post();
        $id_toko = $post['id_toko'];
        $status = "Telah Dikonfirmasi";
        $this->db->set('status', $status);
        $this->db->where('id_toko', $id_toko);
        $data = $this->db->update('tbl_toko', $this);
        if ($data) {
            echo "<script>
            alert('Ingatkan admin toko dengan wa');
            window.open('https://api.whatsapp.com/send?phone=" . $post['no_wa'] . "&text=Akun anda adalah Username (" . $post['username'] . ") dan Password (" . $post['password'] . ") telah di konfirmasi oleh pihak admin','_blank' );
            window.location.href = '" . base_url('Toko') . "';
        </script>";
            base_url('Toko/');
        }
    }


   
    public function deleteToko($id_toko = null)
    {
        $this->db->where('id_toko', $id_toko);
        $cek = $this->db->get('tbl_toko')->row();
        //----------------------------------------------
        $this->db->where('id_akun', $cek->id_akun);
        $this->db->delete('tbl_akun');
        //----------------------------------------------
        $this->db->where('id_toko', $id_toko);
        $cekProduk = $this->db->get('tbl_produk')->result();
        foreach ($cekProduk as $c) {
            //-----------------------------------------
            $this->db->where('id_produk', $c->id_produk);
            $cekTrans = $this->db->get('tbl_keranjang')->result();
            foreach ($cekTrans as $ck) {
                $this->db->where('id_transaksi', $ck->id_trans);
                $this->db->delete('tbl_transaksi');
            }
            //-----------------------------------------
            $this->db->where('id_produk', $c->id_produk);
            $this->db->delete('tbl_keranjang');
        }
        $this->db->where('id_toko', $id_toko);
        $this->db->delete('tbl_produk');
        //----------------------------------------------
        $this->db->where('id_toko', $id_toko);
        $delete = $this->db->delete('tbl_toko');
        if ($delete) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" >
                    <p> Toko berhasil dihapus</p>
                </div>'
            );
            redirect('Toko');
        }
    }

    public function editToko()
    {
        $post = $this->input->post();
        $this->db->set('nama_toko', $post['nama_toko']);
        $this->db->set('nama_pemilik_toko', $post['nama_pemilik_toko']);
        $this->db->set('no_hp_toko', $post['no_hp_toko']);
        $this->db->set('foto_toko', $this->uploadFoto());
        $this->db->where('id_toko', $post['id_toko']);
        $qry = $this->db->update('tbl_toko');
        if ($qry) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" >
                    <p> Toko berhasil diedit</p>
                </div>'
            );
            redirect('Toko');
        }
    }

    public function editProfile()
    {
        $post = $this->input->post();
        $hp = '';

        if (substr(trim($post['no_hp_toko']), 0, 1) == '0') {
            $hp = '+62' . substr(trim($post['no_hp_toko']), 1);
        } else {
            $hp = $post['no_hp_toko'];
        }

        $this->db->set('nama_toko', $post['nama_toko']);
        $this->db->set('nama_pemilik_toko', $post['nama_pemilik_toko']);
        $this->db->set('no_hp_toko', $hp);
        $this->db->set('foto_toko', $this->uploadFoto());
        $this->db->where('id_toko', $post['id_toko']);
        $qry = $this->db->update('tbl_toko');
        if ($qry) {
            $this->session->set_flashdata(
                'message',
                '<div class="container text-center alert alert-success col-md-6" >
                    <p> Profile berhasil diperbarui</p>
                </div>'
            );
            redirect('Toko/profile');
        }
    }

    private function uploadFoto()
    {


        $config['upload_path']          =  'upload';
        $config['allowed_types']        = 'gif|jpg|jpeg|png|JPG';
        $config['max_size']             = 9048;
        $config['overwrite']            = true;
        $config['file_name']            = md5(date('l, d-M-Y / H:i:s a'));

        // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto_toko')) {
            return $this->upload->data("file_name");
        }

        return "store.png";
    }

    public function admin_toko()
    {
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $id_toko = $this->session->userdata('id_toko');


        $data['satuan'] = $this->db->get('tbl_satuan')->result();
        $this->db->join('tbl_pasar', 'tbl_pasar.id_pasar=tbl_toko.id_pasar');
        $this->db->where('id_toko', $id_toko);
        $data['toko'] = $this->db->get('tbl_toko')->row_array();
        if ($data['toko']) {
            $this->db->where('id_toko', $id_toko);
            $data['produk'] = $this->db->get('tbl_produk')->result();

            $data['kategori'] = $this->db->get('tbl_kategori')->result();
            $this->load->view('admin/v_list_toko_produk', $data);
        } else {
            redirect('Login');
        }


        $this->load->view('template/footer');
    }

    public function addProduk()
    {
        $id_toko = $this->session->userdata('id_toko');
        $post = $this->input->post();
        $this->nama_produk = $post['nama_produk'];
        $this->harga_produk = $post['harga_produk'];
        $this->stok_produk = $post['stok_produk'];
        $this->id_kategori = $post['id_kategori'];
        $this->id_satuan = $post['id_satuan'];
        $this->foto_produk = $this->uploadFotoProduk();
        $this->id_toko = $id_toko;
        $add = $this->db->insert('tbl_produk', $this);
        if ($add) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-info alert-dismissible fade show" role="alert">
                    <p> Produk berhasil ditambahkan</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>'
            );
            redirect('Toko/admin_toko');
        }
    }

    public function editProduk()
    {
        $post = $this->input->post();
        $data = array(
            'nama_produk' => $post['nama_produk'],
            'id_kategori' => $post['id_kategori'],
            'id_toko' => $post['id_toko'],
            'harga_produk' => $post['harga_produk'],
            'stok_produk' => $post['stok_produk'],
            'foto_produk' => $this->uploadFotoProduk()
        );

        $this->db->where('id_produk', $post['id_produk']);
        $edit = $this->db->update('tbl_produk', $data);

        if ($edit) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-info alert-dismissible fade show" role="alert">
                    <p> Produk berhasil ditambahkan</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>'
            );
            redirect('Toko/admin_toko');
        }
    }
    public function hapusProduk($id_produk = null)
    {
        $this->db->where('id_produk', $id_produk);
        $cekTrans = $this->db->get('tbl_keranjang')->result();
        foreach ($cekTrans as $ck) {
            $this->db->where('id_transaksi', $ck->id_trans);
            $this->db->delete('tbl_transaksi');
        }
        //-----------------------------------------
        $this->db->where('id_produk', $id_produk);
        $this->db->delete('tbl_keranjang');

        $this->db->where('id_produk', $id_produk);
        $cek = $this->db->get('tbl_produk')->row_array();
        unlink(FCPATH . "upload/" .  $cek['foto_produk']);

        $this->db->where('id_produk', $id_produk);
        $qry = $this->db->delete('tbl_produk');
        if ($qry) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" >
                    <p> Produk berhasil dihapus</p>
                </div>'
            );
            redirect('Toko/admin_toko');
        }
    }

    private function uploadFotoProduk()
    {


        $config['upload_path']          =  'upload';
        $config['allowed_types']        = 'gif|jpg|jpeg|png|JPG';
        $config['max_size']             = 9048;
        $config['overwrite']            = true;
        $config['file_name']            = md5(date('l, d-M-Y / H:i:s a'));
        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto_produk')) {
            return $this->upload->data("file_name");
        }

        return "store.png";
    }

    public function profile()
    {
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $id_akun = $this->session->userdata('id_akun');

        $this->db->join('tbl_pasar', 'tbl_pasar.id_pasar=tbl_toko.id_pasar');
        $this->db->where('tbl_toko.id_akun', $id_akun);
        $data['akun'] = $this->db->get('tbl_toko')->row();

        $this->db->where('id_akun', $id_akun);
        $data['user'] = $this->db->get('tbl_akun')->row();
        $this->load->view('admin/v_profile', $data);
        $this->load->view('template/footer');
    }

    public function editAkun()
    {
        $post = $this->input->post();
        $hp = '';

        $username = $post['username'];
        $this->db->where('username', $username);
        $cek = $this->db->get('tbl_akun')->row_array();
        if (!$cek) {
            $this->db->set('username', $username);
            $this->db->set('password', $post['password']);
            $this->db->where('id_akun', $post['id_akun']);
            $qry = $this->db->update('tbl_akun');
            if ($qry) {

                $this->session->sess_destroy();
                $this->session->set_flashdata(
                    'message',
                    '<div class="container text-center alert alert-danger col-md-6" >
                    <p> Akun berhasil diperbarui, silahkan login kembali</p>
                </div>'
                );
                redirect('Login');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="container text-center alert alert-danger col-md-6" >
                    <p> Username ' . $post['username'] . ' telah digunakan </p>
                </div>'
            );
            redirect('Toko/profile');
        }
    }
}
