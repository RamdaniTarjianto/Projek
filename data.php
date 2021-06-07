  <?php
    session_start();
    if(!($_SESSION['akses'] == 'admin' || $_SESSION['akses'] == 'manage')){
      header("Location: Beranda.php");
    }
    include("Koneksi.php");
    if (isset($_POST["submit"])) {

        if (registrasi_kota($_POST) > 0) {
            echo "<script>
              alert('Berhasil di tambahkan!'); 
            </script>";
        } else {
            echo mysqli_error($kon);
        }
    }
    ?>

  <?php

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

      <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Patrick+Hand&display=swap" rel="stylesheet">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

      <!--MY CSS-->
      <link rel="stylesheet" href="data.css">

      <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js"></script>
      <title>EDU COVID</title>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
              <a class="nav-link" href="index.php#pendataan">Pendataan Penyebaran<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
              <a class="nav-link" href="index.php#chartContainer">Statistik <span class="sr-only">(current)</span></a>
          </li>
          <?php
            if($_SESSION['akses'] == 'admin'){
                echo "<li class='nav-item active'><a class='nav-link' href='manage.php'>Manage Penyebaran <span class='sr-only'>(current)</span></a></li>";
            }
          ?>
          </ul>
          <form class="form-inline my-2 my-lg-0">
          <ul class="navbar-nav mr-auto">  
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?= $_SESSION['username']; ?>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <?php
                    if($_SESSION['akses'] == 'admin'){
                        echo "<a class='dropdown-item' href='tambah-admin.php'>Tambah Admin</a>";
                    }
                  ?>
                  
                  <a class="dropdown-item" href="logout.php">Logout</a>
                  </div>
              </li>
            <ul>
          </form>
      </div>
    </nav>

      <div class="head-pencegahan">

          <!-- JUMBOTROON -->
          <!--  <div class="jumbotron jum-pen"> -->
          <!-- <h1 class="display-4 font-weight-bold">PENDATAAN COVID-19</h1>
              <p></p> -->
          <!-- <p class="lead">Halaman ini untuk memasukan informasi mengenai
                  jumlah dan lokasi penyebaran COVID-19</p>
              <br> -->
          <!-- <a class="btn btn-home bg-transparent btn-lg font-weight-bold " href="#porto" role="button">Halaman Sebelumnya</a> -->
          <!-- </div> -->


          <!--  -->
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



          <!--  -->
          <section id="contact" class="contact mb-2">
              <div class="container con-form">
                  <div class="row mb-4">
                      <div class="col text-center">

                          <h2>PENDATAAN COVID-19</h2>
                          <br>
                      </div>
                  </div>

                  <div class="row justify-content-center">
                      <div class="col-lg-5">
                          <img src="img/log.svg" alt="" class="img-fluid">
                      </div>
                      <div class="col-lg-6">
                          <form class="form-horizontal" method="post" id="pendataan">
                              <!--  -->
                              <div class="form-group">
                                  <label class="control-label">Provinsi</label>
                                  <div class="">
                                      <?php
                                        $sql_provinsi = mysqli_query($kon, "SELECT * FROM provinces ORDER BY name ASC");
                                        ?>
                                      <select class="select2 form-control" name="provinsi" id="provinsi">
                                          <option></option>
                                          <?php
                                            while ($rs_provinsi = mysqli_fetch_assoc($sql_provinsi)) {
                                                echo '<option  value="' . $rs_provinsi['name'] . '">' . $rs_provinsi['name'] . '</option>';
                                            }
                                            ?>
                                      </select>
                                      <img src="asset/img/loading.gif" width="35" id="load1" style="display:none;" />
                                  </div>
                                  <br>
                                  <!--  -->
                                  <div class="form-group">
                                      <label for="nama">Jumlah Positif</label>
                                      <input type="text" class="form-control" id="positif" name="positif">
                                  </div>

                                  <!--  -->
                                  <div class="form-group">
                                      <label for="nama">Jumlah Sembuh</label>
                                      <input type="text" class="form-control" id="sembuh" name="sembuh">
                                  </div>

                                  <!--  -->
                                  <div class="form-group">
                                      <label for="nama">Jumlah Meninggal</label>
                                      <input type="text" class="form-control" id="meninggal" name="meninggal">
                                  </div>
                                  <!--  -->

                                  <!--  -->
                                  <div class="form-group">
                                      <label for="nama">Jumlah Spesimen Diperiksa</label>
                                      <input type="text" class="form-control" id="spesimen_diperiksa" name="spesimen_diperiksa">
                                  </div>
                                  <!--  -->

                                  <!--  -->
                                  <div class="form-group">
                                      <label for="nama">Jumlah Orang Diperiksa</label>
                                      <input type="text" class="form-control" id="orang_diperiksa" name="orang_diperiksa">
                                  </div>
                                  <!--  -->

                                  <div class="form-group">
                                      <label>Tanggal</label>
                                      <input type="date" id="birthday" name="tanggal" class="form-control">
                                  </div>
                              </div>

                              <input type="submit" value="Masukan Data" class="btn solid" name="submit" />
                      </div>
                  </div>

                  <!--  -->
                  </form>
              </div>
          </section>
      </div>



      <!-- 
    <canvas id="myChart" width="400" height="400"></canvas> -->
      <div id="chartContainer" class="py-5" style="height: 90vh; width: 100%;"></div>
      <script src=" https://canvasjs.com/assets/script/canvasjs.min.js">
      </script>
      <br>
      <br><br>
      <br>


      <center>
          <canvas id=Positip style="height: 70vh; width: 100%;"></canvas>
      </center>

      <center>
          <canvas id=Sembuh style="height: 90vh; width: 100%;"></canvas>
      </center>



      <br>
      <br>
      <footer class=" footer">
          <div class="container">
              <div class="row">
                  <div class="footer-col">
                      <h4>contact us</h4>
                      <ul>
                          <li><a href="#">Menara Yarsi,
                                  <br>Jl.Letjend Suprapto No.Kav.13</a></li>
                          <li><a href=""> </a></li>
                          <li><a href="#"><i class="fas fa-phone-square-alt"></i>+6221 0211 234</a></li>
                          <li><a href="#"><i class="far fa-envelope"></i> UYarsi@gmail.com</a></li>
                          <li><a href="#"><i class="fas fa-map-marker-alt"></i>Cempaka Putih</a></li>
                      </ul>
                  </div>
                  <div class="footer-col">
                      <h4>Services</h4>
                      <ul>
                          <li><a href="#">Home</a></li>
                          <li><a href="#">Pencegahan Covid</a></li>
                          <li><a href="#">Data dan Statistik</a></li>
                          <li><a href="#">Kuis</a></li>
                          <li><a href="#">Kontak</a></li>
                      </ul>
                  </div>
                  <div class="footer-col">
                      <h4>Anggota Kelompok</h4>
                      <ul>
                          <li><a href="#">Muhammad Azhari</a></li>
                          <li><a href="#">Muhammad Rafi Triandi</a></li>
                          <li><a href="#">Muhammad Rizky Yuhari</a></li>
                          <li><a href="#">Naufal Syarif</a></li>
                          <li><a href="#">Ramdani Tarjianto</a></li>
                      </ul>
                  </div>
                  <div class="footer-col">
                      <h4>follow us</h4>
                      <div class="social-links">
                          <a href="#"><i class="fab fa-facebook-f"></i></a>
                          <a href="#"><i class="fab fa-twitter"></i></a>
                          <a href="#"><i class="fab fa-instagram"></i></a>
                          <a href="#"><i class="fab fa-linkedin-in"></i></a>
                      </div>
                  </div>
              </div>
          </div>
      </footer>



      <!-- Optional JavaScript; choose one of the two! -->

      <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

      <!-- Option 2: Separate Popper and Bootstrap JS -->
      <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
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

  </body>

  </html>