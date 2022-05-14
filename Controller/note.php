<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/search.css">
    <link rel="stylesheet" href="../css/grid.css">

  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/slideshow.css">
    <link rel="stylesheet" href="../css/helper.css">
    <link rel="stylesheet" href="../css/background.css">
    <title>Document</title>
    <style>
    .note,.note2{
        color:white;
        margin-left:7.5%;
        
    }
    .note{
        margin-top:5%;
    }
    </style>
</head>
<body>
<nav>
<div class="logo">
<a href="../index.php"><img title="" src="../gambar\logo2.png" style="width:200px;height:80px;"/></a>
</div>
<ul class="nav-links">
<?php if(!isset($_SESSION['user'])){ ?>
<li><a href="../Login.php">Login</a></li>
<li><a href="../register.php">Register</a></li>
<li><a href="../parallax.php">About us</a></li>
<?php }else{?> 
<li><a href="../index.php">Search</a></li>
<li><a href="../promo.php">Promo</a></li>
<li><a href="../profile.php?token=<?php echo $_SESSION['csrf-token']; ?>">Profile</a></li>
<li><a href="../logout.php">Logout</a></li>
<?php }?>
</ul>
<div class="burger">
<div  class="line1"></div>
<div  class="line2"></div>
<div  class="line3"></div>
</div>
</nav>
<h1 class="note">no result found!
</h1>
<h1 class="note2">please refer to autocomplete to avoid problem/error like this...
</h1>
<h1 class="note2">Click PLOOK logo to return to homepage 
</h1>
 <script src="../js/slideshow.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="../js/navbar.js"></script>
</body>
</html>