<?php
require('../koneksi.php');
require('session.php');
include('../layouts/header.php');

?>



<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Data Angkringan</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="../angkringan/index.php">Kembali</a></li>
                <li class="breadcrumb-item active">Laporan Angkringan</li>
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
            <h4 class="card-title">Laporan Angkringan <b><?= $_POST['tanggal']; ?></b> | Total Penjualan <b><?= "Rp " . number_format($_POST['hasil_penjualan'], 2, ',', '.'); ?></b></h4>
        </div>
        <!-- /.card-header -->
        <div class="row">
            <div class="col-md-3">

                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Laporan Per Orang</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr style="text-align: center;">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!isset($_POST["tanggal"])) { ?>
                                    <tr>
                                        <td colspan="3" style="text-align: center;">Tidak ada data</td>
                                    </tr>
                                <?php } else { ?>
                                    <?php $tanggal = $_POST['tanggal'];
                                    $sql = "SELECT nama_orang, tanggal FROM angkringan WHERE tanggal = '$tanggal' GROUP BY nama_orang";
                                    $result = $conn->query($sql); ?>
                                    <?php $no = 1; ?>
                                    <?php foreach ($result as $row) {  ?>
                                        <tr style="text-align: center;">
                                            <td width="5%"><?= $no; ?></td>
                                            <td><?= $row['nama_orang']; ?></td>
                                            <td>
                                                <form action="" method="POST">
                                                    <input type="hidden" name="nama_orang" value="<?= $row['nama_orang']; ?>">
                                                    <input type="hidden" name="tanggal" value="<?= $row['tanggal']; ?>">
                                                    <input type="hidden" name="hasil_penjualan" value="<?= $_POST['hasil_penjualan']; ?>">
                                                    <button type="submit" class="btn btn-warning btn-sm col-12">Detail</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php $no++; ?>
                                    <?php } ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col (left) -->
            <div class="col-md-9">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Detail Penjualan</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered example2">
                            <thead>
                                <tr style="text-align: center;">
                                    <th width="5%">No</th>
                                    <th>Nama</th>
                                    <th>tanggal</th>
                                    <th>Nama Barang</th>
                                    <th>Harga Barang</th>
                                    <th>Satuan</th>
                                    <th>Total Jual</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!isset($_POST["nama_orang"])) { ?>
                                    <tr>
                                        <td colspan="7" style="text-align: center;">Tidak ada data</td>
                                    </tr>
                                <?php } else { ?>
                                    <?php
                                    $nama_orang = $_POST["nama_orang"];
                                    $tanggal = $_POST["tanggal"];
                                    $sql2 = "SELECT * FROM angkringan AS a INNER JOIN barang AS b ON a.id_barang = b.id_barang WHERE (tanggal = '$tanggal' AND nama_orang = '$nama_orang')";
                                    $result2 = $conn->query($sql2);
                                    ?>
                                    <?php $no = 1;
                                    $total = 0; ?>
                                    <?php foreach ($result2 as $row) { ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $row['nama_orang']; ?></td>
                                            <td><?= $row['tanggal']; ?></td>
                                            <td><?= $row['nama_barang']; ?></td>
                                            <td><?= "Rp " . number_format($row['harga_barang'], 2, ',', '.') ?></td>
                                            <td><?= $row['satuan']; ?></td>
                                            <td><?= "Rp " . number_format($row['total_jual'], 2, ',', '.') ?></td>
                                        </tr>
                                        <?php $no++;
                                        $total = $total + $row['total_jual']; ?>
                                    <?php } ?>
                            </tbody>
                            <tr>
                                <td>Total</td>
                                <td colspan="6"><?= "Rp " . number_format($total, 2, ',', '.') ?></td>
                            </tr>
                        <?php } ?>
                        </table>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col (right) -->
            </div>
        </div>
        <!-- /.card -->

</section>
<!-- /.content -->

<?php
include('../layouts/footer.php');
?>
<script>
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

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