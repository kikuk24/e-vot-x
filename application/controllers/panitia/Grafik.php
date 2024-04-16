<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Grafik extends CI_Controller{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Calon_model');
    if ($this->session->userdata('status') != "login_panitia") {
      redirect(site_url("panitia"));
    }
  }
  public function index(){ {
      $this->data['calon'] = $this->Calon_model->getSuara('1');
      $this->data['halaman'] = 'panitia/v_grafik';
      $this->load->view('panitia/v_home', $this->data);
    }
  }
}