<?php 
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Data Training</h3>
<a class="btn" href="data_training.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$id=mysql_real_escape_string($_GET['id']);
$det=mysql_query("SELECT ts.id, ts.id_merk,ts.id_type, ts.dp, ts.kontribusi, ts.nama_grade, td.nama_dealer, tt.nama_type, tm.nama_merk FROM data_training ts, dealer td, type tt, merk tm where ts.id_dealer=td.id_dealer && ts.id_type=tt.id_type && ts.id_merk=tm.id_merk && id='$id' order by id asc")or die(mysql_error());
while($d=mysql_fetch_array($det)){
?>					
	<form action="update_training.php" method="post">
		<table class="table">
			
			<tr>
				<td>ID</td>
				<td><input type="text" class="form-control" name="id" readonly="" value="<?php echo $d['id'] ?>"></td>
			</tr>
			<tr>
				<td>Nama Dealer</td>
				<td><input type="text" class="form-control" readonly="" name="nama_dealer" value="<?php echo $d['nama_dealer'] ?>"></td>
			</tr>
			<tr>
				<td>Nama Merk</td>
				<td><input type="text" class="form-control" readonly="" name="nama_merk" value="<?php echo $d['nama_merk'] ?>"></td>
			</tr>
			<tr>
				<td>Nama Type</td>
				<td><input type="text" class="form-control" readonly="" name="nama_type" value="<?php echo $d['nama_type'] ?>"></td>
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
				<td>Grade</td>
				<td><input type="text" class="form-control" name="nama_grade" value="<?php echo $d['nama_grade'] ?>"></td>
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