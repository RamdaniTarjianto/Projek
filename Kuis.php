<?php
include "Koneksi.php";
session_start();
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

    <title>KUIS | EDU-COVID</title>
  </head>
  <body id="kuis-page">
    
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
              <a class="nav-link js-scroll-trigger" href="Beranda.php">BERANDA <span class="sr-only">(current)</span></a>
            </li>
          <li class="nav-item active">
            <a class="nav-link js-scroll-trigger" href="Pencegahan.html">PENCEGAHAN COVID-19 <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link js-scroll-trigger" href="Data dan Statistik.php">DATA DAN STATISTIK <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
              <a class="nav-link js-scroll-trigger" href="Kuis.php"><b>KUIS</b> <span class="sr-only">(current)</span></a>
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
        <h2 class="alert alert-primary text-center">Kuis Seputar COVID-19</h2>
      </div>

      <script>
          nama = prompt("Siapa nama kamu?", "");
          if (nama == "") {
            nama = "anonymous";
          }
          alert("Hello " + nama);
      </script>

      <form class="container" name=kuis action="Peringkat.php">
        <div><b>Jawablah pertanyaan di bawah ini untuk melihat seberapa paham anda tentang virus COVID-19.</b></div><br>

        <div class="question1">1. Manakah yang termasuk gejala COVID-19?</div><br>
        <div class="answer1">
          <input type="radio" value="a" name="nomor1">a. Mata berair<br>
          <input type="radio" value="b" name="nomor1">b. Muntah<br>
          <input type="radio" value="c" name="nomor1">c. Deman<br>
          <input type="radio" value="d" name="nomor1">d. Berkeringat<br>
          <input type="radio" value="e" name="nomor1">e. Bintik-bintik merah<br>
        </div><br><br>

        <div class="question2">2. Bagaimana cara mencegah penularan virus COVID-19?</div><br>
        <div class="answer2">
          <input type="radio" value="a" name="nomor2">a. Berkumpul dengan teman<br>
          <input type="radio" value="b" name="nomor2">b. Menonton kartun<br>
          <input type="radio" value="c" name="nomor2">c. Begadang<br>
          <input type="radio" value="d" name="nomor2">d. Bermain game<br>
          <input type="radio" value="e" name="nomor2">e. Mencuci tangan dengan sabun sebelum makan<br>
        </div><br><br>

        <div class="question3">3. Apakah yang harus kita lakukan jika tetangga kita terkena virus COVID-19?</div><br>
        <div class="answer3">
          <input type="radio" value="a" name="nomor3">a. Menanyakan kabarnya<br>
          <input type="radio" value="b" name="nomor3">b. Mengucilkannya<br>
          <input type="radio" value="c" name="nomor3">c. Menjenguknya<br>
          <input type="radio" value="d" name="nomor3">d. Tidak keluar rumah<br>
          <input type="radio" value="e" name="nomor3">e. Menyembuhkannya<br>
        </div><br><br>

        <div class="question4">4. Di bawah ini manakah vaksin yang digunakan untuk virus COVID-19?</div><br>
        <div class="answer4">
          <input type="radio" value="a" name="nomor4">a. Vaksin Influenza<br>
          <input type="radio" value="b" name="nomor4">b. Vaksin Tifoid<br>
          <input type="radio" value="c" name="nomor4">c. Vaksin Pneumokokus<br>
          <input type="radio" value="d" name="nomor4">d. Vaksin Sinovac<br>
          <input type="radio" value="e" name="nomor4">e. Vaksin Meningitis<br>
        </div><br><br>
        
        <div class="question5">5. Tes yang digunakan untuk mendeteksi virus COVID-19 adalah...</div><br>
        <div class="answer5">
          <input type="radio" value="a" name="nomor5">a. Tes Antigen<br>
          <input type="radio" value="b" name="nomor5">b. Tes Hemoglobin<br>
          <input type="radio" value="c" name="nomor5">c. Tes Urine<br>
          <input type="radio" value="d" name="nomor5">d. Tes Diabetes<br>
          <input type="radio" value="e" name="nomor5">e. Tes Rhesus<br>
        </div><br>

        <button type="submit" id="btnSubmit" class="btn btn-primary" onclick="nilai(document.kuis.nomor1.value, document.kuis.nomor2.value, document.kuis.nomor3.value, document.kuis.nomor4.value, document.kuis.nomor5.value)">Submit</button>
      </form><br><br>

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
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

      <script type="text/javascript">
        var nama;
        var poin = 0;

        function nilai(jawaban1, jawaban2, jawaban3, jawaban4, jawaban5){
    
          var jawabanBenar = []
          jawabanBenar[1] = 'c';
          jawabanBenar[2] = 'e';
          jawabanBenar[3] = 'd';
          jawabanBenar[4] = 'd';
          jawabanBenar[5] = 'a';

          if(jawaban1==jawabanBenar[1]){
            poin = poin + 20;
          }
          if(jawaban2==jawabanBenar[2]){
            poin = poin + 20;
          }
          if(jawaban3==jawabanBenar[3]){
            poin = poin + 20;
          }
          if(jawaban4==jawabanBenar[4]){
            poin = poin + 20;
          }
          if(jawaban5==jawabanBenar[5]){
            poin = poin + 20;
          }
          alert("Selamat " + nama + ", anda mendapatkan nilai " + poin);
          
        }
        `$.post("Submit.php", {"nama":nama, "nilai":poin}, function(response){
          alert('Nilai Terkirim!');
        });`

        $.ajax({
          type : "POST",
          url : "Submit.php",
          data : "nama="+nama+"&nilai="+poin,
        })
        
      </script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->

    <script src="js.js"></script>
  </body>
</html>
s