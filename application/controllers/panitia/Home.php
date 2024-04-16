<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Config_model');
        $this->load->helper('tanggal');
        if ($this->session->userdata('status') != "login_panitia") {
            redirect(site_url("panitia"));
        }
    }

    public function index()
    {
        $this->data['config'] = $this->Config_model->getAll();
        $this->data['halaman'] = 'panitia/v_awal';
        $this->load->view('panitia/v_home', $this->data);
    }
}
