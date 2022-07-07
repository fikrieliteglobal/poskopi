<?php
require('../koneksi.php');
require('../session.php');
require('session.php');
include('../layouts/header.php');

$sql = "SELECT a.*, b.* FROM transaksi_penjualan a INNER JOIN barang  b ON a.id_barang=b.id_barang";
$result = mysqli_query($conn, $sql);

$sql2 = "SELECT SUM(total_jual) as total from transaksi_penjualan";
$query = mysqli_query($conn, $sql2);
$total = mysqli_fetch_array($query);

$sql_menu = "SELECT * FROM transaksi_menu";
$result_menu = mysqli_query($conn, $sql_menu);

?>



<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Transaksi Penjualan</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Transaksi Penjualan</li>
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
            <h3 class="card-title">Invoice Transaksi Penjualan</h3>
            <div class="card-tools">
                <a href="create.php" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered table-hover example2">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th width="20%">Nama Barang</th>
                        <th>Harga Barang</th>
                        <th>Satuan</th>
                        <th>Total</th>
                        <th width="15%">Aksi</th>
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
                            <td>
                                <form class="d-inline" action="function.php" method="POST">
                                    <input type="hidden" name="hapus" value="1">
                                    <input type="hidden" name="tambah" value="0">
                                    <input type="hidden" name="simpan" value="0">
                                    <input type="hidden" name="hapus_menu" value="0">
                                    <input type="hidden" name="simpan_menu" value="0">
                                    <input type="hidden" name="id_transaksi" value="<?= $row['id_transaksi'] ?>">
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut ??')"><i class="fas fa-trash"></i> hapus data</button>
                                </form>
                            </td>
                        </tr>
                        <?php $no++; ?>
                    <?php } ?>
                </tbody>
                <tr>
                    <td>Total</td>
                    <td><?= "Rp " . number_format($total['total'], 2, ',', '.'); ?></td>
                    <td colspan="6">
                        <form action="function.php" method="POST">
                            <input type="hidden" name="hapus" value="0">
                            <input type="hidden" name="tambah" value="0">
                            <input type="hidden" name="simpan" value="1">
                            <input type="hidden" name="hapus_menu" value="0">
                            <input type="hidden" name="simpan_menu" value="0">
                            <button class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Simpan Data</button>
                        </form>
                    </td>
                </tr>
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
            <h3 class="card-title">Invoice Transaksi Menu</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered table-striped example2">
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
                        <th width="17%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1 ?>
                    <?php foreach ($result_menu as $row) {  ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['tanggal']; ?></td>
                            <td><?= $row['base']; ?></td>
                            <td><?= $row['additional']; ?></td>
                            <td><?= $row['additional2']; ?></td>
                            <td><?= $row['additional3']; ?></td>
                            <td><?= $row['topping']; ?></td>
                            <td><?= $row['total']; ?></td>
                            <td>
                                <form class="d-inline" action="function.php" method="POST">
                                    <input type="hidden" name="hapus" value="0">
                                    <input type="hidden" name="tambah" value="0">
                                    <input type="hidden" name="simpan" value="0">
                                    <input type="hidden" name="hapus_menu" value="1">
                                    <input type="hidden" name="simpan_menu" value="0">
                                    <input type="hidden" name="id_menu" value="<?= $row['id_menu'] ?>">
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut ??')"><i class="fas fa-trash"></i> hapus</button>
                                </form>
                                <form class="d-inline" action="function.php" method="POST">
                                    <input type="hidden" name="hapus" value="0">
                                    <input type="hidden" name="tambah" value="0">
                                    <input type="hidden" name="simpan" value="0">
                                    <input type="hidden" name="hapus_menu" value="0">
                                    <input type="hidden" name="simpan_menu" value="1">
                                    <input type="hidden" name="id_menu" value="<?= $row['id_menu'] ?>">
                                    <button class="btn btn-primary btn-sm" onclick="return confirm('Yakin pesanan sudah selesai ??')"><i class="fas fa-plus"></i> Selesai</button>
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