<?php
include('../koneksi.php');
require('session.php');
include('../layouts/header.php');

$sql = "SELECT * FROM barang";
$result = $conn->query($sql);
?>


<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Transaksi Hutang</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Transaksi Hutang</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->

</section>

<!-- Main content -->
<section class="content">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Transaksi Hutang</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="function.php" method="POST">
            <div class="card-body">
                <div class="form-group">
                    <label for="date">Tanggal</label>
                    <input value="<?= date('Y-m-d'); ?>" type="date" class="form-control col-2" id="date" name="date" required>
                </div>
                <div class="form-group">
                    <label for="nama_orang">Nama Orang</label>
                    <select class="form-control" name="nama_orang" id="nama_orang" required>
                        <option value="">--Pilih Nama--</option>
                        <option name="nama_orang" value="Mas Ryan">Mas Ryan</option>
                        <option name="nama_orang" value="Alex">Alex</option>
                        <option name="nama_orang" value="Maman">Maman</option>
                        <option name="nama_orang" value="Mas Udin">Mas Udin</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_barang">Nama Produk</label><br>
                    <select class="form-control select2bs4" name="id_barang" id="id_barang" onchange="isi_otomatis()" required>
                        <option value="">--Pilih Produk--</option>
                        <?php foreach ($result as $row) { ?>
                            <option name="id_barang" value="<?= $row['id_barang']; ?>"><?= $row['nama_barang']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="harga_barang">Harga Barang</label>
                    <input type="text" class="form-control" id="harga_barang" name="harga_barang" onkeyup="perkalian();" readonly>
                </div>
                <div class="form-group">
                    <label for="satuan">Quantity</label>
                    <input type="text" class="form-control" id="satuan" name="satuan" onkeyup="perkalian();" required>
                </div>
                <div class="form-group">
                    <label for="total_jual">Total Harga</label>
                    <input type="text" class="form-control" id="total_jual" name="total_jual" readonly>
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
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    })
</script>

<!-- Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>