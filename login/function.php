<?php
include "../koneksi.php";
require('../session.php');

if ($_POST['sign_in'] == 1) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $verify = hash("sha512", $password);

    $username_aman = htmlspecialchars($username, ENT_QUOTES);

    $cek = mysqli_query($conn, "SELECT * FROM users where username='$username_aman' and password='$verify' ");
    if (mysqli_num_rows($cek) > 0) {
        $_SESSION['msg-success'] = true;

        echo "<script>window.location.href='../dashboard/index.php'</script>";
    } else {
        echo "<script>alert('username atau password belum terdaftar');window.history.go(-1);</script>";
    }
}
