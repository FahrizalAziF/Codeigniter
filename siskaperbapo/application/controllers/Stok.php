<?php

use PhpParser\Node\Expr\FuncCall;

defined('BASEPATH') or exit('No direct script access allowed');


class Stok extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('M_produk');
    }

    public function index()
    {
        $id_pasar = $this->session->userdata('id_pasar');
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        // $this->db->where('id_pasar', $id_pasar);
        $data['bahan'] = $this->db->get('tbl_bahan')->result();
        $data['pasar'] = $this->db->get('tbl_pasar')->result();
        $this->load->view('pembeli/v_stok_bahan', $data);
        $this->load->view('template/footer');
    }

    public function stok_pasar()
    {
        $id_pasar = $this->session->userdata('id_pasar');
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
        $this->load->view('template/header');
        $this->load->view('template/navbar');

        $this->db->join('tbl_bahan', 'tbl_bahan.id_kategori=tbl_kategori.id_kategori');
        $this->db->group_by('tbl_bahan.id_kategori');
        // $this->db->where('tbl_bahan.id_pasar', $id_pasar);
        $data['kategori'] = $this->db->get('tbl_kategori')->result();

        // $this->db->where('tbl_bahan.id_pasar', $id_pasar);
        $data['bahan'] = $this->db->get('tbl_bahan')->result();
        $this->load->view('admin/v_stok_bahan', $data);
        $this->load->view('template/footer');
    }

    function get_bahan()
    {
        $id = $this->input->post('id');
        $id_pasar = $this->session->userdata('id_pasar');

        $this->db->where('id_kategori', $id);
        // $this->db->where('id_pasar', $id_pasar);
        $data = $this->db->get('tbl_bahan')->result();
        echo json_encode($data);
    }

    public function stokListAdmin()
    {
        $date = $_GET['date'];
        $id_pasar = $this->session->userdata('id_pasar');

        $kategori = $this->db->get('tbl_kategori')->result();
        //------------------------------------------------------------------------
        $i = 1;
        foreach ($kategori as $k) { ?>
            <tr>
                <th scope="row"><?= $i++ ?></th>
                <td colspan="7"><?= $k->nama_kategori ?></td>
                <?php
                //-----------------------------------------------------------------------------

                $this->db->join('tbl_bahan', 'tbl_bahan.id_bahan=tbl_bahan_stok.id_bahan');
                $this->db->where('tbl_bahan_stok.id_kategori', $k->id_kategori);
                $this->db->where('tbl_bahan_stok.id_pasar', $id_pasar);
                $this->db->where('tgl_input', $date);
                $bahan = $this->db->get('tbl_bahan_stok')->result();
                foreach ($bahan as $b) {
                ?>
            <tr>
                <td></td>
                <td>-<?= $b->nama_bahan ?></td>
                <td><?= $b->jumlah_stok ?></td>
                <!-- <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalEdit<?= $b->id_bahan_stok ?>"><i class="fa fa-pencil"></i> </button> -->
                <td> <a href="<?= base_url('Stok/deleteStok/' . $b->id_bahan_stok) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </a>
                </td>
            </tr>
        <?php } ?>
        </tr>
    <?php } ?>
    <?php }

    public function stokList()
    {
        $date = $_GET['date'];
        $pasar = $_GET['pasar'];
        $kategori = $this->db->get('tbl_kategori')->result();
        //------------------------------------------------------------------------
        $i = 1;
        foreach ($kategori as $k) { ?>
        <tr>
            <th scope="row"><?= $i++ ?></th>
            <td colspan="7"><?= $k->nama_kategori ?></td>
            <?php
            //-----------------------------------------------------------------------------

            // $this->db->join('tbl_satuan', 'tbl_satuan.id_satuan=tbl_bahan_pokok.id_satuan');
            $this->db->join('tbl_bahan', 'tbl_bahan.id_bahan=tbl_bahan_stok.id_bahan');
            $this->db->where('tbl_bahan_stok.id_kategori', $k->id_kategori);
            $this->db->where('tbl_bahan_stok.id_pasar', $pasar);
            $this->db->where('tgl_input', $date);
            $bahan = $this->db->get('tbl_bahan_stok')->result();
            foreach ($bahan as $b) {
            ?>
        <tr>
            <td></td>
            <td>-<?= $b->nama_bahan ?></td>
            <td><?= $b->jumlah_stok ?></td>
        </tr>
    <?php } ?>
    </tr>
<?php } ?>
<?php }

    public function addStok()
    {
        $id_pasar = $this->session->userdata('id_pasar');
        $post = $this->input->post();
        $this->db->where('id_bahan', $post['id_bahan']);
        $cek = $this->db->get('tbl_bahan')->row();
        //-----------------------------------------------

        $this->id_bahan = $post['id_bahan'];
        $this->jumlah_stok = $post['jumlah_stok'];
        $this->id_kategori = $cek->id_kategori;
        $this->id_pasar = $id_pasar;
        $this->tgl_input = date("Y-m-d");

        $qry = $this->db->insert('tbl_bahan_stok', $this);
        if ($qry) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" >
                <p> Data berhasil ditambahkan</p>
            </div>'
            );
            redirect('Stok/stok_pasar');
        }
    }
    public function deleteStok($id = null)
    {
        $this->db->where('id_bahan_stok', $id);
        $qry = $this->db->delete('tbl_bahan_stok');
        if ($qry) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger col-md-12" >
                    <p> Data berhasil dihapus</p>
                </div>'
            );
            redirect('Stok/stok_pasar');
        }
    }
}
