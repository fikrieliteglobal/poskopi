<?php
require('../koneksi.php');
require('../session.php');
require('session.php');
include('../layouts/header.php');
?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Kategori Barang</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Kategori Barang</li>
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
            <h3 class="card-title">Data Kategori Barang</h3>
            <div class="card-tools">
                <a href="create.php" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php
            $sql = "SELECT * FROM kategori_barang";
            $result = $conn->query($sql);
            ?>
            <table class="table table-bordered table-hover example2">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Kategori Barang</th>
                        <th width="25%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1 ?>
                    <?php foreach ($result as $row) {  ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $row['nama_kategori_barang']; ?></td>
                            <td><a href="edit.php?id=<?= $row['id_kategori_barang']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> ubah data</a>
                                <form class="d-inline" action="function.php" method="POST">
                                    <input type="hidden" name="hapus" value="1">
                                    <input type="hidden" name="tambah" value="0">
                                    <input type="hidden" name="edit" value="0">
                                    <input type="hidden" name="id_kategori_barang" value="<?= $row['id_kategori_barang'] ?>">
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut ??')"><i class="fas fa-trash"></i> hapus data</button>
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