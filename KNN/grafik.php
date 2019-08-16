<?php
include 'config.php';
include 'header.php';

$koneksi     = mysqli_connect("localhost", "root", "", "motor");
$nama_merk = mysqli_query($koneksi, "SELECT ts.id, ts.dp, ts.kontribusi, tem.klasifikasi, td.nama_dealer, tt.nama_type, tm.nama_merk FROM data_testing ts, temp tem, dealer td, type tt, merk tm where ts.id=tem.id && ts.id_dealer=td.id_dealer && td.id_merk=tm.id_merk && td.id_type=tt.id_type order by id asc");
$klasifikasi = mysqli_query($koneksi, "SELECT ts.id, ts.dp, ts.kontribusi, tem.klasifikasi, td.nama_dealer, tt.nama_type, tm.nama_merk FROM data_testing ts, temp tem, dealer td, type tt, merk tm where ts.id=tem.id && ts.id_dealer=td.id_dealer && td.id_merk=tm.id_merk && td.id_type=tt.id_type order by id asc");
$kontribusi = mysqli_query($koneksi, "SELECT ts.id, ts.dp, ts.kontribusi, tem.klasifikasi, td.nama_dealer, tt.nama_type, tm.nama_merk FROM data_testing ts, temp tem, dealer td, type tt, merk tm where ts.id=tem.id && ts.id_dealer=td.id_dealer && td.id_merk=tm.id_merk && td.id_type=tt.id_type order by id asc");
$dp = mysqli_query($koneksi, "SELECT ts.id, ts.dp, ts.kontribusi, tem.klasifikasi, td.nama_dealer, tt.nama_type, tm.nama_merk FROM data_testing ts, temp tem, dealer td, type tt, merk tm where ts.id=tem.id && ts.id_dealer=td.id_dealer && td.id_merk=tm.id_merk && td.id_type=tt.id_type order by id asc");
$type = mysqli_query($koneksi, "SELECT ts.id, ts.dp, ts.kontribusi, tem.klasifikasi, td.nama_dealer, tt.nama_type, tt.id_type, tm.nama_merk, tm.id_merk FROM data_testing ts, temp tem, dealer td, type tt, merk tm where ts.id=tem.id && ts.id_dealer=td.id_dealer && td.id_merk=tm.id_merk && td.id_type=tt.id_type order by id asc");
$merk = mysqli_query($koneksi, "SELECT ts.id, ts.dp, ts.kontribusi, tem.klasifikasi, td.nama_dealer, tt.nama_type, tm.nama_merk, tm.id_merk FROM data_testing ts, temp tem, dealer td, type tt, merk tm where ts.id=tem.id && ts.id_dealer=td.id_dealer && td.id_merk=tm.id_merk && td.id_type=tt.id_type order by id asc");
?>

<!doctype html>
<html>

<head>
    <title>Radar Chart</title>
    <script src="Chart.bundle.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="Chart.js/Chart.js"></script>

    <style>
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
    </style>
</head>

<body>
    <div style="width:90%">
        <canvas id="canvas"></canvas>
    </div>
    
    <script>
    var randomScalingFactor = function() {
        return Math.round(Math.random() * 100);
    };
    var randomColorFactor = function() {
        return Math.round(Math.random() * 255);
    };
    var randomColor = function(opacity) {
        return 'rgba(' + randomColorFactor() + ',' + randomColorFactor() + ',' + randomColorFactor() + ',' + (opacity || '.3') + ')';
    };

    var config = {
        type: 'line',
        data: {
            labels: [<?php while ($b = mysqli_fetch_array($klasifikasi)) { echo '"' . $b['klasifikasi'] . '",';}?>],
            datasets: [{
                label: 'KONTRIBUSI VS GRADE',
                backgroundColor: "rgba(255,51,0,0.5)",
                pointBackgroundColor: "rgba(220,220,220,1)",

                            data: [<?php while ($p = mysqli_fetch_array($kontribusi)) { echo '"' . $p['kontribusi'] . '",';}?>]
            }, {
                label: "DP VS GRADE",
                backgroundColor: "rgba(255,255,0,0.5)",
                pointBackgroundColor: "rgba(151,187,205,1)",
                pointHoverBackgroundColor: "#fff",
                data: [<?php while ($p = mysqli_fetch_array($dp)) { echo '"' . $p['dp'] . '",';}?>]
            },{
                label: "TYPE VS GRADE",
                backgroundColor: "rgba(255,0,102,0.5)",
                pointBackgroundColor: "rgba(0,0,204,0.5)",
                pointHoverBackgroundColor: "#fff",
                data: [<?php while ($p = mysqli_fetch_array($type)) { echo '"' . $p['id_type'] . '",';}?>]
            },{
                label: "MERK VS GRADE",
                backgroundColor: "rgba(102,255,0,0.5)",
                pointBackgroundColor: "rgba(151,187,205,1)",
                pointHoverBackgroundColor: "#fff",
                data: [<?php while ($p = mysqli_fetch_array($merk)) { echo '"' . $p['id_merk'] . '",';}?>]
            },]
        },
        options: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Chart.js Radar Chart'
            },
            scale: {
              reverse: false,
              gridLines: {
                color: ['black', 'red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet']
              },
              ticks: {
                beginAtZero: true
              }
            }
        }
    };

    window.onload = function() {
        window.myRadar = new Chart(document.getElementById("canvas"), config);
    };

   
    </script>
</body>

</html>


<?php
include 'footer.php';
?>

