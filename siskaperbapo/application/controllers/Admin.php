<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Admin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('M_history');
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

    public function kelola_pasar()
    {
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->db->join('tbl_akun', 'tbl_akun.id_akun=tbl_pasar.id_akun', 'left');
        $data['pasar'] = $this->db->get('tbl_pasar')->result();
        $this->load->view('admin/v_pasar', $data);
        $this->load->view('template/footer');
    }

    public function tambahPasar()
    {
        $post = $this->input->post();
        $nama_pasar = $post['nama_pasar'];
        $alamat = $post['alamat_pasar'];
        $data = array(
            'nama_pasar' => $nama_pasar,
            'alamat_pasar' => $alamat,
        );
        $row = $this->db->insert('tbl_pasar', $data);
        if ($row) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" >
                    <p> Pasar baru ditambahkan</p>
                </div>'
            );
            redirect('Admin/kelola_pasar');
        }
    }

    public function deletePasar($id_pasar = null)
    {
        $this->db->where('id_pasar', $id_pasar);
        $cek = $this->db->get('tbl_pasar')->row();
        //----------------------------------------------
        $this->db->where('id_akun', $cek->id_akun);
        $this->db->delete('tbl_akun');
        //---------------------------------------------
        $this->db->where('id_pasar', $id_pasar);
        $cekToko = $this->db->get('tbl_toko')->row();
        //----------------------------------------------
        $this->db->where('id_toko', $cekToko->id_toko);
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
        $this->db->where('id_toko', $cekToko->id_toko);
        $this->db->delete('tbl_produk');
        //----------------------------------------------
        $this->db->where('id_pasar', $id_pasar);
        $delete = $this->db->delete('tbl_toko');
        //---------------------------------------------
        $this->db->where('id_pasar', $id_pasar);
        $delete = $this->db->delete('tbl_pasar');

        if ($delete) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" >
                    <p> Toko berhasil dihapus</p>
                </div>'
            );
            redirect('Admin/kelola_pasar');
        }
    }
    public function tambahAdminPasar()
    {
        $post = $this->input->post();
        $username = $post['username'];
        $password = $post['password'];
        $id_pasar = $post['id_pasar'];
        $data = array(
            'username' => $username,
            'password' => $password,
            'id_user' => "2",
        );
        $username = $post['username'];
        $this->db->where('username', $username);
        $cek = $this->db->get('tbl_akun')->row_array();
        if (!$cek) {

            $row = $this->db->insert('tbl_akun', $data);
            if ($row) {
                $this->db->order_by('id_akun', 'DESC');
                $cek = $this->db->get('tbl_akun')->row_array();

                $this->db->set('id_akun', $cek['id_akun']);
                $this->db->where('id_pasar', $id_pasar);
                $this->db->update('tbl_pasar', $this);
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" >
                    <p> Akun baru ditambahkan</p>
                </div>'
                );
            }
            redirect('Admin/kelola_pasar');
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" >
                    <p> Username ' . $post['username'] . ' telah digunakan</p>
                </div>'
            );
            redirect('Admin/kelola_pasar');
        }
    }
    public function editAkun()
    {
        $post = $this->input->post();
        $this->db->set('username', $post['username']);
        $this->db->set('password', $post['password']);
        $this->db->where('id_akun', $post['id_akun']);
        $qry = $this->db->update('tbl_akun');
        if ($qry) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" >
                    <p> Akun diperbarui</p>
                </div>'
            );
            redirect('Admin/kelola_pasar');
        }
    }




    public function kategori()
    {
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $data['kategori'] = $this->db->get('tbl_kategori')->result();
        $data['satuan'] = $this->db->get('tbl_satuan')->result();
        $this->load->view('admin/v_kategori_produk', $data);
        $this->load->view('template/footer');
    }

    public function tambahKategori()
    {
        $post = $this->input->post();
        $this->nama_kategori = $post['nama_kategori'];
        $this->foto_kategori = $this->uploadFoto();
        $add = $this->db->insert('tbl_kategori', $this);
        if ($add) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" >
                    <p> Kategori berhasil ditambahkan</p>
                </div>'
            );
            redirect('Admin/kategori');
        }
    }
    public function hapusKategori($id_kategori = null)
    {
        $this->db->where('id_kategori', $id_kategori);
        $delete = $this->db->delete('tbl_kategori');
        if ($delete) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" >
                    <p> Kategori berhasil dihapus</p>
                </div>'
            );
            redirect('Admin/kategori');
        }
    }
    public function editKategori()
    {
        $post = $this->input->post();
        $this->db->set('nama_kategori', $post['nama_kategori']);
        $this->db->where('id_kategori', $post['id_kategori']);
        $edit = $this->db->update('tbl_kategori');
        if ($edit) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-info" >
                    <p> Kategori berhasil diubah</p>
                </div>'
            );
            redirect('Admin/kategori');
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

        if ($this->upload->do_upload('foto_kategori')) {
            return $this->upload->data("file_name");
        }

        return "store.png";
    }

    public function transaksi()
    {
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->db->join('tbl_status_trans', 'tbl_status_trans.id_status=tbl_transaksi.status');
        $this->db->join('tbl_profile', 'tbl_profile.id_akun=tbl_transaksi.id_akun');
        $this->db->where('tbl_transaksi.status', '1');
        $data['transaksi'] = $this->db->get('tbl_transaksi')->result();
        $data['kurir'] = $this->db->get('tbl_kurir')->result();


        $this->db->select('COUNT(id_transaksi) as jumlah');
        $this->db->where('status', '1');
        $data['jumlah'] = $this->db->get('tbl_transaksi')->row();
        $this->load->view('admin/v_transaksi', $data);
        $this->load->view('template/footer');
    }
    public function hubungiPembeli($no_hp = null)
    {
        redirect('https://api.whatsapp.com/send?phone=' . $no_hp . '&text= Halo Pelanggan');
    }

    public function hubungiToko($no_hp = null)
    {
        redirect('https://api.whatsapp.com/send?phone=' . $no_hp . '&text= Halo Admin Toko');
    }

    public function hubungiKurir($no_hp = null)
    {
        redirect('https://api.whatsapp.com/send?phone=' . $no_hp . '&text= Halo Kurir');
    }

    public function kurir()
    {
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $data['kurir'] = $this->db->get('tbl_kurir')->result();
        $this->load->view('admin/v_kurir', $data);
        $this->load->view('template/footer');
    }

    public function addKurir()
    {
        $post = $this->input->post();
        $hp = '';

        if (substr(trim($post['no_hp_kurir']), 0, 1) == '0') {
            $hp = '+62' . substr(trim($post['no_hp_kurir']), 1);
        } else {
            $hp = $post['no_hp_kurir'];
        }
        $data = array(
            'nama_kurir' => $post['nama_kurir'],
            'alamat_kurir' => $post['alamat_kurir'],
            'no_hp_kurir' => $hp,
            'id_user' => '5'
        );

        $qry = $this->db->insert('tbl_kurir', $data);
        if ($qry) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-info" >
                    <p> Kurir berhasil ditambahkan</p>
                </div>'
            );
            redirect('Admin/kurir');
        }
    }
    public function editKurir()
    {
        $post = $this->input->post();
        $hp = '';

        if (substr(trim($post['no_hp_kurir']), 0, 1) == '0') {
            $hp = '+62' . substr(trim($post['no_hp_kurir']), 1);
        } else {
            $hp = $post['no_hp_kurir'];
        }
        $data = array(
            'nama_kurir' => $post['nama_kurir'],
            'alamat_kurir' => $post['alamat_kurir'],
            'no_hp_kurir' => $hp,
            'id_user' => '5'
        );
        $this->db->where('id_kurir', $post['id_kurir']);
        $qry = $this->db->update('tbl_kurir', $data);
        if ($qry) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-info" >
                    <p> Data kurir berhasil diubah</p>
                </div>'
            );
            redirect('Admin/kurir');
        }
    }
    public function kirimKurir()
    {
        $json     = array();
        $post = $this->input->post();
        $this->db->set('status', '2');
        $this->db->set('id_kurir', $post['id_kurir']);
        $this->db->where('id_transaksi', $post['id_transaksi']);
        $qry = $this->db->update('tbl_transaksi');

        $this->db->join('tbl_profile', 'tbl_profile.id_akun=tbl_transaksi.id_akun');
        $this->db->join('tbl_akun', 'tbl_akun.id_akun=tbl_transaksi.id_akun');
        $this->db->where('id_transaksi', $post['id_transaksi']);
        $bio = $this->db->get('tbl_transaksi')->row_array();

        $this->db->where('id_kurir', $post['id_kurir']);
        $kurir = $this->db->get('tbl_kurir')->row_array();


        $this->db->where('id_trans', $post['id_transaksi']);
        $cart = $this->db->get('tbl_keranjang')->result();
        foreach ($cart as $p) {
            $this->db->where('id_produk', $p->id_produk);
            $produk = $this->db->get('tbl_produk')->result_array();
            foreach ($produk as $pr) {
                $this->db->join('tbl_pasar', 'tbl_pasar.id_pasar=tbl_toko.id_pasar');
                $this->db->where('id_toko', $pr['id_toko']);
                $toko = $this->db->get('tbl_toko')->row();
                $json[] = array(
                    'Nama Produk'     => $pr['nama_produk'],
                    'Jumlah Beli'     => $p->jumlah,
                    'Sub Total'     => $p->sub_total,
                    'Nama Toko'     => $toko->nama_toko,
                    'Nama Pasar'     => $toko->nama_pasar,
                );
            }
        }
        $prd = json_encode($json, JSON_NUMERIC_CHECK);


        if ($qry) {
            echo "<script>
            var windowFeatures = 'menubar=yes,location=yes,resizable=yes,scrollbars=yes,status=yes';
            alert('Kirim data transaksi ke kurir melalui Whatsapp');
            window.open('https://api.whatsapp.com/send?phone=" . $kurir['no_hp_kurir'] . "&text=Username Pembeli : %0A" . $bio['username'] . " %0A%0A Barang yang dibeli : %0A" . $prd . "  %0A%0AAlamat pembeli :  %0A" . $bio['alamat'] . " %0A%0ATotal bayar : %0A" . $bio['total_bayar'] . "%0A%0A No Wa Pembeli: %0A" . $bio['no_hp'] . "','_blank' ,windowFeatures);
            window.location.href = '" . base_url('Admin/transaksi') . "';
        </script>";
        }
    }

    public function history()
    {
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->db->join('tbl_status_trans', 'tbl_status_trans.id_status=tbl_transaksi.status');
        $this->db->join('tbl_profile', 'tbl_profile.id_akun=tbl_transaksi.id_akun');
        $this->db->join('tbl_kurir', 'tbl_kurir.id_kurir=tbl_transaksi.id_kurir');
        $this->db->where('tbl_transaksi.status', '2');
        $this->db->or_where('tbl_transaksi.status', '3');
        $data['transaksi'] = $this->db->get('tbl_transaksi')->result();
        $data['kurir'] = $this->db->get('tbl_kurir')->result();
        $this->db->where('id_status!=', '1');
        $data['status'] = $this->db->get('tbl_status_trans')->result();


        $this->db->select('COUNT(id_transaksi) as jumlah');
        $this->db->where('status', '2');
        $data['jumlah'] = $this->db->get('tbl_transaksi')->row();
        $this->load->view('admin/v_history', $data);
        $this->load->view('template/footer');
    }
    public function historyList()
    {
        // POST data
        $postData = $this->input->post();
        // Get data
        $data = $this->M_history->getHistory($postData);

        echo json_encode($data);
    }



    public function editStatus()
    {
        $post = $this->input->post();
        $this->db->set('status', $post['status']);
        $this->db->where('id_transaksi', $post['id_transaksi']);
        $qry = $this->db->update('tbl_transaksi');
        if ($qry) {
            if ($post['status'] == '3') {
                $this->db->where('id_trans', $post['id_transaksi']);
                $cek = $this->db->get('tbl_keranjang')->result();
                foreach ($cek as $c) {
                    $this->db->where('id_produk', $c->id_produk);
                    $cekProduk = $this->db->get('tbl_produk')->row();

                    $this->db->set('stok_produk', $cekProduk->stok_produk - $c->jumlah);
                    $this->db->where('id_produk', $c->id_produk);
                    $cekProduk = $this->db->update('tbl_produk');
                }
            }
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-info" >
                        <p> Status berhasil diubah</p>
                    </div>'
            );
            redirect('Admin/history');
        }
    }

    public function tambahSatuan()
    {
        $post = $this->input->post();
        $this->nama_satuan = $post['nama_satuan'];
        $qry = $this->db->insert('tbl_satuan', $this);
        if ($qry) {
            $this->session->set_flashdata(
                'message2',
                '<div class="alert alert-success" >
                        <p> Status berhasil ditambahkan</p>
                    </div>'
            );
            redirect('Admin/kategori');
        }
    }
    public function hapusSatuan($id_satuan = null)
    {
        $this->db->where('id_satuan', $id_satuan);
        $delete = $this->db->delete('tbl_satuan');
        if ($delete) {
            $this->session->set_flashdata(
                'message2',
                '<div class="alert alert-danger" >
                    <p> Satuan berhasil dihapus</p>
                </div>'
            );
            redirect('Admin/kategori');
        }
    }
    public function editSatuan()
    {
        $post = $this->input->post();
        $this->db->set('nama_satuan', $post['nama_satuan']);
        $this->db->where('id_satuan', $post['id_satuan']);
        $edit = $this->db->update('tbl_satuan');
        if ($edit) {
            $this->session->set_flashdata(
                'message2',
                '<div class="alert alert-info" >
                    <p> Satuan berhasil diubah</p>
                </div>'
            );
            redirect('Admin/kategori');
        }
    }


    public function profile()
    {
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $id_akun = $this->session->userdata('id_akun');


        $this->db->where('id_akun', $id_akun);
        $data['akun'] = $this->db->get('tbl_profile')->row();

        $this->db->where('id_akun', $id_akun);
        $data['user'] = $this->db->get('tbl_akun')->row();
        $this->load->view('admin/v_profile_admin', $data);
        $this->load->view('template/footer');
    }

    public function editProfile()
    {
        $post = $this->input->post();
        $hp = '';

        if (substr(trim($post['no_hp']), 0, 1) == '0') {
            $hp = '+62' . substr(trim($post['no_hp']), 1);
        } else {
            $hp = $post['no_hp'];
        }

        $data = array(
            'nama_lengkap' => $post['nama_lengkap'],
            'no_hp' => $post['no_hp'],
            'alamat' => $post['alamat'],
            'id_akun' => $post['id_akun']

        );
        $this->db->where('id_akun', $post['id_akun']);
        $qry = $this->db->update('tbl_profile', $data);
        if ($qry) {
            $this->session->set_flashdata(
                'message',
                '<div class="container text-center alert alert-success col-md-6" >
                    <p> Profile berhasil diperbarui</p>
                </div>'
            );
            redirect('Admin/profile');
        }
    }

    public function editAdmin()
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
            redirect('Admin/profile');
        }
    }
}
