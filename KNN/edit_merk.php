<?php 
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Merk</h3>
<a class="btn" href="merk.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$id_merk=mysql_real_escape_string($_GET['id_merk']);
$det=mysql_query("select * from merk where id_merk='$id_merk'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
?>					
	<form action="update_merk.php" method="post">
		<table class="table">
			
			<tr>
				<td>ID Merk</td>
				<td><input type="text" class="form-control" name="id_merk" readonly="" value="<?php echo $d['id_merk'] ?>"></td>
			</tr>
			<tr>
				<td>Nama Merk</td>
				<td><input type="text" class="form-control" name="nama_merk" value="<?php echo $d['nama_merk'] ?>"></td>
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