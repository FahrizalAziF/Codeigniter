<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Perbaikan extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    function index_get() {
        $id = $this->get('id');
        if ($id == '') {
            $kontak = $this->db->get('perbaikan')->result();
        } else {
            $this->db->where('id', $id);
            $kontak = $this->db->get('perbaikan')->result();
        }
        $this->response($kontak, 200);
    }

    //Masukan function selanjutnya disini
    //Mengirim atau menambah data perbaikan baru
    
    function index_post() {
        $data = array(
                    'id'           => $this->post('id'),
                    'nama'          => $this->post('nama'),
                    'no_hp'           => $this->post('no_hp'),
                    'deskripsi'             => $this->post('deskripsi'),
                    'alamat'             => $this->post('alamat'),);
        $insert = $this->db->insert('perbaikan', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}
?>