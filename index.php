<?php

require('koneksi.php');
require('function.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menu Experience</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>

<body>
    <div class="card">
        <div class="card-body">
            <div class="wrapper">
                <section class="content">
                    <div class="row">
                        <div class="col-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Select Menu</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group text-center">
                                        <form action="" method="POST">
                                            <label>Your Name</label>
                                            <div class="input-group date" id="nama">
                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="What's Your Name" required>
                                            </div>
                                            <br>
                                            <label>Base</label>
                                            <div class="input-group date" id="base">
                                                <select name="base" id="base" class="form-control text-center select2bs4" required>
                                                    <option value="">--Select Your Base--</option>
                                                    <?php foreach ($ResultBase as $row) { ?>
                                                        <option value="<?= $row['nama_barang']; ?>" require><?= $row['nama_barang']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <br>
                                            <label>Additional</label>
                                            <div class="input-group date" id="additional">
                                                <select name="additional" id="additional" class="form-control text-center select2bs4">
                                                    <option value="">--Select Your Additional--</option>
                                                    <?php foreach ($ResultAdditional as $row) { ?>
                                                        <option value="<?= $row['nama_barang']; ?>"><?= $row['nama_barang']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <br>
                                            <label>Additional (optional)</label>
                                            <div class="input-group date" id="additional2">
                                                <select name="additional2" id="additional2" class="form-control text-center select2bs4">
                                                    <option value="">--Select Your Additional--</option>
                                                    <?php foreach ($ResultAdditional as $row) { ?>
                                                        <option value="<?= $row['nama_barang']; ?>"><?= $row['nama_barang']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <br>
                                            <label>Additional (optional 2)</label>
                                            <div class="input-group date" id="additional3">
                                                <select name="additional3" id="additional3" class="form-control text-center select2bs4">
                                                    <option value="">--Select Your Additional--</option>
                                                    <?php foreach ($ResultAdditional as $row) { ?>
                                                        <option value="<?= $row['nama_barang']; ?>"><?= $row['nama_barang']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <br>
                                            <label>Topping</label>
                                            <div class="input-group date" id="topping">
                                                <select name="topping" id="topping" class="form-control text-center select2bs4">
                                                    <option value="">--Select Your Topping--</option>
                                                    <?php foreach ($ResultTopping as $row) { ?>
                                                        <option value="<?= $row['nama_barang']; ?>"><?= $row['nama_barang']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <br>
                                            <button type="submit" class="btn btn-primary btn-sm btn-block">Detail</button>
                                        </form>
                                    </div>
                                    <!-- Date -->
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Your Coffee</h3>
                                </div>
                                <div class="card-body">
                                    <!-- Date -->
                                    <?php if (!isset($_POST["nama"])) {
                                        echo "";
                                    } else {
                                        echo "<h4><b>Kak " . strtoupper($_POST['nama']) . "</b></h4>";
                                    }
                                    ?>
                                    <table class="table table-bordered table-striped example1">
                                        <thead>
                                            <tr>
                                                <th>Menu</th>
                                                <th>Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?= $Base; ?></td>
                                                <td><?= $RupiahBase; ?></td>
                                            </tr>
                                            <tr>
                                                <td><?= $Additional; ?></td>
                                                <td><?= $RupiahAdditional; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><?= $Additional2; ?></td>
                                                <td><?= $RupiahAdditional2; ?></td>
                                            </tr>
                                            <tr>
                                                <td><?= $Additional3; ?></td>
                                                <td><?= $RupiahAdditional3; ?></td>
                                            </tr>
                                            <tr>
                                                <td><?= $Topping ?></td>
                                                <td><?= $RupiahTopping; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: right;"><b>Total</b></td>
                                                <td>
                                                    <?php $Total = jumlah($HargaBase, $HargaAdditional, $HargaAdditional2, $HargaAdditional3, $HargaTopping); ?>
                                                    <?= "Rp " . number_format($Total, 2, ',', '.'); ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    <form action="simpan.php" method="POST">
                                        <input type="hidden" name="simpan" value="1">
                                        <input type="hidden" name="nama" value="<?= $_POST['nama']; ?>">
                                        <input type="hidden" name="base" value="<?= $Base; ?>">
                                        <input type="hidden" name="additional" value="<?= $Additional; ?>">
                                        <input type="hidden" name="additional2" value="<?= $Additional2; ?>">
                                        <input type="hidden" name="additional3" value="<?= $Additional3; ?>">
                                        <input type="hidden" name="topping" value="<?= $Topping; ?>">
                                        <input type="hidden" name="total" value="<?= $Total; ?>">
                                        <button class="btn btn-primary btn-sm btn-block"><i class="fas fa-plus"></i> Simpan</button>
                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <a class="btn btn-default btn-sm" href="login/index.php"> ___</a>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
</body>

</html>