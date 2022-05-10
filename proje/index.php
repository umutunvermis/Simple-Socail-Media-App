<?php
    include_once 'header.php';
    if(!isset($_SESSION["username"])){
        header("Location: login.php");
    }
?>

<div style="background-color:#f1f1f1; color:black" align="center">

    <h2>Hello <?php echo $_SESSION["name"];?>
    <h2>Welcome to My Home Page!</h2>

    <a href="myprofile.php"><img src="images/editprofile.jpg" alt="profile" style="width:150px;height:150px;"></a>
    <a href="profile.php"><img src="images/profile.jpg" alt="set profile" style="width:150px;height:150px;"></a>
    <a href="includes/logout.inc.php"><img src="images/logout.jpg" alt="log out" style="width:150px;height:150px;"></a>
    <br><br>


</div>

<?php
    include_once 'footer.html';
?>