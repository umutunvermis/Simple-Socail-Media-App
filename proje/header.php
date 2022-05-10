<?php
    session_start();
?>

<html>
    <head>
        <title>Project Name</title>
        <style>
            body {
                font-family:verdana;
            }
        </style>
    </head>

    <body style="background-color:#F7F7F7">

        <nav>
            <div style="background-color:#F9ECE0" align="left";>    
            <a href="index.php"><img src="images/icon.jpg" alt="set profile" style="height:100px"></a>
                <ul style="list-style-type:none;" align="right";>
                    <?php
                        if(!isset($_SESSION["username"])){
                            echo "<li><a href='login.php'>Login<a>";
                            echo "<li><a href='signup.php'>Sign Up<a>";
                            echo "</ul>";
                        }
                        else{
                            echo "<li><a href='index.php'>Index<a>";
                            echo "<li><a href='profile.php'>Profile<a>";
                            echo "<li><a href='includes/logout.inc.php'>Log Out<a>";
                            echo "</ul>";
                            echo "<form action='search.php' method='GET'>";
                            echo "<input id='search' name='search' type='text' placeholder='Search user'>";
                            echo "  ";
                            echo "<input id='submit' type='submit' value='Search'>";
                            echo "</form>";
                        }
                    ?>
            </div>
            <hr>
        </nav>
        
