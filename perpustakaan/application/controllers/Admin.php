<?php
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_buku');
        $this->load->model('M_fakultas');
        $this->load->model('M_chart');
        $this->load->model('m_login');
        $this->load->model('M_user');
        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
    }


    public function index()
    {
        $status = $this->session->userdata('status');
        if (!$status) {
            $this->session->unset_userdata('username');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
            redirect('../');
        } else {

            $data["chart"] = $this->M_chart->getMhs();
            $data["umum"] = $this->M_chart->getKoleksi();
            $data["buku"] = $this->M_chart->getBuku();
            //$data["siswa"] = $this->M_user->getCountSiswa();
            // $data["masyarakat"] = $this->M_user->getCountMasyarakat();
            $data["jum_buku"] = $this->M_buku->getJumBuku();
            $this->load->view('admin/index', $data);
        }
    }
    //----------------Tampil Buku-------------------//

    function getKategori($id_kategori)
    {
        $data["buku"] = $this->M_buku->getIdKategori($id_kategori);
        $this->load->view('admin/data_buku', $data);
    }

    function al_quran()
    {
        $data["alquran"] = $this->M_buku->getAlquran();
        $this->load->view('admin/al_quran', $data);
    }

    function aqidah()
    {
        $data["aqidah"] = $this->M_buku->getAqidah();
        $this->load->view('admin/aqidah', $data);
    }

    function hadist()
    {
        $data["hadist"] = $this->M_buku->getHadist();
        $this->load->view('admin/hadist', $data);
    }

    function adminPerpus()
    {
        $ab =  $this->session->userdata('nama_depan');
        $this->db->where('level=3');
        $this->db->where('NIK !=', $ab);
        $data['admin'] = $this->db->get('users')->result();
        $this->load->view('admin/admin', $data);
    }



    public function kategori()
    {
        $kategori = $this->input->post('kategori');


        $data = array(
            'kategori' => $kategori
        );
        $tambah = $this->db->insert('kategori', $data);
        if ($tambah) {
            $this->session->set_flashdata(
                'tambah',
                '
                    <p class="alert alert-success col-md-10 col-xs-10"> Kategori baru ditambahkan!</p>
                '
            );
        }
        redirect('Admin/tambah_buku');
    }
    public function kategori_list()
    {
        $kategori = $this->input->post('kategori');


        $data = array(
            'kategori' => $kategori
        );
        $tambah = $this->db->insert('kategori', $data);
        if ($tambah) {
            $this->session->set_flashdata(
                'tambah',
                '
                    <p class="alert alert-success col-md-10 col-xs-10"> Kategori baru ditambahkan!</p>
                '
            );
        }
        redirect('Admin/list_kategori');
    }

    public function lokasi()
    {
        $this->load->view('admin/lokasi');
    }

    public function addFakultas()
    {
        $load = $this->M_fakultas;
        $validation = $this->form_validation;
        $validation->set_rules($load->rules());


        if ($validation->run()) {
            $load->saveFakultas();
            $this->session->set_flashdata('success', 'Prodi ditambahkan');
        }
        redirect('admin/fakultas');
    }

    public function delProdi($id)
    {
        if (!isset($id)) show_404();
        if ($this->M_fakultas->delete($id)) {
            $this->session->set_flashdata(
                'delete',
                '
                    <p class="alert alert-danger col-md-10 col-xs-10"> Prodi dihapus!</p>
                '
            );
            redirect(site_url('admin/fakultas'));
        }
    }

    public function delAdmin($id)
    {
        if (!isset($id)) show_404();
        if ($this->M_user->hapusAdmin($id)) {
            $this->session->set_flashdata(
                'delete',
                '
                    <p class="alert alert-danger col-md-6 col-xs-12"> Admin dihapus!</p>
                '
            );
            redirect('admin/adminPerpus');
        }
    }

    public function delMhs($id)
    {
        if (!isset($id)) show_404();
        if ($this->M_user->hapusMhs($id)) {
            $this->session->set_flashdata(
                'delete',
                '
                    <p class="alert alert-danger col-md-6 col-xs-12"> Mahasiswa dihapus!</p>
                '
            );
            redirect('admin/siswa');
        }
    }

    public function delMas($id)
    {
        if (!isset($id)) show_404();
        if ($this->M_user->hapusMas($id)) {
            $this->session->set_flashdata(
                'delete',
                '
                    <p class="alert alert-danger col-md-6 col-xs-12"> Masyarakat dihapus!</p>
                '
            );
            redirect('admin/masyarakat');
        }
    }

    public function fakultas()
    {

        $data['fakultas'] = $this->db->get('fakultas')->result();
        $this->load->view('admin/fakultas', $data);
    }




    //---------------Edit----------------------------//
    public function edit($id = null)
    {


        $product = $this->M_buku;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->update();
            $this->session->set_flashdata(
                'ubah',
                '
                    <p class="alert alert-danger col-md-10 col-xs-10"> Berhasil merubah!</p>
                '
            );
            redirect('admin/al_quran');
        }

        $data["a"] = $product->getId($id);
        if (!$data["a"]) show_404();

        $this->load->view("admin/edit_buku", $data);
    }
    //---------------End Buku------------------------//
    public function delete($id = null)
    {
        if (!isset($id)) show_404();
        if ($this->M_buku->delete($id)) {
            $this->session->set_flashdata(
                'delete',
                '
                    <p class="alert alert-danger col-md-10 col-xs-10"> Buku dihapus!</p>
                '
            );
            redirect(site_url('admin/al_quran'));
        }
    }
    //------------------Buku-------------------------//
    function tambah_buku()
    {
        $data["kategori"] = $this->db->get('kategori')->result();
        $this->load->view('admin/tambah_buku', $data);
    }

    function list_kategori()
    {

        $data["kat"] = $this->db->get('kategori')->result();
        $data["list"] = $this->db->get('kategori')->result();
        $this->load->view('admin/kategori', $data);
    }




    function del_kategori($id_kategori = null)
    {
        $where = array('id_kategori' => $id_kategori);
        if ($id_kategori != null) {
            $this->db->where($where);
            $this->db->delete('kategori');
            $this->session->set_flashdata(
                'delete',
                '
                    <p class="alert alert-danger col-md-10 col-xs-10"> Kategori dihapus!</p>
                '
            );
            redirect('admin/list_kategori');
        }
    }

    function add_buku()
    {
        $product = $this->M_buku;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->save();
            $this->session->set_flashdata(
                'msg',
                '<div class="alert alert-success">
                    <p> Berhasil Ditambahkan</p>
                </div>'
            );
        }
        $this->load->view('admin/tambah_buku');
    }

    //-----------------End Buku----------------------//

    public function daftarAdmin()
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
            redirect('admin/adminPerpus');
        }
    }

    public function daftarMhs()
    {
        $post = $this->input->post();
        $NIK = $post["NIK"];;
        $NIS = $post["NIS"];
        $nama_depan = $post["nama_depan"];
        $nama_belakang = $post["nama_belakang"];
        $tempat = $post["tempat"];
        $tanggal = $post["tanggal"];
        $jk = $post["jk"];
        $alamat = $post["alamat"];
        $no_hp = $post["no_hp"];
        $level = $post["level"];
        $id_fakultas = $post["id_fakultas"];


        $data = array(
            'NIK' => $NIK,
            'NIS' => $NIS,
            'nama_depan' => $nama_depan,
            'nama_belakang' => $nama_belakang,
            'tempat_lahir' => $tempat,
            'tanggal_lahir' => $tanggal,
            'jk' => $jk,
            'alamat' => $alamat,
            'level' => $level,
            'password' => $NIS,
            'no_hp' => $no_hp,
            'id_fakultas' => $id_fakultas,

        );
        $this->M_user->input_data($data, 'users');
        $this->session->set_flashdata(
            'daftar',
            '
                <p class="alert alert-success"> Mahasiswa berhasil didaftarkan !</p>
            '
        );
        redirect('admin/siswa');
    }

    function siswa()
    {
        $data['prodi'] = $this->db->get('fakultas')->result();
        $data['siswa'] = $this->M_user->getAllSiswa();
        $data['modal'] = $this->M_user->getAllSiswa();
        $this->load->view('admin/siswa', $data);
    }
    function masyarakat()
    {
        $data['modal'] = $this->M_user->getAllMasyarakat();
        $data['masyarakat'] = $this->M_user->getAllMasyarakat();
        $this->load->view('admin/masyarakat', $data);
    }



    //-----------------Login----------------------//    
    function login()
    {
        $this->load->view('admin/login');
    }

    function aksi_login()
    {
        $nama = $this->input->post('nama');
        $password = $this->input->post('password');
        $where = array(
            'nama' => $nama,
            'password' => $password
        );

        $cek = $this->m_login->cek_login("users", $where)->num_rows();

        if ($cek > 0) {
            $data_session = array(
                'nama' => $nama,
                'status' => "login"
            );
            $this->session->set_userdata($data_session);
            echo '<script>window.location="index";</script>';
        } else {
            $this->session->set_flashdata(
                'msg',
                '<div class="alert alert-danger">
                    <p> Username atau Password salah</p>
                </div>'
            );
            $this->load->view('admin/login');
        }
    }
    //-----------------End Login----------------------//

    function logout()
    {
        $this->session->sess_destroy();

        redirect('../');
    }
}
