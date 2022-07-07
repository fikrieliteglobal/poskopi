<?php
include('../koneksi.php');
require('../session.php');
require('session.php');
include('../layouts/header.php');

?>


<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Beban Penjualan</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Beban Penjualan</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->

</section>

<!-- Main content -->
<section class="content">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Beban Penjualan</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="function.php" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="nama_barang">Nama Barang</label><br>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
                </div>
                <div class="form-group">
                    <label for="harga">Harga Barang</label>
                    <input type="text" class="form-control" id="harga" name="harga" required>
                </div>
                <input type="hidden" name="tambah" value="1">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</section>
<!-- /.content -->

<?php
include('../layouts/footer.php');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
    function isi_otomatis() {
        var id_barang = $("#id_barang").val();
        $.ajax({
            url: 'ajax.php',
            data: "id_barang=" + id_barang,
        }).success(function(data) {
            var json = data,
                obj = JSON.parse(json);
            $('#harga_barang').val(obj.harga_barang)
        });
    }

    function perkalian() {
        var val1 = $('#harga_barang').val();
        var val2 = $('#satuan').val();
        var kali = Number(val1) * Number(val2);
        if (val1 != "" && val2 != "") {
            $('#total_jual').val(kali);
        }
    }
</script>