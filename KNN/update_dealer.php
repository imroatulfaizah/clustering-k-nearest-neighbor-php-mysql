<?php 
include 'config.php';
$id_dealer=$_POST['id_dealer'];
$nama_dealer=$_POST['nama_dealer'];
$id_merk=$_POST['id_merk'];
$alamat=$_POST['alamat'];
$no_telp=$_POST['no_telp'];

mysql_query("update dealer set nama_dealer='$nama_dealer', id_merk='$id_merk', alamat='$alamat', no_telp='$no_telp' where id_dealer='$id_dealer'");
header("location:dealer.php");

?>