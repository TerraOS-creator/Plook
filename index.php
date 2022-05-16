<?php
require_once('Controller/connection.php');

unset($_SESSION['search']);
$query="SELECT * FROM provinces";
$result=mysqli_query($connection,$query);
$i=0;
while($row=mysqli_fetch_array($result)){
  $array_provinces[$i]=$row["name"];

  $i++;
}
$query="SELECT * FROM regencies";
$result=mysqli_query($connection,$query);
$remove=array("KABUPATEN ","KOTA ");
while($row=mysqli_fetch_array($result)){
  $row["name"]=str_replace($remove,"",$row["name"]);

  $array_provinces[$i]=$row["name"];
  $i++;
}

$temp=json_encode($array_provinces);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/grid.css">

  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/slideshow.css">
    <link rel="stylesheet" href="css/helper.css">
    <link rel="stylesheet" href="css/background.css">
    <style>
  .photobar-title h2{
    text-align:center;
  margin-bottom: 4%;
  font-size: 60px;
  font-weight: bold;
 color: black;
}
.photobar-title{
  margin:0;
  text-align:center;
}
.photobar a .text{
  text-align:center;

}
.photobar a{
  text-decoration:none;
  margin-left:0.5%;
  margin-right:0.5%;
}
.footer{
  margin-top: 10%;
}

    </style>
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
<?php }else{
  if($_SESSION['type']==1){
  ?> 
  <li><a href="admin/admin.php">Administrative</a></li>
<?php }?>
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
        
</div>

<div class="content">
  <div class="helper-button">
    <a class="helper-active" href="#" ><div class="text">Hotel / Transportation /Attraction</div></a>
    <a class="helper"href="flight.php"><div class="text">Flights</div></a>
  </div>
<div class="search-container">
    <form action="search_all.php" method="POST">
    <div class="autocomplete" style="width:100%;">
    <input type="text" placeholder="Search.." name="search" id="search" class="form-control" autocomplete="off">
    <input type="submit">
    </form>
  </div>
  </div>
  
<div class="photobar-title">
<h2>Our Recommendations</h2>
</div>
    <div class="photobar">
    <a href="search_all.php?search=<?php echo"bali"?>"><img src="gambar/bali.jpg"><div class="text">Bali</div></a>
    <a href="search_all.php?search=<?php echo"Jakarta"?>"><img src="gambar/jakarta.jpg"><div class="text">Jakarta</div></a>
    <a href="search_all.php?search=<?php echo"Papua"?>"><img src="gambar/papua.jpg"><div class="text">Papua</div></a>
    <a href="search_all.php?search=<?php echo"Kalimantan"?>"><img src="gambar/kalimantanutara.jpg"><div class="text">Kalimantan</div></a>
    </div>
    <div class="photobar">
    <a href="search_all.php?search=<?php echo"Banten"?>"><img src="gambar/banten.jpg"><div class="text">Banten</div></a>
    <a href="search_all.php?search=<?php echo"Nusa Tenggara Barat"?>"><img src="gambar/NTB.jpg"><div class="text">Nusa Tenggara Barat</div></a>
    <a href="search_all.php?search=<?php echo"Medan"?>"><img src="gambar/sumaterautara.jpg"><div class="text">Medan</div></a>
    <a href="search_all.php?search=<?php echo"Jawa Barat"?>"><img src="gambar/jawabarat.jpg"><div class="text">Jawa Barat</div></a>
    </div>
  </div>
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
        Copyright &copy; PLOOK 2022. ALL rights reserved.
        </div>
    </div>

  <script src="js/slideshow.js"></script>
  <script src="js/navbar.js"></script>
    <script>currentSlide2(1)</script>
    <script>currentSlide3(1)</script>
    <script>currentSlide(1)</script>

      <script>

  var hide=document.getElementsByClassName("photobar");
  
function autocomplete(inp, arr) {

  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/

              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/
var countries = <?php echo $temp;?>;

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("search"), countries);

    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
  <script src="js/navbar.js"></script>
  </body>
</html>