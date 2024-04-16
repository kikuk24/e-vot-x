<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="container-fluid px-4">
    <h1 class="mt-4">E-Voting MusCab</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Muhammadiyah & Aisyiyah</li>
    </ol>
    <?php
    if ($jenis_vote == '1') {
        $jenis = "Muhammadiyah";
    } else {
        $jenis = "Aisyiyah";
    }
    ?>

    <div class="card mb-4">

        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            STATUS PEMILIH <?= strtoupper($jenis); ?>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>NBM</th>
                        <th>Nama Lengkap</th>
                        <th>Status Vote</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 1;
                    foreach ($pemilih as $row) { ?>
                        <tr>
                            <td><?= $no++ . '.' ?></td>
                            <td><?= $row->KODE ?></td>
                            <td><?= $row->NBM ?></td>
                            <td><?= $row->NM_PEMILIH ?></td>
                            <td>
                                <?php
                                $jml_max = $config->JML_MAX_VOTE;
                                $jml_pilihan = $this->votinglib->jmlSuara($row->ID_PEMILIH);
                                $jml_kurang = $jml_max - $jml_pilihan;
                                ?>
                                <?php if ($jml_pilihan == 0) : ?>
                                    <button class="btn btn-danger"> Belum Mulai </button>
                                <?php endif; ?>

                                <?php if ($jml_pilihan > 0 && $jml_pilihan < $jml_max) : ?>
                                    <button class="btn btn-warning"> Kurang <?= $jml_kurang ?> </button>
                                <?php endif; ?>
                                <?php if ($jml_max == $jml_pilihan) : ?>
                                    <button class="btn btn-success"> Selesai </button>
                                <?php endif; ?>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>