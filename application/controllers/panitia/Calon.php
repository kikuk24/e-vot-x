<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Calon extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Calon_model');
        $this->load->library('excel');
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
        $this->data['calon'] = $this->Calon_model->getCalonVote('1'); //CALON MUHAMMADIYAH
        $this->data['halaman'] = 'panitia/v_calon';
        $this->load->view('panitia/v_home', $this->data);
    }

    public function cetak($jenis)
    {
        $this->data['calon'] = $this->Calon_model->getCalonVote($jenis); //CALON MUHAMMADIYAH
        $this->load->view('panitia/v_calon_cetak', $this->data);
    }

    public function aisyiyah()
    {
        $this->data['calon'] = $this->Calon_model->getCalonVote('2'); //CALON AISYIYAH
        $this->data['halaman'] = 'panitia/v_calon';
        $this->load->view('panitia/v_home', $this->data);
    }

    public function import($id_jenis_vote)
    {
        $this->data['jenis_vote'] = $id_jenis_vote;
        $this->data['halaman'] = 'panitia/v_import_calon';
        $this->load->view('panitia/v_home', $this->data);
    }

    public function rekap_suara($id)
    {
        $this->data['calon'] = $this->Calon_model->getSuara($id);
        $this->data['jenis_vote'] = $id;
        $this->data['halaman'] = 'panitia/v_calon_rekap_suara';
        $this->load->view('panitia/v_home', $this->data);
    }

    public function rekap_suara_print($id)
    {
        $this->data['calon'] = $this->Calon_model->getSuara($id);
        $this->data['jenis_vote'] = $id;
        $this->load->view('panitia/v_calon_rekap_suara_tampil', $this->data);
    }

    public function import_save()
    {
        // $mt_rand = mt_rand(1000, 9999);
        $id_jenis = $this->input->post('id_jenis_vote');
        if (isset($_FILES["file"]["name"])) {
            $path = $_FILES["file"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            foreach ($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for ($row = 2; $row <= $highestRow; $row++) {
                    $id_calon = "C" . mt_rand(1000, 9999);
                    $nbm = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $nm_calon = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $asal_calon = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $no_urut = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $foto = 'no_images.jpg';
                    $data[] = array(
                        'ID_CALON' => $id_calon,
                        'ID_JENIS_VOTE' => $id_jenis,
                        'NBM' => $nbm,
                        'NM_CALON' => $nm_calon,
                        'ASAL_CALON' => $asal_calon,
                        'FOTO' => $foto,
                        'NO_URUT' => $no_urut
                    );
                }
            }
            $this->Calon_model->insertimport($data);
            $this->session->set_flashdata('sukses', 'Data Calon berhasil di import');
            redirect(site_url('panitia/calon/import/' . $id_jenis), 'refresh');
        }
    }

    public function edit()
    {
        $calon = $this->Calon_model;
        $validation = $this->form_validation;
        $validation->set_rules($calon->rules());

        if ($validation->run()) {
            $calon->update();
            $this->session->set_flashdata('sukses', 'Perubahan data calon sudah tersimpan');
        }

        if ($this->input->post('id_jenis_vote') == '1') {
            redirect(site_url('panitia/calon/muhammadiyah'));
        } else {
            redirect(site_url('panitia/calon/aisyiyah'));
        }
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->Calon_model->delete($id)) {
            redirect(site_url('panitia/calon'));
        }
    }

    
}
