<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembeli extends CI_Controller
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
        $this->load->view('v_login');
        $this->load->view('template/footer');
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
        $this->load->view('pembeli/v_profile', $data);
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
                '<div class="alert alert-success" >
                    <p> Profile berhasil diperbarui</p>
                </div>'
            );
            redirect('Pembeli/profile');
        }
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
            redirect('Pembeli/profile');
        }
    }
}
