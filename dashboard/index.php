<?php

require('../koneksi.php');
require('session.php');
include('../layouts/header.php');

?>

<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Dashboard</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->

<!-- Main content -->
<section class="content">

    <div class="card bg-gradient">
        <div class="card-header border-0">
            <h3 class="card-title">
                <i class="fas fa-th mr-1"></i>
                Grafik Penjualan
            </h3>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <input type="date" name="tanggal1" value="<?= $_POST['tanggal1'] ?>">
                S/D
                <input type="date" name="tanggal2" value="<?= $_POST['tanggal2'] ?>">
                <button>Cari Data</button>
            </form>
        </div>
        <div class="chart">
            <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <div class="card">
        <div class="card-header">
            <h4>Laporan Per Bulan</h4>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered table-striped example1">
                <thead>
                    <tr style="text-align: center;">
                        <th>Total Omset</th>
                        <th>Total Beban</th>
                        <th>Profit</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="text-align: center;">
                        <?php
                        if (!isset($_POST['tanggal1'], $_POST['tanggal2'])) {
                        ?>
                            <?php
                            $sql = "SELECT sum(total_jual) AS omset FROM laporan_penjualan";
                            $result = $conn->query($sql);

                            $sql2 = "SELECT sum(harga) AS beban FROM beban_penjualan";
                            $result2 = $conn->query($sql2);
                            ?>
                            <?php foreach ($result2 as $row2) { ?>
                                <?php foreach ($result as $row1) { ?>
                                    <td><?= "Rp " . number_format($row1['omset'], 2, ',', '.'); ?></td>
                                <?php } ?>
                                <td><?= "Rp " . number_format($row2['beban'], 2, ',', '.'); ?></td>
                                <td><?= "Rp " . number_format($row1['omset'] - $row2['beban'], 2, ',', '.'); ?></td>
                            <?php } ?>
                        <?php } else { ?>
                            <?php

                            $tanggal1 = $_POST['tanggal1'];
                            $tanggal2 = $_POST['tanggal2'];

                            $sql = "SELECT sum(total_jual) AS omset FROM laporan_penjualan WHERE tanggal BETWEEN '$tanggal1' AND '$tanggal2'";
                            $result = $conn->query($sql);

                            $sql2 = "SELECT sum(harga) AS beban FROM beban_penjualan WHERE tanggal BETWEEN '$tanggal1' AND '$tanggal2'";
                            $result2 = $conn->query($sql2);
                            ?>
                            <?php foreach ($result2 as $row2) { ?>
                                <?php foreach ($result as $row1) { ?>
                                    <td><?= "Rp " . number_format($row1['omset'], 2, ',', '.'); ?></td>
                                <?php } ?>
                                <td><?= "Rp " . number_format($row2['beban'], 2, ',', '.'); ?></td>
                                <td><?= "Rp " . number_format($row1['omset'] - $row2['beban'], 2, ',', '.'); ?></td>
                            <?php } ?>
                        <?php } ?>
                    </tr>
                    <?php $profit = $row1['omset'] - $row2['beban']; ?>
                    <tr style="text-align: center;">
                        <td>Presentase</td>
                        <td><?= round($row2['beban'] / $row1['omset'] * 100) ?> %</td>
                        <td><?= round($profit / $row1['omset'] * 100) ?> %</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <div class="card bg-gradient">
        <div class="card-header border-0">
            <h3 class="card-title">
                <i class="fas fa-th mr-1"></i>
                Grafik Penjualan Angkringan
            </h3>
        </div>
        <div class="chart">
            <canvas id="angkringan" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
        </div>
        <!-- /.card-body -->
    </div>
</section>

<?php
include('../layouts/footer.php');
?>
<script>
    $(function() {
        const ctx = document.getElementById('lineChart').getContext('2d');
        const labels = [<?php
                        if (!isset($_POST['tanggal1'], $_POST['tanggal2'])) {
                            $conn = mysqli_connect("localhost", "root", "", "pos");
                            $sql = "SELECT DAY(tanggal), sum(total_jual) AS hasil_penjualan FROM laporan_penjualan GROUP BY tanggal";
                            $result = $conn->query($sql);
                            foreach ($result as $row) {
                                echo $row['DAY(tanggal)'] . ', ';
                            }
                        } else {
                            $tanggal1 = $_POST['tanggal1'];
                            $tanggal2 = $_POST['tanggal2'];
                            $conn = mysqli_connect("localhost", "root", "", "pos");
                            $sql = "SELECT DAY(tanggal), sum(total_jual) AS hasil_penjualan FROM laporan_penjualan WHERE tanggal BETWEEN '$tanggal1' AND '$tanggal2' GROUP BY tanggal";
                            $result = $conn->query($sql);
                            foreach ($result as $row) {
                                echo $row['DAY(tanggal)'] . ', ';
                            }
                        }
                        ?>]
        const options = {
            interaction: {
                // Overrides the global setting
                mode: 'index'
            }
        }
        const data = {
            labels: labels,
            datasets: [{
                label: 'Penjualan',
                data: [<?php
                        if (!isset($_POST['tanggal1'], $_POST['tanggal2'])) {
                            $conn = mysqli_connect("localhost", "root", "", "pos");
                            $sql = "SELECT DAY(tanggal), sum(total_jual) AS hasil_penjualan FROM laporan_penjualan GROUP BY tanggal";
                            $result = $conn->query($sql);
                            foreach ($result as $row) {
                                echo $row['hasil_penjualan'] . ', ';
                            }
                        } else {
                            $tanggal1 = $_POST['tanggal1'];
                            $tanggal2 = $_POST['tanggal2'];
                            $conn = mysqli_connect("localhost", "root", "", "pos");
                            $sql = "SELECT DAY(tanggal), sum(total_jual) AS hasil_penjualan FROM laporan_penjualan WHERE tanggal BETWEEN '$tanggal1' AND '$tanggal2' GROUP BY tanggal";
                            $result = $conn->query($sql);
                            foreach ($result as $row) {
                                echo $row['hasil_penjualan'] . ', ';
                            }
                        }
                        ?>],
                fill: false,
                borderColor: 'black',
                tension: 0,
                backgroundColor: 'black'
            }],

        }
        const type = 'line'
        const config = {
            type: type,
            data: data,
            options: options
        }
        const myChart = new Chart(ctx, config);
    })
    $(function() {
        const ctx = document.getElementById('angkringan').getContext('2d');
        const labels = [<?php
                        $conn = mysqli_connect("localhost", "root", "", "pos");
                        $sql = "SELECT DAY(tanggal), sum(total_jual) AS hasil_penjualan FROM angkringan GROUP BY tanggal";
                        $result = $conn->query($sql);
                        foreach ($result as $row) {
                            echo $row['DAY(tanggal)'] . ', ';
                        }
                        ?>]
        const options = {
            interaction: {
                // Overrides the global setting
                mode: 'index'
            }
        }
        const data = {
            labels: labels,
            datasets: [{
                label: 'Penjualan',
                data: [<?php
                        $conn = mysqli_connect("localhost", "root", "", "pos");
                        $sql = "SELECT DAY(tanggal), sum(total_jual) AS hasil_penjualan FROM angkringan GROUP BY tanggal";
                        $result = $conn->query($sql);
                        foreach ($result as $row) {
                            echo $row['hasil_penjualan'] . ', ';
                        }
                        ?>],
                fill: false,
                borderColor: 'black',
                tension: 0,
                backgroundColor: 'black'
            }],

        }
        const type = 'line'
        const config = {
            type: type,
            data: data,
            options: options
        }
        const myChart = new Chart(ctx, config);
    })
</script>