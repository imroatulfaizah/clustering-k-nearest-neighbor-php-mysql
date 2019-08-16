<?php 
include 'config.php';
$id_merk=$_GET['id_merk'];
mysql_query("delete from merk where id_merk='$id_merk'");
header("location:merk.php");

?>