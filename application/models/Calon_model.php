<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Calon_model extends CI_Model
{
    private $_table = "tbl_calon";
    private $_view = "view_jumlah_pilihan";

    const SESSION_KEY = 'ID_CALON';

    public function rules()
    {
        return [
            [
                'field' => 'id_calon',
                'label' => 'ID Calon',
                'rules' => 'required'
            ],
            [
                'field' => 'nm_calon',
                'label' => 'Nama Calon',
                'rules' => 'required'
            ]
        ];
    }

    public function getCalon($id_pemilih, $id_jenis_vote) //AMBIL CALON MUHAMMADIYAH DARI DAFTAR CALON
    {
        $query_calon = "
        SELECT
        *
        FROM
        tbl_calon
        WHERE tbl_calon.ID_JENIS_VOTE = '" . $id_jenis_vote . "' and NOT EXISTS (SELECT * FROM tbl_pilihan WHERE tbl_pilihan.ID_PEMILIH = '" . $id_pemilih . "' AND tbl_calon.ID_CALON = tbl_pilihan.ID_CALON)
        ORDER BY tbl_calon.NO_URUT ASC
        ";
        $query = $this->db->query($query_calon);
        return $query->result();
    }

    public function getCalonVote($jenis)
    {
        $this->db->order_by('NO_URUT', 'ASC');
        return $this->db->get_where($this->_table, array('ID_JENIS_VOTE' => $jenis))->result();
    }

    public function getAll($jenis)
    {
        return $this->db->get_where($this->_table, array('ID_JENIS_VOTE' => $jenis))->result();
    }

    public function getSuara($jenis)
    {
        $this->db->order_by('JUMLAH', 'DESC');
        return $this->db->get_where($this->_view, array('ID_JENIS_VOTE' => $jenis))->result();
    }
    public function getSuaraGrafik($jenis){
        $this->db->order_by('JUMLAH', 'ASC');
        return $this->db->get_where($this->_view, array('ID_JENIS_VOTE' => $jenis))->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, array('ID_CALON' => $id))->row();
    }

    public function insertimport($data)
    {
        $this->db->insert_batch($this->_table, $data);
        return $this->db->insert_id();
    }

    public function update()
    {
        $post = $this->input->post();
        $this->ID_CALON = $post["id_calon"];
        $this->ID_JENIS_VOTE = $post["id_jenis_vote"];
        $this->NBM = $post["nbm"];
        $this->NM_CALON = $post["nm_calon"];
        $this->ASAL_CALON = $post["asal_calon"];
        if (!empty($_FILES["foto"]["name"])) {
            $this->FOTO = $this->_uploadImage();
        } else {
            $this->FOTO = $post["old_foto"];
        }
        $this->db->update($this->_table, $this, array('ID_CALON' => $post['id_calon']));
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './file/foto/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['file_name']            = $this->ID_CALON;
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            return $this->upload->data("file_name");
        }

        print_r($this->upload->display_errors());
        //return "no_user.png";
    }

    private function _deleteImage($id)
    {
        $calon = $this->getById($id);
        if ($calon->FOTO != "no_images.jpg") {
            $filename = explode(".", $calon->FOTO)[0];
            return array_map('unlink', glob(FCPATH . "file/foto/$filename.*"));
        }
    }


    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array('ID_CALON' => $id));
    }
}
