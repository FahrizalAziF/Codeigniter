<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {

        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {


        $this->load->view('v_login');
        // $this->load->view('template/footer');
    }
    public function cekLogin()
    {
        $post = $this->input->post();
        $username = $post['username'];
        $password = $post['password'];

        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $data = $this->db->get('tbl_akun')->row_array();

        if ($data > 0) {
            if ($data['id_user'] == "1") {
                $data_session = array(
                    'id_user' => $data['id_user'],
                    'id_akun' => $data['id_akun'],
                    'status' => "login"
                );
                $this->session->set_userdata($data_session);
                redirect('home');
            } else if ($data['id_user'] == "2") {
                $this->db->where('id_akun', $data['id_akun']);
                $cek = $this->db->get('tbl_pasar')->row_array();
                $data_session = array(
                    'id_user' => $data['id_user'],
                    'id_akun' => $cek['id_akun'],
                    'id_pasar' => $cek['id_pasar'],
                    'status' => "login"
                );
                $this->session->set_userdata($data_session);
                redirect('Toko');
            } else if ($data['id_user'] == "3") {
                $this->db->where('id_akun', $data['id_akun']);
                $cek = $this->db->get('tbl_toko')->row_array();
                if ($cek['status'] == "Belum Dikonfirmasi") {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="container text-center alert alert-danger col-md-6" >
                            <p> Akun anda belum dikonfirmasi oleh admin</p>
                        </div>'
                    );
                    redirect('Login');
                } else {
                    $data_session = array(
                        'id_user' => $data['id_user'],
                        'id_akun' => $cek['id_akun'],
                        'id_toko' => $cek['id_toko'],
                        'status' => "login"
                    );
                    $this->session->set_userdata($data_session);
                    redirect('Toko/admin_toko');
                }
            } else if ($data['id_user'] == "4") {
                $data_session = array(
                    'id_user' => $data['id_user'],
                    'id_akun' => $data['id_akun'],
                    'username' => $data['username'],
                    'status' => "login"
                );
                $this->session->set_userdata($data_session);
                redirect('Home/');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="container text-center alert alert-danger col-md-6" >
                    <p> Username atau password salah</p>
                </div>'
            );
            redirect('Login');
        }
    }

    function logout()
    {
        $this->session->sess_destroy();

        redirect('Home');
    }
}
