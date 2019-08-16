<?php 
include 'config.php';
$id_dealer=$_GET['id_dealer'];
mysql_query("delete from dealer where id_dealer='$id_dealer'");
header("location:dealer.php");

?>