<?php

require_once('Controller/connection.php');
require_once('support/ObjectIntoArr.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/contactus.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
    .padding {
    padding: 5rem !important;
    display:none;
    margin-bottom:50px;
}
.payment-method h2{
    font-size:30px;
}
.form-control:focus {
    box-shadow: 10px 0px 0px 0px #ffffff !important;
    border-color: #4ca746;
}
.plook{
    display:none;
}
.col-sm-6{
    margin-bottom:50px;
}
nav{
    margin-bottom:2%;
}
.hotel_name{
    text-transform:uppercase;
    margin-left:1%;
    font-size:30px;

}
.footer{
    margin-top:10%;
}
.table thead{
    background-color:rgb(177, 177, 235);
}
.table{
    margin-left:1%;
    width:98%;
}
.payment-method{
    margin-left:1%;
}
.plook{
    margin-bottom:5%;
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
<li><a href="index.php">Search</a></li>
<li><a href="Login.php">Login</a></li>
<li><a href="register.php">Register</a></li>
<li><a href="parallax.php">About us</a></li>
<?php }else{?> 
<li><a href="index.php">Search</a></li>
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
if(!isset($_SESSION['user'])){
    ?>
        <div id="white-background">
        </div>
        <div id="dlgbox">
            <div id="dlg-header">User account not detected</div>
            <div id="dlg-body">Please login first, and refresh this page</div>
            <div id="dlg-footer">
                <button onclick="dlgLoginpage()">Login</button>
            </div>
        </div>
       <script type="text/javascript">
       showDialog();
          function dlgLoginpage(){            
                window.open('login.php','_blank');
            }
            
            function showDialog(){
                var whitebg = document.getElementById("white-background");
                var dlg = document.getElementById("dlgbox");
                whitebg.style.display = "block";
                dlg.style.display = "block";
                
                var winWidth = window.innerWidth;
                var winHeight = window.innerHeight;
                
                dlg.style.left = (winWidth/2) - 480/2 + "px";
                dlg.style.top = "150px";
            }
    </script>
    <?php
}
else{
    $csrf=$_POST['csrf-token'];
    if($_SESSION['csrf-token']!=$csrf){
        header('Location:Controller/csrf.php');
    }
    if($_POST['payment_type']=="hotels"){
        $count=0;
        $nama=$_POST['hotel_name'];
        $image=$_POST['image'];
        if(isset($_POST['number1'])){
            if($_POST['number1']>0){
                $quantity1=$_POST['number1'];
                $type1=$_POST['type1'];
                $price1=$_POST['price1'];

                $count++;
            }
            
        }
        if(isset($_POST['number2'])){
            if($_POST['number2']>0){
                $quantity2=$_POST['number2'];
                $type2=$_POST['type2'];
                $price2=$_POST['price2'];
   
                $count++;
            }
        }
        if(isset($_POST['number2']) ||isset($_POST['number1'])){
            $total=0;
            ?>
        <div class="hotels">
        
        <div class="hotel_name"><?php echo $nama?></div>
        </div>
        <?php
            echo "<table class='table table-bordered table-striped table-hover'>
          <thead>
          <tr>
            <th>Room</th>
            <th>Price(Rp)</th>
            <th>Quantity</th>
            <th>Total(Rp)</th>
          </tr>
          </thead>";
          $kamar1="";
          $kamar2="";
          $item1="";
          $item2="";
          if(isset($_POST['number1'])){
            if($_POST['number1']>0){
                $total1=$price1*$quantity1;
            echo "<tbody><tr>";
             echo "<td>" . $type1 . "</td>";
             echo "<td>" . number_format($price1). "</td>";
          echo "<td>" . $quantity1 . "</td>";
          echo "<td>" . number_format($total1) . "</td>";
          echo "</tr>";
          $total+=$total1;
          $kamar1=$type1;
            }}
            if(isset($_POST['number2'])){
                if($_POST['number2']>0){
                    $total2=$price2*$quantity2;
                echo "<tbody><tr>";
                 echo "<td>" . $type2 . "</td>";
                 echo "<td>" . number_format($price2). "</td>";
              echo "<td>" . $quantity2 . "</td>";
              echo "<td>" . number_format($total2) . "</td>";
              echo "</tr>";
              $total+=+$total2;
              $kamar2=$type2;
                }
                
            }
        echo " </tbody></table>";
        echo"<br>";
        
        echo "<table class='table table-bordered table-striped table-hover'>
          <thead>
          <tr>
          <th>Discount</th>
            <th>Total Payment</th>
          </tr>
          </thead>";
          $discount=0;
          if($_SESSION['search']=="Jakarta"){
            $discount=$total*(15/100);
        if($discount>100000){
            $discount=100000;
        }
        $total=$total-$discount;
        }
          echo "<tbody><tr>";
          echo "<td>" . number_format($discount) . "</td>";
                 echo "<td>" . number_format($total) . "</td>";
              echo "</tr>";
              echo " </tbody></table>";
              $temp="hotel";
              $temp.=" ";
              $temp.=$nama;
              $nama=$temp;
              if($kamar1!=""){
                $item1=$kamar1;
                $quantity1=$quantity1;
                $price1=$price1;
              }
              if($kamar2!=""){
                $item2=$kamar2;
                $quantity2=$quantity2;
                $price2=$price2;
              }
        }
        if($count==0){
            header('Location:index.php');
        }
         
      }
    else if($_POST['payment_type']=="flightoneway"){
        ?>
        <div class="text"><h2>One Way Trip</h2></div>
        <?php
        $quantity=$_POST['quantity'];
        $class=$_POST['classtype'];
        $from=$_POST['from'];
        $to=$_POST['to'];
        $price=$_POST['price'];
        $date=$_POST['date'];
        $depature=$_POST['departure'];
        $arrival=$_POST['arrival'];
        $total=$quantity*$price;
        $discount=$total*(10/100);
        $nama="flight";
        $nama.=" ";
        $nama.=$from;
        $nama.=" => ";
        $nama.=$to;
        
        if($discount>150000){
            $discount=150000;
        }
        $total=$total-$discount;
        echo "<table class='table table-bordered table-striped table-hover'>
          <thead>
          <tr>
          <th>Date</th>
          <th>Depature</th>
          <th>time</th>
          <th>Arrival</th>
          <th>time</th>
            <th>type</th>
            <th>Price/pax</th>
            <th>Quantity</th>
            <th>Discount</th>
            <th>Total(Rp)</th>
          </tr>
          </thead>";
          echo "<tbody><tr>";
          echo "<td>" . $date . "</td>";
          echo "<td>" . $from . "</td>";
          echo "<td>" . $depature . "</td>";
          echo "<td>" . $to . "</td>";
          echo "<td>" . $arrival . "</td>";
          echo "<td>" . $class . "</td>";
          echo "<td>" . number_format($price). "</td>";
       echo "<td>" . $quantity . "</td>";
       echo "<td>" . $discount . "</td>";
       echo "<td>" . number_format($total) . "</td>";
       echo "</tr>";
       echo " </tbody></table>";
        
    }
    else if($_POST['payment_type']=="flightroundtrip"){
        $quantity=$_POST['quantity'];
        $class1=$_POST['classtype'];
        $class2=$_POST['classtype2'];
        $from=$_POST['from'];
        $to=$_POST['to'];
        $price1=$_POST['price'];
        $price2=$_POST['price2'];
        $price=$price1+$price2;
        $total1=$price1*$quantity;
        $total2=$price2*$quantity;
        $depart_date=$_POST['date'];
        $return_date=$_POST['date2'];
        $total=($quantity*$price1)+($quantity*$price2);
        $depature1=$_POST['departure1'];
        $depature2=$_POST['departure2'];
        $arrival1=$_POST['arrival1'];
        $arrival2=$_POST['arrival2'];
        $nama1="flight";
        $nama1.=" ";
        $nama1.=$from;
        $nama1.=" =>";
        $nama1.=$to;
        $nama1.="(Round Trip:";
        $nama1.=$depart_date;
        $nama1.=" - ";
        $nama1.=$return_date;
        $nama1.=")"
        
        ?>
        <div class="text"><h2>Round Trip</h2></div>
        <?php
        echo "<table class='table table-bordered table-striped table-hover'>
          <thead>
          <tr>
          <th>Date</th>
          <th>Depature</th>
          <th>time</th>
          <th>Arrival</th>
          <th>time</th>
            <th>type</th>
            <th>Price/pax</th>
            <th>Quantity</th>
            
            <th>Total(Rp)</th>
          </tr>
          </thead>";
          echo "<tbody><tr>";
          echo "<td>" . $depart_date . "</td>";
          echo "<td>" . $from . "</td>";
          echo "<td>" . $depature1 . "</td>";
          echo "<td>" . $to . "</td>";
          echo "<td>" . $arrival1 . "</td>";
          echo "<td>" . $class1 . "</td>";
          echo "<td>" . number_format($price1). "</td>";
       echo "<td>" . $quantity . "</td>";
       echo "<td>" . number_format($total1) . "</td>";
       echo "</tr>";
       echo " </tbody></table>";
      
        ?>
       <div class="text"><h2>Return Date</h2></div>
        <?php
        echo "<table class='table table-bordered table-striped table-hover'>
          <thead>
          <tr>
          <th>Date</th>
          <th>Depature</th>
          <th>time</th>
          <th>Arrival</th>
          <th>time</th>
            <th>type</th>
            <th>Price/pax</th>
            <th>Quantity</th>
            
            <th>Total(Rp)</th>
          </tr>
          </thead>";
          echo "<tbody><tr>";
          echo "<td>" . $return_date . "</td>";
          echo "<td>" . $to . "</td>";
          echo "<td>" . $depature2 . "</td>";
          echo "<td>" . $from . "</td>";
          echo "<td>" . $arrival2 . "</td>";
          echo "<td>" . $class2 . "</td>";
          echo "<td>" . number_format($price2). "</td>";
       echo "<td>" . $quantity . "</td>";
       echo "<td>" . number_format($total2) . "</td>";
       echo "</tr>";
       echo " </tbody></table>";

       echo " </tbody></table>";
       echo"<br>";
       $discount=$total*(10/100);
       if($discount>150000){
           $discount=150000;
       }
       $total=$total-$discount;
       echo "<table class='table table-bordered table-striped table-hover'>
         <thead>
         <tr>
         <th>Discount</th>
           <th>Total Payment</th>
         </tr>
         </thead>";
         echo "<tbody><tr>";
         echo "<td>" . number_format($discount) . "</td>";
                echo "<td>" . number_format($total) . "</td>";
             echo "</tr>";
             echo " </tbody></table>";
    }
    else if($_POST['payment_type']=="transportation"){
        $nama=$_POST['nama'];
        $quantity=$_POST['quantity'];
        $location=$_POST['location'];
        $bbm=$_POST['bbm'];
        $supir=$_POST['supir'];
        $price=$_POST['price'];
        $total=$quantity*$price;
        $temp="Rental";
        $temp.=" ";
        $temp.=$nama;

        ?>
        <div class="hotel_name"><?php echo $nama?></div>
        <?php
        echo "<table class='table table-bordered table-striped table-hover'>
          <thead>
          <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Days</th>
            
            <th>Total(Rp)</th>
          </tr>
          </thead>";
          echo "<tbody><tr>";
          echo "<td>" . $nama . "</td>";
          echo "<td>" . number_format($price). "</td>";
          echo "<td>" . $quantity . "</td>";
       echo "<td>" . number_format($total) . "</td>";
       echo "</tr>";
       echo " </tbody></table>";
       $nama=$temp;
       $nama.="(";
       $nama.=$location;
       $nama.=")";
    }
    else if($_POST['payment_type']=="atraksi"){
   
        $quantity=$_POST['quantity'];
        $location=$_POST['location'];
        $nama=$_POST['nama'];
        $price=$_POST['price'];
        $total=$quantity*$price;
        
        ?>
        <div class="hotel_name"><?php echo $nama?></div>
        <?php
        echo "<table class='table table-bordered table-striped table-hover'>
        <thead>
        <tr>
          <th>Name</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Total(Rp)</th>
        </tr>
        </thead>";
        echo "<tbody><tr>";
        echo "<td>" . $nama . "</td>";
        echo "<td>" . number_format($price). "</td>";
        echo "<td>" . $quantity . "</td>";
     echo "<td>" . number_format($total) . "</td>";
     echo "</tr>";
     echo " </tbody></table>";
     $nama.="(";
     $nama.=$location;
     $nama.=")";
    }
    
        $id=$_SESSION['user_id'];
    $query="SELECT user_history FROM history where id='$id'";
    $result = mysqli_query($connection, $query);
    
    if(mysqli_num_rows($result)>0){
        //1 or more history
        $result=$result->fetch_all();
        $result=json_decode($result[0][0]);
        $result=objectsIntoArray($result);
        $i=0;
        while(isset($result[$i])){
            $tampung=$result[$i];
            $number=$tampung["no"];
            // print_r($tampung);
            $i++;
        }
        $number++;
        $tanggal=date("d/m/Y");
        if($_POST['payment_type']=="hotels"){
            if($item1!=""){
                $purchase="";
                $purchase.=$item1;
                $purchase.="(";
                $purchase.=$nama;
                $purchase.=")";
                $tanggal=date("d/m/Y");
                $array=array(
                    'no'=>$number,
                    'purchase'=>$purchase,
                    'date'=>$tanggal,
                    'price'=>$price1,
                    'quantity'=>$quantity1,
                );
               // $item1=$kamar1;
               // $quantity1=$quantity1;
               // $price1=$price1;
               $list=json_encode($array);
               $result[]=$array;
               
               $list=json_encode($result);
                $query="UPDATE history SET user_history=? where id=?";
                $stmt=$connection->prepare($query);
                $stmt->bind_param("si",$list,$id);
                $stmt->execute();
         
                $stmt->close();
               $number++;
            }
            if($item2!=""){
                $purchase="";
                $purchase.=$item2;
                $purchase.="(";
                $purchase.=$nama;
                $purchase.=")";
                $tanggal=date("d/m/Y");
                $array=array(
                    'no'=>$number,
                    'purchase'=>$purchase,
                    'date'=>$tanggal,
                    'price'=>$price2,
                    'quantity'=>$quantity2,
                );
                //$item2=$kamar2;
                //$quantity2=$quantity2;
                //$price2=$price2;
                $list=json_encode($array);
               $result[]=$array;
               
               $list=json_encode($result);
                $query="UPDATE history SET user_history=? where id=?";
                $stmt=$connection->prepare($query);
                $stmt->bind_param("si",$list,$id);
                $stmt->execute();
                
                $stmt->close();
            }
        }
       else if($_POST['payment_type']=="flightoneway"){
                $purchase=$nama;
                $purchase.="(";
                $purchase.=$date;
                $purchase.=")";
                $tanggal=date("d/m/Y");
                $array=array(
                    'no'=>$number,
                    'purchase'=>$purchase,
                    'date'=>$tanggal,
                    'price'=>$price,
                    'quantity'=>$quantity,
                );
               // $item1=$kamar1;
               // $quantity1=$quantity1;
               // $price1=$price1;
               $list=json_encode($array);
               $result[]=$array;
               
               $list=json_encode($result);
                $query="UPDATE history SET user_history=? where id=?";
                $stmt=$connection->prepare($query);
                $stmt->bind_param("si",$list,$id);
                $stmt->execute();
            
                $stmt->close();
               $number++;
         
        }
        else if($_POST['payment_type']=="flightroundtrip"){
            
                $purchase=$nama1;
                $tanggal=date("d/m/Y");
                $array=array(
                    'no'=>$number,
                    'purchase'=>$purchase,
                    'date'=>$tanggal,
                    'price'=>$price,
                    'quantity'=>$quantity,
                );
               // $item1=$kamar1;
               // $quantity1=$quantity1;
               // $price1=$price1;
               $list=json_encode($array);
               $result[]=$array;
               
               $list=json_encode($result);
                $query="UPDATE history SET user_history=? where id=?";
                $stmt=$connection->prepare($query);
                $stmt->bind_param("si",$list,$id);
                $stmt->execute();
           
                $stmt->close();
               $number++;
        }
        else if($_POST['payment_type']=="transportation"){
            
            $purchase=$nama;
            $tanggal=date("d/m/Y");
            $array=array(
                'no'=>$number,
                'purchase'=>$purchase,
                'date'=>$tanggal,
                'price'=>$price,
                'quantity'=>$quantity,
            );
           // $item1=$kamar1;
           // $quantity1=$quantity1;
           // $price1=$price1;
           $list=json_encode($array);
           $result[]=$array;
           
           $list=json_encode($result);
            $query="UPDATE history SET user_history=? where id=?";
            $stmt=$connection->prepare($query);
            $stmt->bind_param("si",$list,$id);
            $stmt->execute();
          
            $stmt->close();
           $number++;
    }
    else if($_POST['payment_type']=="atraksi"){
            
        $purchase=$nama;
        $tanggal=date("d/m/Y");
        $array=array(
            'no'=>$number,
            'purchase'=>$purchase,
            'date'=>$tanggal,
            'price'=>$price,
            'quantity'=>$quantity,
        );
       // $item1=$kamar1;
       // $quantity1=$quantity1;
       // $price1=$price1;
       $list=json_encode($array);
       $result[]=$array;
       
       $list=json_encode($result);
        $query="UPDATE history SET user_history=? where id=?";
        $stmt=$connection->prepare($query);
        $stmt->bind_param("si",$list,$id);
        $stmt->execute();
   
        $stmt->close();
       $number++;
    }
    }
    else{
        $number=1;
        $result=array();
        //none history found
        if($_POST['payment_type']=="hotels"){
            
            if($item1!=""){
                $purchase="";
                $purchase.=$item1;
                $purchase.="(";
                $purchase.=$nama;
                $purchase.=")";
                $tanggal=date("d/m/Y");
                $array=array(
                    'no'=>$number,
                    'purchase'=>$purchase,
                    'date'=>$tanggal,
                    'price'=>$price1,
                    'quantity'=>$quantity1,
                );
               // $item1=$kamar1;
               // $quantity1=$quantity1;
               // $price1=$price1;
               $list=json_encode($array);
               $result[]=$array;
               
               $number++;
            }
            if($item2!=""){
                $purchase="";
                $purchase.=$item2;
                $purchase.="(";
                $purchase.=$nama;
                $purchase.=")";
                $tanggal=date("d/m/Y");
                $array=array(
                    'no'=>$number,
                    'purchase'=>$purchase,
                    'date'=>$tanggal,
                    'price'=>$price2,
                    'quantity'=>$quantity2,
                );
                //$item2=$kamar2;
                //$quantity2=$quantity2;
                //$price2=$price2;
                $list=json_encode($array);
               $result[]=$array;
               
            }
           
        }
       else if($_POST['payment_type']=="flightoneway"){
                $purchase=$nama;
                $purchase.="(";
                $purchase.=$date;
                $purchase.=")";
                $tanggal=date("d/m/Y");
                $array=array(
                    'no'=>$number,
                    'purchase'=>$purchase,
                    'date'=>$tanggal,
                    'price'=>$price,
                    'quantity'=>$quantity,
                );
               // $item1=$kamar1;
               // $quantity1=$quantity1;
               // $price1=$price1;
               $list=json_encode($array);
               $result[]=$array;
               
    
         
        }
        else if($_POST['payment_type']=="flightroundtrip"){
            
                $purchase=$nama1;
                $tanggal=date("d/m/Y");
                $array=array(
                    'no'=>$number,
                    'purchase'=>$purchase,
                    'date'=>$tanggal,
                    'price'=>$price,
                    'quantity'=>$quantity,
                );
               // $item1=$kamar1;
               // $quantity1=$quantity1;
               // $price1=$price1;
               $list=json_encode($array);
               $result[]=$array;
               
    
        }
        else if($_POST['payment_type']=="transportation"){
            
            $purchase=$nama;
            $tanggal=date("d/m/Y");
            $array=array(
                'no'=>$number,
                'purchase'=>$purchase,
                'date'=>$tanggal,
                'price'=>$price,
                'quantity'=>$quantity,
            );
           // $item1=$kamar1;
           // $quantity1=$quantity1;
           // $price1=$price1;
           $list=json_encode($array);
           $result[]=$array;
           
    
    }
    else if($_POST['payment_type']=="atraksi"){
            
        $purchase=$nama;
        $tanggal=date("d/m/Y");
        $array=array(
            'no'=>$number,
            'purchase'=>$purchase,
            'date'=>$tanggal,
            'price'=>$price,
            'quantity'=>$quantity,
        );
       // $item1=$kamar1;
       // $quantity1=$quantity1;
       // $price1=$price1;
       $list=json_encode($array);
       $result[]=$array;
       
    
    }
    $list=json_encode($result);
    $query="INSERT INTO history values(?,?)";
    $stmt=$connection->prepare($query);
    $stmt->bind_param("si",$list,$id);
    $stmt->execute();
    echo "success1";
    $stmt->close();
    $number++;
    }
    

    ?>
    
    
   
    <div class="payment-method">
        <h2>Payment Method:</h2>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/3.0.0/jquery.payment.min.js"></script>
    <div class="col-sm-6"> 
		    <label class="radio-inline">
		      <input type="radio" name="stop" value="Credit Card" onclick="CreditCard()">Credit Card
		    </label>
		    <label class="radio-inline">
		      <input type="radio" name="stop" value="Plook e-money" onclick="plookemoney()">Plook e-money
		    </label>
		  </div> 
<form action="Controller/complete.php" method="POST">
<div class="padding">
    <div class="row">
        <div class="container-fluid d-flex justify-content-center">
            <div class="col-sm-8 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6"> <span>CREDIT/DEBIT CARD PAYMENT</span> </div>
                            <div class="col-md-6 text-right" style="margin-top: -5px;"> <img src="https://img.icons8.com/color/36/000000/visa.png"> <img src="https://img.icons8.com/color/36/000000/mastercard.png"> <img src="https://img.icons8.com/color/36/000000/amex.png"> </div>
                        </div>
                    </div>
                    <div class="card-body" style="height: 350px">
                        <div class="form-group"> <label for="cc-number" class="control-label">CARD NUMBER</label> <input id="cc-number" type="tel" class="input-lg form-control cc-number" autocomplete="cc-number" placeholder="•••• •••• •••• ••••" pattern="[0-9\s]{13,19}" required> </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group"> <label for="cc-exp" class="control-label">CARD EXPIRY</label> <input id="cc-exp" type="tel" class="input-lg form-control cc-exp" autocomplete="cc-exp" placeholder="•• / ••" required> </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"> <label for="cc-cvc" class="control-label">CARD CVC</label> <input id="cc-cvc" type="password" class="input-lg form-control cc-cvc" autocomplete="off" placeholder="•••" required> </div>
                            </div>
                        </div>
                        <div class="form-group"> <label for="numeric" class="control-label">CARD HOLDER NAME</label> <input type="text" class="input-lg form-control"> </div>
                        <div class="form-group"> <input type="hidden" name="complete" value="<?php echo "Confirming your payment..."?>">
                            <input value="MAKE PAYMENT" type="submit" class="btn btn-success btn-lg form-control" style="font-size: .8rem;"> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
<div class="plook">
<h2>Sorry This Feature currently not available yet...</h2>
</div>
<?php
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
<script>
var padding=document.getElementsByClassName("padding"); 
var plook=document.getElementsByClassName("plook");
function CreditCard(){
    plook[0].style.display="none";
   padding[0].style.display="block";
}
function plookemoney(){
    plook[0].style.display="block";
   padding[0].style.display="none";
}
</script>
<script>
    function update(){
    var result=<?php update_user_info();?>;
}
</script>

<script src="js/navbar.js"></script>


</body>
</html>


   