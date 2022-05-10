<?php
    session_start();
    $username = $_SESSION["username"];
    $content = $_POST["bio"];

    if(strlen($content) > 2){
        $dir = getcwd()."/user"; 
        $file = fopen($dir."/".$username."/"."bio.txt", "w");
        fwrite($file,$content);
        fclose($file);
        header("Location: ../myprofile.php");
    }
    else{
        header("Location: ../myprofile.php?error=invalidbio");
    }
?>
