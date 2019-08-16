<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Type</h3>
<a class="btn" href="konversi.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$id=mysql_real_escape_string($_GET['id']);



$det=mysql_query("SELECT ts.id, ts.dp, ts.kontribusi, ts.nama_grade, td.nama_dealer, tt.nama_type, tm.nama_merk FROM data_training ts, dealer td, type tt, merk tm where ts.id_dealer=td.id_dealer && ts.id_type=tt.id_type && ts.id_merk=tm.id_merk && id='$id' order by id asc")or die(mysql_error());
while($d=mysql_fetch_array($det)){
	?>					
	<table class="table">
		<tr>
			<td>ID</td>
			<td><?php echo $d['id'] ?></td>
		</tr>
		<tr>
			<td>Nama Dealer</td>
			<td><?php echo $d['nama_dealer'] ?></td>
		</tr>
		<tr>
			<td>Nama Merk</td>
			<td><?php echo $d['nama_merk'] ?></td>
		</tr>
		
		<tr>
			<td>Nama Type</td>
			<td><?php echo $d['nama_type'] ?></td>
		</tr>
		<tr>
			<td>DP</td>
			<td><?php echo $d['dp'] ?></td>
		</tr>
		<tr>
			<td>Kontribusi</td>
			<td><?php echo $d['kontribusi'] ?></td>
		</tr>
		<tr>
			<td>Grade</td>
			<td><?php echo $d['nama_grade'] ?></td>
		</tr>
		
	</table>
	<?php 
}
?>
<?php include 'footer.php'; ?>