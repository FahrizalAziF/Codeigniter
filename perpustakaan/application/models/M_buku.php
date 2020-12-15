<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_buku extends CI_Model
{
    private $_table = "buku";
    private $_table1 = "saran_buku";

    private $_viewBuku = "jum_buku";

    public $id_buku;
    public $nama_buku;
    public $penulis;
    public $terbit;
    public $halaman;
    public $pembaca = "0";
    public $cover;
    public $buku;
    public $id_kategori;



    public function rules()
    {
        return [
            [
                'field' => 'nama_buku',
                'label' => 'Name',
                'rules' => 'required'
            ],

            [
                'field' => 'halaman',
                'label' => 'Halaman',
                'rules' => 'required'
            ]
        ];
    }

    function dataBaru($number, $offset)
    {
        $this->db->order_by('terbit', 'DESC');
        return $query = $this->db->get('buku', $number, $offset)->result();
    }
    function dataFavorit($number, $offset)
    {
        $this->db->order_by('pembaca', 'DESC');
        return $query = $this->db->get('buku', $number, $offset)->result();
    }

    public function getSearch($keyword)
    {
        $this->db->select('*');
        $this->db->from('buku');
        $this->db->join('kategori', 'kategori.id_kategori=buku.id_kategori');
        $this->db->like('nama_buku', $keyword);
        return $this->db->get()->result();
    }
    public function getBaru()
    {
        $this->db->select('*');
        $this->db->from('buku');
        $this->db->join('kategori', 'kategori.id_kategori=buku.id_kategori');
        $this->db->order_by('terbit', 'DESC');
        $this->db->limit(20);
        $query = $this->db->get()->num_rows();
        return $query;
    }
    public function getFavorit()
    {
        $this->db->select('*');
        $this->db->from('buku');
        $this->db->order_by('pembaca', 'DESC');
        $this->db->limit(20);
        $query = $this->db->get()->num_rows();
        return $query;
    }

    public function getIdKategori($id_kategori)
    {
        return $this->db->get_where($this->_table, ["id_kategori" => $id_kategori])->result();
    }

    public function getAlquran()
    {
        return $this->db->get_where($this->_table, ["id_kategori" => "1"])->result();
    }
    public function getAqidah()
    {
        return $this->db->get_where($this->_table, ["id_kategori" => "2"])->result();
    }

    public function getHadist()
    {
        return $this->db->get_where($this->_table, ["id_kategori" => "3"])->result();
    }

    public function getId($id)
    {
        return $this->db->get_where($this->_table, ["id_buku" => $id])->row();
    }

    public function getIdDetail()
    {
        $this->db->select('*');
    }

    public function countRead()
    {

        $post = $this->input->post();

        $id_buku = $this->id_buku = $post["id_buku"];
        $this->pembaca = $post["pembaca"] + 1;
        $this->nama_buku = $post["nama_buku"];
        $this->penulis = $post["penulis"];
        $this->terbit = $post["terbit"];
        $this->halaman = $post["halaman"];
        $this->buku = $post["buku"];
        $this->cover = $post["cover"];
        $this->id_kategori = $post["id_kategori"];
        $this->db->update($this->_table, $this, array('id_buku' => $id_buku));
    }



    //-------------------------View---------------------------------------------//
    public function getJumBuku()
    {
        return $this->db->get($this->_viewBuku)->result();
    }
    public function getKategori($id = null)
    {
        $this->db->select('*');
        $this->db->from('buku');
        $this->db->join('kategori', 'kategori.id_kategori=buku.id_kategori');
        $this->db->where('buku.id_kategori', $id);
        $query = $this->db->get()->row();
        return $query;
    }

    public function getJudulKategori($id = null)
    {
        $this->db->select('*');
        $this->db->from('buku');
        $this->db->join('kategori', 'kategori.id_kategori=buku.id_kategori');
        $this->db->where('buku.id_kategori', $id);
        $query = $this->db->get()->row();
        return $query;
    }

    public function getBukuBaru()
    {
        $this->db->select('*');
        $this->db->from('buku');
        $this->db->order_by('terbit', 'DESC');
        $this->db->limit(6);
        $query = $this->db->get()->result();
        return $query;
    }

    public function getJumKategori($id)
    {
        $query = $this->db->query(" SELECT COUNT(id_buku) as jum_buku FROM buku JOIN kategori ON buku.id_kategori=kategori.id_kategori WHERE buku.id_kategori= $id")->result();
        return $query;
    }

    public function getBaruQuran($id = null)
    {
        $this->db->select('*');
        $this->db->from('buku');
        $this->db->where('id_kategori', $id);
        $this->db->order_by('terbit', 'DESC');
        $this->db->limit(6);
        $query = $this->db->get()->result();
        return $query;
    }
    public function getFavoritKategori($id = null)
    {
        $this->db->select('*');
        $this->db->from('buku');
        $this->db->where('id_kategori', $id);
        $this->db->order_by('pembaca', 'DESC');
        $this->db->limit(6);
        $query = $this->db->get()->result();
        return $query;
    }

    public function getBukuFavorit()
    {
        $this->db->select('*');
        $this->db->from('buku');
        $this->db->order_by('pembaca', 'DESC');
        $this->db->limit(6);
        $query = $this->db->get()->result();
        return $query;
    }


    public function save()
    {
        $post = $this->input->post();
        $this->nama_buku = $post["nama_buku"];
        $this->penulis = $post["penulis"];
        $this->terbit = $post["terbit"];
        $this->halaman = $post["halaman"];
        $this->cover = $this->_uploadImage();
        $this->buku = $this->_uploadBuku();
        $this->id_kategori = $post["id_kategori"];
        $this->db->insert($this->_table, $this);
    }




    private function _uploadImage()
    {
        $config['upload_path']          = './upload/cover/';
        $config['allowed_types']        = 'gif|jpg|png|pdf';
        $config['overwrite']            = true;
        $config['max_size']             = 5048; // 1MB
        //$config['quality'] = '50%';
        $config['width'] = 174;
        $config['height'] = 273;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('cover')) {
            $error = $this->upload->display_errors();
            // menampilkan pesan error
            print_r($error);
        } else {
            return $this->upload->data('file_name');
        }
    }
    private function _uploadBuku()
    {

        $config['max_size']     = '2048';
        $config['max_width'] = '0';
        $config['max_height'] = '0';
        $this->load->library('upload');
        if (!$this->upload->do_upload('book')) {
            $error = $this->upload->display_errors();
            // menampilkan pesan error
            print_r($error);
        } else {
            return $this->upload->data('file_name');
        }
    }
    private function _deleteImage($id)
    {
        $product = $this->getId($id);
        if ($product->cover != "default.jpg") {
            $filename = explode(".", $product->cover)[0];
            return array_map('unlink', glob(FCPATH . "./upload/cover/$filename.*"));
        }
    }

    private function _deleteFile($id)
    {
        $product = $this->getId($id);
        if ($product->buku != "default.jpg") {
            $filename = explode(".", $product->buku)[0];
            return array_map('unlink', glob(FCPATH . "./upload/cover/$filename.*"));
        }
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        $this->_deleteFile($id);
        return $this->db->delete($this->_table, array("id_buku" => $id));
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_buku = $post["id"];
        $this->nama_buku = $post["nama_buku"];
        $this->penulis = $post["penulis"];
        $this->terbit = $post["terbit"];
        $this->halaman = $post["halaman"];
        $this->cover = $this->_uploadImage();
        $this->buku = $this->_uploadBuku();
        $this->id_kategori = $post["id_kategori"];
        $this->db->update($this->_table, $this, array('id_buku' => $post['id']));
    }
}
