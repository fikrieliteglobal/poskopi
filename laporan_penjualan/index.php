<?php
require('../koneksi.php');
require('../session.php');
require('session.php');
include('../layouts/header.php');

$sql = "SELECT tanggal, sum(total_jual) AS hasil_penjualan FROM laporan_penjualan GROUP BY tanggal";
$result = $conn->query($sql);
$sql2 = "SELECT tanggal, sum(total) AS hasil_penjualan FROM laporan_menu GROUP BY tanggal";
$result2 = $conn->query($sql2);


?>



<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Data Laporan Penjualan</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Laporan Penjualan</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->

</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h4>Laporan Per Tanggal</h4>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered table-striped example1">
                <thead>
                    <tr style="text-align: center;">
                        <th width="5%">No</th>
                        <th>tanggal</th>
                        <th>total jual</th>
                        <th style="width: 15%;">aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($result as $row) {  ?>
                        <tr style="text-align: center;">
                            <td><?= $no; ?></td>
                            <td><?= $row['tanggal']; ?></td>
                            <td><?= "Rp " . number_format($row['hasil_penjualan'], 2, ',', '.'); ?></td>
                            <td>
                                <form action="detail.php" method="POST">
                                    <input type="hidden" name="tanggal" value="<?= $row['tanggal']; ?>">
                                    <button type="submit" class="btn btn-danger btn-sm">Lihat</button>
                                </form>
                            </td>
                        </tr>
                        <?php $no++; ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h4>Laporan Menu Per Tanggal</h4>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered table-striped example1">
                <thead>
                    <tr style="text-align: center;">
                        <th width="5%">No</th>
                        <th>tanggal</th>
                        <th>total jual</th>
                        <th style="width: 15%;">aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($result2 as $row) {  ?>
                        <tr style="text-align: center;">
                            <td><?= $no; ?></td>
                            <td><?= $row['tanggal']; ?></td>
                            <td><?= "Rp " . number_format($row['hasil_penjualan'], 2, ',', '.'); ?></td>
                            <td>
                                <form action="detail_menu.php" method="POST">
                                    <input type="hidden" name="tanggal" value="<?= $row['tanggal']; ?>">
                                    <button type="submit" class="btn btn-danger btn-sm">Lihat</button>
                                </form>
                            </td>
                        </tr>
                        <?php $no++; ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->

<?php
include('../layouts/footer.php');
?>
<script>
    <?php if ($_SESSION['msg-success']) { ?>
        Toast.fire({
            icon: "success",
            title: "<?= $_SESSION['msg-success'] ?>"
        })
    <?php $_SESSION['msg-success'] = '';
    } ?>
    <?php if ($_SESSION['msg-error']) { ?>
        Toast.fire({
            icon: "error",
            title: "<?= $_SESSION['msg-error'] ?>"
        })
    <?php $_SESSION['msg-error'] = '';
    } ?>
</script>