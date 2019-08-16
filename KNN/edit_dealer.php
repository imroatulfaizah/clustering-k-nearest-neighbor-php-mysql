<?php 
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Dealer</h3>
<a class="btn" href="dealer.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$id_dealer=mysql_real_escape_string($_GET['id_dealer']);
$det=mysql_query("select * from dealer where id_dealer='$id_dealer'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
?>					
	<form action="update_dealer.php" method="post">
		<table class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="id_dealer" value="<?php echo $d['id_dealer'] ?>"></td>
			</tr>
			<tr>
				<td>Nama Dealer</td>
				<td><input type="text" class="form-control" name="nama_dealer" value="<?php echo $d['nama_dealer'] ?>"></td>
			</tr>
			<tr>
				<td>Id Merk</td>
				<td><input type="text" class="form-control" name="id_merk" value="<?php echo $d['id_merk'] ?>"></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><input type="text" class="form-control" name="alamat" value="<?php echo $d['alamat'] ?>"></td>
			</tr>
			<tr>
				<td>Nomor Telepon</td>
				<td><input type="text" class="form-control" name="no_telp" value="<?php echo $d['no_telp'] ?>"></td>
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