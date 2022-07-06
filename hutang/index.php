<?php
require('../koneksi.php');
require('session.php');
include('../layouts/header.php');

$sql = "SELECT nama_orang FROM hutang GROUP BY nama_orang";
$result = $conn->query($sql);

?>



<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Data Hutang</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Laporan Hutang</li>
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
            <h4 class="card-title">Laporan Hutang Per Orang</h4>
            <div class="card-tools">
                <a href="create.php" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="row">
            <div class="col-md-3">

                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Laporan Per Orang</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr style="text-align: center;">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($result as $row) {  ?>
                                    <tr style="text-align: center;">
                                        <td width="5%"><?= $no; ?></td>
                                        <td><?= $row['nama_orang']; ?></td>
                                        <td>
                                            <form action="" method="POST">
                                                <input type="hidden" name="nama_orang" value="<?= $row['nama_orang']; ?>">
                                                <button type="submit" class="btn btn-warning btn-sm col-12">Detail</button>
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

            </div>
            <!-- /.col (left) -->
            <div class="col-md-9">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Detail Hutang</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover example2">
                            <thead>
                                <tr>
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
                                        <td colspan="7">Tidak ada data</td>
                                    </tr>
                                <?php } else { ?>
                                    <?php
                                    $nama_orang = $_POST["nama_orang"];
                                    $sql2 = "SELECT * FROM hutang AS a INNER JOIN barang AS b ON a.id_barang = b.id_barang WHERE nama_orang = '$nama_orang'";
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
                                <?php } ?>
                            </tbody>
                            <tr>
                                <form action="function.php" method="POST">
                                    <input type="hidden" name="tambah" value="0">
                                    <input type="hidden" name="bayar" value="1">
                                    <input type="hidden" name="nama_orang" value="<?= $_POST["nama_orang"]; ?>">
                                    <td><button class="btn btn-danger btn-sm col-12" onclick="return confirm('Apakah yakin sudah dibayar ??')">Bayar</button></td>
                                </form>
                                <td>Total</td>
                                <td colspan="5"><?= "Rp " . number_format($total, 2, ',', '.') ?></td>
                            </tr>
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