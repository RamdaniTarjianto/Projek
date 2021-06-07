<?php
include "Koneksi.php";
error_reporting(E_ALL ^ E_DEPRECATED);

$nama = $_POST['nama'];
$nilai = $_POST['nilai'];

//$nama = "aku";
//$nilai = "80";

//Query input menginput data kedalam tabel barang
$sql="insert into peringkat (Nama, SkorKuis) values ('$nama','$nilai')";

//Mengeksekusi/menjalankan query diatas	
$hasil=mysqli_query($kon, $sql);

//Kondisi apakah berhasil atau tidak
if ($hasil) {
	echo "Berhasil insert data";
	exit;
}
else {
	echo "Gagal insert data";
	exit;
}
?>