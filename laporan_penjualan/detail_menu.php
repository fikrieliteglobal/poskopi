<?php
require('../koneksi.php');
require('../session.php');
require('session.php');
include('../layouts/header.php');

$tanggal = $_POST['tanggal'];

$sql = "SELECT * FROM laporan_menu WHERE tanggal = '$tanggal'";
$result = $conn->query($sql);

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
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Base</th>
                        <th>Additional</th>
                        <th>Additional2</th>
                        <th>Additional3</th>
                        <th>Topping</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    $total = 0 ?>
                    <?php foreach ($result as $row) {  ?>
                        <tr style="text-align: center;">
                            <td><?= $no; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['tanggal']; ?></td>
                            <td><?= $row['base']; ?></td>
                            <td><?= $row['additional']; ?></td>
                            <td><?= $row['additional2']; ?></td>
                            <td><?= $row['additional3']; ?></td>
                            <td><?= $row['topping']; ?></td>
                            <td><?= "Rp " . number_format($row['total'], 2, ',', '.'); ?></td>
                        </tr>
                        <?php $no++;
                        $total = $total + $row['total']; ?>
                    <?php } ?>
                    <tr style="text-align: center;">
                        <td colspan="7"></td>
                        <td><b>Total</b></td>
                        <td><b><?= "Rp " . number_format($total, 2, ',', '.') ?></b></td>
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