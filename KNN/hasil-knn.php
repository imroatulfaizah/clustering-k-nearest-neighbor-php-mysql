<!DOCTYPE html>

<?php
  include('header.php');
	include('config.php');
	
	$query = "SELECT COUNT(*) FROM temp";
	$result = mysql_query($query);
	if($result) {
		$banyak_data = mysql_result($result,0);
	}
?>

<?php 
$per_hal=10;
$jumlah_record=mysql_query("SELECT COUNT(*) from temp");
$jum=mysql_result($jumlah_record, 0);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>
<div class="col-md-12">
  <table class="col-md-2">
    <tr>
      <td>Jumlah Data Training</td>   
      <td><?php echo $jum; ?></td>
    </tr>
    <tr>
      <td>Jumlah Halaman</td> 
      <td><?php echo $halaman; ?></td>
    </tr>
  </table>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Hasil Klasifikasi KNN</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../assets/js/jquery-ui/jquery-ui.css">
  <script type="text/javascript" src="../assets/js/jquery.js"></script>
  <script type="text/javascript" src="../assets/js/jquery.js"></script>
  <script type="text/javascript" src="../assets/js/bootstrap.js"></script>
  <script type="text/javascript" src="../assets/js/jquery-ui/jquery-ui.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>
	
  
    <h1 align="center"></h1>
	
    <br>
    <br>
	<div>
		<h3 align="center">Hasil Klasifikasi Data Testing</h3><br />
    </div>


  <form action="cari_hasil.php" method="get">
  <div class="input-group col-md-5 col-md-offset-7">
    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
    <input type="text" class="form-control" placeholder="Cari barang di sini .." aria-describedby="basic-addon1" name="cari"> 
  </div>
</form>
<br/>


    <div class="table table-hover" style="height:350px;overflow:auto;">
      	<table class="table table-hover">
  <tr>
    <th class="col-md-1">Id</th>
    <th class="col-md-1">Nama Dealer</th>
    <th class="col-md-2">Nama Merk</th>
    <th class="col-md-2">Nama Type</th>
    <th class="col-md-2">DP</th>
    <th class="col-md-1">Kontribusi</th>
    <th class="col-md-1">Grade</th>
    
  </tr>

  <?php 


  if(isset($_GET['cari'])){
    $cari=mysql_real_escape_string($_GET['cari']);
    $sql=mysql_query("SELECT ts.id, ts.dp, ts.kontribusi, tem.klasifikasi, td.nama_dealer, tt.nama_type, tm.nama_merk FROM data_testing ts, temp tem, dealer td, type tt, merk tm where ts.id=tem.id && ts.id_dealer=td.id_dealer && td.id_merk=tm.id_merk && tt.id_merk=tm.id_merk && id like '$cari' or id like '$cari'");
  }else{
            
               	//$c=0;

				$sql = "SELECT ts.id, ts.dp, ts.kontribusi, tem.klasifikasi, td.nama_dealer, tt.nama_type, tm.nama_merk FROM data_testing ts, temp tem, dealer td, type tt, merk tm where ts.id=tem.id && ts.id_dealer=td.id_dealer && td.id_merk=tm.id_merk && td.id_type=tt.id_type order by id asc";

      }
				$query = mysql_query($sql);
											
				$result = array(); 
				while ($data = mysql_fetch_array($query)){                                                          
            ?>
         
          	<tbody>
            	<tr>
                	<td><?php echo $data['id'] ?></td>
          <td><?php echo $data['nama_dealer'] ?></td>
          <td><?php echo $data['nama_merk'] ?></td>
          <td><?php echo $data['nama_type'] ?></td>
          <td><?php echo $data['dp'] ?></td>
          <td><?php echo $data['kontribusi'] ?></td>
          <td><?php echo $data['klasifikasi'] ?></td>
				
                </tr>
			</tbody>
            <?php }          
			?>
      	</table>
        <ul class="pagination">     
      <?php 
      for($x=1;$x<=$halaman;$x++){
        ?>
        <li><a href="?page=<?php echo $x ?>"><?php echo $x ?></a></li>
        <?php
      }
      ?>            
    </ul>
    </div>
    

	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
