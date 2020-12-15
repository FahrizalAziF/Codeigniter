<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class User extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data user
    function index_get() {
        $id = $this->get('id_user');
        if ($id == '') {
            $kontak = $this->db->get('user')->result();
        } else {
            $this->db->where('id_user', $id);
            $kontak = $this->db->get('user')->result();
        }
        $this->response($kontak, 200);
    }


    //Mengirim atau menambah data user baru
    function index_post() {
        $data = array(
                    'id_user'           => $this->post('id_user'),
                    'username'          => $this->post('username'),
                    'password'           => $this->post('password'),
                    'email'             => $this->post('email'));
        $insert = $this->db->insert('user', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    
    //Masukan function selanjutnya disini
}
?>