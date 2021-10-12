<?php

// Function: Check that sign-up input fields are complete ******************************************* 
function emptyInputSignup($name, $email, $pwd, $pwdRepeat) {
    $result;
    if (empty($name) || empty($email) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

// Function: Verify valid Name submitted ******************************************* 
function invalidName($name) {
    $result;
    //if (!preg_match("/^[A-Z][a-z]+\s[A-Z][a-z]+*$/", $name)) {
    if (!preg_match("/^\b[A-Z][a-z]+\b( {1})\b[A-Z][a-z]+$/", $name)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

// Function: Verify valid Email submitted ******************************************* 
function invalidEmail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

// Function: Verify passwords match **************************************************** 
function pwdMatch($pwd, $pwdRepeat) {
    $result;
    if ($pwd !== $pwdRepeat) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

// Function: Check if users Email already exists in dataBase ******************************************* 
function emailExists($conn, $email) {
    $sql = "SELECT * FROM users WHERE usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../redirect/signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

// Function: Create User in dataBase ******************************************* 
function createUser($conn, $name, $email, $pwd) {
    $sql = "INSERT INTO users (usersName, usersEmail, usersPwd) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../redirect/signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
}

// Function: Check that Email and Password fields are complete for login ******************************************* 
function emptyInputLogin($email, $pwd) {
    $result;
    if (empty($email) || empty($pwd)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

// Function: Check that User/Email exists in dataBase and login *******************************************
function signupUser($conn, $email, $pwd) {
    $uidExists = emailExists($conn, $email);

    if ($uidExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useremail"] = $uidExists["usersEmail"];
        header("location ../index.php");
        exit();
    }
}

// Function: Check that sign-in input fields are complete ******************************************* 
function emptyInputSignin($email, $pwd) {
    $result;
    if (empty($email) || empty($pwd)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $email, $pwd) {
    $uidExists = emailExists($conn, $email);

    if ($uidExists === false) {
        header("location: ../redirect/signin_redirect.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../redirect/signin_redirect.php?error=nopwdmatch");
        exit();
    }
    else if ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"]; 
        $_SESSION["useremail"] = $uidExists["usersEmail"]; 
        header("location: ../index.php");
        exit();
    }

}

