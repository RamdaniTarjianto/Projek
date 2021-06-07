<?php
include('Koneksi.php');
error_reporting(E_ALL ^ E_DEPRECATED);

$nama = "naufal";
$nilai = "20";

$query = "INSERT INTO peringkatt (Nama, Nilai) VALUES ($nama, $nilai)";
$result = mysqli_query($CON, $query); 
    
if($result){
  echo json_encode(array('message'=>'Data successfully added.'));
}else{
  echo json_encode(array('message'=>'Data failed to add.'));
}
?>