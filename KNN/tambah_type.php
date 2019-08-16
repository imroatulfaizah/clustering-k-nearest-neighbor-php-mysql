<?php 
include 'config.php';
$id_type=$_POST['id_type'];
$id_merk=$_POST['id_merk'];
$nama_type=$_POST['nama_type'];
$keterangan=$_POST['keterangan'];

mysql_query("insert into type values('$id_type','$id_merk','$nama_type','$keterangan')");
header("location:type.php");

 ?>