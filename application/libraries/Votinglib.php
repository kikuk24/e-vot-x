<?php
defined('BASEPATH') or exit('No direct script access allowed');

class votinglib
{
    function jmlSuara($id_pemilih)
    {
        $this->ci = &get_instance();
        $where = array(
            'ID_PEMILIH' => $id_pemilih
        );
        $hasil = $this->ci->db->get_where('tbl_pilihan', $where)->num_rows();
        if ($hasil != NULL) {
            return $hasil;
        } else {
            return $hasil = '0';
        }
    }
}
