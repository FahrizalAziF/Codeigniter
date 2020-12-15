<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Pasar extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    function index_get()
    {
        $qry = $this->db->get('tbl_pasar')->result();
        if ($qry) {
            $this->response(array("result" => $qry, 200));
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function toko_post()
    {

        $nama_pasar = $this->input->post('nama_pasar');
        $this->db->where('nama_pasar', $nama_pasar);
        $cek = $this->db->get('tbl_pasar')->row_array();

        $this->db->join('tbl_pasar', 'tbl_pasar.id_pasar=tbl_toko.id_pasar');
        $this->db->where('tbl_toko.id_pasar', $cek['id_pasar']);
        $qry = $this->db->get('tbl_toko')->result();

        $this->response(array("result" => $qry, 200));
    }
}
