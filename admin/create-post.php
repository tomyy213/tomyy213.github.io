<?php require_once("Games&Art.php");
session_start();

// Check if the user is logged in, if not then redirect him to login page 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Games & Art - Where games and art meet!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/style-admin-create-post.css">  
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
              <li><a href="welcome.php">Hi, <?php echo htmlspecialchars($_SESSION["username"]); ?></;i></a></li>
          </ul>
      </div>
    </div>
</nav>
<!-- NavBar end -->

    <div class="row row1">
        <div class="col-lg-12">
            <div class="st-rowtitle">
                <h2 class="titletext1">Create a post for News section</h2>
              
            </div>
        </div>
    </div>

    <div class="row row2">
        <form action="" method="POST">
            <div class="col-lg-4"></div>
                <div class="col-lg-4">
                    <div class="inputs">
                        <div class="form-group">
                            <input name="posttitle" placeholder="Title of your post" type="text" class="form-control">
                        </div>
                
                        <div class="form-group">
                            <textarea name="postcontent" placeholder="Content for your posts" type="text" class="form-control" rows="10"></textarea>
                        </div>
            
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <input type="reset" class="btn btn-primary" value="Reset">
                    </div>
                    </div>
        </form>
        
    <div class="titletext2">
        <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $title = $_POST['posttitle'];
            $content = $_POST['postcontent'];
    
            $sql = "INSERT into posts (user_name, post_title, post_content ) VALUES ('{$_SESSION["username"]}', '$title', '$content' )";
    
            if (!mysqli_query($link,$sql)) {
                    echo 'Something went wrong. Please try again.';
                }
            else{
                    echo 'Congratulations! A post has been created for News section.';
                }
            }
        ?>
        </div>

    
    </div>
</body>
</html>