<?php
require('../koneksi.php');
require('../session.php');
require('session.php');
include('../layouts/header.php');
?>

<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>Users</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Users</li>
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
      <h3 class="card-title">Data Users</h3>
      <div class="card-tools">
        <a href="create.php" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data</a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <?php
      $sql = "SELECT * FROM users";
      $result = $conn->query($sql);
      ?>
      <table class="table table-bordered table-striped example1">
        <thead>
          <tr>
            <th>Nama Users</th>
            <th>Username</th>
            <th width="25%">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($result as $row) {  ?>
            <tr>
              <td><?= $row['nama_users']; ?></td>
              <td><?= $row['username']; ?></td>
              <td><a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> ubah data</a>
                <form class="d-inline" action="function.php" method="POST">
                  <input type="hidden" name="hapus" value="1">
                  <input type="hidden" name="tambah" value="0">
                  <input type="hidden" name="edit" value="0">
                  <input type="hidden" name="id" value="<?= $row['id'] ?>">
                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut ??')"><i class="fas fa-trash"></i> hapus data</button>
                </form>
              </td>
            </tr>
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