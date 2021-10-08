<?php

$serverName = "localhost";
$dBUsername = "admin";
$dBPassword = "";
$dBName = "testDB";

//Create Connection
$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}