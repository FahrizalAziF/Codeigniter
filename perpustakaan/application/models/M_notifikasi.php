<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_notifikasi extends CI_Model
{

    public $table = 'tb_notification';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }
}
