<?php
require_once('Controller/connection.php');
require_once('support/ObjectIntoArr.php');

$query="SELECT * FROM provinces";
$result=mysqli_query($connection,$query);
$i=0;
while($row=mysqli_fetch_array($result)){
  $array_provinces[$i]=$row["name"];
  $i++;
}
$pulau=$array_provinces;
$query="SELECT * FROM regencies";
$result=mysqli_query($connection,$query);
$remove=array("KABUPATEN ","KOTA ");
$array=array();
while($row=mysqli_fetch_array($result)){
  $row["name"]=str_replace($remove,"",$row["name"]);
  $array_provinces[$i]=$row["name"];
  $i++;
}

$country=json_encode($array_provinces);

$query="SELECT * FROM hotels";
$result=mysqli_query($connection,$query);
$i=0;
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }

if(isset($_POST['search'])){
    $_SESSION['search']=test_input($_POST['search']);
}
else{
    $_SESSION['search']=test_input($_GET['search']);
}
while($row=mysqli_fetch_array($result)){
    $array_name[$i]=$row["nama"];
    $array_desc[$i]=json_decode($row["description"]);
    $array_gambar[$i]=$row["gambar"];
    $i++;
  }
 
  $tampung=$_SESSION['search'];
  $query="SELECT id from provinces where `name` LIKE '%".$tampung."%'";
    $result=mysqli_query($connection,$query);
    
  if(mysqli_num_rows($result)==0){
    $query="SELECT province_id from regencies where `name` LIKE '%".$tampung."%'";
  $result=mysqli_query($connection,$query);

  }


  $result=$result->fetch_all();
 //echo $result[0][0];
  if(isset($result[0][0])){
    $id=$result[0][0];
  }
  else{
    header('Location: Controller/note.php');
  }
//   echo $id;
  
  $query="SELECT image from image_pulau where id=$id";
  $result=mysqli_query($connection,$query);
  
  $result=$result->fetch_all();
  //echo $result[0][0];
  $image=$result[0][0];
 
