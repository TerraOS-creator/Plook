<?php
require_once('Controller/connection.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style1.css">
  
    <link rel="stylesheet" href="css/grid.css">
	<link rel="stylesheet" href="css/slideshow.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
  </head>
  <body>
	 
  <div class="grid">
    <div class="header">
      <nav>
<div class="logo">
<a href="index.php"><img title="" src="gambar\logo2.png" style="width:200px;height:80px;"/></a>
</div>
<ul class="nav-links">
<?php if(!isset($_SESSION['user'])){ ?>
<li><a href="new.php">Search</a></li>
<li><a href="Login.php">Login</a></li>
<li><a href="register.php">Register</a></li>
<li><a href="parallax.php">About us</a></li>
<?php }else{?> 
<li><a href="search.php">Search</a></li>
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
        
</div>
<div class="content">
    <div class="slideshow">
        <div class="title-slide1">
                <h2>Hot Destinations</h2>
            </div>
            <div class="slideshow-container">
            
                <div class="mySlides-fade">
                <div class="numbertext">Number One</div>
                
                <a href="detail.php?img=<?php echo"2.jfif"?>"><img src="gambar/2.jfif" style="width:100%"></a>
                
                </div>

                <div class="mySlides-fade">
                <div class="numbertext">Number Two</div>
                
                <a href="search_menu.php"><img src="gambar/1.jfif" style="width:100%"></a>
                </div>

                <div class="mySlides-fade">
                <div class="numbertext">Number Three</div>
                
                <a href="search_menu.php"><img src="gambar/3.jpg" style="width:100%"></a>
                </div>
                <div class="mySlides-fade">
                <div class="numbertext">Number Four</div>
                
                <a href="search_menu.php"><img src="gambar/4.jpg" style="width:100%"></a>
                </div>
                <div class="mySlides-fade">
                <div class="numbertext">Number Five</div>
                
                <a href="search_menu.php"><img src="gambar/1.jfif" style="width:100%"></a>
                </div>
                <div class="mySlides-fade">
                <div class="numbertext">Number Six</div>
                
                <a href="search_menu.php"><img src="gambar/2.jfif" style="width:100%"></a>
                </div>
                <div class="mySlides-fade">
                <div class="numbertext">Number Seven</div>
                
                <a href="search_menu.php"><img src="gambar/1.jfif" style="width:100%"></a>
                </div>
                
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
                
                <div class="dot-block1"style="text-align:center">
                    <span class="dot" onclick="currentSlide(1)"></span> 
                    <span class="dot" onclick="currentSlide(2)"></span> 
                    <span class="dot" onclick="currentSlide(3)"></span> 
                    <span class="dot" onclick="currentSlide(4)"></span> 
                    <span class="dot" onclick="currentSlide(5)"></span> 
                    <span class="dot" onclick="currentSlide(6)"></span> 
                    <span class="dot" onclick="currentSlide(7)"></span> 
                 </div>
            </div>
            <div class="title-slide2">
                <h2>Popular attraction</h2>
            </div>
            <div class="slideshow-container2">
                <div class="mySlides-fade2">
                <div class="numbertext">Number One</div>
                <a href="search_menu.php"><img src="gambar/2.jfif" style="width:100%"></a>
                
                </div>

                <div class="mySlides-fade2">
                <div class="numbertext">Number Two</div>
                <a href="search_menu.php"><img src="gambar/1.jfif" style="width:100%"></a>
                
     
                </div>

                <div class="mySlides-fade2">
                <div class="numbertext">Number Three</div>
                <a href="search_menu.php"><img src="gambar/3.jpg" style="width:100%"></a>
                
        
                </div>
                <div class="mySlides-fade2">
                <div class="numbertext">Number Four</div>
                <a href="search_menu.php"><img src="gambar/4.jpg" style="width:100%"></a>
                
      
                </div>
                <div class="mySlides-fade2">
                <div class="numbertext">Number Five</div>
                <a href="search_menu.php"><img src="gambar/1.jfif" style="width:100%"></a>
                
        
                </div>
                <div class="mySlides-fade2">
                <div class="numbertext">Number Six</div>
                <a href="search_menu.php"><img src="gambar/2.jfif" style="width:100%"></a>
                
       
                </div>
                <div class="mySlides-fade2">
                <div class="numbertext">Number Seven</div>
                <a href="search_menu.php"><img src="gambar/1.jfif" style="width:100%"></a>
                
             
                </div>
                
                <a class="prev" onclick="plusSlides2(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides2(1)">&#10095;</a>
                <div class="dot-block2"style="text-align:center">
                    <span class="dot2" onclick="currentSlide2(1)"></span> 
                    <span class="dot2" onclick="currentSlide2(2)"></span> 
                    <span class="dot2" onclick="currentSlide2(3)"></span> 
                    <span class="dot2" onclick="currentSlide2(4)"></span> 
                    <span class="dot2" onclick="currentSlide2(5)"></span> 
                    <span class="dot2" onclick="currentSlide2(6)"></span> 
                    <span class="dot2" onclick="currentSlide2(7)"></span> 
                 </div>
            </div>
      <!--slide 3-->
      <div class="title-slide3">
                <h2>Hot Destinations</h2>
            </div>
      <div class="slideshow-container3">
                <div class="mySlides-fade3">
                <div class="numbertext">Number One</div>
                <a href="search_menu.php"><img src="gambar/2.jfif" style="width:100%"></a>
        
                </div>

                <div class="mySlides-fade3">
                <div class="numbertext">Number Two</div>
                <a href="search_menu.php"><img src="gambar/1.jfif" style="width:100%"></a>
                
     
                </div>

                <div class="mySlides-fade3">
                <div class="numbertext">Number Three</div>
                <a href="search_menu.php"><img src="gambar/3.jpg" style="width:100%"></a>
                
        
                </div>
                <div class="mySlides-fade3">
                <div class="numbertext">Number Four</div>
                <a href="search_menu.php"><img src="gambar/4.jpg" style="width:100%"></a>
                
      
                </div>
                <div class="mySlides-fade3">
                <div class="numbertext">Number Five</div>
                <a href="search_menu.php"><img src="gambar/1.jfif" style="width:100%"></a>
                
        
                </div>
                <div class="mySlides-fade3">
                <div class="numbertext">Number Six</div>
                <a href="search_menu.php"><img src="gambar/2.jfif" style="width:100%"></a>
                
       
                </div>
                <div class="mySlides-fade3">
                <div class="numbertext">Number Seven</div>
                <a href="search_menu.php"><img src="gambar/1.jfif" style="width:100%"></a>
                
             
                </div>
                
                <a class="prev" onclick="plusSlides3(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides3(1)">&#10095;</a>
                <div class="dot-block3"style="text-align:center">
                    <span class="dot3" onclick="currentSlide3(1)"></span> 
                    <span class="dot3" onclick="currentSlide3(2)"></span> 
                    <span class="dot3" onclick="currentSlide3(3)"></span> 
                    <span class="dot3" onclick="currentSlide3(4)"></span> 
                    <span class="dot3" onclick="currentSlide3(5)"></span> 
                    <span class="dot3" onclick="currentSlide3(6)"></span> 
                    <span class="dot3" onclick="currentSlide3(7)"></span> 
                 </div>
            </div>
    </div>
</div>

            
            
    <div class="footer">
        <div class="inner-footer">
            <div class="footer-items">
                <h1>2020 PLOOK. All Rights Reserved</h1>
                <p>
                LOREM IPSUM dolor si amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magne aliqua.
                </p>
            </div>

            <div class="footer-items">
               <h2>QUICK LINKS</h2>
               <div class="border"></div>
                <ul class="footer-ul">
                <a class="footer-a" href="index.php"><li class="footer-li">HOME</li></a>
                <a class="footer-a" href="parallax.php"><li class="footer-li">ABOUT US</li></a>
                <a class="footer-a" href="review/contactus.php"><li class="footer-li">CONTACT US</li></a>
                <?php if(isset($_SESSION['user'])) { ?>
                <a class="footer-a" href="promo.php"><li class="footer-li">PROMO</li></a>
                <?php } ?>
                
                </ul>
            </div>

            <div class="footer-items">
               <h2>Term Of Use</h2>
               <div class="border"></div>
                <ul class="footer-ul">
                <a class="footer-a" href=""><li class="footer-li">Term and Conditions</li></a>
                <a class="footer-a" href=""><li class="footer-li">Privacy Policy</li></a>
                <a class="footer-a" href=""><li class="footer-li">Cookie Policy</li></a>
                
                
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
        Copyright &copy; PLOOK 2020. ALL rights reserved.
        </div>
    </div>
    <!--footer-->
</div>
    

  <script src="js/slideshow.js"></script>
  <script src="js/navbar.js"></script>
    <script>currentSlide2(1)</script>
    <script>currentSlide3(1)</script>
    <script>currentSlide(1)</script>
  </body>
</html>