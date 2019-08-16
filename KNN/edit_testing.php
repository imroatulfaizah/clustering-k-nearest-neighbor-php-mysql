<?php 
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Data Testing</h3>
<a class="btn" href="data_testing.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$id=mysql_real_escape_string($_GET['id']);
$det=mysql_query("SELECT ts.id, ts.dp, ts.kontribusi, td.nama_dealer, td.id_dealer FROM data_testing ts, dealer td where ts.id_dealer=td.id_dealer && id='$id'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
?>					
	<form action="update_testing.php" method="post">
		<table class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="id" value="<?php echo $d['id'] ?>"></td>
			</tr>
			<tr>
				<td>ID Dealer</td>
				<td><input type="text" class="form-control" readonly="" name="id_dealer" value="<?php echo $d['id_dealer'] ?>"></td>
			</tr>
			<tr>
				<td>DP</td>
				<td><input type="text" class="form-control" name="dp" value="<?php echo $d['dp'] ?>"></td>
			</tr>
			<tr>
				<td>Kontribusi</td>
				<td><input type="text" class="form-control" name="kontribusi" value="<?php echo $d['kontribusi'] ?>"></td>
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