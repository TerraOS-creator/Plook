<?php require_once('Controller/connection.php'); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="https://lh3.googleusercontent.com/-HtZivmahJYI/VUZKoVuFx3I/AAAAAAAAAcM/thmMtUUPjbA/Blue_square_A-3.PNG" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <style>
        nav{
            margin-bottom:5%;
        }
        .social-media{
  width: 100%;
  color:#fff;
  text-align: center;
}
.social-media .social-media-a{
 text-decoration: none;
}

.social-media i{
  height: 50px;
  width: 70px;
  margin:20px 5px;
  padding: 10px;
  color: #fff;
  border-radius: 50%;
  border: 1px solid grey;
  transition: 0.3s;
}
.footer{
    margin-top:20%;
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
<?php
require_once('Controller/connection.php');
require_once('support/ObjectIntoArr.php');
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

$quantity=$_POST['people'];
if($quantity<=0){
    header('Location:flight.php');
}
$from = test_input($_POST["from"]);
$to = test_input($_POST["to"]);
$departdate = $_POST["depart"];
$class = $_POST["class"];
$stop = $_POST["stop"];


if($stop=="nonstop"){
    
    $sql1 = "SELECT nama FROM airports_indo where nama LIKE'%".$from."%'";
    $result1 = mysqli_query($connection,$sql1);
    
   
   $sql2 = "SELECT nama FROM airports_indo where nama LIKE'%".$to."%'";
   $result2 = mysqli_query($connection,$sql2);
   
    $rowcount = mysqli_num_rows($result1);
    $rowcount2=mysqli_num_rows($result2);
    $totalrow=$rowcount*$rowcount2;
    $temp1=$result1->fetch_all();
    $temp2=$result2->fetch_all();
    // $i=0;
    // while($i<$rowcount) {
    //     $a=0;
    //     while($a<$rowcount2){
    //         echo $temp1[$i][0];
    //         echo $temp2[$a][0];
    //         echo"<br><br>";
      
       
    //     $a++;
    //     }
    //     $i++;
    // }
    // $temp2=9;
    //  $temp="0";
    // settype($temp2,"string");
    // $temp.=$temp2;
    // echo $temp;
    // die();
    if($rowcount == 0 || $rowcount2==0){
        echo "<div class='alert alert-info'><strong>Search Result: </strong>".$totalrow." result</div>";
    }
    else{
        echo "<h2>showing result ($from to $to)</h2>";
    echo "<div class='alert alert-info'><strong>Search Result: </strong>".$totalrow." result(s)</div>";

    echo "<table class='table table-bordered table-striped table-hover'>
          <thead>
          <tr>
            <th>Date</th>
            <th>Departure</th>
            <th>Departure Time</th>
            <th>Arrival</th>
            <th>Arrival Time</th>
            <th>Class</th>
            <th>Price/pax</th>
            <th>Reserve</th>
          </tr>
          </thead>";
          $i=0;
    while($i<$rowcount) {
        $a=0;
        while($a<$rowcount2){
            if($temp2[$a][0]==$temp1[$i][0] && $a<$rowcount2){
                $a++;
            }
            else{
                $berangkat=0;
            $berangkat=rand(1,10);
            if($berangkat<10){
                settype($berangkat,"string");
                $temp_br="0";
                $temp_br.=$berangkat;
                $temp_br.=":00:00";
                
            }
            else{
                settype($berangkat,"string");
                $temp_br="";
                $temp_br.=$berangkat;
                $temp_br.=":00:00";
            }
            $perjalanan=rand(1,4);
            $jump=rand(1,3);
            if($class=="economy"){
                $harga=rand(1,2);
                $nomimal=rand(1,7);
                $hasil=($harga*1000000)+($nomimal*102500);
            }
            else{
                $harga=rand(2,6);
                $nomimal=rand(1,7);
                $hasil=($harga*1000000)+($nomimal*102500);
            }
            $sampai=0;
            $sampai=$berangkat+$perjalanan;
            if($sampai<10){
                settype($sampai,"string");
                $temp_ar="0";
                $temp_ar.=$sampai;
                $temp_ar.=":00:00";
                
            }
            else{
                settype($berangkat,"string");
                $temp_ar="";
                $temp_ar.=$sampai;
                $temp_ar.=":00:00";
            }
            echo "<tbody><tr>";
            echo "<td>" . $departdate . "</td>";
            echo "<td>" . $temp1[$i][0] . "</td>";
            echo "<td>" . $temp_br . "</td>";
            echo "<td>" . $temp2[$a][0] . "</td>";
            echo "<td>" . $temp_ar . "</td>";
            echo "<td>" . $class . "</td>";
            echo "<td>" . number_format($hasil) . "</td>";
        

        echo '<td>
            <form action="payment.php" method="POST">
            <input type="hidden" name="payment_type" value="flightoneway">
            <input type="hidden" name="departure" value="'.$temp_br.'">
            <input type="hidden" name="arrival" value="'.$temp_ar.'">
            <input type="hidden" name="quantity" value="'.$quantity.'">
            <input type="hidden" name="from" value="'.$temp1[$i][0].'">
            <input type="hidden" name="to" value="'.$temp2[$a][0].'">
            <input type="hidden" name="classtype" value="'.$class.'">
            <input type="hidden" name="price" value="'.$hasil.'">
            <input type="hidden" name="date" value="'.$departdate.'">
            <input type="hidden" name="type" value="onewaynonstop">
            <input type="hidden" name="csrf-token" value="'.$_SESSION['csrf-token'].'">
            <button type="submit" class="btn btn-primary">Book Now</button>
            </form>
            </td>';


        echo "</tr>";
        $a++;
        $temp_br="";
        $temp_ar="";
            }
            
        }
        $i++;
    }
    echo " </tbody></table>";

    }

  }
  else{
    $sql1 = "SELECT nama FROM airports_indo where nama LIKE'%".$from."%'";
    $result1 = mysqli_query($connection,$sql1);
    
   
   $sql2 = "SELECT nama FROM airports_indo where nama LIKE'%".$to."%'";
   $result2 = mysqli_query($connection,$sql2);
   
   $sql3="SELECT nama FROM airports_indo";
   $result3=mysqli_query($connection,$sql3);

    $rowcount = mysqli_num_rows($result1);
    $rowcount2=mysqli_num_rows($result2);
    $rowcount3=mysqli_num_rows($result3);
    $totalrow=$rowcount*$rowcount2;

    $temp1=$result1->fetch_all();
    $temp2=$result2->fetch_all();
    $temp3=$result3->fetch_all();
    // $i=0;
    // while($i<$rowcount) {
    //     $a=0;
    //     while($a<$rowcount2){
    //         echo $temp1[$i][0];
    //         echo $temp2[$a][0];
    //         echo"<br><br>";
      
       
    //     $a++;
    //     }
    //     $i++;
    // }
    // $temp2=9;
    //  $temp="0";
    // settype($temp2,"string");
    // $temp.=$temp2;
    // echo $temp;
    // die();
    if($rowcount == 0 || $rowcount2==0){
        echo "<div class='alert alert-info'><strong>Search Result: </strong>".$totalrow." result</div>";
    }
    else{
        echo "<h2>showing result ($from to $to)</h2>";
    echo "<div class='alert alert-info'><strong>Search Result: </strong>".$totalrow." result(s)</div>";

    echo "<table class='table table-bordered table-striped table-hover'>
          <thead>
          <tr>
            <th>Date</th>
            <th>Departure</th>
            <th>Departure Time</th>
            <th>Arrival</th>
            <th>Arrival Time</th>
            <th>Class</th>
            <th>Price/pax</th>
            <th>Transit</th>
            <th>Reserve</th>
          </tr>
          </thead>";
          $i=0;
    while($i<$rowcount) {
        $a=0;
        while($a<$rowcount2){
            if($temp2[$a][0]==$temp1[$i][0] && $a<$rowcount2){
                $a++;
            }
            else{
                $berangkat=0;
                $berangkat=rand(1,10);
                if($berangkat<10){
                    settype($berangkat,"string");
                    $temp_br="0";
                    $temp_br.=$berangkat;
                    $temp_br.=":00:00";
                    
                }
                else{
                    settype($berangkat,"string");
                    $temp_br="";
                    $temp_br.=$berangkat;
                    $temp_br.=":00:00";
                }
                $perjalanan=rand(1,4);
                $jump=rand(1,3);
                if($class=="economy"){
                    $harga=rand(3,5);
                    $nomimal=rand(1,7);
                    $hasil=($harga*1000000)+($nomimal*102500);
                }
                else{
                    $harga=rand(6,8);
                    $nomimal=rand(1,9);
                    $hasil=($harga*1000000)+($nomimal*102500);
                }
                $sampai=0;
                $sampai=$berangkat+$perjalanan;
                if($sampai<10){
                    settype($sampai,"string");
                    $temp_ar="0";
                    $temp_ar.=$sampai;
                    $temp_ar.=":00:00";
                    
                }
                else{
                    settype($berangkat,"string");
                    $temp_ar="";
                    $temp_ar.=$sampai;
                    $temp_ar.=":00:00";
                }
                $counter=0;
                while(($temp3[$counter][0]==$temp1[$i][0] || $temp3[$counter][0]==$temp2[$a][0])&& $counter<=$rowcount3){
                    $counter++;
                }
                echo "<tbody><tr>";
                echo "<td>" . $departdate . "</td>";
                echo "<td>" . $temp1[$i][0] . "</td>";
                echo "<td>" . $temp_br . "</td>";
                echo "<td>" . $temp2[$a][0] . "</td>";
                echo "<td>" . $temp_ar . "</td>";
                echo "<td>" . $class . "</td>";
                echo "<td>" . number_format($hasil) . "</td>";
                echo "<td>" . $temp3[$counter][0] . "</td>";
            
    
            echo '<td>
                <form action="payment.php" method="POST">
                <input type="hidden" name="payment_type" value="flightoneway">
                <input type="hidden" name="departure" value="'.$temp_br.'">
                <input type="hidden" name="arrival" value="'.$temp_ar.'">
                <input type="hidden" name="quantity" value="'.$quantity.'">
                <input type="hidden" name="from" value="'.$temp1[$i][0].'">
                <input type="hidden" name="to" value="'.$temp2[$a][0].'">
                <input type="hidden" name="classtype" value="'.$class.'">
                <input type="hidden" name="price" value="'.$hasil.'">
                <input type="hidden" name="date" value="'.$departdate.'">
                <input type="hidden" name="type" value="onewaystop">
                <input type="hidden" name="csrf-token" value="'.$_SESSION['csrf-token'].'">
                <button type="submit" class="btn btn-primary">Book Now</button>
                </form>
                </td>';
    
    
            echo "</tr>";
            $a++;
            $temp_br="";
            $temp_ar="";
            }
           
        }
        $i++;
    }
    echo " </tbody></table>";

    }

  }
?>
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

</body>
</html>




