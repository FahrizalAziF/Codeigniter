<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_fakultas extends CI_Model
{
    private $_table = "fakultas";
    public $jumlah = "0";

    public function rules()
    {
        return [
            [
                'field' => 'fakultas',
                'label' => 'Fakultas',
                'rules' => 'required'
            ]
        ];
    }



    public function saveFakultas()
    {
        $post = $this->input->post();

        $this->fakultas = $post["fakultas"];

        $this->db->insert($this->_table, $this);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_fakultas" => $id));
    }
}
