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

    <div id="chart" width="80%"></div>
    <?php
    $suara = '';
    $nama = '';
    foreach ($calon as $c) {
      $suara .= $c->JUMLAH . ',';
      $nama .= "'" . $c->NM_CALON . "',";
    }
    ?>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script type="text/javascript">
    // var options = {
    //   chart: {
    //     type: 'bar',
    //     height: 500,

    //     animations: {
    //       enabled: true,
    //       easing: 'linear',
    //       dinamicAnimation: {
    //         speed: 1000
    //       }
    //     }
    //   },
    //   plotOptions: {
    //     bar: {
    //       horizontal: true,
    //     }
    //   },
    //   dataLabels: {
    //     enabled: false
    //   },
    //   stroke: {
    //     curve: 'smooth',
    //   },
    //   title: {
    //     text: 'Grafik Perolehan Suara',
    //     align: 'center'
    //   },
    //   series: [{
    //     name: 'suara',
    //     data: [<?= $suara; ?>]
    //   }],
    //   xaxis: {
    //     categories: [<?= $nama; ?>]
    //   },
    // }
    $(document).ready(function() {
      var options = {
        chart: {
          type: 'bar',
          height: 700,

          animations: {
            enabled: true,
            easing: 'linear',
            dinamicAnimation: {
              speed: 1000
            },
            dynamicAnimation: {
              speed: 1000
            }
          }
        },
        plotOptions: {
          bar: {
            horizontal: true,
          }
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'smooth',
        },
        title: {
          text: 'Grafik Perolehan Suara',
          align: 'center'
        },
        series: [{
          name: 'suara',
          data: []
        }],
        xaxis: {
          categories: []
        },
      }
      var chart = new ApexCharts(document.querySelector("#chart"), options);
      chart.render();

      function fetchData() {
        $.ajax({
          url: "<?= site_url('panitia/grafik/get_suara') ?>",
          type: "GET",
          dataType: "JSON",
          success: function(data) {
            suara = data.map(function(item) {
              return item.JUMLAH
            })
            nama = data.map(function(item) {
              return item.NM_CALON
            })
            chart.updateOptions({
              xaxis: {
                categories: nama
              }
            })
            chart.updateSeries([{
              name: 'suara',
              data: suara
            }]);
          }
        })
      }
      fetchData();
      setInterval(fetchData, 1000);
    })
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="<?= base_url('aset') ?>/js/scripts.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script> -->
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