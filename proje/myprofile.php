<?php
    include_once 'header.php';
    if(!isset($_SESSION["username"])){
        header("Location: login.php");
    }
    $username = $_SESSION['username'];
    $userID = $_SESSION['userID'];
    $pp = "pp.jpg";
    $hp = "hp.jpg";
?>

<div style="background-color:#F9ECE0;" align="center";>
<div style="background-image:url(includes/user/<?php echo $username."/".$hp;?>); background-repeat: no-repeat; width:1440px; height:300px; background-position:center;">&nbsp;</div>
</div>


<div style="background-color:#f1f1f1;">
    <p style="text-align:right;">Change Header Picture</p>
    <form action="includes/uploadhp.inc.php" method="POST" enctype="multipart/form-data" align="right">
        <input type="file" name="headerPic">
        <button type="submit" name="submit">upload</button>
    </form>

    <br>
    <div style="background-image:url(includes/user/<?php echo $username."/".$pp;?>); background-repeat: no-repeat; width:404px; height:364px; background-position:center;">&nbsp;</div>

    <a>Change Profile Picture</a>
    <form action="includes/uploadpp.inc.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="profilePic"><br>
        <button type="submit" name="submit">upload</button>
    </form>
    
    <div align="left">
        <?php
            $dir = getcwd()."/includes/user"; 
            $file = fopen($dir."/".$username."/"."bio.txt", "r");
            $content = fread($file,filesize($dir."/".$username."/"."bio.txt"));
            fclose($file);
        ?>
        
        <table style="border: 1px solid orange">
            <tr>
                <td style="color:orange; border: 1px solid black">Username</td>
                <td style="border: 1px solid black"><?php echo $username; ?></td>
            </tr>
            <tr>
                <td style="color:orange; border: 1px solid black">Name</td>
                <td style="border: 1px solid black"><?php echo $_SESSION["name"];?></td>
            </tr>
            <tr>
                <td style="color:orange; border: 1px solid black">Disclamer</td>
                <td style="border: 1px solid black"><?php echo $content;?></td>
            </tr>        
        </table>
            <p>Update Disclamer<p>
        <form action="includes/bioupdate.inc.php" method="post" size="200">
            <input type="string" name="bio">
            <button type="submit" name="submit">update</button>
        </form>
        <?php
            if(isset($_GET["error"])){
                if($_GET["error"] == "invalidbio"){
                    echo "<p>Disclamer must be longer than 2 letters!</p>";
                }
            }
        ?>
    </div>
    </div>
    <br>
</div> 

<?php
    include_once 'footer.html';
?>