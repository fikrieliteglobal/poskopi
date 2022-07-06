<?php

require('../koneksi.php');

//membuat koneksi ke database

//variabel nama yang dikirimkan form.php
$id_barang = $_GET['id_barang'];

//mengambil data
$query = mysqli_query($conn, "SELECT * FROM barang WHERE id_barang='$id_barang'");
$barang = mysqli_fetch_array($query);
$data = array(
    'harga_barang'      =>  @$barang['harga_barang']
);

//tampil data
echo json_encode($data);
