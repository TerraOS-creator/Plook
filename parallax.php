<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parallax</title>
    
    <link rel="stylesheet" href="https>//fonts.googleapis.com/css?family=Sarabun">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="css/background.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .footer{
            margin-top:0px;
        }
    </style>
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
<li><a href="profile.php">Profile</a></li>
<li><a href="logout.php">Logout</a></li>
<?php }?>
</ul>
<div class="burger">
<div  class="line1"></div>
<div  class="line2"></div>
<div  class="line3"></div>
</div>
</nav>
    <header>
    <h1>Welcome to PLOOK</h1>
    </header>

    <section class="about">
        <div class="about-title">
        <h2>About Plook</h2>
        </div>

        <div class="about-pages">
            <div>
            <h2>Inspiration</h2>
            <p></p>
            </div>
            <div>
            <h2>Our Mission</h2>
            <p></p>
            </div>
            <div>
            <h2>Our Promises</h2>
            <p></p>
            </div>
        </div>
    </section>
    <div class="footer">
        <div class="inner-footer">
            <div class="footer-items">
                <h1>2022 PLOOK. All Rights Reserved</h1>
                
            </div>

            <div class="footer-items">
               <h2>QUICK LINKS</h2>
               <div class="border"></div>
                <ul class="footer-ul">
                <a class="footer-a" href="index.php"><li class="footer-li">HOME</li></a>
                <a class="footer-a" href="parallax.php"><li class="footer-li">ABOUT US</li></a>
                <a class="footer-a" href="review/contactus.php"><li class="footer-li">CONTACT US</li></a>
                <a class="footer-a" href="promo.php"><li class="footer-li">PROMO</li></a>
                
                </ul>
            </div>

            <div class="footer-items">
               <h2>Term Of Use</h2>
               <div class="border"></div>
                <ul class="footer-ul">
                <a class="footer-a" href="termandcond.php"><li class="footer-li">Term and Conditions</li></a>
                <a class="footer-a" href="privacypolicy.php"><li class="footer-li">Privacy Policy</li></a>
                <a class="footer-a" href="cookiepolicy.php"><li class="footer-li">Cookie Policy</li></a>
                
                
                </ul>
            </div>
            <div class="footer-items">
               <h2>Contact US</h2>
               <div class="border"></div>
               <ul class="footer-ul">
                    <li class="footer-li">
                    <i class="fa fa-map-marker" aria-hidden="true"> PARADISE, EARTH</i></li>
                    <li class="footer-li"><i class="fa fa-phone" aria-hidden="true"> 089778665432</i></li>
                    
                    <li class="footer-li"><i class="fa fa-envelop" aria-hidden="true"> PLOOKsupport@gmail.com</i></li>
                    
                </ul>
                <div class="social-media">
                <a class="social-media-a" href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="" class="social-media-a"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                <a href="" class="social-media-a"><i class="fa fa-google" aria-hidden="true"></i></a>
                <a href="" class="social-media-a"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </div>

            </div>

        <div class="footer-bottom">
        Copyright &copy; PLOOK 2022. ALL rights reserved.
        </div>
    </div>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.6/ScrollMagic.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.6/plugins/debug.addIndicators.min.js"></script>
    <script src="js/parallax.js"></script>
    <script src="js/navbar.js"></script>
</body>
</html>