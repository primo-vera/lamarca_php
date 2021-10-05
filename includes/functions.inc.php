<?php

// Function > Check that all fields are filled out *************************************************
function emptyInputSignup($name, $email, $pwd, $pwdRepeat ) {
    $result;
    if (empty($name) || empty($email) || empty($pwd) || empty($pwdrepeat)) {
        $result = true;
    } 
    else {
        $result = false;
    }
    return $result;
}

// Function > Check if Name is Valid ***************************************************************
function invalidName($name) {
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/"), $name) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}
    
// Function > Validate Email ********************************************************************
function invalidEmail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// Function > Verify Passwords Match *************************************************************
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

// Function > Check if Email Exists **************************************************************
function emailExists($conn, $email, $name) {
    $sql = "SELECT * FROM users WHERE usersEmail = ? OR usersName = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signin.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $email, $name);
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
// Function > Create a New User ***************************************************************
function createUser($conn, $name, $email, $pwd) {
    $sql = "INSERT INTO users (usersName, usersEmail, usersPwd) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signin.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();  
}