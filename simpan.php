<?php
$conn = mysqli_connect("localhost", "root", "", "pos");

if ($_POST['simpan'] == 1) {
    $name = $_POST["nama"];
    $Base = $_POST["base"];
    $Additional = $_POST["additional"];
    $Additional2 = $_POST["additional2"];
    $Additional3 = $_POST["additional3"];
    $Topping = $_POST["topping"];
    $Total = $_POST["total"];
    $tanggal = date('Y-m-d H:i:s');

    $name_aman = htmlspecialchars($name, ENT_QUOTES);

    $sql = "INSERT INTO transaksi_menu values('', '$name_aman', '$Base', '$Additional', '$Additional2', '$Additional3', '$Topping', '$Total', '$tanggal')";
    $result = $conn->query($sql);
    if ($result = true) {
        $_SESSION['msg-success'] = true;
        echo "<script>alert('Terima kasih sudah memesan Kak " . strtoupper($_POST['nama']) . "');window.location.href='index.php'</script>";
    }
}
