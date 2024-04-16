<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konfigurasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Config_model');
        if ($this->session->userdata('status') != "login_panitia") {
            redirect(site_url("panitia"));
        }
    }

    public function index()
    {
        $this->data['config'] = $this->Config_model->getAll();
        $this->data['halaman'] = 'panitia/v_konfigurasi';
        $this->load->view('panitia/v_home', $this->data);
    }

    public function edit()
    {
        $config = $this->Config_model;
        $validation = $this->form_validation;
        $validation->set_rules($config->rules());

        if ($validation->run()) {
            $config->update();
            $this->session->set_flashdata('sukses', 'Perubahan data konfigurasi sudah tersimpan');
        }

        redirect(site_url('panitia/konfigurasi'));
    }
}
