<?php
require('../koneksi.php');
require('session.php');
include('../layouts/header.php');

$tanggal = "";

if (isset($tanggal)) {
    $sql = "SELECT tanggal, sum(total_jual) AS hasil_penjualan FROM angkringan GROUP BY tanggal";
    $result = $conn->query($sql);
}
?>



<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Data Laporan Angkringan</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
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
            <h4 class="card-title">Laporan Per Tanggal</h4>
            <div class="card-tools">
                <a href="create.php" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data</a>
            </div>
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
                                    <input type="hidden" name="hasil_penjualan" value="<?= $row['hasil_penjualan']; ?>">
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