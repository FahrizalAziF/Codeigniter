<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar extends CI_Controller
{

    function __construct()
    {

        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {

        $this->load->view('template/header');
        $this->load->view('v_daftar');
    }

    public function addPembeli()
    {

        $post = $this->input->post();
        $hp = '';

        if (substr(trim($post['no_hp']), 0, 1) == '0') {
            $hp = '+62' . substr(trim($post['no_hp']), 1);
        } else {
            $hp = $post['no_hp'];
        }
        $username = $post['username'];
        $this->db->where('username', $username);
        $cek = $this->db->get('tbl_akun')->row_array();
        if (!$cek) {
            $data = array(
                'username' => $username,
                'password' => $post['password'],
                'id_user' => "4",
            );
            $row = $this->db->insert('tbl_akun', $data);
            if ($row) {
                $this->db->order_by('id_akun', 'DESC');
                $cek = $this->db->get('tbl_akun')->row_array();
                $data = array(
                    'nama_lengkap' => $post['nama_lengkap'],
                    'no_hp' => $hp,
                    'alamat' => $post['alamat'],
                    'id_akun' => $cek['id_akun']
                );
                $this->db->insert('tbl_profile', $data);
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success" >
                        <p> Pendaftaran Berhasil</p>
                    </div>'
                );
                redirect('Login');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" >
                    <p> Username ' . $post['username'] . ' telah digunakan </p>
                </div>'
            );
            redirect('Daftar');
        }
    }

    public function daftarAdminToko()
    {
        $this->load->view('template/header');
        $this->load->view('template/navbar');

        $data['pasar'] = $this->db->get('tbl_pasar')->result();
        $this->load->view('admin/v_daftar_admin_toko', $data);
        $this->load->view('template/footer');
    }



    public function addToko()
    {
        $post = $this->input->post();
        $hp = '';

        if (substr(trim($post['no_hp_toko']), 0, 1) == '0') {
            $hp = '+62' . substr(trim($post['no_hp_toko']), 1);
        } else {
            $hp = $post['no_hp_toko'];
        }
        $this->db->where('username', $post['username']);
        $cek = $this->db->get('tbl_akun')->row_array();


        if (!$cek) {
            $data = array(
                'username' => $post['username'],
                'password' => $post['password'],
                'id_user' => '3'
            );
            $akun = $this->db->insert('tbl_akun', $data);
            if ($akun) {
                $this->db->order_by('id_akun', 'DESC');
                $akun = $this->db->get('tbl_akun')->row_array();

                $this->id_pasar = $post['id_pasar'];
                $this->nama_toko = $post['nama_toko'];
                $this->nama_pemilik_toko = $post['nama_pemilik_toko'];
                $this->no_hp_toko = $hp;
                $this->foto_toko =  $this->uploadFoto();
                $this->id_akun = $akun['id_akun'];
                $this->status = "Belum Dikonfirmasi";
                $add = $this->db->insert('tbl_toko', $this);
                if ($add) {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-info" >
                        <p> Berhasil membuat akun, akun akan aktif setelah dikonfirmasi</p>
                    </div>'
                    );
                    redirect('Daftar/daftarAdminToko');
                }
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" >
                    <p> Username ' . $post['username'] . ' telah digunakan </p>
                </div>'
            );
            redirect('Daftar/daftarAdminToko');
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

        if ($this->upload->do_upload('foto_toko')) {
            return $this->upload->data("file_name");
        }

        return "store.png";
    }
}
