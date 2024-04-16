<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Config_model extends CI_Model
{
    private $_table = "tbl_config";
    private $_view = "view_config";

    public function rules()
    {
        return [
            [
                'field' => 'id_config',
                'label' => 'Id COnfig',
                'rules' => 'required'
            ],
            [
                'field' => 'nm_config',
                'label' => 'Nama Kegiatan',
                'rules' => 'required'
            ],
            [
                'field' => 'jml_max_vote',
                'label' => 'Jumlah Maximal Vote',
                'rules' => 'required'
            ]
        ];
    }

    public function getConfig($id)
    {
        return $this->db->get_where($this->_table, array('ID_JENIS_VOTE' => $id))->row();
    }

    public function getAll()
    {
        return $this->db->get($this->_view)->result();
    }

    public function update()
    {
        $post = $this->input->post();
        $this->ID_CONFIG = $post["id_config"];
        $this->NM_CONFIG = $post["nm_config"];
        $this->KETERANGAN = $post["keterangan"];
        $this->ID_JENIS_VOTE = $post["id_jenis_vote"];
        $this->JML_MAX_VOTE = $post["jml_max_vote"];
        $this->TANGGAL_VOTE = $post["tanggal_vote"];
        $this->db->update($this->_table, $this, array('ID_CONFIG' => $post['id_config']));
    }
}
