<?php

$conn = mysqli_connect("localhost", "root", "", "pos");
$_SESSION['msg-success'] = '';
$_SESSION['msg-error'] = '';

session_start();
