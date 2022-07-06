<?php
require("../koneksi.php");

if ($_POST['tambah'] == 1) {
    $nama_barang = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $date = date('Y-m-d H:i:s');

    $sql = "INSERT INTO beban_penjualan(tanggal, nama_barang, harga) values('$date', '$nama_barang', '$harga')";
    $result = $conn->query($sql);

    if ($result) {
        $_SESSION['msg-success'] = 'Data Berhasil Ditambahkan';
        header("location: index.php");
    }
}
