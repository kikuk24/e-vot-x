<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Panitia_model');
    }

    public function index()
    {
        $this->load->view('panitia/v_login');
    }

    public function proses()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $where = array(
            'USERNAME' => $username,
            'PASSWORD' => md5($password)
        );
        $cek = $this->Panitia_model->cek_login("tbl_panitia", $where)->num_rows();
        $panitia = $this->Panitia_model->cek_login("tbl_panitia", $where)->row();
        if ($cek > 0) {

            $data_session = array(
                'id_panitia' => $panitia->ID_PANITIA,
                'username' => $panitia->USERNAME,
                'nm_panitia' => $panitia->NM_PANITIA,
                'status' => "login_panitia"
            );

            $this->session->set_userdata($data_session);

            redirect(site_url('panitia/home'));
        } else {
            echo "Username dan password salah !";
        }
    }

    function keluar()
    {
        $this->session->sess_destroy();
        redirect(site_url('panitia'));
    }
}
