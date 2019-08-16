<?php 
include 'config.php';
$id_type=$_POST['id_type'];
$id_merk=$_POST['id_merk'];
$nama_type=$_POST['nama_type'];
$keterangan=$_POST['keterangan'];

mysql_query("update type set nama_type='$nama_type', keterangan='$keterangan' where id_type='$id_type'");
header("location:type.php");

?>