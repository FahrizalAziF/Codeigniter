<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_produk extends CI_Model
{


    function getProduk($postData = null)
    {

        $id_toko = $this->session->userdata('id_toko');
        $response = array();

        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue = $postData['search']['value']; // Search value

        // Custom search filter 
        // $searchSuplier = $postData['searchSuplier'];
        $searchKategori = $postData['searchKategori'];
        // $searchBulan = $postData['searchBulan'];


        ## Search 
        $search_arr = array();
        $searchQuery = "";
        if ($searchValue != '') {
            $search_arr[] = " (nama_produk like '%" . $searchValue . "%'  ) ";
        }
        if ($searchKategori != '') {
            $search_arr[] = " id_kategori='" . $searchKategori . "' ";
        }
        // if ($searchNama != '') {
        //     $search_arr[] = " nama_suplier='" . $searchNama . "' ";
        // }
        // if ($searchBulan == '0') {
        //     $search_arr[] = " nama_suplier='" . $searchNama . "' ";
        // } else {
        //     $search_arr[] = " tgl_masuk_barang like'%" . $searchBulan . "%' ";
        // }
        if (count($search_arr) > 0) {
            $searchQuery = implode(" and ", $search_arr);
        }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $this->db->join('tbl_satuan', 'tbl_satuan.id_satuan=tbl_produk.id_satuan');
        $this->db->where('id_toko', $id_toko);
        $records  = $this->db->get('tbl_produk')->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $this->db->join('tbl_satuan', 'tbl_satuan.id_satuan=tbl_produk.id_satuan');
        $this->db->where('id_toko', $id_toko);
        $records  = $this->db->get('tbl_produk')->result();
        $totalRecordwithFilter = $records[0]->allcount;

        ## Fetch records
        $this->db->select('*');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        $this->db->join('tbl_satuan', 'tbl_satuan.id_satuan=tbl_produk.id_satuan');
        $this->db->where('id_toko', $id_toko);
        $records  = $this->db->get('tbl_produk')->result();

        $data = array();
        $i = 1;
        foreach ($records as $record) {


            $data[] = array(
                "id_produk" => $i++,
                "nama_produk" => $record->nama_produk,
                "harga_produk" => $record->harga_produk,
                "nama_satuan" => $record->nama_satuan,
                "stok_produk" => $record->stok_produk,
                "foto_produk" => '<img src="' . base_url("upload/$record->foto_produk") . '" width="50px" height="50px">',
                "detail" => '<button class="btn btn-info mb-1" data-toggle="modal" data-target="#modalEdit' . $record->id_produk . '"><i class="fa fa-pencil-square-o"></i> </button> <a class=" btn btn-danger mb-1" href="' . base_url('Toko/hapusProduk/' . $record->id_produk) . '"><i class="fa fa-trash"></i> </a>'
            );
        }


        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );

        return $response;
    }
    function getHarga($postData = null)
    {

        $id_pasar = $this->session->userdata('id_pasar');
        $response = array();

        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue = $postData['search']['value']; // Search value

        // Custom search filter 
        // $searchSuplier = $postData['searchSuplier'];
        $searchDate = $postData['searchDate'];
        // $searchBulan = $postData['searchBulan'];


        ## Search 
        $search_arr = array();
        $searchQuery = "";
        if ($searchValue != '') {
            $search_arr[] = " (nama_produk like '%" . $searchValue . "%'  ) ";
        }
        if ($searchDate != '') {
            $search_arr[] = " tgl_input='" . $searchDate . "' ";
        }
        // if ($searchNama != '') {
        //     $search_arr[] = " nama_suplier='" . $searchNama . "' ";
        // }
        // if ($searchBulan == '0') {
        //     $search_arr[] = " nama_suplier='" . $searchNama . "' ";
        // } else {
        //     $search_arr[] = " tgl_masuk_barang like'%" . $searchBulan . "%' ";
        // }
        if (count($search_arr) > 0) {
            $searchQuery = implode(" and ", $search_arr);
        }
        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $records  = $this->db->get('tbl_kategori')->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $records  = $this->db->get('tbl_kategori')->result();
        $totalRecordwithFilter = $records[0]->allcount;

        ## Fetch records
        $this->db->select('*');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        $records  = $this->db->get('tbl_kategori')->result();
        $data = array();
        $i = 1;
        foreach ($records as $record) {
            // $this->db->join('tbl_satuan', 'tbl_satuan.id_satuan=tbl_produk.id_satuan');
            // $this->db->where('id_pasar', $id_pasar);
            // $records  = $this->db->get('tbl_bahan_pokok')->result();

            $data[] = array(
                "id_bahan_pokok" => $i++,
                "nama_kategori" => $record->nama_kategori,
                // "satuan" => $record->harga_produk,
                // "nama_satuan" => $record->nama_satuan,
                // "stok_produk" => $record->stok_produk,
                // "foto_produk" => '<img src="' . base_url("upload/$record->foto_produk") . '" width="50px" height="50px">',
                // "detail" => '<button class="btn btn-info mb-1" data-toggle="modal" data-target="#modalEdit' . $record->id_produk . '"><i class="fa fa-pencil-square-o"></i> </button> <a class=" btn btn-danger mb-1" href="' . base_url('Toko/hapusProduk/' . $record->id_produk) . '"><i class="fa fa-trash"></i> </a>'
            );
        }


        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );

        return $response;
    }
}
