<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vote_muhammadiyah extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Calon_model');
		$this->load->model('Config_model');
		$this->load->model('Pemilih_model');
		$this->load->model('Pilihan_model');

		if ($this->session->userdata('status') != "login_pemilih") {
			redirect(site_url('muhammadiyah'));
		}
	}

	public function index()
	{
		$this->data['pemilih'] = $this->Pemilih_model->getById($this->session->userdata('id_pemilih'));
		$this->data['calon'] = $this->Calon_model->getCalon($this->session->userdata('id_pemilih'), '1'); //MUHAMMADIYAH
		$this->data['jml_pilihan'] = $this->Pilihan_model->jmlPilihan($this->session->userdata('id_pemilih'));
		$this->data['config'] = $this->Config_model->getConfig($this->session->userdata('id_jenis_vote'));
		$this->data['halaman'] = 'muhammadiyah/v_pilihan';
		$this->load->view('muhammadiyah/v_halaman', $this->data);
	}

	public function pilih($id_calon)
	{
		$config = $this->Config_model->getConfig($this->session->userdata('id_jenis_vote'));
		$id_pemilih = $this->session->userdata('id_pemilih');
		$jml_pilihan = $this->Pilihan_model->jmlPilihan($id_pemilih);
		$jml_max_pilihan = $config->JML_MAX_VOTE;
		$pilihan_ke = $jml_pilihan + 1;
		$cek_pilihan = $this->Pilihan_model->cekPilihan($id_pemilih, $id_calon);
		if ($pilihan_ke <= $jml_max_pilihan && $cek_pilihan < 1) {
			$this->Pilihan_model->simpan($id_pemilih, $id_calon, $pilihan_ke);
			$this->session->set_flashdata('sukses', "Pilihan anda sudah terimpan");
			redirect(site_url('voting/vote_muhammadiyah'));
		} else {
			$this->session->set_flashdata('gagal', "Pilihan tidak tesimpan, karena sudah melebihi ketentuan jumlah suara atau karena anda sudah memilih calon ini.");
			redirect(site_url('voting/vote_muhammadiyah'));
		}
	}

	function selesai()
	{
		$this->session->sess_destroy();
		redirect(site_url('muhammadiyah'));
	}
}
