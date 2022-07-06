<?php

if (!isset($_SESSION["msg-success"])) {
    header("Location: ../index.php");
    exit;
}
