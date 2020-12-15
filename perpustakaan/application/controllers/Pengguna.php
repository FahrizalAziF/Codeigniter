<?php
class Pengguna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
        $this->load->model('M_buku');
        $this->load->model('m_login');
        $this->load->model('M_koleksi');
        $this->load->model('M_saran');

        $this->load->helper('url');
        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {

        $this->load->view('admin/login');
    }
    public function baca()
    {
        $pembaca = $this->input->post('pembaca') + 1;
        $id_buku = $this->input->post('id_buku');


        $this->db->set('pembaca', $pembaca);
        $this->db->where('id_buku', $id_buku);
        $this->db->update('buku');

        $data['buku'] = $this->db->get_where('buku', ['id_buku' => $id_buku])->row();

        if (!$data['buku']) {
            redirect('../pengguna/beranda');
        } else {
            $this->load->view('pengguna/pdf', $data);
        }
    }

    public function pdf()
    {

        $this->load->view('pengguna/hasil');
    }

    public function akun()
    {
        $status = $this->session->userdata('status');
        if (!$status) {
            $this->session->unset_userdata('username');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
            redirect('../');
        } else {
            $data["akun"] = $this->M_user->getAkun();
            $data["akn"] = $this->M_user->getAkun();
            $data["pass"] = $this->M_user->getAkun();
            $this->load->view('pengguna/akun', $data);
        }
    }

    public function beranda()
    {
        $status = $this->session->userdata('status');
        if (!$status) {
            $this->session->unset_userdata('username');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
            redirect('../');
        } else {
            $data['kategori'] = $this->db->get('kategori')->result();
            $data["srn"] = $this->M_saran->getLimit();
            $data["baru"] = $this->M_buku->getBukuBaru();
            $data["favorit"] = $this->M_buku->getBukuFavorit();
            $this->load->view('pengguna/index', $data);
        }
    }



    /*---------------------------------------------Pagination------------------------*/
    public function terbaru()

    {
        $this->load->library('pagination');
        $jumlah_data = $this->M_buku->getBaru();
        $config['base_url'] = base_url() . 'pengguna/terbaru/';
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 6;
        $from = $this->uri->segment(3);
        $config['full_tag_open']   = '<ul class="pagination pagination-sm m-t-xs m-b-xs">';
        $config['full_tag_close']  = '</ul>';

        $config['first_link']      = 'First';
        $config['first_tag_open']  = '<li>';
        $config['first_tag_close'] = '</li>';

        $config['last_link']       = 'Last';
        $config['last_tag_open']   = '<li>';
        $config['last_tag_close']  = '</li>';

        $config['next_link']       = ' <i class="fa fa-angle-double-right"></i> ';
        $config['next_tag_open']   = '<li>';
        $config['next_tag_close']  = '</li>';

        $config['prev_link']       = ' <i class="fa fa-angle-double-left"></i> ';
        $config['prev_tag_open']   = '<li>';
        $config['prev_tag_close']  = '</li>';

        $config['cur_tag_open']    = '<li class="active"><a href="#">';
        $config['cur_tag_close']   = '</a></li>';

        $config['num_tag_open']    = '<li>';
        $config['num_tag_close']   = '</li>';
        $this->pagination->initialize($config);
        $data['baru'] = $this->M_buku->dataBaru($config['per_page'], $from);
        $this->load->view('pengguna/terbaru', $data);
    }

    public function terfavorit()

    {
        $this->load->library('pagination');
        $jumlah_data = $this->M_buku->getFavorit();
        $config['base_url'] = base_url() . 'pengguna/terfavorit/';
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 6;
        $from = $this->uri->segment(3);
        $config['full_tag_open']   = '<ul class="pagination pagination-sm m-t-xs m-b-xs">';
        $config['full_tag_close']  = '</ul>';

        $config['first_link']      = 'First';
        $config['first_tag_open']  = '<li>';
        $config['first_tag_close'] = '</li>';

        $config['last_link']       = 'Last';
        $config['last_tag_open']   = '<li>';
        $config['last_tag_close']  = '</li>';

        $config['next_link']       = ' <i class="fa fa-angle-double-right"></i> ';
        $config['next_tag_open']   = '<li>';
        $config['next_tag_close']  = '</li>';

        $config['prev_link']       = ' <i class="fa fa-angle-double-left"></i> ';
        $config['prev_tag_open']   = '<li>';
        $config['prev_tag_close']  = '</li>';

        $config['cur_tag_open']    = '<li class="active"><a href="#">';
        $config['cur_tag_close']   = '</a></li>';

        $config['num_tag_open']    = '<li>';
        $config['num_tag_close']   = '</li>';
        $this->pagination->initialize($config);
        $data['favorit'] = $this->M_buku->dataFavorit($config['per_page'], $from);
        $this->load->view('pengguna/terfavorit', $data);
    }

    public function saran_buku()

    {
        $this->load->library('pagination');
        $jumlah_data = $this->M_saran->getAll();
        $config['base_url'] = base_url() . 'pengguna/saran_buku/';
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 6;
        $from = $this->uri->segment(3);
        $config['full_tag_open']   = '<ul class="pagination pagination-sm m-t-xs m-b-xs">';
        $config['full_tag_close']  = '</ul>';

        $config['first_link']      = 'First';
        $config['first_tag_open']  = '<li>';
        $config['first_tag_close'] = '</li>';

        $config['last_link']       = 'Last';
        $config['last_tag_open']   = '<li>';
        $config['last_tag_close']  = '</li>';

        $config['next_link']       = ' <i class="fa fa-angle-double-right"></i> ';
        $config['next_tag_open']   = '<li>';
        $config['next_tag_close']  = '</li>';

        $config['prev_link']       = ' <i class="fa fa-angle-double-left"></i> ';
        $config['prev_tag_open']   = '<li>';
        $config['prev_tag_close']  = '</li>';

        $config['cur_tag_open']    = '<li class="active"><a href="#">';
        $config['cur_tag_close']   = '</a></li>';

        $config['num_tag_open']    = '<li>';
        $config['num_tag_close']   = '</li>';
        $this->pagination->initialize($config);
        $data['saran'] = $this->M_saran->dataBaru($config['per_page'], $from);
        $this->load->view('pengguna/saran_buku', $data);
    }
    /*---------------------------------------------End Pagination------------------------*/

    public function pembaca()
    {
        $id_buku = $this->input->post('id_buku');
        $this->M_buku->countRead();
        redirect('../pengguna/detail/' . $id_buku);
    }
    public function cari()
    {
        $keyword = $this->input->post('keyword');
        $data['buku'] = $this->M_buku->getSearch($keyword);
        $this->load->view('pengguna/search', $data);
    }

    public function detail($id = null)
    {
        $product = $this->M_buku;
        $data["dtl"] = $product->getId($id);
        if (!$data["dtl"]) show_404();

        $this->load->view('pengguna/detail', $data);
    }

    public function koleksi($nama = null)
    {
        $koleksi = $this->M_koleksi;

        $data["koleksi"] = $koleksi->getAll($nama);
        $data["total"] = $koleksi->jumKoleksi($nama);
        $data["kol"] = $koleksi->getAll($nama);
        if (!$data["koleksi"]) {
            $this->load->view('pengguna/koleksi_kosong');
        } else {
            $this->load->view('pengguna/koleksi_saya', $data);
        }
        /**/
    }

    public function delete()
    {
        $id_user = $this->input->post('id_user');
        $id_buku = $this->input->post('id_buku');
        $id_user = $this->input->post('id_user');
        if (!isset($id_buku)) show_404();
        if ($this->M_koleksi->delete($id_buku)) {
            $this->session->set_flashdata(
                'delete',
                '
                <div class="container" style="margin:10px;">
                <p class="alert alert-danger col-md-10 col-xs-10"> Buku dihapus dari koleksi!</p>
                </div>
            '
            );
            redirect(site_url('../pengguna/koleksi/' . $id_user));
        }
    }

    function add_saran()
    {
        $product = $this->M_saran->saveSaran();


        if ($product) {
            $this->session->set_flashdata(
                'msg',
                '<div class="alert alert-success">
                    <p> Berhasil Ditambahkan</p>
                </div>'
            );
        }
        redirect('pengguna/beranda');
    }

    function ubahAkun()
    {
        $product = $this->M_user->editAkun();


        if ($product) {
            $this->session->set_flashdata(
                'ubah',
                '<div class="alert alert-success">
                    <p> Data Berhasil Diperbarui</p>
                </div>'
            );
        }
        redirect('pengguna/akun');
    }

    public function tambahKoleksi()
    {
        $id_user = $this->input->post('id_user');
        $id_buku = $this->input->post('id_buku');
        $where = array(
            'id_user' => $id_user,
            'id_buku' => $id_buku
        );
        $query =  $this->M_koleksi->addKoleksi("koleksi", $where)->num_rows();
        if ($query > 0) {

            $this->session->set_flashdata(
                'sudah',
                '<div class="alert alert-danger">
                    <p> Buku sudah ada!</p>
                </div>'
            );
            redirect('../pengguna/detail/' . $id_buku);
        } else {
            $this->M_koleksi->saveKoleksi();
            $data["jumlah"] = $this->M_koleksi->jumKoleksi($id_user);

            redirect('../pengguna/koleksi/' . $id_user);
        }

        /*$user = $this->M_koleksi;
        $validation = $this->form_validation;
        $validation->set_rules($user->rules());
        if ($validation->run()) {
            $user->addKoleksi();
            echo "<script>
		    alert('Buku ditambahkan ke koleksi!');
            </script>";
            $this->load->view('pengguna/koleksi_saya');
        }*/
    }

    public function kategori($id = null)
    {
        $product = $this->M_buku;
        $data["kategori"] = $product->getKategori($id);
        $data["jumlah"] = $product->getJumKategori($id);
        $data["jdl"] = $product->getJudulKategori($id);
        if (!$data["kategori"]) {
            $this->load->view('pengguna/buku_kosong');
        } else {

            $this->load->view('pengguna/kategori', $data);
        }
    }

    public function baru($id = null)
    {
        $product = $this->M_buku;
        $data["alquran"] = $product->getFavoritKategori($id);
        $this->load->view('pengguna/baru', $data);
    }

    public function sering_dibaca($id = null)
    {
        $product = $this->M_buku;
        $data["baca"] = $product->getBaruQuran($id);
        $this->load->view('pengguna/sering_dibaca', $data);
    }



    public function daftar()
    {
        $user = $this->M_user;
        $validation = $this->form_validation;
        $validation->set_rules($user->rules());

        if ($validation->run()) {
            $user->daftar();
            $this->session->set_flashdata(
                'daftar',
                '
                    <p class="alert alert-success"> Pendaftaran berhasil !</p>
                '
            );
            redirect('');
        }
    }


    public function ubahPassword()
    {
        $id_user = $this->input->post('id_user');
        $password = $this->input->post('password');

        if ($id_user) {
            $this->db->set('password', $password);
            $this->db->where('id_user', $id_user);
            $this->db->update('users');
            $this->session->set_flashdata(
                'brhsl',
                '<div class="alert alert-danger">
                    <p>Password telah diperbarui</p>
                </div>'
            );
        }
        redirect('pengguna/logout');
    }



    function aksi_login()
    {
        $nama_depan = $this->input->post('nim');
        $password = $this->input->post('password');
        $where = array(
            'NIS' => $nama_depan,
            'password' => $password
        );
        $or_where = array(
            'NIK' => $nama_depan,
            'password' => $password
        );


        $cek = $this->m_login->cek_login("users", $where);
        $cek1 = $this->m_login->cek_login2("users", $or_where);
        $id_fakultas = $cek['id_fakultas'];

        $pengunjung = $this->db->get_where('fakultas', ['id_fakultas' => $id_fakultas])->row_array();
        $jumlah = $pengunjung['jumlah'];





        if ($cek > 0) {
            if ($cek['level'] == 1) {
                $data_session = array(
                    //  '' => $nama_depan,
                    'id_user' => $cek['id_user'],
                    'nama_depan' => $cek['nama_depan'],
                    'status' => "login"
                );


                $this->db->set('jumlah', $jumlah + 1);
                $this->db->where('id_fakultas', $id_fakultas);
                $this->db->update('fakultas');

                $umum = $this->db->get_where('pengunjung', ['level' => $cek['level']])->row_array();
                $jmlh = $umum['jumlah'];

                $this->db->set('jumlah', $jmlh + 1);
                $this->db->where('level', $cek['level']);
                $this->db->update('pengunjung');

                $this->session->set_userdata($data_session);
                redirect('../pengguna/beranda');
            }
        } else if ($cek1 > 0) {
            if ($cek1['level'] == 2) {
                $data_session = array(
                    'id_user' => $cek1['id_user'],
                    'nama_depan' => $cek1['nama_depan'],
                    'status' => "login"
                );

                $umum = $this->db->get_where('pengunjung', ['level' => $cek1['level']])->row_array();
                $jmlh1 = $umum['jumlah'];

                $this->db->set('jumlah', $jmlh1 + 1);
                $this->db->where('level', $cek1['level']);
                $this->db->update('pengunjung');

                $this->session->set_userdata($data_session);
                redirect('../pengguna/beranda');
            } elseif ($cek1['level'] == 3) {
                $data_session = array(
                    'nama_depan' => $cek1['NIK'],
                    'status' => "login"
                );

                $this->session->set_userdata($data_session);

                redirect('../admin/index');
            }
        } else {
            $this->session->set_flashdata(
                'msg',
                '<div class="alert alert-danger">
                    <p> Username atau Password salah</p>
                </div>'
            );
            redirect('');
        }
    }
    function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('../');
    }
}
