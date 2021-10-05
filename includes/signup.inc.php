<?php

    if (isset($_POST["signupSubmit"])){
        
        $name = $_POST["name"];
        $email = $_POST["email"];
        $pwd = $_POST["pwd"];
        $pwdRepeat = $_POST["pwdrepeat"];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        if (emptyInputSignup($name, $email, $pwd, $pwdRepeat) !== false) {
            header("location: ../signin.php?error=emptyinput");
            exit();
        }
        if (invalidName($name) !== false) {
            header("location: ../signin.php?error=invalidname");
            exit();
        }
        if (invalidEmail($email) !== false) {
            header("location: ../signin.php?error=invalidemail");
            exit();
        }
        if (pwdMatch($pwd, $pwdRepeat) !== false) {
            header("location: ../signin.php?error=passwordmismatch");
            exit();
        }
        if (emailExists($conn, $email, $name) !== false) {
            header("location: ../signin.php?error=emailtaken");
            exit();
        }

        createUser($conn, $name, $email, $pwd);


    } else {
        header("location: ../signin.php");
        exit();
    }