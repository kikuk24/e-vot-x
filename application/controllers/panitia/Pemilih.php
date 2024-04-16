<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemilih extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Config_model');
        $this->load->model('Pemilih_model');
        $this->load->library('excel');
        $this->load->library('votinglib');
        if ($this->session->userdata('status') != "login_panitia") {
            redirect(site_url("panitia"));
        }
    }

    public function index()
    {
        redirect('panitia/home');
    }

    public function muhammadiyah()
    {
        $this->data['pemilih'] = $this->Pemilih_model->getPemilih('1'); //Pemilih MUHAMMADIYAH
        $this->data['halaman'] = 'panitia/v_pemilih';
        $this->load->view('panitia/v_home', $this->data);
    }

    public function aisyiyah()
    {
        $this->data['pemilih'] = $this->Pemilih_model->getPemilih('2'); //Pemilih AISYIYAH
        $this->data['halaman'] = 'panitia/v_pemilih';
        $this->load->view('panitia/v_home', $this->data);
    }

    public function cetak($id_jenis_vote)
    {
        $this->data['pemilih'] = $this->Pemilih_model->getPemilih($id_jenis_vote);
        $this->load->view('panitia/v_pemilih_cetak', $this->data);
    }

    public function rekap_status($id_jenis_vote)
    {
        $this->data['pemilih'] = $this->Pemilih_model->getPemilih($id_jenis_vote);
        $this->data['config'] = $this->Config_model->getConfig($id_jenis_vote);
        $this->data['jenis_vote'] = $id_jenis_vote;
        $this->data['halaman'] = 'panitia/v_pemilih_status';
        $this->load->view('panitia/v_home', $this->data);
    }

    public function import($id_jenis_vote)
    {
        $this->data['jenis_vote'] = $id_jenis_vote;
        $this->data['halaman'] = 'panitia/v_import_pemilih';
        $this->load->view('panitia/v_home', $this->data);
    }

    public function import_save()
    {
        $id_jenis_vote = $this->input->post('id_jenis_vote');
        if ($id_jenis_vote == '1') {
            $_kode = "MSB";
        } else {
            $_kode = "A";
        }
        if (isset($_FILES["file"]["name"])) {
            $path = $_FILES["file"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            foreach ($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for ($row = 2; $row <= $highestRow; $row++) {
                    $id_pemilih = $_kode . mt_rand(1000, 9999);
                    $nbm = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $nm_pemilih = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $foto = 'no_images.jpg';
                    $data[] = array(
                        'ID_PEMILIH' => $id_pemilih,
                        'NM_PEMILIH' => $nm_pemilih,
                        'ID_JENIS_VOTE' => $id_jenis_vote,
                        'NBM' => $nbm,
                        'KODE' => $id_pemilih,
                        'FOTO' => $foto,
                        'STATUS' => '0'
                    );
                }
            }
            $this->Pemilih_model->insertimport($data);
            $this->session->set_flashdata('sukses', 'Data Pemilih berhasil di import');
            redirect(site_url('panitia/pemilih/import/' . $id_jenis_vote), 'refresh');
        }
    }

    public function edit()
    {
        $pemilih = $this->Pemilih_model;
        $validation = $this->form_validation;
        $validation->set_rules($pemilih->rules());

        if ($validation->run()) {
            $pemilih->update();
            $this->session->set_flashdata('sukses', 'Perubahan data pemilih sudah tersimpan');
        }

        if ($this->input->post('id_jenis_vote') == '1') {
            redirect(site_url('panitia/pemilih/muhammadiyah'));
        } else {
            redirect(site_url('panitia/pemilih/aisyiyah'));
        }
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->Pemilih_model->delete($id)) {
            redirect(site_url('panitia/pemilih'));
        }
    }
}
