<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('download');
    }

    public function index()
    {

        $this->load->view('template/header');
        $this->load->view('template/navbar');
        // date_default_timezone_set('Asia/Jakarta');
        // $timeNow = date('H:i:s');
        // // var_dump($timeNow);

        // $timeOpenStart = "06:00:00";
        // $timeOpenEnd = "13:00:00";

        // // echo $timeNow;
        // // echo $timeOpenStart;
        // // echo $timeOpenEnd;

        // if ($timeNow >= $timeOpenStart && $timeNow <= $timeOpenEnd) {


        $data['kategori'] = $this->db->get('tbl_kategori')->result();
        $data['pasar'] = $this->db->get('tbl_pasar')->result();
        $this->load->view('pembeli/v_home', $data);
        // } else {

        //     $this->load->view('template/v_tutup');
        // }
        $this->load->view('template/footer');

        // $this->load->view('v_tutup');

    }

    function downloadApp()
    {
        force_download('E-Pasar Pamekasan.apk', NULL);
    }
}
