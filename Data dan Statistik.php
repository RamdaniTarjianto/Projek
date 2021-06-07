<?php
    session_start();
    include("Koneksi.php");
    if(!isset($_SESSION['username'])){
      header("Location: index.php");
    }
    $sembuh_keseluruhan = mysqli_query($kon, "SELECT SUM(sembuh) AS
    sembuh FROM data_covid");
    $sembuh_keseluruhan = mysqli_fetch_assoc($sembuh_keseluruhan);

    $positif_keseluruhan = mysqli_query($kon, "SELECT SUM(positif) AS
    positif FROM data_covid");
    $positif_keseluruhan = mysqli_fetch_assoc($positif_keseluruhan);

    $meninggal_keseluruhan = mysqli_query($kon, "SELECT SUM(meninggal) AS
    meninggal FROM data_covid");
    $meninggal_keseluruhan = mysqli_fetch_assoc($meninggal_keseluruhan);

    $spesimen_diperiksa_keseluruhan = mysqli_query($kon, "SELECT SUM(spesimen_diperiksa) AS
    spesimen_diperiksa FROM data_covid");
    $spesimen_diperiksa_keseluruhan = mysqli_fetch_assoc($spesimen_diperiksa_keseluruhan);

    $orang_diperiksa_keseluruhan = mysqli_query($kon, "SELECT SUM(orang_diperiksa) AS
    orang_diperiksa FROM data_covid");
    $orang_diperiksa_keseluruhan = mysqli_fetch_assoc($orang_diperiksa_keseluruhan);

    
    $data_provinsi = mysqli_query($kon, "SELECT provinsi FROM data_covid GROUP BY provinsi");
    $positif = mysqli_query($kon, "SELECT SUM(positif) AS
    sold FROM data_covid GROUP BY provinsi");

    $data_provinsi_sembuh = mysqli_query($kon, "SELECT provinsi FROM data_covid GROUP BY provinsi");
    $sembuh = mysqli_query($kon, "SELECT SUM(sembuh) AS
    sold1 FROM data_covid GROUP BY provinsi");
    ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css.css">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Patrick+Hand&display=swap" rel="stylesheet">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

      <!--MY CSS-->
      <link rel="stylesheet" href="data.css">

      <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js"></script>

    <title>DATA DAN STATISTIK | EDU-COVID</title>
  </head>
  <body id="data-page">
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-info fixed-top"  id="navbarBeranda" fixed-top>
        <div class="container">
        <nav>
            <a href="Beranda.html"><img src="LOGO.png" width="150" height="50" alt="web"></a>
        </nav>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link js-scroll-trigger" href="Beranda.php">BERANDA <span class="sr-only">(current)</span></a>
              </li>
            <li class="nav-item active">
              <a class="nav-link js-scroll-trigger" href="Pencegahan.html">PENCEGAHAN COVID-19 <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link js-scroll-trigger" href="Data dan Statistik.php"><b>DATA DAN STATISTIK <span class="sr-only">(current)</span></b></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link js-scroll-trigger" href="Kuis.php">KUIS <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link js-scroll-trigger" href="Kontak.html">KONTAK <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link js-scroll-trigger" href="logout.php">LOGOUT <span class="sr-only">(current)</span></a>
            </li>
          </ul>
        </div>
        </div>
      </nav><br><br>

      <div class="container mt-5">
        <h2 class="alert alert-primary text-center">Data dan Statistik COVID-19 Tanggal 25 Maret 2021</h2>
      </div>

      <div class="container data_card">
              <div class="row my-5">
                  <div class="card col bg-danger mx-4" style="width: 200rem;">
                      <div class="card-body">
                          <div class="row">
                              <h1 class="card-title"><?= number_format(($sembuh_keseluruhan['sembuh'] + $meninggal_keseluruhan['meninggal'] + $positif_keseluruhan['positif']), 0, '', '.') ?></h1>
                              <h3 class="card-text">TERKONFIRMASI</h3>
                          </div>
                          <i class="mx-3 fas fa-viruses"></i>
                      </div>
                  </div>
                  <div class="card col bg-success mx-4" style="width: 100rem;">
                      <div class="card-body">
                          <div class="row">
                              <h1 class="card-title"><?= number_format($sembuh_keseluruhan['sembuh'], 0, '', '.') ?></h1>
                              <h3 class="card-text">KASUS SEMBUH</h3>
                          </div>
                          <i class="mx-3 fas fa-notes-medical"></i>
                      </div>
                  </div>
                  <div class="card col bg-info mx-4" style="width: 100rem;">
                      <div class="card-body">
                          <div class="row">
                              <h1 class="card-title"><?= number_format($meninggal_keseluruhan['meninggal'], 0, '', '.') ?></h1>
                              <h3 class="card-text">KASUS KEMATIAN</h3>
                          </div>
                          <i class="mx-3 fas fa-skull-crossbones"></i>
                      </div>
                  </div>
                  <div class="card col bg-warning mx-4" style="width: 100rem;">
                      <div class="card-body">
                          <div class="row">
                              <h1 class="card-title"><?= number_format($positif_keseluruhan['positif'], 0, '', '.') ?></h1>
                              <h3 class="card-text">KASUS AKTIF</h3>
                          </div>
                          <i class="mx-3 fas fa-skull-crossbones"></i>
                      </div>
                  </div>

              </div>

              <!--  -->
              <div class="row my-5">
                  <div class="card col bg-secondary mx-4" style="width: 200rem;">
                      <div class="card-body">
                          <div class="row">
                              <h1 class="card-title"><?= number_format($spesimen_diperiksa_keseluruhan['spesimen_diperiksa'], 0, '', '.') ?></h1>
                              <h3 class="card-text">TOTAL SPESIMEN DIPERIKSA</h3>
                              <h4 class="card-text">PCR + TCM = <?= number_format($spesimen_diperiksa_keseluruhan['spesimen_diperiksa'], 0, '', '.') ?></h4>
                          </div>
                          <i class="mx-3 fas fa-viruses"></i>
                      </div>
                  </div>
                  <div class="card col bg-secondary mx-4" style="width: 100rem;">
                      <div class="card-body">
                          <div class="row">
                              <h1 class="card-title"><?= number_format($orang_diperiksa_keseluruhan['orang_diperiksa'], 0, '', '.') ?></h1>
                              <h3 class="card-text">TOTAL ORANG DIPERIKSA</h3>
                              <h4 class="card-text">PCR + TCM = <?= number_format($orang_diperiksa_keseluruhan['orang_diperiksa'], 0, '', '.') ?></h4>
                          </div>
                          <i class="mx-3 fas fa-notes-medical"></i>
                      </div>
                  </div>
              </div>
              <!--  -->
          </div>
      </div><br><br><br>

      <div id="chartContainer" class="py-5" style="height: 90vh; width: 100%;"></div>
      <script src=" https://canvasjs.com/assets/script/canvasjs.min.js">
      </script>

      <center>
          <canvas id=Positip style="height: 70vh; width: 100%;"></canvas>
      </center>

      <center>
          <canvas id=Sembuh style="height: 90vh; width: 100%;"></canvas>
      </center>


      <nav class="navbar navbar-expand-lg navbar-dark bg-info fixed-bottom"  id="footer-Beranda">
        <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavv" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavv">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link js-scroll-trigger" href="https://www.instagram.com/naufals_/">Instagram <span class="sr-only"></span></a>
              </li>
            <li class="nav-item active">
              <a class="nav-link js-scroll-trigger" href="https://www.youtube.com/channel/UCPntr6FEwIdjGwa5fWHZZGA">Youtube <span class="sr-only"></span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link js-scroll-trigger" href="https://github.com/naufalsy">Github <span class="sr-only"></span></a>
            </li>
          </ul>
        </div>
        </div>
      </nav>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <script src="js/data.js">
      </script>

      <script>
          var ctx = document.getElementById("Positip").
          getContext('2d');
          var mychart = new Chart(ctx, {
              type: 'bar',
              data: {
                  labels: [<?php while ($row = mysqli_fetch_array($data_provinsi)) {
                                echo '"' . $row['provinsi'] . '",';
                            } ?>],
                  datasets: [{
                      label: 'Jumlah Positif',
                      data: [<?php while ($row =
                                    mysqli_fetch_array($positif)
                                ) {
                                    echo
                                    '"' . $row['sold'] . '",';
                                } ?>],
                      backgroundColor: ['#7FFFD4',
                          '#17BEBB', '#FFC914', '#7FFF00',
                          '#9932CC', '#008000', '#17BEBB'
                      ],
                      borderWidth: 1
                  }]
              },
              options: {
                  scales: {
                      yAxes: [{
                          ticks: {
                              beginAtZero: true
                          }
                      }]
                  }
              }
          })
      </script>
      <!--  -->
      <script>
          var ctx = document.getElementById("Sembuh").
          getContext('2d');
          var mychart = new Chart(ctx, {
              type: 'bar',
              data: {
                  labels: [<?php while ($row = mysqli_fetch_array($data_provinsi_sembuh)) {
                                echo '"' . $row['provinsi'] . '",';
                            } ?>],
                  datasets: [{
                      label: 'Jumlah Sembuh',
                      data: [<?php while ($row =
                                    mysqli_fetch_array($sembuh)
                                ) {
                                    echo
                                    '"' . $row['sold1'] . '",';
                                } ?>],
                      backgroundColor: ['#7FFFD4',
                          '#17BEBB', '#FFC914', '#7FFF00',
                          '#9932CC', '#008000', '#17BEBB'
                      ],
                      borderWidth: 1
                  }]
              },
              options: {
                  scales: {
                      yAxes: [{
                          ticks: {
                              beginAtZero: true
                          }
                      }]
                  }
              }
          })
      </script>
      <!--  -->
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
