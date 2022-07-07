<?php
require('../koneksi.php');
require('../session.php');
require('session.php');
include('../layouts/header.php');

$id = $_GET['id'];

$sql = "SELECT * FROM kategori_barang WHERE id_kategori_barang = $id";
$kategori_barang = $conn->query($sql)->fetch_assoc();

?>
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Kategori Barang</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Barang</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->

</section>

<!-- Main content -->
<section class="content">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Kategori Barang</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="function.php" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="nama_users">Nama Kategori Barang</label>
                    <input type="text" class="form-control" id="nama_kategori_barang" name="nama_kategori_barang" placeholder="Masukkan Nama Kategori Barang" required value="<?= $kategori_barang['nama_kategori_barang']; ?>">
                </div>
            </div>
            <!-- /.card-body -->
            <input type="hidden" name="id_kategori_barang" value="<?= $kategori_barang['id_kategori_barang'] ?>">
            <input type="hidden" name="tambah" value="0">
            <input type="hidden" name="hapus" value="0">
            <input type="hidden" name="edit" value="1">
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</section>
<!-- /.content -->

<?php
include('../layouts/footer.php');
?>