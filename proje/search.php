<?php
    include_once 'header.php';
?>

<?php

    $uname = $_GET["search"];
    $dir = getcwd()."/includes/user"."/".$uname;
    if(file_exists($dir)){
        $_SESSION["searchUser"] = $uname;
        header("Location: /proje/user.php?user=$uname");
    }   
    else{
        echo "User not found!";
    }
?>

<?php
    include_once 'footer.html';
?>