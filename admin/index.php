<?php 
include 'header.php';
?>

<?php
$a = mysql_query("select * from merk");
?>

<div class="col-md-10">
	<h3>Selamat datang</h3>	
    <h3>K-Nearest Neighbor</h3>
    <h3>Universitas Kanjuruhan Malang</h3>
</div>
<!-- kalender -->
<div class="pull-right">
	<div id="kalender"></div>
</div>

<?php 
include 'footer.php';

?>