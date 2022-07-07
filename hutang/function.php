<?php
require("../koneksi.php");
require('../session.php');

if ($_POST['tambah'] == 1) {
    $date = $_POST['date'];
    $nama_orang = $_POST['nama_orang'];
    $id_barang = $_POST['id_barang'];
    $harga_barang = $_POST['harga_barang'];
    $satuan = $_POST['satuan'];
    $total_jual = $_POST['total_jual'];

    $sql = "INSERT INTO hutang (nama_orang, id_barang, harga_barang, satuan, total_jual, tanggal) values ( '$nama_orang', '$id_barang', '$harga_barang', '$satuan', '$total_jual', '$date')";
    $result = $conn->query($sql);

    if ($result) {
        $_SESSION['msg-success'] = 'Data Berhasil Ditambahkan';
        header("location: create.php");
    }
}
if ($_POST['bayar'] == 1) {
    $nama_orang = $_POST["nama_orang"];
    $sql = "DELETE FROM hutang WHERE nama_orang = '$nama_orang'";
    $result = $conn->query($sql);
    if ($result) {
        $_SESSION['msg-success'] = 'Data Berhasil Dihapus';
        header("location: index.php");
    }
}
