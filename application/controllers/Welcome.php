<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Config_model');
		$this->load->model('Pemilih_model');
		$this->load->model('Pilihan_model');
		$this->load->helper('tanggal');
	}

	public function index()
	{
		$this->data['config'] = $this->Config_model->getConfig('1');
		$this->load->view('v_welcome_muhammadiyah', $this->data);
		// $this->load->view('v_welcome');
	}
	public function check()
	{
		$kode = $this->input->post("kode");
		$pemilih = $this->Pemilih_model->getById($kode);
		$config = $this->Config_model->getConfig($pemilih->ID_JENIS_VOTE);
		$jml_pilihan = $this->Pilihan_model->jmlPilihan($pemilih->ID_PEMILIH);
		$jml_max_pilihan = $config->JML_MAX_VOTE;
		$sisa_pilihan = $jml_max_pilihan - $jml_pilihan;
		$tgl_vote = $config->TANGGAL_VOTE;
		if (!isset($kode)) {
			redirect('muhammadiyah');
		} else {
			if ($pemilih->ID_JENIS_VOTE == '1' && $pemilih->STATUS == '0' && $sisa_pilihan != 0 && $tgl_vote == date('Y-m-d')) {
				$data_session = array(
					'id_pemilih' => $pemilih->ID_PEMILIH,
					'id_jenis_vote' => $pemilih->ID_JENIS_VOTE,
					'status' => 'login_pemilih'
				);
				$this->session->set_userdata($data_session);
				redirect('voting/vote_muhammadiyah');
			} else {
				$this->session->set_flashdata('gagal', "Periksa kembali kode yang tertera di Kartu Suara Anda, karena kode ini tidak aktif lagi, atau waktu voting belum tersedia.");
				redirect('muhammadiyah');
			}
		}
	}
}
