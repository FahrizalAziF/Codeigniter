<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_history extends CI_Model
{


    function getHistory($postData = null)
    {


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
        $searchStatus = $postData['searchStatus'];
        // $searchBulan = $postData['searchBulan'];


        ## Search 
        $search_arr = array();
        $searchQuery = "";
        if ($searchValue != '') {
            $search_arr[] = " (username like '%" . $searchValue . "%'  ) ";
        }
        if ($searchStatus != '') {
            $search_arr[] = " status='" . $searchStatus . "' ";
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
        $this->db->join('tbl_status_trans', 'tbl_status_trans.id_status=tbl_transaksi.status');
        $this->db->join('tbl_akun', 'tbl_akun.id_akun=tbl_transaksi.id_akun');
        $this->db->join('tbl_profile', 'tbl_profile.id_akun=tbl_transaksi.id_akun');
        $this->db->join('tbl_kurir', 'tbl_kurir.id_kurir=tbl_transaksi.id_kurir');
        $this->db->order_by('tgl_checkout', 'DESC');
        // $this->db->where('tbl_transaksi.status', '2');
        // $this->db->or_where('tbl_transaksi.status', '3');
        $records  = $this->db->get('tbl_transaksi')->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $this->db->join('tbl_status_trans', 'tbl_status_trans.id_status=tbl_transaksi.status');
        $this->db->join('tbl_akun', 'tbl_akun.id_akun=tbl_transaksi.id_akun');
        $this->db->join('tbl_profile', 'tbl_profile.id_akun=tbl_transaksi.id_akun');
        $this->db->join('tbl_kurir', 'tbl_kurir.id_kurir=tbl_transaksi.id_kurir');
        $this->db->order_by('tgl_checkout', 'DESC');
        // $this->db->where('tbl_transaksi.status', '2');
        // $this->db->or_where('tbl_transaksi.status', '3');
        $records  = $this->db->get('tbl_transaksi')->result();
        $totalRecordwithFilter = $records[0]->allcount;

        ## Fetch records
        $this->db->select('*');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        // $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        $this->db->join('tbl_status_trans', 'tbl_status_trans.id_status=tbl_transaksi.status');
        $this->db->join('tbl_profile', 'tbl_profile.id_akun=tbl_transaksi.id_akun');
        $this->db->join('tbl_akun', 'tbl_akun.id_akun=tbl_transaksi.id_akun');
        $this->db->join('tbl_kurir', 'tbl_kurir.id_kurir=tbl_transaksi.id_kurir');
        $this->db->order_by('tgl_checkout', 'DESC');
        // $this->db->where('tbl_transaksi.status', '2');
        // $this->db->or_where('tbl_transaksi.status', '3');
        $records  = $this->db->get('tbl_transaksi')->result();

        $data = array();
        $i = 1;
        foreach ($records as $record) {
            $data[] = array(
                "no" => $i++,
                "username" => $record->username,
                "tgl_checkout" => $record->tgl_checkout,
                "total_bayar" => $record->total_bayar,
                "nama_status" => $record->nama_status . '<br><a style="font-size: 12px;" href="" data-toggle="modal" data-target="#modalStatus' . $record->id_transaksi . '"> (Ubah Status) </a>',
                "datail" => '<button class="btn btn-info mb-1" data-toggle="modal" data-target="#modalProduk' . $record->id_transaksi . '"><i class="fa fa-shopping-bag"></i> Produk </button>',
                "nama_kurir" => $record->nama_kurir . '<br><a class="mb-1" style="font-size: 12px;" target="_blank" href="' . base_url('Admin/hubungiKurir/' . $record->no_hp_kurir) . '">( Hubungi Kurir ) </a>',
                "bantuan" => '<a class="mb-1" target="_blank" href="' . base_url('Admin/hubungiPembeli/' . $record->no_hp) . '">Hubungi Pembeli</a>'
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
