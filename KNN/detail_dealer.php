<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Dealer</h3>
<a class="btn" href="dealer.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$id_dealer=mysql_real_escape_string($_GET['id_dealer']);


$det=mysql_query("SELECT td.nama_dealer, tt.nama_type, tm.nama_merk, td.alamat, td.no_telp FROM dealer td, type tt, merk tm where td.id_merk=tm.id_merk && tm.id_merk=tt.id_merk && td.id_type=tt.id_type && id_dealer='$id_dealer'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
	?>					
	<table class="table">
		<tr>
			<td>Nama Dealer</td>
			<td><?php echo $d['nama_dealer'] ?></td>
		</tr>
		<tr>
			<td>Merk Motor</td>
			<td><?php echo $d['nama_merk'] ?></td>
		</tr>
		<tr>
			<td>Type Motor</td>
			<td><?php echo $d['nama_type'] ?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td><?php echo $d['alamat'] ?></td>
		</tr>
		<tr>
			<td>No. Telepon</td>
			<td><?php echo $d['no_telp'] ?></td>
		</tr>
		
	</table>
	<?php 
}
?>
<?php include 'footer.php'; ?>