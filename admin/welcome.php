<?php
require_once("Games&Art.php");
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: KursaDarbs2/login.php");
    exit;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Games & Art - Where games and art meet!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/style-admin.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body class="bodi">
<!-- NavBar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>                        
          </button>
        <a class="navbar-brand" href="../home.php"><img src="../images/logo.png" class="logopng"></a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
              <li><a href="../home.php">HOME</a></li>
              <li><a href="../categories/cata.html">CATEGORIES</a></li>
              <!-- welcome zina ar username -->
              <li><a href="welcome.php">Hi, <?php echo htmlspecialchars($_SESSION["username"]); ?></;i></span></a></li>
          </ul>
      </div>
    </div>
</nav>
<!-- NavBar End -->

<!-- Row title -->
    <div class="row row1">
            <div class="col-lg-12">
                <div class="st-rowtitle">
                    <h2 class="titletext1">Games and Art admin panel</h2>
                </div>
            </div>
    </div>
<!-- Row title End -->

<!-- Buttons -->
    <div class="row row2">
        <div class="col-lg-12">
            <div class="links">
                <h2 class="titletext2"><a href="reset-password.php" class="rowtitle2">Reset Your Password</a></h2>                
            </div>
        </div>
    </div>
    <div class="row row1">    
        <div class="col-lg-12">
            <div class="links">
                <h2 class="titletext1"><a href="logout.php" class="rowtitle1">Sign Out of Your Account</a></h2>
            </div>
        </div>  
    </div>

    <div class="row row2">
        <div class="col-lg-12">
            <div class="links">
                <h2 class="titletext2"><a href="create-post.php" class="rowtitle2">Create a News Post</a></h2>
            </div>
        </div>
    </div>

    <div class="row row1">
        <div class="col-lg-12">
            <div class="links">
                <h2 class="titletext1"><a href="register.php" class="rowtitle1">Register a New User</a></h2>
            </div>
        </div>
    </div>

</body>
</html>


