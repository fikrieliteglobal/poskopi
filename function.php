<?php

function ambil($data)
{
    global $conn;
    $ambil = "SELECT * FROM barang WHERE kategori_barang_id = $data";
    $result = $conn->query($ambil);
    return $result;
}
function harga($data)
{
    global $conn;
    $ambil = "SELECT harga_barang FROM barang WHERE nama_barang = '$data'";
    $result = $conn->query($ambil);
    foreach ($result as $row) {
        return $row['harga_barang'];
    }
}
function jumlah($data1, $data2, $data3, $data4, $data5)
{
    $jumlah = $data1 + $data2 + $data3 + $data4 + $data5;
    return  $jumlah;
}
function rupiah($data)
{
    return "Rp " . number_format($data, 2, ',', '.');
}

$QueryBase = 9;
$ResultBase = ambil($QueryBase);
$QueryAdditional = 10;
$ResultAdditional = ambil($QueryAdditional);
$QueryTopping = 11;
$ResultTopping = ambil($QueryTopping);

if (!isset($_POST["base"])) {
    $Base = "";
    $HargaBase = "0";
    $RupiahBase = "";
} else {
    $Base = $_POST["base"];
    $HargaBase = harga($Base);
    $RupiahBase = rupiah($HargaBase);
}

if (!isset($_POST["additional"])) {
    $Additional = "";
    $HargaAdditional = "0";
    $RupiahAdditional = "";
} else if ($_POST["additional"] === "") {
    $Additional = "";
    $HargaAdditional = "0";
    $RupiahAdditional = "#";
} else {
    $Additional = $_POST['additional'];
    $HargaAdditional = harga($Additional);
    $RupiahAdditional = rupiah($HargaAdditional);
}

if (!isset($_POST["additional2"])) {
    $Additional2 = "";
    $HargaAdditional2 = "0";
    $RupiahAdditional2 = "";
} else if ($_POST["additional2"] === "") {
    $Additional2 = "";
    $HargaAdditional2 = "0";
    $RupiahAdditional2 = "#";
} else {
    $Additional2 = $_POST['additional2'];
    $HargaAdditional2 = harga($Additional2);
    $RupiahAdditional2 = rupiah($HargaAdditional2);
}

if (!isset($_POST["additional3"])) {
    $Additional3 = "";
    $HargaAdditional3 = "0";
    $RupiahAdditional3 = "";
} else if ($_POST["additional3"] === "") {
    $Additional3 = "";
    $HargaAdditional3 = "0";
    $RupiahAdditional3 = "#";
} else {
    $Additional3 = $_POST['additional3'];
    $HargaAdditional3 = harga($Additional3);
    $RupiahAdditional3 = rupiah($HargaAdditional3);
}

if (!isset($_POST["topping"])) {
    $Topping = "";
    $HargaTopping = "0";
    $RupiahTopping = "";
} else if ($_POST["topping"] === "") {
    $Topping = "";
    $HargaTopping = "0";
    $RupiahTopping = "#";
} else {
    $Topping = $_POST['topping'];
    $HargaTopping = harga($Topping);
    $RupiahTopping = rupiah($HargaTopping);
}
