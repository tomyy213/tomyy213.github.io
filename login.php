<?php
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: admin/welcome.php");
    exit;
}
require_once "Games&Art.php";
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Ja nav ievadits username vai password
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if(empty($username_err) && empty($password_err)){

        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){

            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = $username;

            if(mysqli_stmt_execute($stmt)){

                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){                    

                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);

                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){

                            session_start();

                            // Ieliek log faila datumu un username ar succesful log in
                            $log  = "Date: ".date("F j, Y, g:i a").PHP_EOL.
                                    
                                    "User: ".$username.PHP_EOL.
                                    "-------------------------".PHP_EOL;
                            
                            file_put_contents('log_mape/log_'.date("j.n.Y").'.txt', $log, FILE_APPEND);

                            // Ja sesija nav beigusies vai viss ir pareizi dodas uz lapu
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            

                            header("location: admin/welcome.php");
                            // Ja login error ar paroli vai username
                        } else{
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    $login_err = "Invalid username or password.";
                }
                // Ja login error no datubazes puses
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
    <link rel="stylesheet" type="text/css" href="stylesheets/style-admin-login.css">  
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
            <a class="navbar-brand" href="home.php"><img src="images/logo.png" class="logopng"></a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav navbar-right">
                  <li><a href="home.php">HOME</a></li>
                  <li><a href="categories/cata.html">CATEGORIES</a></li>
                  <li><a href="login.php"><span class="glyphicon glyphicon-user"></span></a></li>
              </ul>
          </div>
        </div>

    </nav>
<!-- NavBar End -->

    <div class="row row1">
        <div class="col-lg-12">
            <div class="st-rowtitle">
                <h2 class="titletext1">Login</h2>
                <h4 class="credentials">Please fill in your credentials to login.</h4>
            </div>
        </div>
    </div>
            
        <div class="titletext2">
            <?php 
            if(!empty($login_err)){
                echo '<div class="alert alert-danger">' . $login_err . '</div>';
            }        
            ?>
        </div>
    <div class="row row2"> 
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <div class="inputs">
                    <div class="form-group">
                        <input type="text" name="username" placeholder="Username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">

                        <!-- Ja nepareizs username -->
                        <span class="invalid-feedback"><?php echo $username_err; ?></span>
                    </div>    
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">

                        <!-- Ja nepareiza parole -->
                        <span class="invalid-feedback"><?php echo $password_err; ?></span>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Login">
                    </div>
        
                </div>     
            </div>
        </form>
    </div>
    
</body>
</html>