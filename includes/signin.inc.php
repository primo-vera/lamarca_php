<?php

if (isset($_POST["signinSubmit"])) {

    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

   if (emptyInputLogin($email, $pwd) !== false) {
        header("location: ../redirect/signin_redirect.php?error=emptyinput&email=$name");
        exit();
    } 

     loginUser($conn, $email, $pwd);
}
else {
    header("location: ../signup.php");
    exit();
}
   