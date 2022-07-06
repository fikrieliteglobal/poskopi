<?php
require("../koneksi.php");


if ($_POST['tambah'] == 1) {
    $id_barang = $_POST['id_barang'];
    $harga_barang = $_POST['harga_barang'];
    $satuan = $_POST['satuan'];
    $total_jual = $_POST['total_jual'];
    $date = $_POST['tanggal'];
    $nama_orang = $_POST['nama_orang'];

    $sql = "INSERT INTO transaksi_penjualan(id_barang, harga_barang, satuan, total_jual, tanggal, nama_orang) values('$id_barang', '$harga_barang', '$satuan', '$total_jual', '$date', '$nama_orang')";
    $result = $conn->query($sql);

    if ($result) {
        $_SESSION['msg-success'] = 'Data Berhasil Ditambahkan';
        header("location: index.php");
    }
}
if ($_POST['hapus'] == 1) {
    $id_transaksi = $_POST['id_transaksi'];
    $sql = "DELETE FROM transaksi_penjualan WHERE id_transaksi = $id_transaksi";
    $result = $conn->query($sql);


    if ($result) {
        $_SESSION['msg-success'] = 'Data Berhasil Dihapus';
        header("location: index.php");
    }
}
if ($_POST['simpan'] == 1) {

    $sql = "SELECT * FROM transaksi_penjualan";
    $result = $conn->query($sql);

    foreach ($result as $row) {
        $id_barang = $row['id_barang'];
        $harga_barang = $row['harga_barang'];
        $satuan = $row['satuan'];
        $total_jual = $row['total_jual'];
        $date = $row['tanggal'];
        $nama_orang = $row['nama_orang'];

        $sql2 = "INSERT INTO laporan_penjualan(id_barang, harga_barang, satuan, total_jual, tanggal, nama_orang) values( '" . $id_barang . "','" . $harga_barang . "','" . $satuan . "','" . $total_jual . "','" . $date . "','" . $nama_orang . "' )";
        $result2 = $conn->query($sql2);
    }


    $sql3 = "DELETE FROM transaksi_penjualan";
    $result3 = $conn->query($sql3);

    if ($result3) {
        $_SESSION['msg-success'] = 'Data Berhasil Disimpan';
        header("location: index.php");
    }
}
if ($_POST['hapus_menu'] == 1) {
    $id_menu = $_POST['id_menu'];
    $sql = "DELETE FROM transaksi_menu WHERE id_menu = $id_menu";
    $result = $conn->query($sql);

    if ($result) {
        $_SESSION['msg-success'] = 'Data Berhasil Dihapus';
        header("location: index.php");
    }
}
if ($_POST['simpan_menu'] == 1) {

    $id_menu = $_POST["id_menu"];
    $sql = "SELECT * FROM transaksi_menu WHERE id_menu = $id_menu";
    $result = $conn->query($sql);

    foreach ($result as $row) {
        $nama = $row['nama'];
        $base = $row['base'];
        $additional = $row['additional'];
        $additional2 = $row['additional2'];
        $additional3 = $row['additional3'];
        $topping = $row['topping'];
        $total = $row['total'];
        $tanggal = $row['tanggal'];

        $sql2 = "INSERT INTO laporan_menu(nama, base, additional, additional2, additional3, topping, total, tanggal) values( '" . $nama . "','" . $base . "','" . $additional . "','" . $additional2 . "','" . $additional3 . "','" . $topping . "','" . $total . "','" . $tanggal . "' )";
        $result2 = $conn->query($sql2);
    }


    $sql3 = "DELETE FROM transaksi_menu WHERE id_menu = $id_menu";
    $result3 = $conn->query($sql3);

    if ($result3) {
        $_SESSION['msg-success'] = 'Data Berhasil Disimpan';
        header("location: index.php");
    }
}
