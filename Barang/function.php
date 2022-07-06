<?php
require("../koneksi.php");

if ($_POST['tambah'] == 1) {
    $nama_barang = $_POST['nama_barang'];
    $harga_barang = $_POST['harga_barang'];
    $stok = $_POST['stok'];
    $kategori_barang_id = $_POST['kategori_barang_id'];

    $rupiah_hilang = str_replace('Rp. ', '', $harga_barang);
    $harga_barang_new = str_replace('.', '', $rupiah_hilang);

    $sql = "INSERT INTO barang(nama_barang, harga_barang, stok, kategori_barang_id) values('$nama_barang', '$harga_barang_new', '$stok', '$kategori_barang_id')";
    $result = $conn->query($sql);
    if ($result) {
        $_SESSION['msg-success'] = 'Data Berhasil Ditambahkan';
        header("location: index.php");
    }
}
if ($_POST['hapus'] == 1) {
    $id_barang = $_POST['id_barang'];
    $sql = "DELETE FROM barang WHERE id_barang = $id_barang";
    $result = $conn->query($sql);
    if ($result) {
        $_SESSION['msg-success'] = 'Data Berhasil Dihapus';
        header("location: index.php");
    }
}
if ($_POST['edit'] == 1) {
    $id_barang = $_POST['id_barang'];
    $nama_barang = $_POST['nama_barang'];
    $harga_barang = $_POST['harga_barang'];
    $stok = $_POST['stok'];
    $kategori_barang_id = $_POST['kategori_barang_id'];

    $rupiah_hilang = str_replace('Rp. ', '', $harga_barang);
    $harga_barang_new = str_replace('.', '', $rupiah_hilang);

    $sql = "UPDATE barang SET nama_barang = '$nama_barang', harga_barang = '$harga_barang_new', stok = '$stok', kategori_barang_id = '$kategori_barang_id' WHERE id_barang = $id_barang";

    $result = $conn->query($sql);

    if ($result) {
        $_SESSION['msg-success'] = "Data Berhasil Diubah!";
        header('location: index.php');
    }
}
