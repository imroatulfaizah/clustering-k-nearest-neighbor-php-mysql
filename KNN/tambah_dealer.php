<?php 
include 'config.php';
$id_dealer=$_POST['id_dealer'];
$nama_dealer=$_POST['nama_dealer'];
$id_merk=$_POST['id_merk'];
$id_type=$_POST['id_type'];
$alamat=$_POST['alamat'];
$no_telp=$_POST['no_telp'];

mysql_query("insert into dealer values('$id_dealer','$nama_dealer','$id_merk','$id_type','$alamat','$no_telp')");
header("location:dealer.php");

 ?>