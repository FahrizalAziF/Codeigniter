<?php

use PhpParser\Node\Expr\FuncCall;

defined('BASEPATH') or exit('No direct script access allowed');


class Pasar extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('M_produk');
    }



    public function toko_pasar($id_pasar = null)
    {
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->db->select('COUNT(id_toko)as jml,nama_pasar');
        $this->db->join('tbl_toko', 'tbl_toko.id_pasar=tbl_pasar.id_pasar');
        $this->db->where('tbl_pasar.id_pasar', $id_pasar);
        $data['pasar'] = $this->db->get('tbl_pasar')->row();

        $this->db->where('status', 'Telah Dikonfirmasi');
        $this->db->where('id_pasar', $id_pasar);
        $data['toko'] = $this->db->get('tbl_toko')->result();

        $this->load->view('pembeli/v_pasar', $data);
        $this->load->view('template/footer');
    }

    public function produk_toko($id_toko = null)
    {
        $this->load->view('template/header');
        $this->load->view('template/navbar');

        $this->db->select('COUNT(id_produk)as jml,nama_toko');
        $this->db->join('tbl_produk', 'tbl_produk.id_toko=tbl_toko.id_toko');
        $this->db->where('tbl_toko.id_toko', $id_toko);
        $data['toko'] = $this->db->get('tbl_toko')->row();


        $this->db->join('tbl_produk', 'tbl_produk.id_toko=tbl_toko.id_toko');
        $this->db->where('tbl_toko.id_toko', $id_toko);
        $data['produk'] = $this->db->get('tbl_toko')->result();

        $this->load->view('pembeli/v_toko', $data);
        $this->load->view('template/footer');
    }


    public function harga_pasar()
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
        $data['kategori'] = $this->db->get('tbl_kategori')->result();

        $this->db->where('id_pasar', $id_pasar);
        $data['pokok'] = $this->db->get('tbl_bahan_pokok')->result();
        $this->load->view('admin/v_harga_pasar', $data);
        $this->load->view('template/footer');
    }

    function get_bahan()
    {
        $id = $this->input->post('id');


        $this->db->group_by('id_bahan');
        $this->db->where('id_kategori', $id);
        $data = $this->db->get('tbl_bahan')->result();
        echo json_encode($data);
    }



    public function harga_perpasar()
    {
        $id_pasar = $this->session->userdata('id_pasar');
        $this->load->view('template/header');
        $this->load->view('template/navbar');


        $data['bahan'] = $this->db->get('tbl_bahan')->result();

        $data['pasar'] = $this->db->get('tbl_pasar')->result();


        $data['pokok'] = $this->db->get('tbl_bahan_pokok')->result();
        $this->load->view('pembeli/v_harga_pasar', $data);
        $this->load->view('template/footer');
    }

    public function addHarga()
    {
        $id_pasar = $this->session->userdata('id_pasar');
        $post = $this->input->post();
        $this->db->where('id_bahan', $post['id_bahan']);
        $cek = $this->db->get('tbl_bahan')->row();
        //-----------------------------------------------

        $this->id_bahan = $post['id_bahan'];
        $this->harga_bahan = $post['harga_bahan'];
        $this->id_satuan = $cek->id_satuan;
        $this->id_kategori = $cek->id_kategori;
        $this->id_pasar = $id_pasar;
        $this->tgl_input = $post['tgl_input'];

        $qry = $this->db->insert('tbl_bahan_pokok', $this);
        if ($qry) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" >
                    <p> Data berhasil ditambahkan</p>
                </div>'
            );
            redirect('Pasar/harga_pasar');
        }
    }

    public function cetakHarga()
    {
        $post = $this->input->post();
        $data['tgl_input'] = $post['tgl_input'];
        $data['id_pasar'] = $post['id_pasar'];
        $this->db->where('id_pasar', $post['id_pasar']);
        $data['pasar'] = $this->db->get('tbl_pasar')->row();
        $this->load->view('v_cetak_harga', $data);
    }

    public function hargaList()
    {
        $date = $_GET['date'];
        $id_pasar = $this->session->userdata('id_pasar');
        $tgl = date('Y-m-d', strtotime('-1 days', strtotime($date)));
        $kategori = $this->db->get('tbl_kategori')->result();
        //------------------------------------------------------------------------
        $i = 1;
        foreach ($kategori as $k) { ?>
            <tr>
                <th scope="row"><?= $i++ ?></th>
                <td colspan="7"><?= $k->nama_kategori ?></td>
                <?php
                //-----------------------------------------------------------------------------

                $this->db->join('tbl_satuan', 'tbl_satuan.id_satuan=tbl_bahan_pokok.id_satuan');
                $this->db->join('tbl_bahan', 'tbl_bahan.id_bahan=tbl_bahan_pokok.id_bahan');
                $this->db->where('tbl_bahan_pokok.id_kategori', $k->id_kategori);
                $this->db->where('tbl_bahan_pokok.id_pasar', $id_pasar);
                $this->db->where('tgl_input', $date);
                $bahan = $this->db->get('tbl_bahan_pokok')->result();
                foreach ($bahan as $b) {
                    $this->db->where('id_kategori', $k->id_kategori);
                    $this->db->where('id_pasar', $id_pasar);
                    $this->db->where('tgl_input', $tgl);
                    $this->db->where('id_bahan', $b->id_bahan);
                    $prev = $this->db->get('tbl_bahan_pokok')->row_array();
                ?>
            <tr>
                <td></td>
                <td>-<?= $b->nama_bahan ?></td>
                <td><?= $b->nama_satuan ?></td>
                <td>Rp. <?= number_format($prev['harga_bahan'], 0, ',', '.') ?></td>
                <td>Rp. <?= number_format($b->harga_bahan, 0, ',', '.') ?></td>
                <td>Rp. <?= number_format($b->harga_bahan - $prev['harga_bahan'], 0, ',', '.') ?></td>
                <td <?php
                    if ($prev['harga_bahan'] < $b->harga_bahan) {
                    ?> style="color:red" <?php
                                        } else if ($prev['harga_bahan'] > $b->harga_bahan) {
                                            ?> style="color:green<?php } ?>"><b><?php
                                                                                $jml = ($b->harga_bahan - $prev['harga_bahan']);
                                                                                if ($prev['harga_bahan'] > 0) {
                                                                                    $q = ($jml / $prev['harga_bahan']) * 100;
                                                                                    echo round($q);
                                                                                } else {
                                                                                    echo "100";
                                                                                }

                                                                                ?>%</b></td>
                <!-- <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalEdit<?= $b->id_bahan_pokok ?>"><i class="fa fa-pencil"></i> </button> -->
                <td> <a href="<?= base_url('Pasar/deletePokok/' . $b->id_bahan_pokok) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </a>
                </td>
            </tr>
        <?php } ?>
        </tr>
    <?php } ?>
    <?php }

    public function hargaPasar()
    {
        $date = $_GET['date'];
        $pasar = $_GET['pasar'];
        // $id_pasar = $this->session->userdata('id_pasar');
        $tgl = date('Y-m-d', strtotime('-1 days', strtotime($date)));
        $kategori = $this->db->get('tbl_kategori')->result();
        //------------------------------------------------------------------------
        $i = 1;
        foreach ($kategori as $k) { ?>
        <tr>
            <th scope="row"><?= $i++ ?></th>
            <td colspan="7"><?= $k->nama_kategori ?></td>
            <?php
            //-----------------------------------------------------------------------------

            $this->db->join('tbl_satuan', 'tbl_satuan.id_satuan=tbl_bahan_pokok.id_satuan');
            $this->db->join('tbl_bahan', 'tbl_bahan.id_bahan=tbl_bahan_pokok.id_bahan');
            $this->db->where('tbl_bahan_pokok.id_kategori', $k->id_kategori);
            $this->db->where('tbl_bahan_pokok.id_pasar', $pasar);
            $this->db->where('tgl_input', $date);
            $bahan = $this->db->get('tbl_bahan_pokok')->result();
            foreach ($bahan as $b) {
                $this->db->where('id_kategori', $k->id_kategori);
                $this->db->where('id_pasar', $pasar);
                $this->db->where('tgl_input', $tgl);
                $this->db->where('id_bahan', $b->id_bahan);
                $prev = $this->db->get('tbl_bahan_pokok')->row_array();
            ?>
        <tr>
            <td></td>
            <td>-<?= $b->nama_bahan ?></td>
            <td><?= $b->nama_satuan ?></td>
            <td>Rp. <?= number_format($prev['harga_bahan'], 0, ',', '.') ?></td>
            <td>Rp. <?= number_format($b->harga_bahan, 0, ',', '.') ?></td>
            <td>Rp. <?= number_format($b->harga_bahan - $prev['harga_bahan'], 0, ',', '.') ?></td>
            <td <?php
                if ($prev['harga_bahan'] < $b->harga_bahan) {
                ?> style="color:red" <?php
                                    } else if ($prev['harga_bahan'] > $b->harga_bahan) {
                                        ?> style="color:green<?php } ?>"><b><?php
                                                                            $jml = ($b->harga_bahan - $prev['harga_bahan']);
                                                                            if ($prev['harga_bahan'] > 0) {
                                                                                $q = ($jml / $prev['harga_bahan']) * 100;
                                                                                echo round($q);
                                                                            } else {
                                                                                echo "100";
                                                                            }

                                                                            ?>%</b></td>
            <!-- <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalEdit<?= $b->id_bahan_pokok ?>"><i class="fa fa-pencil"></i> </button> -->
        </tr>
    <?php } ?>
    </tr>
<?php } ?>
<?php }

    public function bahan()
    {

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

        $data['kategori'] = $this->db->get('tbl_kategori')->result();
        $data['satuan'] = $this->db->get('tbl_satuan')->result();

        $this->load->view('admin/v_bahan', $data);
        $this->load->view('template/footer');
    }

    public function addBahan()
    {
        $post = $this->input->post();
        $this->nama_bahan = $post['nama_bahan'];
        $this->id_kategori = $post['id_kategori'];
        $this->id_satuan = $post['id_satuan'];
        $qry = $this->db->insert('tbl_bahan', $this);
        if ($qry) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" >
                    <p> Bahan berhasil ditambahkan</p>
                </div>'
            );
            redirect('Pasar/bahan');
        }
    }
    public function editBahan()
    {
        $post = $this->input->post();
        $this->db->set('nama_bahan', $post['nama_bahan']);
        $this->db->set('id_satuan', $post['id_satuan']);
        $this->db->where('id_bahan', $post['id_bahan']);
        $qry = $this->db->update('tbl_bahan');
        if ($qry) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" >
                    <p> Bahan berhasil diubah</p>
                </div>'
            );
            redirect('Pasar/bahan');
        }
    }
    public function deleteBahan($id = null)
    {

        $this->db->where('id_bahan', $id);
        $bahan = $this->db->delete('tbl_bahan_pokok');

        $this->db->where('id_bahan', $id);
        $qry = $this->db->delete('tbl_bahan');
        if ($qry) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger " >
                    <p> Bahan berhasil dihapus</p>
                </div>'
            );
            redirect('Pasar/bahan');
        }
    }

    public function deletePokok($id = null)
    {
        $this->db->where('id_bahan_pokok', $id);
        $qry = $this->db->delete('tbl_bahan_pokok');
        if ($qry) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger col-md-12" >
                    <p> Data berhasil dihapus</p>
                </div>'
            );
            redirect('Pasar/harga_pasar');
        }
    }

    public function grafik_harga()
    {

        $id = $this->input->post('id');
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->db->select('SUM(harga_bahan) as jmlh,nama_bahan');
        $this->db->join('tbl_bahan', 'tbl_bahan.id_bahan=tbl_bahan_pokok.id_bahan');
        $this->db->group_by('tbl_bahan_pokok.id_bahan');
        $this->db->where('tgl_input', $id);
        $data['qry'] = $this->db->get('tbl_bahan_pokok')->result();

        $data['pasar'] = $this->db->get('tbl_pasar')->result();
        $data['kategori'] = $this->db->get('tbl_kategori')->result();
        $this->load->view('pembeli/v_grafik_harga', $data);
        $this->load->view('template/footer');
    }

    public function grafikHarga()
    {
        $json = array();
        $id = $_GET['date'];
        $tgl2 = date('Y-m-d', strtotime('-3 days', strtotime($id)));
        $bahan = $_GET['bahan'];


        $this->db->join('tbl_bahan', 'tbl_bahan.id_bahan=tbl_bahan_pokok.id_bahan');
        $this->db->join('tbl_pasar', 'tbl_pasar.id_pasar=tbl_bahan_pokok.id_pasar');
        $this->db->where('tbl_bahan_pokok.id_bahan', $bahan);
        $this->db->group_by('tbl_bahan_pokok.id_pasar');
        $qry = $this->db->get('tbl_bahan_pokok')->result();
        foreach ($qry as $q) {
            $jml = array();
            // $tgl = array();
            $this->db->select('harga_bahan as jmlh,tgl_input');
            $this->db->group_by('id_pasar');
            $this->db->group_by('tgl_input');
            $this->db->where('tgl_input >=', $tgl2);
            $this->db->where('tgl_input <=', $id);
            $this->db->where('id_pasar', $q->id_pasar);
            $this->db->where('tbl_bahan_pokok.id_pasar', $q->id_pasar);
            $a = $this->db->get('tbl_bahan_pokok')->result();
            foreach ($a as $b) {
                $jml[] = $b->jmlh;
                // $tgl[] = $b->tgl_input;
            }


            $series[] = array(
                'name' => $q->nama_pasar,
                'data' => $jml
            );
        }
        $this->db->select('tgl_input');
        $this->db->group_by('tgl_input');
        $this->db->where('tgl_input >=', $tgl2);
        $this->db->where('tgl_input <=', $id);
        $c = $this->db->get('tbl_bahan_pokok')->result();

        foreach ($c as $d) {
            $tgl[] = $d->tgl_input;
        }
        $xAxis = array(
            'categories' => $tgl
        );
        $data = array(
            'series' => $series,
            'xAxis' => $xAxis
        );
        echo json_encode($data, JSON_NUMERIC_CHECK);
        // print_r($this->db->last_query());
    }

    public function display_harga()
    {
        header('Cache-Control: no-cache, must-revalidate, max-age=0');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');

        $this->load->view('template/header');
        $this->load->view('template/navbar');

        $post = $this->input->post();
        $data['date'] = $post['tgl_input'];
        $data['id_pasar'] = $post['id_pasar'];
        $data['qry'] = $this->db->get('tbl_bahan_pokok')->result();
        $data['pasar'] = $this->db->get('tbl_pasar')->result();
        $data['kategori'] = $this->db->get('tbl_kategori')->result();
        $this->db->join('tbl_bahan', 'tbl_bahan.id_bahan=tbl_bahan_pokok.id_bahan');
        $this->db->join('tbl_satuan', 'tbl_satuan.id_satuan=tbl_bahan_pokok.id_satuan');
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori=tbl_bahan_pokok.id_kategori');
        $this->db->where('tbl_bahan_pokok.id_pasar', $post['id_pasar']);
        $this->db->where('tgl_input', $post['tgl_input']);
        $data['bahan'] = $this->db->get('tbl_bahan_pokok')->result();
        $this->load->view('pembeli/v_display_harga', $data);
        // $this->load->view('template/footer');
    }

    public function tesChart()
    {

        $series = array(
            array(
                'name' => 'Tokyo',
                'data' => array(7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6)
            ),
            array(
                'name' => 'New York',
                'data' => array(-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5)
            ),
            array(
                'name' => 'Berlin',
                'data' => array(-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0)
            ),
            array(
                'name' => 'London',
                'data' => array(3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8)
            )
        );

        $xAxis = array(
            'categories' => array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec')
        );

        $data = array(
            'series' => $series,
            'xAxis' => $xAxis
        );

        echo json_encode($data);
    }
}
