<?php
if(isset($_GET['error_upload'])){
  ?>
  <div id="white-background">
        </div>
        <div id="dlgbox">
            <div id="dlg-header">Upload Failed</div>
            <div id="dlg-body"><?php echo $_GET['error_upload'];?></div>
            <div id="dlg-footer">
                <button onclick="dlgclose()">Close</button>
            </div>
        </div>
       <script type="text/javascript">
          showDialog();
          function dlgclose(){            
                var whitebg = document.getElementById("white-background");
                var dlg = document.getElementById("dlgbox");
                whitebg.style.display = "none";
                dlg.style.display = "none";
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
require_once('Controller/connection.php');
require_once('support/ObjectIntoArr.php');
$csrf_token=$_GET['token'];
if($csrf_token==$_SESSION['csrf-token']){
}
else{
    header('Location:Controller/csrf.php');
}
$user_id=$_SESSION['user_id'];
$query='SELECT * FROM users where id=?';
$stmt=$connection->prepare($query);
$stmt->bind_param("i",$user_id);
$stmt->execute();
$res=$stmt->get_result();
$res=$res->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profile</title>
  <link href="https://fonts.googleapis.com/css?family=Bitter" rel="stylesheet" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/profile.css">
  <link rel="stylesheet" href="css/style.css">
  <style>
    .footer{
      margin-top:10%;
    }
    .section-head{
      margin-bottom:2%;
    }
    .btn-primary{
      background-color:rgb(81, 81, 187);
    }
    .btn-primary:hover{
      background-color:rgb(39, 39, 121);
    }
    
  </style>
</head>
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
<body>
<div class="cover">
  <div id="header" class="primary-colors">
    <div class="profile-pic">
       <?php if($res['image']==""){ ?>
        <img src="gambar/user.png" alt="">
        
       <?php } else { ?>
        <img src="uploads/<?php echo $res['image']?>" width="100%" alt="">
       <?php } ?>
    </div>
    <div class="profile-summary">
      <?php if($res['disp_name']!=""){?>
        <h1> <?php echo $res['disp_name']; ?></h1>
      <?php } else{ ?>
        <h1>User</h1>
       <?php } ?>
       <h2>Welcome to Plook</h2>
    </div>
  </div>

  <div id="contacts" class="secondary-colors">
  <a href="#" onclick="showUserInfo()" class="contact1">
        <i class="fa fa-user"></i>User Information
      </a>
     <a href="#" onclick="editUserInfo()" class="contact1">
        <i class="fa fa-edit"></i>Edit User Information
      </a>
      
     <a href="#" onclick="changeAvatar()" class="contact1">
        <i class="fa fa-cog"></i>Change avatar
      </a>
    
      <a href="#" onclick="showHistory()" class="contact1">
        <i class="fa fa-history"></i>History
      </a>
      
  </div>
  </div>
  <div id="main">
    <div class="long-details">
      <!----head 1-->
      <div class="head">
      <h3 class="primary-colors section-head">
        <i class="fa fa-history"></i> History of Purchases
      </h3>
      <?php

      $query='SELECT * FROM history where id=?';
      $stmt=$connection->prepare($query);
      $stmt->bind_param("i",$user_id);
      $stmt->execute();
      $history=$stmt->get_result();
      $array=$history->fetch_assoc();
      if(count($array)){
      $history=json_decode($array['user_history']);
      $count=count($history);
      $a=0;
      ?>
      <table class="timeline">
      <?php while($a<$count){
          $array=objectsIntoArray($history[$a]);
          ?>
        <tr>
          <td class="time"><?php echo $array['date']?></td>
          <td class="event">
          <?php echo $array['purchase']?> Rp.<?php echo number_format($array['price']);?> X (<?php echo $array['quantity']?>)
          </td>
        </tr>
        <?php $a++; } ?>
    </table>
    
      <?php }else{?>
        <table class="timeline">
        <tr>
          <td class="time">No history found</td>
        
          </td>
        </tr>
    </table>
      <?php }?>
      </div>
      <!----head 2-->
    <div class="head active">
    <h3 class="primary-colors section-head">
        <i class="fa fa-user"></i> User Information
      </h3>
      <table class="timeline">
      <tr>
          <td class="time">Name: </td>
          <td class="event">
          <?php echo $res['disp_name']?>
          </td>
        </tr>
        <tr>
          <td class="time">Membership:</td>
          <td class="event">
          <?php echo $res['type'];?> Member
          </td>
        </tr>
        <tr>
          <td class="time">Member since:</td>
          <td class="event">
            <?php echo $res['date'];?>
          </td>
        </tr>
        <tr>
          <td class="time">e-mail:</td>
          <td class="event">
          <?php echo $res['email'];?> 
            
          </td>
        </tr>
        
        <tr>
          <td class="time">Phone:</td>
          <td class="event">
          <?php echo $res['phone'];?> 
          </td>
        </tr>
      </table>
    </div>
  <!----head 3-->
      <div class="head">
      <h3 class="primary-colors section-head">
        <i class="fa fa-edit"></i> Edit Profile
      </h3>
      <form action="Controller/update.php" method="post">
      <table class="timeline">
        <?php if($res['disp_name']==""){
        ?>
            <tr>
          <td class="time">Name: </td>
          <td class="event">
          <input type="text" name="disp_name" placeholder="name" value="<?php echo "user"?>"> 
          </td>
        </tr>
        <?php } elseif($res['disp_name']!=""){?>
          <tr>
          <td class="time">Name: </td>
          <td class="event">
          <input type="text" name="disp_name" placeholder="name" value="<?php echo $res['disp_name']?>"> 
          </td>
        </tr>
        <?php }?>
        <tr>
          <td class="time">e-mail</td>
          <td class="event">
          <input type="text" name="email" placeholder="ex:12333@gmail.com" value="<?php echo $res['email']?>">
          </td>
        </tr>
        <tr>
          <td class="time">phone</td>
          <td class="event">
          <input type="text" name="phone" placeholder="ex:081972652662" value="<?php echo $res['phone']?>">
          </td>
        </tr>
        
      </table>
      <br>
      <button type="submit" class="btn btn-success">
        <i class="fa fa-user"></i> Submit
      </button>
      </form>
      </div>
        
      
      <!----head 4-->
    <div class="head">
    <h3 class="primary-colors section-head">
        <i class="fa fa-user-cog"></i> Change Avatar
      </h3>
     
        <form action="Controller/uploadcontrol.php" method="POST" enctype="multipart/form-data">
        <div class="btn btn-primary btn-sm float-left">
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit" class="btn">
        </div>
      </form>
      
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
        Copyright &copy; PLOOK 2020. ALL rights reserved.
        </div>
    </div>
    <script>
      var head=document.getElementsByClassName("head");
      var contact=document.getElementsByClassName("contact1");
      function showHistory(){
        head[1].className =head[1].className.replace(" active", "");
        head[2].className =head[2].className.replace(" active", "");
        head[3].className =head[3].className.replace(" active", "");
        head[0].style.display="block";
        head[1].style.display="none";
        head[2].style.display="none";
        head[3].style.display="none";
        head[0].className += " active";

        contact[3].className += " active";
        contact[0].className =contact[0].className.replace(" active", "");
        contact[1].className =contact[1].className.replace(" active", "");
        contact[2].className =contact[2].className.replace(" active", "");
      }
      function showUserInfo(){
        head[1].className =head[1].className.replace(" active", "");
        head[0].className =head[0].className.replace(" active", "");
        head[2].className =head[2].className.replace(" active", "");
        head[3].className =head[3].className.replace(" active", "");
        head[1].style.display="block";
        head[0].style.display="none";
        head[2].style.display="none";
        head[3].style.display="none";
        head[1].className += " active";

        contact[0].className += " active";
        contact[3].className =contact[3].className.replace(" active", "");
        contact[1].className =contact[1].className.replace(" active", "");
        contact[2].className =contact[2].className.replace(" active", "");
      }
      function editUserInfo(){
        head[0].className =head[0].className.replace(" active", "");
        head[1].className =head[1].className.replace(" active", "");
        head[3].className =head[3].className.replace(" active", "");
        head[2].style.display="block";
        head[1].style.display="none";
        head[0].style.display="none";
        head[3].style.display="none";
        head[2].className += " active";

        contact[1].className += " active";
        contact[3].className =contact[3].className.replace(" active", "");
        contact[0].className =contact[0].className.replace(" active", "");
        contact[2].className =contact[2].className.replace(" active", "");
      }
      function changeAvatar(){
        head[0].className =head[0].className.replace(" active", "");
        head[1].className =head[1].className.replace(" active", "");
        head[2].className =head[2].className.replace(" active", "");
        head[3].style.display="block";
        head[1].style.display="none";
        head[0].style.display="none";
        head[2].style.display="none";
        head[3].className += " active";

        contact[2].className += " active";
        contact[3].className =contact[3].className.replace(" active", "");
        contact[1].className =contact[1].className.replace(" active", "");
        contact[0].className =contact[0].className.replace(" active", "");
      }
    </script>
</body>

</html>