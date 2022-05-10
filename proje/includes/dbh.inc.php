<?php

$serverName = "localhost";
$DBusererName = "root";
$DBpassword = "";
$DBname = "project";

$conn = mysqli_connect($serverName, $DBusererName, $DBpassword, $DBname);

if(!$conn){
    die("Connection error: " . mysqli_connect_error());
}

?>