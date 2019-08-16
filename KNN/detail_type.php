<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Type</h3>
<a class="btn" href="type.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$id_type=mysql_real_escape_string($_GET['id_type']);


$det=mysql_query("SELECT tt.id_type, tt.nama_type, tt.keterangan, tm.nama_merk FROM type tt, merk tm where tm.id_merk=tt.id_merk && id_type='$id_type' order by id_type asc")or die(mysql_error());
while($d=mysql_fetch_array($det)){
	?>					
	<table class="table">
		<tr>
			<td>ID type</td>
			<td><?php echo $d['id_type'] ?></td>
		</tr>
		<tr>
			<td>ID Merk</td>
			<td><?php echo $d['nama_merk'] ?></td>
		</tr>
		<tr>
			<td>Nama type</td>
			<td><?php echo $d['nama_type'] ?></td>
		</tr>
		
		<tr>
			<td>Keterangan</td>
			<td><?php echo $d['keterangan'] ?></td>
		</tr>
		
	</table>
	<?php 
}
?>
<?php include 'footer.php'; ?>