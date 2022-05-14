<?php
require_once('Controller/connection.php');

?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/autoslider.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav>
<div class="logo">
<a href="index.php"><img title="" src="gambar\logo2.png" style="width:200px;height:80px;"/></a>
</div>
<ul class="nav-links">
<?php if(!isset($_SESSION['user'])){ ?>
<li><a href="Login.php">Login</a></li>
<li><a href="register.php">Register</a></li>
<li><a href="parallax.php">About us</a></li>
<?php }else{?> 
<li><a href="index.php">Search</a></li>
<li><a href="promo.php">Promo</a></li>
<li><a href="profile.php?token=<?php echo $_SESSION['csrf-token']; ?>">Profile</a></li>
<li><a href="logout.php">Logout</a></li>
<?php }?>
</ul>
<div class="burger">
<div  class="line1"></div>
<div  class="line2"></div>
<div  class="line3"></div>
</div>
</nav>
  <section class="home">
     <div class="slider">
        <div class="slide active" style="background-image: url('gambar/slide-2.jpg')">
            <div class="container">
                <div class="caption">
                <h1>All domestic flight are 10% off</h1>
                    <p>*(max Rp150.000)</p>
                    <p>no requirement needed</p>
                    <a href="flight.php">Go now</a>
                </div>
            </div>
        </div>
        <div class="slide" style="background-image: url('gambar/slide-3.jpg')">
            <div class="container">
                <div class="caption">
                <h1>All hotels in Jakarta 15% off</h1>
                    <p>*(max Rp100.000)</p>
                    <p>no requirement needed</p>
        
                    <a href="search_all.php?search=<?php echo "Jakarta";?>">Go now</a>
                </div>
            </div>
        </div>
     </div>
   
    <!-- controls  -->
    <div class="controls">
        <div class="prev"><</div>
        <div class="next">></div>
    </div>

    <!-- indicators -->
    <div class="indicator">
    </div>

  </section>

 
 <script src="js/autoslider.js"></script>

</body>
</html>



