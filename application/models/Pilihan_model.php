<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pilihan_model extends CI_Model
{
    private $_table = "tbl_pilihan";

    function get_client_ip() //deteksi ip address
    {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if (getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if (getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if (getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if (getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if (getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'IP tidak dikenali';
        return $ipaddress;
    }

    function get_client_browser() //deteksi browser yang di gunakan
    {
        $browser = '';
        if (strpos($_SERVER['HTTP_USER_AGENT'], 'Netscape'))
            $browser = 'Netscape';
        else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox'))
            $browser = 'Firefox';
        else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome'))
            $browser = 'Chrome';
        else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera'))
            $browser = 'Opera';
        else if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE'))
            $browser = 'Internet Explorer';
        else
            $browser = 'Other';
        return $browser;
    }

    public function cekPilihan($id_pemilih, $id_calon)
    {
        return $this->db->get_where($this->_table, array('ID_PEMILIH' => $id_pemilih, 'ID_CALON' => $id_calon))->num_rows();
    }

    public function jmlPilihan($id_pemilih)
    {
        return $this->db->get_where($this->_table, array('ID_PEMILIH' => $id_pemilih))->num_rows();
    }



    public function simpan($id_pemilih, $id_calon, $pilihan_ke)
    {
        $this->ID_PEMILIH = $id_pemilih;
        $this->ID_CALON = $id_calon;
        $this->PILIHAN_KE = $pilihan_ke;
        $this->IP_DEVICE = $this->get_client_ip();
        $this->BROWSER = $this->get_client_browser();
        $this->db->insert($this->_table, $this);
    }

    public function update_status($id_pemilih)
    {
        $this->ID_PEMILIH = $id_pemilih;
        $this->STATUS =  '1';
        $this->db->update($this->_table, $this, array('ID_PEMILIH' => $id_pemilih));
    }
}
