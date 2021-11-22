<?php
session_start();
// Check if the user is logged in, if not then redirect him to login page 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
}

require_once "Games&Art.php";
 
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = ""; 

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter the new password.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password must have atleast 6 characters.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm the password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
        
    if(empty($new_password_err) && empty($confirm_password_err)){
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
            if(mysqli_stmt_execute($stmt)){
                session_destroy();
                header("location: ../login.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }
    
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Games & Art - Where games and art meet!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/style-admin-reset.css">  
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
 <!-- NavBar End --> 
    <div class="row row1">
        <div class="col-lg-12">
            <div class="st-rowtitle">
                <h2 class="titletext1">Reset Password</h2>
                <h4 class="credentials">Please fill out this form to reset your password.</h4>
            </div>
        </div>
    </div>

    <div class="row row2">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <div class="inputs">
                    <div class="form-group">
                        <input type="password" placeholder="New Password" name="new_password" class="form-control <?php echo (!empty($new_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $new_password; ?>">
                        <span class="invalid-feedback"><?php echo $new_password_err; ?></span>
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Confirm Password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>">
                        <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a class="cancel" href="welcome.php"><p class="cancel">Cancel</p></a>
                    </div>
                </div>     
            </div>
        </form>
    </div>    
</body>
</html>