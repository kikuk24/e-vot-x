<?php

class Panitia_model extends CI_Model
{
    private $_table = "tbl_panitia";


    public function rules()
    {
        return [
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required'
            ]
        ];
    }

    function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    function getById($id)
    {
        return $this->db->get_where($this->_table, array('ID_PANITIA' => $id))->row();
    }

    function update()
    {
        $post = $this->input->post();
        $this->NM_PANITIA = $post["nm_panitia"];
        $this->USERNAME = $post["username"];
        if ($post["password"] == '') {
            $this->PASSWORD = $post["old_password"];
        } else {
            $this->PASSWORD = md5($post["password"]);
        }
        $this->db->update($this->_table, $this, array('ID_PANITIA' => $post["id_panitia"]));
    }
}
