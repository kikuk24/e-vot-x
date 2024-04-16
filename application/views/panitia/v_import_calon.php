<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="container-fluid px-4">
    <h1 class="mt-4">E-Voting MusCab</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Muhammadiyah & Aisyiyah</li>
    </ol>
    <a href="<?= base_url('file/temp_calon.xls') ?>">Download Template Excel</a>
    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    Form Import Data Calon
                </div>
                <div class="card-body">
                    <?php if ($this->session->flashdata('sukses')) : ?>
                        <h4><?= $this->session->flashdata('sukses') ?></h4>
                    <?php endif; ?>
                    <form action="<?= site_url('panitia/calon/import_save') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nm_panitia">Nama Panitia :</label>
                            <input type="file" class="form-control" id="file" name="file" required>
                        </div>
                        <input type="hidden" name="id_jenis_vote" id="id_jenis_vote" value="<?= $jenis_vote ?>" />
                        <button type="submit" class="btn btn-danger">Import Calon</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    Catatan Import
                </div>
                <div class="card-body">
                    <ul>
                        <li>Download template Excel yang sudah di sediakan.</li>
                        <li>Isi lengkapi pada setiap baris datanya.</li>
                        <li>Upload file Excel yang sudah di lengkapi datanya menggunakan form di samping.</li>
                        <li>Foto hanya bisa di tambahkan dengan menu edit masing - masing calon ketika selesai di import.</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

</div>