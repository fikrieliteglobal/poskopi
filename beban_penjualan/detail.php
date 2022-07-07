<?php
require('../koneksi.php');
require('../session.php');
require('session.php');
include('../layouts/header.php');

$tanggal = $_POST['tanggal'];

$sql = "SELECT * FROM beban_penjualan WHERE tanggal = '$tanggal'";
$result = $conn->query($sql);

?>



<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Data Laporan Beban Penjualan</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Laporan Beban Penjualan</li>
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
                        <th>Nama Barang</th>
                        <th>Harga Barang</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    $total = 0 ?>
                    <?php foreach ($result as $row) {  ?>
                        <tr style="text-align: center;">
                            <td><?= $no; ?></td>
                            <td><?= $row['tanggal']; ?></td>
                            <td><?= $row['nama_barang']; ?></td>
                            <td><?= "Rp " . number_format($row['harga'], 2, ',', '.');  ?></td>
                        </tr>
                        <?php $no++;
                        $total = $total + $row['harga']; ?>
                    <?php } ?>
                    <tr>
                        <td colspan="2"></td>
                        <td style="text-align: right;">Total</td>
                        <td style="text-align: center; background-color: aquamarine;"><?= "Rp " . number_format($total, 2, ',', '.') ?></td>
                    </tr>
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