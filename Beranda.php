<?php
  session_start();
  if(!isset($_SESSION['username'])){
    header("Location: index.php");
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>BERANDA | EDU-COVID</title>
  </head>
  <body id="beranda-page" >
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-info fixed-top"  id="navbar-Beranda">
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
                <a class="nav-link js-scroll-trigger" href="Beranda.php"><b>BERANDA <span class="sr-only">(current)</span></b></a>
              </li>
            <li class="nav-item active">
              <a class="nav-link js-scroll-trigger" href="Pencegahan.html">PENCEGAHAN COVID-19 <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link js-scroll-trigger" href="Data dan Statistik.php">DATA DAN STATISTIK <span class="sr-only">(current)</span></a>
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
      </nav><br><br><br><br>

      <div class="jumbotron jumbotron-fluid" id="jumbotron-beranda">
        <div class="container">
          <h1 class="display-4"><b>EDU-COVID</b></h1>
          <p class="lead">Apa itu EDU-COVID?</p>
          <br><br>
          <p class="lead">EDU-COVID adalah website yang dibuat untuk mengedukasi masyarakat tentang pentingnya mencegah penularan virus COVID-19 di lingkungan sekitar. Diharapkan website ini bisa membuat masyarakat sadar betapa pentingnya menjaga kesehatan dan kebersihan agar terhindar dari virus COVID-19.</p>
        </div>
      </div>


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

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
