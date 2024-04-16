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
    
    <canvas id="myChart" width="80%"></canvas>
    <?php
    $suara = '';
    $nama = '';
    foreach ($calon as $c) {
        $suara .= $c->JUMLAH . ',';
        $nama .= "'" . $c->NM_CALON . "',";
    }
    ?>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script type="text/javascript">
    console.log(<?= $nama ?>);
    const ctx = document.getElementById('myChart').getContext('2d');

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: [<?= $nama; ?>],
        datasets: [{
          label: 'Jumlah Suara',
          // backgroundColor: ['rgb(255, 205, 86)'],
          // borderColor: ['rgb(255, 99, 132)', 'rgb(255, 159, 64)', 'rgb(255, 205, 86)', 'rgb(75, 192, 192)', 'rgb(54, 162, 235)', 'rgb(153, 102, 255)', 'rgb(201, 203, 207)'],
          data: [<?= $suara; ?>],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="<?= base_url('aset') ?>/js/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="<?= base_url('aset') ?>/assets/demo/chart-area-demo.js"></script>
  <script src="<?= base_url('aset') ?>/assets/demo/chart-bar-demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
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