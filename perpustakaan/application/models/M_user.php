<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_user extends CI_Model
{

    private $_table = 'users';


    public $NIS;
    public $NIK;
    public $nama_depan;
    public $nama_belakang;
    public $tempat_lahir;
    public $tanggal_lahir;
    public $jk;
    public $alamat;
    public $no_hp;
    public $password;
    public $level;
    public $id_fakultas;





    function __construct()
    {
        parent::__construct();
    }
    public function rules()
    {
        return [
            [
                'field' => 'nama_depan',
                'label' => 'Name',
                'rules' => 'required'
            ],

            [
                'field' => 'password',
                'label' => 'Halaman',
                'rules' => 'required'
            ]
        ];
    }

    // insert data
    public function daftar()
    {

        $post = $this->input->post();
        $this->NIK = $post["NIK"];
        $this->NIS = $post["NIS"];
        $this->nama_depan = $post["nama_depan"];
        $this->nama_belakang = $post["nama_belakang"];
        $this->tempat_lahir = $post['tempat'];
        $this->tanggal_lahir = $post['tanggal'];
        $this->jk = $post['jk'];
        $this->alamat = $post["alamat"];
        $this->no_hp = $post["no_hp"];
        $this->password = $post["password"];
        $this->level = $post["level"];
        $this->id_fakultas = $post["id_fakultas"];
        $this->db->insert($this->_table, $this);
    }


    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where('nip_user', $id);
        $this->db->update($this->table, $data);
    }

    public function getAllSiswa()
    {
        $this->db->select('users.*,fakultas.*, COUNT(koleksi.id_user) as total');
        $this->db->from('users');
        $this->db->join('koleksi', 'koleksi.id_user=users.id_user', 'left');
        $this->db->join('fakultas', 'fakultas.id_fakultas=users.id_fakultas');
        $this->db->where('users.level', '1');
        $this->db->group_by('id_user');
        $query = $this->db->get()->result();
        return $query;
    }

    public function getCountSiswa()
    {
        $this->db->select('COUNT(users.id_user) as total');
        $this->db->from('users');
        $this->db->where('users.level', '1');
        $this->db->group_by('level');
        $query = $this->db->get()->row();
        return $query;
    }

    public function getCountMasyarakat()
    {
        $this->db->select('COUNT(users.id_user) as total');
        $this->db->from('users');
        $this->db->where('users.level', '2');
        $this->db->group_by('level');
        $query = $this->db->get()->row();
        return $query;
    }

    public function getAllMasyarakat()
    {
        $this->db->select('users.*, COUNT(koleksi.id_user) as total');
        $this->db->from('users');
        $this->db->join('koleksi', 'koleksi.id_user=users.id_user', 'left');
        $this->db->where('users.level', '2');
        $this->db->group_by('id_user');
        $query = $this->db->get()->result();
        return $query;
    }

    public function getAkun()
    {
        $ab =  $this->session->userdata('id_user');
        return $this->db->get_where($this->_table, ["id_user" => $ab])->row();
    }

    public function editAkun()
    {

        $post = $this->input->post();

        $id_user = $this->id_user = $post["id_user"];
        $this->NIS = $post["NIS"];
        $this->NIK = $post["NIK"];
        $this->password = $post["password"];
        $this->nama_depan = $post["nama_depan"];
        $this->nama_belakang = $post["nama_belakang"];
        $this->tempat_lahir = $post["tempat_lahir"];
        $this->tanggal_lahir = $post["tanggal_lahir"];
        $this->alamat = $post["alamat"];
        $this->no_hp = $post["no_hp"];
        $this->level = $post["level"];
        $this->jk = $post["jk"];

        $this->db->update($this->_table, $this, array('id_user' => $id_user));
    }

    public function hapusAdmin($id)
    {
        return $this->db->delete($this->_table, array("NIK" => $id));
    }

    public function hapusMhs($id)
    {
        return $this->db->delete($this->_table, array("NIS" => $id));
    }
    public function hapusMas($id)
    {
        return $this->db->delete($this->_table, array("NIK" => $id));
    }
}
