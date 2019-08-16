<?php 
include 'config.php';
$id=$_POST['id'];
$id_dealer=$_POST['id_dealer'];
$dp=$_POST['dp'];
$kontribusi=$_POST['kontribusi'];

mysql_query("update data_testing set id_dealer='$id_dealer', dp='$dp', kontribusi='$kontribusi' where id='$id'");
header("location:data_testing.php");

?>