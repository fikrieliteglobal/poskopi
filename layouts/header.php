<!DOCTYPE html>
<html lang="en">

<?php
require('session.php');
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pos Kasir</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="../assets/plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="../assets/plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

  <style>
    .breadcrumb {
      background-color: transparent;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="../dashboard/index.php" class="brand-link">
        <span class="brand-text font-weight-light">POS Kasir</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../assets/img/logo.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="../dashboard/index.php" class="d-block">Kedai Kopi Paradewaa</a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="../dashboard/index.php" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Master
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../users/index.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>user</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../kategori_barang/index.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>kategori barang</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../Barang/index.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>barang</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="../transaksi_penjualan/index.php" class="nav-link">
                <i class="nav-icon fas fa-book-open"></i>
                <p>
                  Transaksi Penjualan
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../laporan_penjualan/index.php" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Laporan Penjualan
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../beban_penjualan/index.php" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Beban Penjualan
                  <i class="fas right"></i>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../hutang/index.php" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>
                  Hutang
                  <i class="fas right"></i>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../angkringan/index.php" class="nav-link">
                <i class="nav-icon fas fa-columns"></i>
                <p>
                  Laporan Angkringan
                  <i class="fas right"></i>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../index.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Prototipe Menu
                  <i class="fas right"></i>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../login/log_out.php" class="nav-link">
                <i class="nav-icon fas fa-search"></i>
                <p>
                  Log Out
                  <i class="fas right"></i>
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">