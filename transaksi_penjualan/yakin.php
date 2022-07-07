<?php

require('../koneksi.php');
require('../session.php');
require('session.php');
include('../layouts/header.php');

?>

<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1></h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active"></li>
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
            <h3 class="card-title">Konfirmasi</h3>
        </div>
        <!-- /.card-header -->
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered table-striped example1">
                <h3>
                    Anda Yakin Menyimpan data ini ???
                </h3>
                <tbody>
                    <a href="index.php" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Tidak</a>
                    &nbsp;
                    <form class="d-inline" action="function.php" method="POST">
                        <input type="hidden" name="hapus" value="">
                        <input type="hidden" name="tambah" value="0">
                        <input type="hidden" name="simpan" value="1">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Lanjut</button>
                    </form>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
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