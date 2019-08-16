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

<!doctype html>
<html>

<head>
    <title>Radar Chart</title>
    <script src="../Chart.bundle.js"></script>
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
    <button id="randomizeData">Randomize Data</button>
    <button id="addDataset">Add Dataset</button>
    <button id="removeDataset">Remove Dataset</button>
    <button id="addData">Add Data</button>
    <button id="removeData">Remove Data</button>
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
        // type: 'line',
        data: {
            labels: [<?php while ($b = mysqli_fetch_array($klasifikasi)) { echo '"' . $b['klasifikasi'] . '",';}?>],
            datasets: [{
                type: 'bar',
                label: 'KONTRIBUSI VS GRADE',
                backgroundColor: "rgba(255,51,0,0.5)",
                pointBackgroundColor: "rgba(220,220,220,1)",

                            data: [<?php while ($p = mysqli_fetch_array($kontribusi)) { echo '"' . $p['kontribusi'] . '",';}?>]
            }, {
                type: 'line',
                label: "DP VS GRADE",
                backgroundColor: "rgba(0,0,204,0.5)",
                pointBackgroundColor: "rgba(151,187,205,1)",
                pointHoverBackgroundColor: "#fff",
                data: [<?php while ($p = mysqli_fetch_array($dp)) { echo '"' . $p['dp'] . '",';}?>]
            },{
                label: "TYPE VS GRADE",
                backgroundColor: "rgba(204,102,0,0.5)",
                pointBackgroundColor: "rgba(151,187,205,1)",
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

    $('#randomizeData').click(function() {
        $.each(config.data.datasets, function(i, dataset) {
            dataset.data = dataset.data.map(function() {
                return randomScalingFactor();
            });

        });

        window.myRadar.update();
    });

    $('#addDataset').click(function() {
        var newDataset = {
            label: 'Dataset ' + config.data.datasets.length,
            borderColor: randomColor(0.4),
            backgroundColor: randomColor(0.5),
            pointBorderColor: randomColor(0.7),
            pointBackgroundColor: randomColor(0.5),
            pointBorderWidth: 1,
            data: [],
        };

        for (var index = 0; index < config.data.labels.length; ++index) {
            newDataset.data.push(randomScalingFactor());
        }

        config.data.datasets.push(newDataset);
        window.myRadar.update();
    });

    $('#addData').click(function() {
        if (config.data.datasets.length > 0) {
            config.data.labels.push('dataset #' + config.data.labels.length);

            $.each(config.data.datasets, function (i, dataset) {
                dataset.data.push(randomScalingFactor());
            });

            window.myRadar.update();
        }
    });

    $('#removeDataset').click(function() {
        config.data.datasets.splice(0, 1);
        window.myRadar.update();
    });

    $('#removeData').click(function() {
        config.data.labels.pop(); // remove the label first

        $.each(config.data.datasets, function(i, dataset) {
            dataset.data.pop();
        });

        window.myRadar.update();
    });
    </script>
</body>

</html>


<?php
include '../KNN/footer.php';
?>

