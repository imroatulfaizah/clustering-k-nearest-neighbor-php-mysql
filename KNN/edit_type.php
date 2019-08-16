<?php 
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Type Motor</h3>
<a class="btn" href="type.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$id_type=mysql_real_escape_string($_GET['id_type']);
$det=mysql_query("select * from type where id_type='$id_type'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
?>					
	<form action="update_type.php" method="post">
		<table class="table">
			
			<tr>
				<td>ID Type</td>
				<td><input type="text" class="form-control" name="id_type" readonly="" value="<?php echo $d['id_type'] ?>"></td>
			</tr>
			<tr>
				<td>ID Merk</td>
				<td><input type="text" class="form-control" readonly="" name="id_merk" value="<?php echo $d['id_merk'] ?>"></td>
			</tr>
			<tr>
				<td>Nama Type</td>
				<td><input type="text" class="form-control" name="nama_type" value="<?php echo $d['nama_type'] ?>"></td>
			</tr>
			<tr>
				<td>Keterangan</td>
				<td><input type="text" class="form-control" name="keterangan" value="<?php echo $d['keterangan'] ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" class="btn btn-info" value="Simpan"></td>
			</tr>
		</table>
	</form>
	<?php 
}
?>
<?php include 'footer.php'; ?>