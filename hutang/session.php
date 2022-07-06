<?php

if (!isset($_SESSION["msg-success"])) {
    header("Location: ../login/index.php");
    exit;
}
