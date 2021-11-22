<?php
require_once("Games&Art.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Games & Art - Where games and art meet!</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="stylesheets/style-home.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body class="bodi">
	
<!-- NavBar-->
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

<!-- Row title -->
    <div class="row row1">
        <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <div class="st-rowtitle">
                    <h2 class="titletext1">Website News</h2>
                </div>
            </div>
    </div>
<!-- Row title End -->

<!-- No datubazes panem ierakstus -->
    <div class="row row1">
        <div class="col-lg-4"></div>
            <div class="col-lg-4">
                    <?php
                        $sql = "SELECT user_name, post_title, post_content FROM posts";
                        $result = $link->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                        echo 
                        "<div class='panel panel-default'><div class='panel-heading'>".
                            $row["post_title"]. 
                            "</div><div class='panel-body'>" . 
                            $row["post_content"]. 
                            "</div> " . 
                            "</div>";
                            }
                        } 
                        else {
                            echo "<div class='nopost'>No one has posted anything :(</div>";
                        }
                    ?>
                <div class="col-lg-4"></div>
            </div>
    </div>
    


<!-- Row title -->
    <div class="row row2">
        <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <div class="rowtitle2">
                    <h2 class="titletext2">Newest here</h2>
                </div>
            <div class="col-lg-4"></div>
        </div>
    </div>
<!-- Row title End -->
    
<!-- 1st row -->
    <div class="row row2">
        <div class="col-lg-12 rows">
            <div class="col-lg-4">
                <div class="thumbnail blackthumb">
                    <a href="categories/category-cyberpunk.html" class="imageclass">
                        <img src="categories/images/cyberpunk/nightcity.jpg" alt="nightcity">
                    </a>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="thumbnail blackthumb">
                    <a href="categories/category-lis.html">
                        <img src="categories/images/lis/junkjayrd.jpg" alt="druid">
                    </a>
              </div>
            </div>
        
            <div class="col-lg-4">
                <div class="thumbnail blackthumb">
                    <a href="categories/category-valorant.html">
                        <img src="categories/images/valorant/viper.jpg" alt="viper">
                    </a>
              </div>
            </div>
        </div>
    </div>
<!-- 1st row End -->
    
<!-- Row title -->
    <div class="row row1">
        <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <div class="rowtitle1">
                    <h2 class="titletext1">New from Pixel Art</h2>
                </div>
            <div class="col-lg-4"></div>
        </div>
    </div>
<!-- Row title End -->
    
<!-- 2nd row -->
    <div class="row row1">
        <div class="col-lg-12 rows">
                <div class="col-lg-4">
                    <div class="thumbnail whitethumb">
                        <a href="categories/category-pixelart.html">
                            <img src="categories/images/csgo/csgopxl.png" alt="cspxl">
                        </a>
                  </div>
                </div>

            <div class="col-lg-4">
                <div class="thumbnail whitethumb">
                    <a href="categories/category-pixelart.html">
                        <img src="categories/images/cyberpunk/cyber-pxl.jpg" alt="cbpxl">
                    </a>
              </div>
            </div>
        
            <div class="col-lg-4">
                <div class="thumbnail whitethumb">
                    <a href="categories/category-pixelart.html">
                        <img src="categories/images/wow/wowpxl2.jpg" alt="viper">
                    </a>
              </div>
            </div>
        </div>
    </div>
<!-- 2nd row End -->

<!-- Row title -->
    <div class="row row2">
        <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <div class="rowtitle2">
                    <h2 class="titletext2">New form World of Warcraft</h2>
                </div>
            <div class="col-lg-4"></div>
        </div>
    </div>
<!-- Row title End -->
    
<!-- 3rd row -->
    <div class="row row2">
        <div class="col-lg-12 rows">
                <div class="col-lg-4">
                    <div class="thumbnail blackthumb">
                        <a href="categories/category-wow.html">
                            <img src="categories/images/wow/dragonflight.jpg" alt="jaina1">
                        </a>
                  </div>
                </div>

            <div class="col-lg-4">
                <div class="thumbnail blackthumb">
                    <a href="categories/category-wow.html">
                        <img src="categories/images/wow/jaina2.jpg" alt="jaina2">
                    </a>
              </div>
            </div>
        
            <div class="col-lg-4">
                <div class="thumbnail blackthumb">
                    <a href="categories/category-wow.html">
                        <img src="categories/images/wow/nelf.jpg" alt="nelf">
                    </a>
              </div>
            </div>
        </div>
    </div>
<!-- 3rd row End -->
    
</body>
</html>