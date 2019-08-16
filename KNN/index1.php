<?php
include '../KNN/config.php';
include '../KNN/header.php';

$koneksi     = mysqli_connect("localhost", "root", "", "motor");
$kontribusi = mysqli_query($koneksi, "SELECT ts.id, ts.dp, ts.kontribusi, tem.klasifikasi, td.nama_dealer, tt.nama_type, tm.nama_merk FROM data_testing ts, temp tem, dealer td, type tt, merk tm where ts.id=tem.id && ts.id_dealer=td.id_dealer && td.id_merk=tm.id_merk && td.id_type=tt.id_type order by id asc");
$klasifikasi = mysqli_query($koneksi, "SELECT ts.id, ts.dp, ts.kontribusi, tem.klasifikasi, td.nama_dealer, tt.nama_type, tm.nama_merk FROM data_testing ts, temp tem, dealer td, type tt, merk tm where ts.id=tem.id && ts.id_dealer=td.id_dealer && td.id_merk=tm.id_merk && td.id_type=tt.id_type order by id asc");
$klasifikasi2 = mysqli_query($koneksi, "SELECT distinct a.klasifikasi, v.dp from temp a, data_testing v where a.id = v.id order by a.id;");

$dp = mysqli_query($koneksi, "SELECT ts.id, ts.dp, ts.kontribusi, tem.klasifikasi, td.nama_dealer, tt.nama_type, tm.nama_merk FROM data_testing ts, temp tem, dealer td, type tt, merk tm where ts.id=tem.id && ts.id_dealer=td.id_dealer && td.id_merk=tm.id_merk && td.id_type=tt.id_type order by id asc");

$klasifikasi3 = mysqli_query($koneksi, "SELECT distinct a.klasifikasi, v.dp from temp a, data_testing v where a.id = v.id order by a.id");
$merk = mysqli_query($koneksi, "SELECT ts.id, ts.dp, ts.kontribusi, tem.klasifikasi, td.nama_dealer, tt.nama_type, tm.nama_merk, tm.id_merk FROM data_testing ts, temp tem, dealer td, type tt, merk tm where ts.id=tem.id && ts.id_dealer=td.id_dealer && td.id_merk=tm.id_merk && td.id_type=tt.id_type order by id asc");

