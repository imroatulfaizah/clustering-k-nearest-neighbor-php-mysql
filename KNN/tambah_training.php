<?php 
include 'config.php';
$id=$_POST['id'];
$id_dealer=$_POST['id_dealer'];
$id_merk=$_POST['id_merk'];
$id_type=$_POST['id_type'];
$dp=$_POST['dp'];
$kontribusi=$_POST['kontribusi'];
$nama_grade=$_POST['nama_grade'];

mysql_query("insert into data_training values('$id','$id_dealer','$id_merk','$id_type','$dp','$kontribusi','$nama_grade')");
header("location:data_training.php");

 ?>