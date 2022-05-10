<?php
    include_once 'header.php';
    if(!isset($_SESSION["username"])){
        header("Location: login.php");
    }
    $username = $_SESSION['username'];
    $userID = $_SESSION['userID'];
    $pp = "pp.jpg";
    $hp = "hp.jpg"
?>

<div style="background-color:#F9ECE0;" align="center";>
<div style="background-image:url(includes/user/<?php echo $username."/".$hp;?>); background-repeat: no-repeat; width:1440px; height:300px; background-position:center;">&nbsp;</div>
</div>
<hr>
<div style="background-color:#f1f1f1;">
    <div style="background-image:url(includes/user/<?php echo $username."/".$pp;?>); background-repeat: no-repeat; width:404px; height:364px; background-position:center;">&nbsp;</div>
    <?php
        
    ?>
</div>
    <br><br>
    
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
</div>


<?php
    include_once 'footer.html';
?>