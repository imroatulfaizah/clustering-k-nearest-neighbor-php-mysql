<!doctype html>
<html>
<?php
include '../KNN/config.php';
include '../KNN/header.php';

$koneksi     = mysqli_connect("localhost", "root", "", "motor");
$nama_merk = mysqli_query($koneksi, "SELECT ts.id, ts.dp, ts.kontribusi, tem.klasifikasi, td.nama_dealer, tt.nama_type, tm.nama_merk FROM data_testing ts, temp tem, dealer td, type tt, merk tm where ts.id=tem.id && ts.id_dealer=td.id_dealer && td.id_merk=tm.id_merk && td.id_type=tt.id_type order by id asc");
$klasifikasi = mysqli_query($koneksi, "SELECT ts.id, ts.dp, ts.kontribusi, tem.klasifikasi, td.nama_dealer, tt.nama_type, tm.nama_merk FROM data_testing ts, temp tem, dealer td, type tt, merk tm where ts.id=tem.id && ts.id_dealer=td.id_dealer && td.id_merk=tm.id_merk && td.id_type=tt.id_type order by id asc");
$kontribusi = mysqli_query($koneksi, "SELECT ts.id, ts.dp, ts.kontribusi, tem.klasifikasi, td.nama_dealer, tt.nama_type, tm.nama_merk FROM data_testing ts, temp tem, dealer td, type tt, merk tm where ts.id=tem.id && ts.id_dealer=td.id_dealer && td.id_merk=tm.id_merk && td.id_type=tt.id_type order by id asc");
$dp = mysqli_query($koneksi, "SELECT ts.id, ts.dp, ts.kontribusi, tem.klasifikasi, td.nama_dealer, tt.nama_type, tm.nama_merk FROM data_testing ts, temp tem, dealer td, type tt, merk tm where ts.id=tem.id && ts.id_dealer=td.id_dealer && td.id_merk=tm.id_merk && td.id_type=tt.id_type order by id asc");
$type = mysqli_query($koneksi, "SELECT ts.id, ts.dp, ts.kontribusi, tem.klasifikasi, td.nama_dealer, tt.nama_type, tt.id_type, tm.nama_merk, tm.id_merk FROM data_testing ts, temp tem, dealer td, type tt, merk tm where ts.id=tem.id && ts.id_dealer=td.id_dealer && td.id_merk=tm.id_merk && td.id_type=tt.id_type order by id asc");
$merk = mysqli_query($koneksi, "SELECT ts.id, ts.dp, ts.kontribusi, tem.klasifikasi, td.nama_dealer, tt.nama_type, tm.nama_merk, tm.id_merk FROM data_testing ts, temp tem, dealer td, type tt, merk tm where ts.id=tem.id && ts.id_dealer=td.id_dealer && td.id_merk=tm.id_merk && td.id_type=tt.id_type order by id asc");
?>
<head>
    <title>Combo Bar-Line Chart</title>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="../Chart.bundle.js"></script>
    <style>
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
    </style>
</head>

<body>
    <div style="width: 75%">
        <canvas id="canvas"></canvas>
    </div>
    <button id="randomizeData">Randomize Data</button>
    <script>
        var randomScalingFactor = function() {
            return (Math.random() > 0.5 ? 1.0 : -1.0) * Math.round(Math.random() * 100);
        };
        var randomColorFactor = function() {
            return Math.round(Math.random() * 255);
        };

        var chartData = {
            // labels: ["January", "February", "March", "April", "May", "June", "July"],
            labels: [<?php while ($b = mysqli_fetch_array($klasifikasi)) { echo '"' . $b['klasifikasi'] . '",';}?>],
            datasets: [{
                type: 'bar',
                label: 'KONTRIBUSI VS GRADE',
                backgroundColor: "rgba(255,51,0,0.5)",
                pointBackgroundColor: "rgba(220,220,220,1)",

                            data: [<?php while ($p = mysqli_fetch_array($kontribusi)) { echo '"' . $p['kontribusi'] . '",';}?>],
                            borderColor: 'white',
                borderWidth: 2
            }, {
                type: 'line',
                label: "DP VS GRADE",
                backgroundColor: "rgba(0,0,204,0.5)",
                pointBackgroundColor: "rgba(151,187,205,1)",
                pointHoverBackgroundColor: "#fff",
                data: [<?php while ($p = mysqli_fetch_array($dp)) { echo '"' . $p['dp'] . '",';}?>],
                borderColor: 'white',
                borderWidth: 2
            },{
                type: 'bar',
                label: "TYPE VS GRADE",
                backgroundColor: "rgba(204,102,0,0.5)",
                pointBackgroundColor: "rgba(151,187,205,1)",
                pointHoverBackgroundColor: "#fff",
                data: [<?php while ($p = mysqli_fetch_array($type)) { echo '"' . $p['id_type'] . '",';}?>],
                borderColor: 'white',
                borderWidth: 2
            },{
                type: 'line',
                label: "MERK VS GRADE",
                backgroundColor: "rgba(102,255,0,0.5)",
                pointBackgroundColor: "rgba(151,187,205,1)",
                pointHoverBackgroundColor: "#fff",
                data: [<?php while ($p = mysqli_fetch_array($merk)) { echo '"' . $p['id_merk'] . '",';}?>],
                borderColor: 'white',
                borderWidth: 2
            },]

        };
        window.onload = function() {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myMixedChart = new Chart(ctx, {
                type: 'bar',
                data: chartData,
                options: {
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Chart.js Combo Bar Line Chart'
                    }
                }
            });
        };

        $('#randomizeData').click(function() {
            $.each(chartData.datasets, function(i, dataset) {
                dataset.backgroundColor = 'rgba(' + randomColorFactor() + ',' + randomColorFactor() + ',' + randomColorFactor() + ',.7)';
                dataset.data = [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()];

            });
            window.myMixedChart.update();
        });
    </script>
</body>

</html>
