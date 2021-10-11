<?php

if (isset($_POST["signupSubmit"])){
    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    
    if (emptyInputSignup($name, $email, $pwd, $pwdRepeat) !== false) {
       // header("location: ../redirect/signup_redirect.php?error=emptyinput&name=$name&email=$email");
       header("location: ../redirect/signup_redirect.php?error=emptyinput&name=$name&email=$email"); 
       exit();
    }

    if (invalidName($name) !== false) {
       
        header("location: ../redirect/signup_redirect.php?error=invalidname&email=$email");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../redirect/signup_redirect.php?error=invalidemail&name=$name");
        exit();
    }
/*
    if (pwdLength($pwd) !== false) {
        header("location: ../signup.php?error=passwordshort");
        exit();
    }
*/
    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: ../redirect/signup_redirect.php?error=passwordmismatch&name=$name&email=$email");
        exit();
    }

    if (emailExists($conn, $email) !== false) {
        header("location: ../redirect/signup_redirect.php?error=emailtaken&name=$name&email=$email");
        exit();
    }

    createUser($conn, $name, $email, $pwd);

} 
else {
    header("location:../signup.php");
}

