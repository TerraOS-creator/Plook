<?php 

require_once('Controller/connection.php');
require_once('support/ObjectIntoArr.php');


$id=$_GET['id'];//hotel
$nama=$_SESSION['search'];//region or province

$query="SELECT * FROM hotels where nama='$id'";
$result = mysqli_query($connection,$query);

// $query="SELECT * FROM hotels where nama=?";
// $stmt=$connection->prepare($query);
// $stmt->bind_param("s",$id);
// $stmt->execute();
// $res=$stmt->get_result();
// $stmt->close();
$i=0;

if(mysqli_num_rows($result) > 0) {
    while($row=mysqli_fetch_array($result)){
        $array_name[$i]=$row["nama"];
        $array_desc[$i]=json_decode($row["description"]);
        $array_gambar[$i]=$row["gambar"];
        $i++;
    }
}
// while($row=mysqli_fetch_array($res)){
//     $array_name[$i]=$row["nama"];
//     $array_desc[$i]=json_decode($row["description"]);
//     $array_gambar[$i]=$row["gambar"];
//     $i++;
//   }
//ganti object ke array
$array_desc=objectsIntoArray($array_desc);
$count=count($array_name); 

    $temp=$array_desc[0];
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
        $luas1=$desc1["luas"];
        $luas2=$desc2["luas"];
        $fasilitas1=$desc1["fasilitas"];
        $fasilitas2=$desc2["fasilitas"];
        $makan1=$fasilitas1["1"];
        $makan2=$fasilitas2["1"];
        $wifi1=$fasilitas1["2"];
        $wifi2=$fasilitas2["2"];

    // print($array_name[$i]);
    // print($array_gambar[$i]);
    // echo"<br> temp<br>";
    // print($temp2["nama"]);
    // echo "<br> desc1 <br>";
    // print($desc1["type"]); print($desc1["bed"]); print($desc1["price"]); print($desc1["luas"]); print($fasilitas["1"]);print($fasilitas["2"]);
    // echo "<br> desc2 <br>";
    // print($desc2["type"]); print($desc2["bed"]); print($desc2["price"]); print($desc2["luas"]); print($fasilitas2["1"]);print($fasilitas2["2"]);
    // echo"<br><br>";
  


$_SESSION['type1']=$desc1["type"];

$_SESSION['type2']=$desc2["type"];

$connection->close();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style1.css">
  
    <link rel="stylesheet" href="css/grid.css">
	<link rel="stylesheet" href="css/detailhotel.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/background.css">


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
<div class="info">
            <div class="image-title"><h2><?php echo $array_name[0];echo" "; echo $_SESSION['search']?></h2></div>
            <div class="locate"><i class="fa fa-map-marker"><?php echo" ";echo $_SESSION['search'];?></i></div>
            <hr >
</div>
<form action="payment.php" method="POST">
    <div class="above">
        <div class="image-container"><img src="gambar/<?php echo $array_gambar[0];?>"></div>
        
    <div class="middle one">
        <div class="name"><?php echo $type1;?></div>
        <div class="type">
            <div class="bed"><i class="fa fa-bed"></i><?php echo $bedQ1;echo $bed1?></div>
            <div class="quantity"><i class="fa fa-user"></i><?php echo" "; echo $max1;echo" "; echo"people(s)"?></div>
            
            <div class="price">Price: Rp.<?php echo number_format($price1);?></div>
            <div class="luas">Luas kamar:<?php echo" ";echo $luas1;?></div>
            <div class="fasilitas">
                Fasilitas:
                <div class="satu">- <?php echo $makan1?></div>
                <div class="dua">- <?php echo $wifi1?></div>
            </div>
            <input type="number" name="number1" placeholder="Quantity">
        </div>
        
    </div>
   
    <div class="middle two">
        <div class="name"><?php echo $type2;?></div>
        
        <div class="type">
        <div class="bed"><i class="fa fa-bed"></i><?php echo $bedQ2;echo $bed2?></div>
            <div class="quantity"><i class="fa fa-user"></i><?php echo" "; echo $max2;echo" "; echo"people(s)"?></div>
            <div class="price">Price: Rp.<?php echo number_format($price2);?></div>
            <div class="luas">Luas kamar:<?php echo" ";echo $luas2;?></div>
            <div class="fasilitas">
                Fasilitas:
                <div class="satu">- <?php echo $makan2?></div>
                <div class="dua">- <?php echo $wifi2?></div>
            </div>
            <input type="number" name="number2" placeholder="Quantity"> 
        </div>
        
    </div>
    
            </div>
            
  
    
    
<div class="payment">

<input type="hidden" name="payment_type" value="hotels">
<input type="hidden" name="hotel_name" value="<?php echo $array_name[0]?>">
<input type="hidden" name="image" value="<?php echo $array_gambar[0];?>">
<input type="hidden" name="type1" value="<?php echo $desc1["type"];?>">
<input type="hidden" name="price1" value="<?php echo $desc1["price"];?>">
<input type="hidden" name="type2" value="<?php echo $desc2["type"];?>">
<input type="hidden" name="price2" value="<?php echo $desc2["price"];?>">
<input type="hidden" name="csrf-token" value="<?php echo $_SESSION['csrf-token'];?>">
<input type="submit" value="Proceed to payment">
</form>
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
  </body>
</html>