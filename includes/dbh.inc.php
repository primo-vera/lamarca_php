<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "xt305BKJ2@Lm";
$dBName = "lamarca_login";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}