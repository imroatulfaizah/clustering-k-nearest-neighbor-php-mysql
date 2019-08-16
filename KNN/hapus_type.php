<?php 
include 'config.php';
$id_type=$_GET['id_type'];
mysql_query("delete from type where id_type='$id_type'");
header("location:type.php");

?>