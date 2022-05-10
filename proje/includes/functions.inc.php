<?php

function isUsernameValid($username){
    $r;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $r = true;
    }
    else{
        $r = false;
    }
    return $r;
}

function isemailValid($email){
    $r;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
       $r = true;
    }
    else{
        $r = false;
    }
    return $r;
}

function isPasswordsMatch($password,$repassword){
    $r;
    if($password !== $repassword){
        $r = true;
    }
    else{
        $r = false;
    }
    return $r;
}

function isUsernameUnique($username,$conn){
    $sql = "SELECT * FROM users WHERE username = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../signup.php?error=stmterror");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){    
        return $row;
    }
    else{
        $r = false;
        return $r;
    }
    mysqli_stmt_close($stmt);
}

function isEmailUnique($email,$conn){
    $sql = "SELECT * FROM users WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../signup.php?error=stmterror");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if(mysqli_fetch_assoc($resultData)){
        return true;
    }
    else{
        $r = false;
        return $r;
    }
    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $username, $password){
    $sql = "INSERT INTO users (name, email, username, psw) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../signup.php?error=stmterror");
        exit();
    }

    
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $password);
    mysqli_stmt_execute($stmt);
    
    $dir = getcwd()."/user"; 
    mkdir($dir."/".$username, 0777);
    $file = fopen($dir."/".$username."/"."bio.txt", "w+");  
    fwrite($file,"New User");
    fclose($file);
    copy("../images/sample_pp.jpg",$dir."/".$username."/"."pp.jpg");
    copy("../images/sample_hp.jpg",$dir."/".$username."/"."hp.jpg");

    header("location: ../login.php?error=none");
    exit();
    
}

function loginUser($conn, $username, $password){
    $usernameExits = isUsernameUnique($username, $conn);

    if($usernameExits == false){
        header("location: ../login.php?error=wrong");
        exit();         
    }
    $passwordFromDB = $usernameExits["psw"];
    if($password !== $passwordFromDB){
        header("location: ../login.php?error=wrong");
        exit();
    }
    else{
        session_start();
        $_SESSION["userID"] = $usernameExits["ID"];
        $_SESSION["name"] = $usernameExits["name"];
        $_SESSION["username"] = $usernameExits["username"];
        header("location: ../index.php");
        exit();
    }
}

?>