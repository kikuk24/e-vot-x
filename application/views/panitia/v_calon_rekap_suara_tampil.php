<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Aplikasi E-Voting PCM dan PCA, Muhammadiyah, Musyawarah Cabang, E-Voting" />
    <meta name="author" content="afandi" />
    <title>Panitia - Musyawarah Cabang IPM</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <link href="<?= base_url('aset') ?>/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- CSS Bootstrap Datepicker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    
</head>

<body class="sb-nav-fixed">
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

            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                DATA CALON <?= strtoupper($_kode); ?>
            </div>
            <div class="card-body">
                <table class="table">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url('aset') ?>/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <!-- <script src="<?= base_url('aset') ?>/assets/demo/chart-area-demo.js"></script> -->
    <!-- <script src="<?= base_url('aset') ?>/assets/demo/chart-bar-demo.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- <script src="<?= base_url('aset') ?>/js/datatables-simple-demo.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript">
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd'
        });
    </script>
</body>

</html>