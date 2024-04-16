<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Password extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Panitia_model');
        if ($this->session->userdata('status') != "login_panitia") {
            redirect(site_url("panitia"));
        }
    }

    public function index()
    {
        $this->data['panitia'] = $this->Panitia_model->getById($this->session->userdata('id_panitia'));
        $this->data['halaman'] = 'panitia/v_password';
        $this->load->view('panitia/v_home', $this->data);
    }

    public function update()
    {
        $data = $this->Panitia_model;
        $validation = $this->form_validation;
        $validation->set_rules($data->rules());

        if ($validation->run()) {
            $data->update();
            $this->session->set_flashdata('success', 'Data Password Panitia berhasil di perbaharui');
        }

        redirect('panitia/login/keluar');
    }
}
