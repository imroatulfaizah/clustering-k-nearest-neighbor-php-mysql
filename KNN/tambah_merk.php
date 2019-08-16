<?php 
include 'config.php';
$id_merk=$_POST['id_merk'];
$nama_merk=$_POST['nama_merk'];

mysql_query("insert into merk values('$id_merk','$nama_merk')");
header("location:merk.php");

 ?>