<?php
session_start();

if(isset($_POST['submit'])){
    $file = $_FILES['profilePic'];

    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    $fileExt = explode('.',$fileName);
    $fileExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png');


    if (in_array($fileExt, $allowed)){
        if($fileError === 0){
            if ($fileSize < 10000000){
                $username = (string)$_SESSION['username'];
                $fileNameFinal = "pp."."jpg";
                $fileDest = "user/$username/".$fileNameFinal;
                move_uploaded_file($fileTmpName, $fileDest);
                header("Location: ../myprofile.php");
            }else{
                echo "Image is too big!";
            }
        }else{
            echo "Error!";
        }
    }
}