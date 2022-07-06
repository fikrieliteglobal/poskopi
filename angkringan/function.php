<?php
require("../koneksi.php");

if ($_POST['tambah'] == 1) {
    $tanggal = $_POST['tanggal'];
    $nama_orang = $_POST['nama_orang'];
    $id_barang = $_POST['id_barang'];
    $harga_barang = $_POST['harga_barang'];
    $satuan = $_POST['satuan'];
    $total_jual = $_POST['total_jual'];

    $sql = "INSERT INTO angkringan (nama_orang, tanggal, id_barang, harga_barang, satuan, total_jual) VALUES ('$nama_orang', '$tanggal', '$id_barang', '$harga_barang', '$satuan', '$total_jual')";
    $result = $conn->query($sql);

    if ($result) {
        $_SESSION['msg-success'] = 'Data Berhasil Ditambahkan';
        header("location: create.php");
    }
}
