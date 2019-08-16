<?php 
include 'config.php';
$id=$_POST['id'];
$id_dealer=$_POST['id_dealer'];
$dp=$_POST['dp'];
$kontribusi=$_POST['kontribusi'];

mysql_query("insert into data_testing values('$id','$id_dealer','$dp','$kontribusi')");
header("location:data_testing.php");

 ?>