<?php
require('../koneksi.php');
require('../session.php');
require('session.php');
include('../layouts/header.php');

$tanggal = $_POST['tanggal'];

$sql = "SELECT * FROM laporan_penjualan AS a INNER JOIN barang AS b ON a.id_barang = b.id_barang WHERE tanggal = '$tanggal'";
$result = $conn->query($sql);

$sql2 = "SELECT SUM(total_jual) as total from laporan_penjualan WHERE tanggal = '$tanggal'";
$query = mysqli_query($conn, $sql2);
$total = mysqli_fetch_array($query);
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
                        <th>Nama Orang</th>
                        <th>Tanggal</th>
                        <th>Nama Barang</th>
                        <th>Harga Barang</th>
                        <th>Satuan</th>
                        <th>Total Jual</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1 ?>
                    <?php foreach ($result as $row) {  ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $row['nama_orang']; ?></td>
                            <td><?= $row['tanggal']; ?></td>
                            <td><?= $row['nama_barang']; ?></td>
                            <td><?= "Rp " . number_format($row['harga_barang'], 2, ',', '.'); ?></td>
                            <td><?= $row['satuan']; ?></td>
                            <td><?= "Rp " . number_format($row['total_jual'], 2, ',', '.'); ?></td>
                        </tr>
                        <?php $no++; ?>
                    <?php } ?>
                </tbody>
                <tr>
                    <td>Total</td>
                    <td><?= "Rp " . number_format($total['total'], 2, ',', '.'); ?></td>
                    <td colspan="6"></td>
                </tr>
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