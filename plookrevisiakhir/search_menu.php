<?php
require_once('Controller/connection.php');

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
  	<link rel="stylesheet" href="forcompany.css">
	  <link rel="stylesheet" href="homepage.css">
	  <link rel="stylesheet" href="AdminSignin.css">
    <link rel="stylesheet" href="css/searchmenu.css">
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
</div>

<div class="content">
 
     <div class="search-box">
     <input type="submit" name="hotel" class="search1" value="hotel" onclick="checked1();"/>
    <input type="submit" name="transportation" class="search2" value="transportation" onclick="checked2()" />
    <input type="submit" name="flight" class="search3" value="flight" onclick="checked3()"/>
    <input type="submit" name="Attraction" class="search4" value="Attraction" onclick="checked4()"/>
   </div>
<div class="hidden_search">
  <!---search 1-->
  <div class="hid_search1">
  <h2>Hotel</h2>
  <div class="container" style="width:500px">
    <input type="text" name="country" id="country" class="form-control" placeholder="Enter provinces/area">
    <div id="countryList" ></div>
    </div>
  </div>
  <div class="hid_search2">
  <h2>transportation</h2>
  <div class="container" style="width:500px">
    <input type="text" name="transportation" id="transportation" class="form-control" placeholder="Enter provinces/area">
    <div id="transportationList" ></div>
    </div>
  </div>
  
  <div class="hid_search4">
  <h2>Attraction</h2>
  </div>
</div>
<div class="hidden-wrapper">
<div class="hidden-box1">

</div>
<div class="hidden-box2">
 
</div>
<div class="hidden-box3">
<div class="container" id="homepage"> 

</div>
</div>

</div>
</div>
            
            
    <div class="footer">
        <div class="inner-footer">
            <div class="footer-items">
                <h1>2020 PLOOK. All Rights Reserved</h1>
                
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
        Copyright &copy; PLOOK 2020. ALL rights reserved.
        </div>
    </div>
    <!--footer-->
</div>
    
  <script src="js/search_menu.js"></script>
  <script src="js/jump.js"></script>
  <script src="js/navbar.js"></script>
  <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<!-- 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

Popper JS -->

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script>
$(document).ready(function(){
$('#country').keyup(function(){
    var query=$(this).val();
    if(query!='.'){
        $.ajax({
            url:"search.php",
            method:"POST",
            data:{query:query},
            success:function(data){
                $('#countryList').fadeIn();
                $('#countryList').html(data);
            }
        });
    }
    else{
        $('#countryList').fadeOut();
        $('#countryList').html("");
    }
});
$(document).on('click','li',function(){
    $('#country').val($(this).text());
    $('#countryList').fadeOut();
});
    
});

$(document).ready(function(){
$('#transportation').keyup(function(){
    var query=$(this).val();
    if(query!='.'){
        $.ajax({
            url:"searchtr.php",
            method:"POST",
            data:{query:query},
            success:function(data){
                $('#transportationList').fadeIn();
                $('#transportationList').html(data);
            }
        });
    }
    else{
        $('#transportationList').fadeOut();
        $('#transportationList').html("");
    }
});
$(document).on('click','li',function(){
    $('#country').val($(this).text());
    $('#countryList').fadeOut();
});
    
});


</script>
    <script>currentSlide2(1)</script>
    <script>currentSlide3(1)</script>
    <script>currentSlide(1)</script>
  </body>
</html>