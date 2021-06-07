<?php
include_once('connection.php');
$query = "SELECT * FROM peringkat ORDER BY SkorKuis DESC";
$result = mysqli_query($kon, $query);
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

    <title>PERINGKAT KUIS | EDU-COVID</title>
  </head>
  <body id="peringkat-page">
    
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
                <a class="nav-link js-scroll-trigger" href="Beranda.html">BERANDA <span class="sr-only">(current)</span></a>
              </li>
            <li class="nav-item active">
              <a class="nav-link js-scroll-trigger" href="Pencegahan.html">PENCEGAHAN COVID-19 <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link js-scroll-trigger" href="Data dan Statistik.html">DATA DAN STATISTIK <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link js-scroll-trigger" href="Kuis.php"><b>KUIS <span class="sr-only">(current)</span></b></a>
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
      </nav><br><br><br>

      <div class="container mt-5">
        <h2 class="alert alert-primary text-center">Peringkat Kuis</h2>
      </div><br>

  <div class="container mb-3">
		<div class="row">
			<div class="col-sm-6 offset-sm-3">
				<table class="table table-bordered">
					<t>
						<!-- <td>Peringkat</td> -->
						<th>Nama</th>
						<th>Skor Kuis</th>
					</t>

				<?php
          while($rows = mysqli_fetch_assoc($result)){
        ?>
            <tr>
              <!-- <td><?php echo $rows['PK']; ?></td> -->
              <td><?php echo $rows['Nama']; ?></td>
              <td><?php echo $rows['SkorKuis']; ?></td>
            </tr>
        <?php
          }
        ?>
				</table>
			</div>
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
