<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Tiket Pemilihan Musycab</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <link href="<?= base_url('aset') ?>/css/styles.css" rel="stylesheet" />

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <style type="text/css">
        @media print {

            body,
            page {
                background: white;
                margin: 0;
                box-shadow: 0;
            }
        }

        .judul {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 11pt;
            font-weight: bold;
            text-transform: uppercase;
            text-align: center;
        }

        .kode {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 20pt;
            font-weight: bold;
            text-align: center;
        }

        .cetak {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 8pt;
            text-transform: uppercase;
            text-align: center;
        }

        .card {
            border: none;
            border-radius: 0;
            background: white;
            margin-bottom: 0px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

        }
    </style>
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>assets/images/ipm.png">
</head>

<body>
    <div class="container">
        <div class="row g-3">
            <?php foreach ($pemilih as $row) { ?>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="judul">kode kartu suara</h1>
                        </div>
                        <div class="card-body">
                            <p class="cetak"><?= $row->NM_PEMILIH ?></p>
                            <p class="kode"><?= $row->KODE ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>