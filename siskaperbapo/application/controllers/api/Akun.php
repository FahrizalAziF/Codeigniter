<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Akun extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    function index_get($id)
    {
        $this->db->where('id_akun', $id);
        $qry = $this->db->get('tbl_profile')->row_array();
        $this->response($qry, 200);
    }

    public function login_post()
    {
        $post = $this->input->post();
        $username = $post['username'];
        $password = $post['password'];

        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $cek = $this->db->get('tbl_akun')->row_array();

        if ($cek) {
            $this->db->where('id_akun', $cek['id_akun']);
            $qry = $this->db->get('tbl_profile')->row_array();
            $data = array(
                'nama_lengkap' => $qry['nama_lengkap'],
                'no_hp' => $qry['no_hp'],
                'alamat' => $qry['alamat'],
                'id_akun' => $qry['id_akun'],
                'id_profile' => $qry['id_profile'],
                'username' => $cek['username'],
                'password' => $cek['password'],
                'status' => "success"

            );
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }


    function daftar_post()
    {
        $post = $this->input->post();
        $username = $post['username'];
        $this->db->where('username', $username);
        $this->db->where('id_user', "4");
        $cek = $this->db->get('tbl_akun')->row_array();
        if (!$cek) {
            $akun = array(
                'username'           => $this->post('username'),
                'password'          => $this->post('password'),
                'id_user'          => "4",
            );
            $insert = $this->db->insert('tbl_akun', $akun);
            if ($insert) {
                $this->db->order_by('id_akun', 'DESC');
                $cek = $this->db->get('tbl_akun')->row_array();
                $data = array(
                    'nama_lengkap' => $post['nama_lengkap'],
                    'no_hp' => $post['no_hp'],
                    'alamat' => $post['alamat'],
                    'id_akun' => $cek['id_akun'],

                );
                $this->db->insert('tbl_profile', $data);
                $this->response(array('status' => 'berhasil', 200));
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        } else {
            $this->response(array('status' => 'gagal', 502));
        }
    }

    function edit_post()
    {
        $post = $this->input->post();
        $profile = array(
            'id_akun'       => $post['id_akun'],
            'nama_lengkap'          => $post['nama_lengkap'],
            'no_hp'    => $post['no_hp'],
            'alamat'    => $post['alamat'],
            'id_profile'    => $post['id_profile']
        );
        $akun = array(
            'id_akun'       => $post['id_akun'],
            'username'          => $post['username'],
            'password'    => $post['password'],
            'id_user'    => "4"

        );
        $this->db->where('id_akun', $post['id_akun']);
        $update = $this->db->update('tbl_akun', $akun);
        if ($update) {
            $this->db->where('id_akun', $post['id_akun']);
            $update = $this->db->update('tbl_profile', $profile);
            $this->response($akun, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
