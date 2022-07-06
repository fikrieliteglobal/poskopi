<?php
require("../koneksi.php");

if ($_POST['tambah'] == 1) {
    $kategori_barang = $_POST['nama_kategori_barang'];

    $sql = "INSERT INTO kategori_barang(nama_kategori_barang) values('$kategori_barang')";
    $result = $conn->query($sql);
    if ($result) {
        $_SESSION['msg-success'] = 'Data Berhasil Ditambahkan';
        header("location: index.php");
    }
}
if ($_POST['hapus'] == 1) {
    $id_kategori_barang = $_POST['id_kategori_barang'];
    $sql = "DELETE FROM kategori_barang WHERE id_kategori_barang = $id_kategori_barang";
    $result = $conn->query($sql);
    if ($result) {
        $_SESSION['msg-success'] = 'Data Berhasil Dihapus';
        header("location: index.php");
    }
}
if ($_POST['edit'] == 1) {
    $id_kategori_barang = $_POST['id_kategori_barang'];
    $nama_kategori_barang = $_POST['nama_kategori_barang'];

    $sql = "UPDATE kategori_barang SET nama_kategori_barang = '$nama_kategori_barang' WHERE id_kategori_barang = $id_kategori_barang";

    $result = $conn->query($sql);

    if ($result) {
        $_SESSION['msg-success'] = "Data Berhasil Diubah!";
        header('location: index.php');
    }
}
