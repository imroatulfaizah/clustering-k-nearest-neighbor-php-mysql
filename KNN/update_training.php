<?php 
include 'config.php';
$id=$_POST['id'];
// $nama_dealer=$_POST['nama_dealer'];
// $nama_merk=$_POST['nama_merk'];
// $nama_type=$_POST['nama_type'];
$dp=$_POST['dp'];
$kontribusi=$_POST['kontribusi'];
$nama_grade=$_POST['nama_grade'];


mysql_query("update data_training set dp='$dp', kontribusi='$kontribusi', nama_grade='$nama_grade' where id='$id'");
header("location:data_training.php");

?>