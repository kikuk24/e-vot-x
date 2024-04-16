<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="container-fluid px-4">
    <h1 class="mt-4">E-Voting MusCab</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Muhammadiyah & Aisyiyah</li>
    </ol>


    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Konfigurasi Voting
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Voting</th>
                        <th>Jenis Voting</th>
                        <th>Keterangan</th>
                        <th>Jumlah Max Pilihan</th>
                        <th>Tanggal</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($config as $row) { ?>
                        <tr>
                            <td><?= $row->ID_CONFIG ?></td>
                            <td><?= $row->NM_CONFIG ?></td>
                            <td><?= $row->NM_JENIS_VOTE ?></td>
                            <td><?= $row->KETERANGAN ?></td>
                            <td><?= $row->JML_MAX_VOTE ?></td>
                            <td><?= $row->TANGGAL_VOTE ?></td>
                            <td>
                                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#myModalEdit<?= $row->ID_CONFIG ?>"> <i class="fas fa-pen-square"></i> </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php foreach ($config as $data) { ?>
    <!-- Modal -->
    <div class="modal fade" id="myModalEdit<?= $data->ID_CONFIG ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Edit Konfigurasi</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('panitia/konfigurasi/edit') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nbm">Nama Kegiatan :</label>
                            <input type="text" class="form-control" id="nm_config" name="nm_config" value="<?= $data->NM_CONFIG ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="nbm">Keterangan :</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $data->KETERANGAN ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="nbm">Jumlah Maksimal Voting :</label>
                            <input type="text" class="form-control" id="jml_max_vote" name="jml_max_vote" value="<?= $data->JML_MAX_VOTE ?>">
                        </div>
                        <div class="form-group">
                            <label for="nbm">Tanggal Voting :</label>
                            <input type="text" class="form-control datepicker" id="tanggal_vote" name="tanggal_vote" value="<?= $data->TANGGAL_VOTE ?>" readonly>
                        </div>

                        <input type="hidden" name="id_config" name="id_config" value="<?= $data->ID_CONFIG ?>" />
                        <input type="hidden" name="id_jenis_vote" name="id_jenis_vote" value="<?= $data->ID_JENIS_VOTE ?>" />
                        <br>
                        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                    </form>
                </div>

            </div>
        </div>
    </div>


<?php } ?>