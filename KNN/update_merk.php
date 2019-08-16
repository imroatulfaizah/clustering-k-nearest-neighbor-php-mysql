<?php 
include 'config.php';
$id_merk=$_POST['id_merk'];
$nama_merk=$_POST['nama_merk'];

mysql_query("update merk set nama_merk='$nama_merk' where id_merk='$id_merk'");
header("location:merk.php");

?>