$klasifikasi4 = mysqli_query($koneksi, "SELECT distinct a.klasifikasi, v.dp from temp a, data_testing v where a.id = v.id order by a.id");
$type = mysqli_query($koneksi, "SELECT ts.id, ts.dp, ts.kontribusi, tem.klasifikasi, td.nama_dealer, tt.nama_type, tt.id_type, tm.nama_merk, tm.id_merk FROM data_testing ts, temp tem, dealer td, type tt, merk tm where ts.id=tem.id && ts.id_dealer=td.id_dealer && td.id_merk=tm.id_merk && td.id_type=tt.id_type order by id asc");
?>
<html>
    <head>
        <title>Belajarphp.net - ChartJS</title>
        <!-- <script src="Chart.bundle.js"></script> -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="samples/Chart.bundle.js"></script>
    <script type="text/javascript" src="Chart.js/Chart.js"></script>

        <style type="text/css">
            .container {
                width: 50%;
                margin: 15px auto;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <canvas id="myChart" width="100" height="100"></canvas>
        </div>
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [<?php while ($b = mysqli_fetch_array($klasifikasi)) { echo '"' . $b['klasifikasi'] . '",';}?>],
                    datasets: [{
                            label: 'GRAFIK GRADE DENGAN KONTRIBUSI',
                            data: [<?php while ($p = mysqli_fetch_array($kontribusi)) { echo '"' . $p['kontribusi'] . '",';}?>],
                            
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderWidth: 3
                        }]
                }
            });
       
                
        </script>    
        <!-- Dp dengan grade -->

        <div class="container">
            <canvas id="myDP" width="100" height="100"></canvas>
        </div>
        <script>
            var ctx = document.getElementById("myDP");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php while ($b = mysqli_fetch_array($klasifikasi2)) { echo '"' . $b['klasifikasi'] . '",';}?>],
                    datasets: [{
                            label: 'GRAFIK DP DAN GRADE',
                            data: [<?php while ($p = mysqli_fetch_array($dp)) { echo '"' . $p['dp'] . '",';}?>],
                            
                            backgroundColor: [
                                'rgba(0,153,255,0.2)',
                                'rgba(0,153,255,0.2)',
                                'rgba(0,153,255,0.2)',
                                'rgba(0,153,255,0.2)',
                                'rgba(0,153,255,0.2)',
                                'rgba(0,153,255,0.2)',
                                'rgba(0,153,255,0.2)',
                                'rgba(0,153,255,0.2)',
                                'rgba(0,153,255,0.2)',
                                'rgba(0,153,255,0.2)'
                            ],
                            borderColor: [
                                'rgba(0,153,255,0.2)',
                                'rgba(0,153,255,0.2)',
                                'rgba(0,153,255,0.2)',
                                'rgba(0,153,255,0.2)',
                                'rgba(0,153,255,0.2)',
                                'rgba(0,153,255,0.2)',
                                'rgba(0,153,255,0.2)',
                                'rgba(0,153,255,0.2)',
                                'rgba(0,153,255,0.2)',
                                'rgba(0,153,255,0.2)'
                            ],
                            borderWidth: 3
                        }]
                }
            });
       
                
        </script>    

        <!-- </script>     -->
        <!-- Merk dengan grade -->

        <div class="container">
            <canvas id="mymerk" width="100" height="100"></canvas>
        </div>
        <script>
            var ctx = document.getElementById("mymerk");
            var myChart = new Chart(ctx, {
                type: 'radar',
                data: {
                    labels: [<?php while ($b = mysqli_fetch_array($klasifikasi3)) { echo '"' . $b['klasifikasi'] . '",';}?>],
                    datasets: [{
                            label: 'GRAFIK MERK DAN GRADE',
                            data: [<?php while ($p = mysqli_fetch_array($merk)) { echo '"' . $p['id_merk'] . '",';}?>],
                            
                            backgroundColor: [
                                'rgba(0,0,102,0.2)',
                                'rgba(0,0,102,0.2)',
                                'rgba(0,0,102,0.2)',
                                'rgba(0,0,102,0.2)',
                                'rgba(0,0,102,0.2)',
                                'rgba(0,0,102,0.2)',
                                'rgba(0,0,102,0.2)',
                                'rgba(0,0,102,0.2)',
                                'rgba(255,255,51,0.2)',
                                'rgba(255,255,51,0.2)',
                                'rgba(255,255,51,0.2)',
                                'rgba(255,255,51,0.2)',
                                'rgba(255,255,51,0.2)',
                                'rgba(255,255,51,0.2)',
                                'rgba(255,255,51,0.2)',
                                'rgba(255,255,51,0.2)'
                                
                            ],
                            borderColor: [
                                'rgba(0,0,102,0.2)',
                                 'rgba(0,0,102,0.2)',
                                'rgba(0,0,102,0.2)',
                                'rgba(0,0,102,0.2)',
                                'rgba(0,0,102,0.2)',
                                'rgba(0,0,102,0.2)',
                                'rgba(0,0,102,0.2)',
                                'rgba(0,0,102,0.2)',
                                'rgba(0,0,102,0.2)',
                                'rgba(255,255,51,0.2)',
                                'rgba(255,255,51,0.2)',
                                'rgba(255,255,51,0.2)',
                                'rgba(255,255,51,0.2)',
                                'rgba(255,255,51,0.2)',
                                'rgba(255,255,51,0.2)',
                                'rgba(255,255,51,0.2)',
                                'rgba(255,255,51,0.2)',
                                'rgba(255,255,51,0.2)',
                                'rgba(255,255,51,0.2)',
                                'rgba(255,255,51,0.2)'
                            ],
                            borderWidth: 3
                        }]
                }
            });
       
                
        </script>    

        <!-- type dengan grade -->

        <div class="container">
            <canvas id="mytype" width="100" height="100"></canvas>
        </div>
        <script>
            var ctx = document.getElementById("mytype");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php while ($b = mysqli_fetch_array($klasifikasi4)) { echo '"' . $b['klasifikasi'] . '",';}?>],
                    datasets: [{
                            label: 'GRAFIK TYPE DAN GRADE',
                            data: [<?php while ($p = mysqli_fetch_array($type)) { echo '"' . $p['id_type'] . '",';}?>],
                            
                            backgroundColor: [
                                'rgba(255,0,0,1)',
                                'rgba(255,0,0,1)',
                                'rgba(255,255,51,0.2)',
                                'rgba(255,255,51,0.2)',
                                'rgba(255,255,51,0.2)',
                                'rgba(255,255,51,0.2)',
                                'rgba(255,255,51,0.2)',
                                'rgba(255,255,51,0.2)',
                                'rgba(255,255,51,0.2)',
                                'rgba(255,255,51,0.2)',
                                'rgba(255,255,51,0.2)',
                                'rgba(255,255,51,0.2)'
                                
                            ],
                            borderColor: [
                                'rgba(255,0,0,1)',
                                'rgba(255,0,0,1)',
                                'rgba(255,255,51,0.2)',
                                'rgba(255,255,51,0.2)',
                                'rgba(255,255,51,0.2)',
                                'rgba(255,255,51,0.2)',
                                'rgba(255,255,51,0.2)',
                                'rgba(255,255,51,0.2)',
                                'rgba(255,255,51,0.2)',
                                'rgba(255,255,51,0.2)',
                                'rgba(255,255,51,0.2)',
                                'rgba(255,255,51,0.2)'
                            ],
                            borderWidth: 3
                        }]
                }
            });
       
                
        </script>    
    </body>
</html>

<?php
include '../KNN/footer.php';
?>

