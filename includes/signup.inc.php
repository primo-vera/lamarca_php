<?php

if (isset($_POST["signupSubmit"])){
    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    
    if (emptyInputSignup($name, $email, $pwd, $pwdRepeat) !== false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }

    if (invalidName($name) !== false) {
        header("location: ../signup.php?error=invalidname");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../signup.php?error=invalidemail");
        exit();
    }
/*
    if (pwdLength($pwd) !== false) {
        header("location: ../signup.php?error=passwordshort");
        exit();
    }
*/
    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: ../signup.php?error=passwordmismatch");
        exit();
    }

    if (emailExists($conn, $email) !== false) {
        header("location: ../signup.php?error=emailtaken");
        exit();
    }

    createUser($conn, $name, $email, $pwd);

} 
else {
    header("location:../signup.php");
}

