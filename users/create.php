<?php
require('../koneksi.php');
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
      <h3 class="card-title">Tambah User</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="function.php" method="post">
      <div class="card-body">
        <div class="form-group">
          <label for="nama_users">Nama User</label>
          <input type="text" class="form-control" id="nama_users" name="nama_users" placeholder="Masukkan Nama User" required>
        </div>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
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