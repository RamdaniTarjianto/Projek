<?php
	//Koneksi Database
	$server = "localhost";
	$user = "root";
	$pass = "";
	$database = "projek";

	session_start();

	if(!$_SESSION['akses'] == 'admin'){
		header("Location: index.php");
	}
	$koneksi = mysqli_connect($server, $user, $pass, $database)or die (mysql_error($koneksi));

	//jika tombol simpan diklik
	if (isset($_POST['bsimpan'])) {

		//Pengujian apakah data akan diedit atau disimpan baru
		if ($_GET['hal'] == "edit") {
			//Data akan di edit
			$edit = mysqli_query($koneksi, " UPDATE data_covid set
											provinsi = '$_POST[tprovinsi]',
											positif = '$_POST[tpositif]',
											sembuh = '$_POST[tsembuh]',
											meninggal = '$_POST[tmeninggal]',
											tanggal = '$_POST[ttanggal]'
											WHERE id = '$_GET[id]' 
											");
			// Jika edit sukses
			if ($edit){
				echo "<script>
						alert('EDIT DATA SUKSES!!!');
						document.location = 'manage.php';
					</script>";
			}else{
				echo "<script>
						alert('EDIT DATA GAGAL!!!');
						document.location = 'manage.php';
					</script>";
			}
		}else{
			//Data akan disimpan baru
			$simpan = mysqli_query($koneksi, "INSERT INTO data_covid(provinsi, positif, sembuh, meninggal, tanggal)
										VALUES 	('$_POST[tprovinsi]',
												'$_POST[tpositif]', 
												'$_POST[tsembuh]', 
												'$_POST[tmeninggal]'),
												'$_POST[ttanggal]')
												");
			// Jika simpan sukses
			if ($simpan){
				echo "<script>
						alert('SIMPAN DATA SUKSES!!!');
						document.location = 'manage.php';
					</script>";
			}else{
				echo "<script>
						alert('SIMPAN DATA GAGAL!!!');
						document.location = 'manage.php';
					</script>";
			}
		}



	}

	//Pengujian jika tombol Edit / Hapus di klik
	if(isset($_GET['hal']))
	{
		//Pengujian jika edit Data
		if($_GET['hal'] == "edit")
		{
			//Tampilkan Data yang akan diedit
			$tampil = mysqli_query($koneksi, "SELECT * FROM data_covid WHERE id = '$_GET[id]' ");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{
				//Jika data ditemukan, maka data ditampung ke dalam variabel
				$vprovinsi = $data['provinsi'];
				$vpositif = $data['positif'];
				$vsembuh = $data['sembuh'];
				$vmeninggal = $data['meninggal'];
				$vtanggal = $data['tanggal'];
			}
		}
		else if ($_GET['hal'] == "hapus")
		{
			//Persiapan hapus data
			$hapus = mysqli_query($koneksi, "DELETE FROM data_covid WHERE id = '$_GET[id]' ");
			if($hapus){
				echo "<script>
						alert('Hapus Data Suksess!!');
						document.location='manage.php';
				     </script>";
			}
		}
	}

?>



<!DOCTYPE html>
<html>
<head>
	<title>Manage Data Penyebaran Covid-19 2021</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
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

<div class="container">
	
	<h1 class="text-center"> Manage Data Penyebaran Covid-19 </h1>

	<!-- Awal Card Form -->
	<div class="card mt-3">
	  <div class="card-header bg-primary text-white">
	    Form Data Covid
	  </div>
	  <div class="card-body">
	    <form method="post" action="">
	    	<div class="form-group">
	    		<label>Provinsi</label>
	    		<input type="text" name="tprovinsi" value="<?=@$vprovinsi?>" class="form-control" placeholder="Provinsi" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Positif</label>
	    		<input type="text" name="tpositif" value="<?=@$vpositif?>" class="form-control" placeholder="Jumlah Positif" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Sembuh</label>
	    		<input type="text" name="tsembuh" value="<?=@$vsembuh?>" class="form-control" placeholder="Jumlah Sembuh" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Meninggal</label>
	    		<input type="text" name="tmeninggal" value="<?=@$vmeninggal?>" class="form-control" placeholder="Jumlah Meninggal" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Tanggal</label>
	    		<input type="text" name="ttanggal" value="<?=@$vtanggal?>" class="form-control" placeholder="Tanggal" required>
	    	</div>


	    	<button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
	    	<button type="reset" class="btn btn-danger" name="breset">Kosongkan</button>

	    </form>
	  </div>
	</div>
	<!-- Akhir Card Form -->


	<!-- Awal Card Table -->
	<div class="card mt-3">
	  <div class="card-header bg-success text-white">
	    DATA COVID
	  </div>
	  <div class="card-body">
	   
	  	<table class="table table-bordered table-striped">
	  		<tr>
	  			<th>No.</th>
	  			<th>Provinsi</th>
	  			<th>Positif</th>
	  			<th>Sembuh</th>
	  			<th>Meninggal</th>
	  			<th>Tanggal</th>
	  		</tr>

	  		<?php
	  			$no = 1;
	  			$tampil = mysqli_query($koneksi, "SELECT * from data_covid order by id desc");
	  			while ($data = mysqli_fetch_array($tampil)) :
	  		?>


	  		<tr>
	  			<td><?=$no++?></td>
	  			<td><?=$data['provinsi']?></td>
	  			<td><?=$data['positif']?></td>
	  			<td><?=$data['sembuh']?></td>
	  			<td><?=$data['meninggal']?></td>
	  			<td><?=$data['tanggal']?></td>
	  			<td>
	  				<a href="manage.php?hal=edit&id=<?=$data['id']?>" class="btn btn-warning">Edit</a>
	  				<a href="manage.php?hal=hapus&id=<?=$data['id']?>" 
	  					onclick ="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger">Hapus</a>
	  			</td>
	  		</tr>
	  	<?php endwhile; //Penutup perulangan while?>
	  	</table>

	  </div>
	</div>
	<!-- Akhir Card Table -->

</div>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>
</html>