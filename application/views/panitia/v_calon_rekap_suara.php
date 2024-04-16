<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="container-fluid px-4">
    <h1 class="mt-4">E-Voting MusCab</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Ikatan Pelajar Muhammadiyah</li>
    </ol>
    <?php
    if ($jenis_vote == '1') {
        $_kode = "Muhammadiyah";
    } else {
        $_kode = "Aisyiyah";
    }
    ?>

    <div class="card mb-4">
        <button class="btn btn-warning">Full Halaman</button>
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DATA CALON <?= strtoupper($_kode); ?>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NBA</th>
                        <th>Nama Lengkap</th>
                        <th>Asal</th>
                        <th>Foto</th>
                        <th>Jumlah Suara</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 1;
                    foreach ($calon as $row) { ?>
                        <tr>
                            <td><?= $no++ . '.' ?></td>
                            <td><?= $row->NBM ?></td>
                            <td><?= $row->NM_CALON ?></td>
                            <td><?= $row->ASAL_CALON ?></td>
                            <td><img src="<?= base_url() ?>/file/foto/<?= $row->FOTO ?>" height="60" width="50" /></td>
                            <td><?= $row->JUMLAH ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>