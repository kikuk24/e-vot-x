<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="container-fluid px-4">
    <h1 class="mt-4">E-Voting MusCab</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Muhammadiyah & Aisyiyah</li>
    </ol>
    <?php
    if ($this->uri->segment(3) == 'muhammadiyah') {
        $id_jenis_vote = '1';
    } else {
        $id_jenis_vote = '2';
    }
    ?>
    <a href="<?= site_url('panitia/pemilih/import/' . $id_jenis_vote) ?>"><button class="btn btn-success btn-xs"><i class="fas fa-file-import"></i> Import Excel</button></a>
    <a href="<?= site_url('panitia/pemilih/cetak/' . $id_jenis_vote) ?>" target="new"><button class="btn btn-warning"><i class="fas fa-print"></i> Cetak Kartu Pemilih</button></a>

    <div class="card mb-4">

        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DATA PEMILIH <?= strtoupper($this->uri->segment(3)); ?>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NBM</th>
                        <th>Nama Lengkap</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 1;
                    foreach ($pemilih as $row) { ?>
                        <tr>
                            <td><?= $no++ . '.' ?></td>
                            <td><?= $row->NBM ?></td>
                            <td><?= $row->NM_PEMILIH ?></td>
                            <td><img src="<?= base_url() ?>/file/foto/<?= $row->FOTO ?>" height="60" width="50" /></td>
                            <td>
                                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#myModalEdit<?= $row->ID_PEMILIH ?>"> <i class="fas fa-pen-square"></i> </button>
                                <a href="<?= site_url('panitia/pemilih/delete/' . $row->ID_PEMILIH) ?>" onclick="return confirm('Anda yakin akan menghapus data Calon ini?')"><button class="btn btn-danger"> <i class="fas fa-trash"></i> </button></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php foreach ($pemilih as $data) { ?>
    <!-- Modal -->
    <div class="modal fade" id="myModalEdit<?= $data->ID_PEMILIH ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Edit Data Pemilih</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('panitia/pemilih/edit') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nbm">NBM :</label>
                            <input type="text" class="form-control" id="nbm" name="nbm" value="<?= $data->NBM ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="nm_pemilih">Nama Lengkap :</label>
                            <input type="text" class="form-control" id="nm_pemilih" name="nm_pemilih" value="<?= $data->NM_PEMILIH ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto :</label>
                            <input type="file" class="form-control" id="foto" name="foto">
                        </div>
                        <input type="hidden" name="id_jenis_vote" name="id_jenis_vote" value="<?= $data->ID_JENIS_VOTE ?>" />
                        <input type="hidden" name="old_foto" name="old_foto" value="<?= $data->FOTO ?>" />
                        <input type="hidden" name="id_pemilih" name="id_pemilih" value="<?= $data->ID_PEMILIH ?>" />
                        <br>
                        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

<?php } ?>