<?php
require("../koneksi.php");

if ($_POST['tambah'] == 1) {
    $nama_user = $_POST['nama_users'];
    $username = $_POST['username'];
    $password = hash('sha512', $_POST['password']);

    $cek_username = "SELECT * FROM users where username = '$username'";
    $result = $conn->query($cek_username)->fetch_assoc();

    if ($result) {
        $_SESSION['msg-error'] = "Maaf Username telah digunakan!";
        header('location: index.php');
    }

    $sql = "INSERT INTO users(nama_users, username, password) values('$nama_user', '$username', '$password')";
    $result = $conn->query($sql);
    if ($result) {
        $_SESSION['msg-success'] = 'Data Berhasil Ditambahkan';
        header("location: index.php");
    }
}
if ($_POST['hapus'] == 1) {
    $id = $_POST['id'];
    $sql = "DELETE FROM users WHERE id = $id";
    $result = $conn->query($sql);
    if ($result) {
        $_SESSION['msg-success'] = 'Data Berhasil Dihapus';
        header("location: index.php");
    }
}
if ($_POST['edit'] == 1) {
    $id_users = $_POST['id_users'];
    $nama_users = $_POST['nama_users'];
    $username = $_POST['username'];
    $password = hash('sha512', $_POST['password']);

    if (empty($_POST['password'])) {
        $sql = "UPDATE users SET nama_users = '$nama_users', username = '$username' WHERE id_users = $id_users";
        $result = $conn->query($sql);

        if ($result) {
            $_SESSION['msg-success'] = "Data Berhasil Diubah!";
            header('location: index.php');
        }
    } else {
        $sql = "UPDATE users SET nama_users = '$nama_users', username = '$username', password = '$password' WHERE id_users = $id_users";

        $result = $conn->query($sql);

        if ($result) {
            $_SESSION['msg-success'] = "Data Berhasil Diubah";
            header('location: index.php');
        }
    }
}
