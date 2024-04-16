<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemilih_model extends CI_Model
{
    private $_table = "tbl_pemilih";
    const SESSION_KEY = 'ID_ANGGOTA';

    public function rules()
    {
        return [
            [
                'field' => 'id_pemilih',
                'label' => 'ID Pemilih',
                'rules' => 'required'
            ],
            [
                'field' => 'nm_pemilih',
                'label' => 'Nama Pemilih',
                'rules' => 'required'
            ]
        ];
    }

    public function getAll($jenis)
    {
        return $this->db->get_where($this->_table, array('ID_JENIS_VOTE' => $jenis))->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, array('ID_PEMILIH' => $id))->row();
    }

    public function getPemilih($jenis)
    {
        return $this->db->get_where($this->_table, array('ID_JENIS_VOTE' => $jenis))->result();
    }


    public function login($username, $password)
    {
        // $this->db->where('NIS', $username)->or_where('USERNAME', $username);
        $this->db->where('NIS', $username);
        $query = $this->db->get($this->_table);
        $user = $query->row();

        // cek apakah user sudah terdaftar?
        if (!$user) {
            return FALSE;
        }

        // cek apakah passwordnya benar?
        if ($password != $user->PASSWORD) {
            return FALSE;
        }

        // bikin session
        $this->session->set_userdata([self::SESSION_KEY => $user->NIS]);
        $this->_update_last_login($user->NIS);

        return $this->session->has_userdata(self::SESSION_KEY);
    }

    public function current_user()
    {
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }

        $user_id = $this->session->userdata(self::SESSION_KEY);
        $query = $this->db->get_where($this->_table, ['NIS' => $user_id]);
        return $query->row();
    }

    private function _update_last_login($id)
    {
        $data = [
            'LAST_LOGIN' => date("Y-m-d H:i:s"),
        ];

        return $this->db->update($this->_table, $data, ['NIS' => $id]);
    }

    public function logout()
    {
        $this->session->unset_userdata(self::SESSION_KEY);
        return !$this->session->has_userdata(self::SESSION_KEY);
    }

    public function insertimport($data)
    {
        $this->db->insert_batch($this->_table, $data);
        return $this->db->insert_id();
    }

    public function update()
    {
        $post = $this->input->post();
        // $this->ID_PEMILIH = $post["id_pemilih"];
        $this->NM_PEMILIH = $post["nm_pemilih"];
        $this->ID_JENIS_VOTE = $post["id_jenis_vote"];
        $this->NBM = $post["nbm"];
        // $this->KODE = $post["kode"];
        if (!empty($_FILES["foto"]["name"])) {
            $this->FOTO = $this->_uploadImage();
        } else {
            $this->FOTO = $post["old_foto"];
        }
        $this->db->update($this->_table, $this, array('ID_PEMILIH' => $post['id_pemilih']));
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './file/foto/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['file_name']            = $this->ID_PEMILIH;
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
        $pemilih = $this->getById($id);
        if ($pemilih->FOTO != "no_images.jpg") {
            $filename = explode(".", $pemilih->FOTO)[0];
            return array_map('unlink', glob(FCPATH . "file/foto/$filename.*"));
        }
    }


    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array('ID_PEMILIH' => $id));
    }
}
