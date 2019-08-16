<?php 
include 'config.php';
$id=$_GET['id'];
mysql_query("delete from data_training where id='$id'");
header("location:data_training.php");

?>