<?php
require('../koneksi.php');
require('../session.php');
require('session.php');
include('../layouts/header.php');

$sql = "SELECT * FROM kategori_barang";
$kategori_barang = $conn->query($sql);
?>


<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Barang</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Barang</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->

<!-- Main content -->
<section class="content">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Barang</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="function.php" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Masukkan Barang" required>
                </div>
                <div class="form-group">
                    <label for="harga_barang">Harga Barang</label>
                    <input type="text" class="form-control" id="harga_barang" name="harga_barang" placeholder="Masukkan Harga Barang" required>
                </div>
                <div class="form-group">
                    <label for="stok">stok</label>
                    <input type="stok" class="form-control" id="stok" name="stok" placeholder="Masukkan stok" required>
                </div>
                <div class="form-group">
                    <label for="kategori_barang_id">Nama Kategori Barang</label><br>
                    <select class="form-control select2bs4" name="kategori_barang_id" id="kategori_barang_id" required>
                        <option value="">--Pilih'en kategori barang'e WOY !!--</option>
                        <?php foreach ($kategori_barang as $row) {  ?>
                            <option value="<?= $row['id_kategori_barang'] ?>"><?= $row['nama_kategori_barang'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <!-- /.card-body -->
            <input type="hidden" name="tambah" value="1">
            <input type="hidden" name="hapus" value="0">
            <input type="hidden" name="edit" value="0">
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
<script>
    var rupiah = document.getElementById('harga_barang');
    rupiah.addEventListener('keyup', function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
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