//ganti object ke array
$array_desc=objectsIntoArray($array_desc);
$count=count($array_name);
$i=0;
//pecah-pecah data JSON
//data full
// while($i<$count){
//     $temp=$array_desc[$i];
//   //   echo "<br>";
//   //   echo "<br>";
//   //  print_r($temp);
//    $nama=$temp["nama"];
//    print($nama);
//    $desc1=$temp["description1"];
//     $desc2=$temp["description2"];
//     $type1=$desc1["type"];
//     $type2=$desc2["type"];
//     $bed1=$desc1["bed"];
//     $bed2=$desc2["bed"];
//     $bedQ1=$desc1["bedQuantity"];
//     $bedQ2=$desc2["bedQuantity"];
//     $price1=$desc1["price"];
//     $price2=$desc2["price"];
//     $max1=$desc1["maximum"];
//     $max2=$desc2["maximum"];
//     // print_r($desc1);
//     // print_r($desc2);
//     $i++;
// }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/background.css">
    
    <style>
    .content{
        margin-top:5%;
        width:100%;
    }
    
    .content .image-title h2{
        color:black;
    }
    .search-container{
        background:none;
    }
    .helper-button{
        margin-top:2.5%;
    }
    </style>
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/autocomplete.css">
    <link rel="stylesheet" href="css/helper.css">
    <style>
      .autocomplete input[type=submit] {
    padding: 10px !important;
      }
    .content2 .image-title h2{
      color:black !important;
      text-transform:capitalize !important;
    }
    .text .indent{
      margin-left:2%;
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
<div class="content2">
<div class="image-title"><h2><?php echo $_SESSION['search']?></h2></div>
<div class="image-container" style="
  background-image: url('gambar/<?php echo $image;?>');
  background-size: contain;
  background-repeat: no-repeat;
  background-position: 50% 50%;"></div>

<div class="buttons">
<input type="submit" onclick="active1()" name="Hotels" value="Hotels" class="button">
<input type="submit" onclick="active2()" name="Transportation" value="Transportation" class="button">
<input type="submit" onclick="active3()" name="Attraction" value="Attraction" class="button">
</div>
</div>
<div class="result">
    <div class="hidden">
    <?php 
    $query="SELECT * FROM hotels";
    $result=mysqli_query($connection,$query);
    $i=0;
    while($row=mysqli_fetch_array($result)){
        $array_name[$i]=$row["nama"];
        $array_desc[$i]=json_decode($row["description"]);
        $array_gambar[$i]=$row["gambar"];
        $array_text[$i]=$row["text"];
        $i++;
      }
    //ganti object ke array
    $array_desc=objectsIntoArray($array_desc);
    $count=count($array_name);
    $i=0; 
    while($i<$count){ 
        $temp=$array_desc[$i];
        $nama=$temp["nama"];
           $desc1=$temp["description1"];
            $desc2=$temp["description2"];
            $type1=$desc1["type"];
            $type2=$desc2["type"];
            $bed1=$desc1["bed"];
            $bed2=$desc2["bed"];
            $bedQ1=$desc1["bedQuantity"];
            $bedQ2=$desc2["bedQuantity"];
            $price1=$desc1["price"];
            $price2=$desc2["price"];
            $max1=$desc1["maximum"];
            $max2=$desc2["maximum"];
    ?>
    
    <?php 
    $count=count($array_name);
    
    //pecah-pecah data JSON
    //data full
    ?>
    <div class="item">
        <img src="gambar/<?php echo $array_gambar[$i];?>">
        <div class="description">
        <div class="title"><?php echo $array_name[$i];?> </div>
        <div class="text">
       <?php
      echo $array_text[$i];
        
  ?>
        </div>
        </div>
        <div class="price">Rp.<?php echo number_format($desc1["price"]);?></div>
        <a class=gonow href="hoteldetail.php?id=<?php echo $array_name[$i];?>"><div class="text">Go Now</div></a>
    </div> 
    <hr >
    <?php  $i++;?>
    
<?php  }?>
</div>
    <div class="hidden">
    <?php 
    $query="SELECT * FROM transportation";
    $result=mysqli_query($connection,$query);
    $i=0;
    while($row=mysqli_fetch_array($result)){
        $array_nama[$i]=$row["nama"];
        $array_supir[$i]=$row["supir"];
        $array_bbm[$i]=$row["BBM"];
        $array_harga[$i]=$row["harga"];
        $array_waktu[$i]=$row["waktu"];
        $array_kapasitas[$i]=$row["kapasitas"];
        $array_gambar[$i]=$row["image"];
        
      
    ?>
    
    <?php 
    $count=count($array_name);
    ?>
    <style>
      .item{
        margin-top:2% !important;
      }
    </style>
    <form action="payment.php" method="POST">
    <div class="item">
        <img src="gambar/<?php echo $array_gambar[$i];?>">
        <div class="description">
        <div class="title">Rental mobil <?php echo $array_nama[$i];?> </div>
        <div class="text">
        <?php 
        if($array_supir[$i]=="sudah" && $array_bbm[$i]=="sudah"){
            echo $array_supir[$i];
            ?>
            termasuk supir dan BBM
        <?php
        } else if($array_bbm[$i]=="sudah"){
            echo $array_bbm[$i];
            ?>
            termasuk BBM
        <?php
        }else if($array_supir[$i]=="sudah"){
            echo $array_supir[$i];
            ?>
            termasuk supir
        <?php
        }
        ?>
         <br>
        kapasitas: <?php echo $array_kapasitas[$i];?>
        </div>
        </div>
        <div class="price">
            <div class="price1">
        Rp.<?php echo number_format($array_harga[$i]);?>
        </div>
    <div class="quantity">
    <input type="number" name="quantity" placeholder="Days">

    </div>
    </div>
        
       
        <input type="hidden" name="payment_type" value="transportation">
        <input type="hidden" name="nama" value="<?php echo $array_nama[$i];?>">
        <input type="hidden" name="location" value="<?php echo $_SESSION['search'];?>">
        <input type="hidden" name="image" value="<?php echo $array_gambar[$i];?>">
        <input type="hidden" name="bbm" value="<?php echo $array_bbm[$i];?>">
        <input type="hidden" name="supir" value="<?php echo $array_supir[$i];?>">
        <input type="hidden" name="csrf-token" value="<?php echo $_SESSION['csrf-token'];?>">
        <input type="hidden" name="price" value="<?php echo $array_harga[$i];?>">
        
        
        <a class=gonow ><input type="submit" value="Book"></a>
        </div> 

    <?php $i++;?>
    </form>
    <hr >
<?php } ?>
    
    </div>
    <div class="hidden">
    <?php 
    $query="SELECT * FROM atraksi";
    $result=mysqli_query($connection,$query);
    $i=0;
    while($row=mysqli_fetch_array($result)){
        $array_1[$i]=$row["nama"];

        $array_2[$i]=$row["harga"];


        $array_3[$i]=$row["image"];
        $array_4[$i]=$row["description"];
      
    ?>
    
    <?php 
    $count=count($array_name);
    ?>
    <style>
      .item{
        margin-top:2% !important;
      }
    </style>
    <form action="payment.php" method="POST">
    <div class="item">
        <img src="gambar/<?php echo $array_3[$i];?>">
        <div class="description">
        <div class="title">Tiket <?php echo $array_1[$i];?> </div>
        <div class="text2">
        <div class="indent"><?php if(isset($array_4[$i])){
          echo $array_4[$i];
        } ?></div> 
        
        
        </div>
        </div>
        <div class="price">
            <div class="price1">
        Rp.<?php echo number_format($array_2[$i]);?>
        </div>
    <div class="quantity">
    <input type="number" name="quantity" placeholder="input quantity">
    </div>
    </div>
        
       
        <input type="hidden" name="payment_type" value="atraksi">
        <input type="hidden" name="nama" value="<?php echo $array_1[$i];?>">
        <input type="hidden" name="location" value="<?php echo $_SESSION['search'];?>">
        <input type="hidden" name="image" value="<?php echo $array_3[$i];?>">
        <input type="hidden" name="price" value="<?php echo $array_2[$i];?>">
        <input type="hidden" name="csrf-token" value="<?php echo $_SESSION['csrf-token'];?>">
        
        <a class=gonow ><input type="submit" value="Book"></a>
        </div> 

    <?php $i++;?>
    </form>
    <hr >
<?php } ?>
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


  <script src="js/navbar.js"></script>
    <script>currentSlide2(1)</script>
    <script>currentSlide3(1)</script>
    <script>currentSlide(1)</script>
    <script>
        
        var button = document.getElementsByClassName("button");
        var hide = document.getElementsByClassName("hidden");
        var item_wrap=document.getElementsByClassName("item-wrapper");
        function active1(){
        button[0].className+=" active";
        button[1].className=button[1].className.replace(" active","");
        button[2].className=button[2].className.replace(" active","");

        hide[0].className+=" active";
        hide[1].className=hide[1].className.replace(" active","");
        hide[2].className=hide[2].className.replace(" active","");
        
       }
       active1();
       function active2(){
        button[1].className+=" active";
        button[0].className=button[0].className.replace(" active","");
        button[2].className=button[2].className.replace(" active","");
        hide[1].className+=" active";
        hide[0].className=hide[0].className.replace(" active","");
        hide[2].className=hide[2].className.replace(" active","");

       }
       function active3(){
        button[2].className+=" active";
        button[0].className=button[0].className.replace(" active","");
        button[1].className=button[1].className.replace(" active","");
        hide[2].className+=" active";
        hide[1].className=hide[1].className.replace(" active","");
        hide[0].className=hide[0].className.replace(" active","");
       }
    </script>
    <script>


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
var countries = <?php echo $country;?>;

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("search"), countries);

  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>