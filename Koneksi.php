<?php
//local
/*$host="localhost";
$user="root";
$password="";
$db="projek";*/

//server
$host = "remotemysql.com";
$user = "7lepf28yK9";
$password = "ax6nNbkQXg";
$db = "7lepf28yK9"; 

$kon = mysqli_connect($host,$user,$password);
if ($kon){
	echo "Database MYSQL <b>berhasil</b> dikoneksikan<br>";
}else {
	echo"Database  MYSQL <b>gagal</b> dikoneksikan<br>";
}

$hasil=mysqli_select_db($kon,$db);
if ($hasil){
	echo "Database $db berhasil dipilih";
}else {
	echo "Database $db gagal dipilih";
}

function registrasi($data)
{
	global $kon;
	$username = strtolower(stripslashes($data["username"]));
	$email = $data["email"];
	$password = mysqli_real_escape_string($kon, $data["password"]);
	$nik = $data["nik"];

	$result = mysqli_query($kon, "SELECT username from login WHERE username = '$username'");

	if (mysqli_fetch_assoc($result)) {
		echo "<script>
                    alert('Username Sudah Pernah Terdaftar');
              </script>";
		return false;
	}
	if ($username == '' || $password == '' || $email == '' || $nik == '') {
		echo "<script>
                alert('Harap Isi Semua Field');
            </script>";
		return false;
	}

	mysqli_query($kon, "INSERT INTO login VALUES ('','$username','$email','$password','$nik')");

	return mysqli_affected_rows($kon);
}


function registrasi_kota($datad)
{
	global $kon;
	$sql_provinsi = mysqli_query($kon, "SELECT * FROM provinces ORDER BY name ASC");
	while ($rs_provinsi = mysqli_fetch_assoc($sql_provinsi)) {
	}
	$prop = $datad['provinsi'];
	$positif = $datad['positif'];
	$sembuh = $datad['sembuh'];
	$meninggal = $datad['meninggal'];
	$spesimen_diperiksa = $datad['spesimen_diperiksa'];
	$orang_diperiksa = $datad['orang_diperiksa'];
	$tanggal = $datad['tanggal'];


	mysqli_query($kon, "INSERT INTO data_covid VALUES ('','$prop','$positif','$sembuh','$meninggal','$spesimen_diperiksa','$orang_diperiksa','$tanggal')");

	return mysqli_affected_rows($kon);
} 



?>
