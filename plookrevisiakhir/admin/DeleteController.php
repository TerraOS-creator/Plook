<?php
require_once('../Controller/connection.php');
if(isset($_SESSION['type'])){
    if($_SESSION['type']==1){
        //pass
    }
    else{
        header('Location: ../index.php');
    }
}

if(isset($_POST['submit'])){
    if($_POST['id']=="User"){
        $query="DELETE FROM users where id=?";
        $res=$connection->prepare($query);
        $res->bind_param("i",$_POST['ID']);
        $res->execute();
        $res->close();
    }
    elseif($_POST['id']=="Transportation"){
        $query="DELETE FROM transportation where id=?";
        $res=$connection->prepare($query);
        $res->bind_param("i",$_POST['ID']);
        $res->execute();
        $res->close();
    }
    elseif($_POST['id']=="Hotel"){
        $query="DELETE FROM hotels where id=?";
        $res=$connection->prepare($query);
        $res->bind_param("i",$_POST['ID']);
        $res->execute();
        $res->close();
    }
    elseif($_POST['id']=="Atraksi"){
        $query="DELETE FROM atraksi where id=?";
        $res=$connection->prepare($query);
        $res->bind_param("i",$_POST['ID']);
        $res->execute();
        $res->close();
    }
}
else{

}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/search.css">
    <link rel="stylesheet" href="../css/grid.css">

  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/slideshow.css">
    <link rel="stylesheet" href="../css/helper.css">
    <link rel="stylesheet" href="../css/background.css">
    <style>
    thead{
        background-color:green;
    }
    nav{
        margin-bottom:1.5%;
    }
    h1{
        color:white;
    }
    tbody{
        background-color:#0003;
        color:white;
    }
    </style>
  </head>
  <body>
	 
  <div class="grid">
    <div class="header">
    <nav>
<div class="logo">
<a href="admin.php"><img title="" src="../gambar\logo2.png" style="width:200px;height:80px;"/></a>
</div>
<ul class="nav-links">
<li><a href="admin.php">Homepage</a></li>
<li><a href="Insert.php">Insert</a></li>
<li><a href="Delete.php">Delete</a></li>
<li><a href="Update.php">Update</a></li>
<li><a href="../index.php">View as User</a></li>
<li><a href="../logout.php">Logout</a></li>
 
</ul>
<div class="burger">
<div  class="line1"></div>
<div  class="line2"></div>
<div  class="line3"></div>
</div>
</nav>
        
</div>
<?php
if(isset($_GET['id'])){
    $id=$_GET['id'];
}
else{
    $id=$_POST['id'];
}
if($id=="User"){
?>
<h1>User</h1>
<?php
$query="SELECT * FROM users";
$result=mysqli_query($connection,$query);
$rowcount = mysqli_num_rows($result);

echo "<table class='table table-bordered table-striped table-hover'>
      <thead>
      <tr>
      <th>ID</th>
        <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Date</th>
            
         
      </tr>
      </thead>";
while($row=$result->fetch_row()){

      echo "<tbody><tr>";
      echo "<td>" . $row[0] . "</td>";
      echo "<td>" . $row[7] . "</td>";
      echo "<td>" . $row[2] . "</td>";
      echo "<td>" . $row[3] . "</td>";
      echo "<td>" . $row[5] . "</td>";
      echo "</tr>";
}
$result->free_result();
echo " </tbody></table>";
?>
<div class="input-form">
<form method="post">
<div class="btn btn-primary btn-sm float-left">

<input type="hidden" name="id" value="User">
<input type="number" name="ID" value="" style="color:black" required>
<input type="submit" name="submit" value="submit">
</div>
</form>
</div>
<?php
}
elseif($id=="Hotel"){
?>
<h1>Hotel</h1>
<?php
$query="SELECT * FROM hotels";
$result=mysqli_query($connection,$query);
$rowcount = mysqli_num_rows($result);
echo "<table class='table table-bordered table-striped table-hover'>
      <thead>
      <tr>
      <th>ID</th>
        <th>Name</th>   
      </tr>
      </thead>";
while($row=$result->fetch_row()){

      echo "<tbody><tr>";
      echo "<td>" . $row[3] . "</td>";
      echo "<td>" . $row[0] . "</td>";
      echo "</tr>";
}
$result->free_result();
echo " </tbody></table>";
?>
<div class="input-form">
<form method="post">
<div class="btn btn-primary btn-sm float-left">
<input type="hidden" name="id" value="Hotel">
<input type="number" name="ID" value="" style="color:black" required>
<input type="submit" name="submit" value="submit">
</div>
</form>
</div>
<?php
}
elseif($id=="Transportation"){
    ?>
    <h1>Transportation</h1>
    <?php
    $query="SELECT * FROM transportation";
    $result=mysqli_query($connection,$query);
    $rowcount = mysqli_num_rows($result);
    echo "<table class='table table-bordered table-striped table-hover'>
          <thead>
          <tr>
          <th>ID</th>
            <th>Name</th>   
          </tr>
          </thead>";
    while($row=$result->fetch_row()){
    
          echo "<tbody><tr>";
          echo "<td>" . $row[7] . "</td>";
          echo "<td>" . $row[0] . "</td>";
          echo "</tr>";
    }
    $result->free_result();
    echo " </tbody></table>";
    ?>
    <div class="input-form">
    <form method="post">
    <div class="btn btn-primary btn-sm float-left">
    <input type="hidden" name="id" value="Transportation">
    <input type="number" name="ID" value="" style="color:black" required>
    <input type="submit" name="submit" value="submit">
    </div>
    </form>
    </div>
    <?php
}
elseif($id=="Atraksi"){
    ?>
    <h1>Atraksi</h1>
    <?php
    $query="SELECT * FROM atraksi";
    $result=mysqli_query($connection,$query);
    $rowcount = mysqli_num_rows($result);
    echo "<table class='table table-bordered table-striped table-hover'>
          <thead>
          <tr>
          <th>ID</th>
            <th>Name</th>   
          </tr>
          </thead>";
    while($row=$result->fetch_row()){
    
          echo "<tbody><tr>";
          echo "<td>" . $row[3] . "</td>";
          echo "<td>" . $row[0] . "</td>";
          echo "</tr>";
    }
    $result->free_result();
    echo " </tbody></table>";
    ?>
    <div class="input-form">
    <form method="post">
    <div class="btn btn-primary btn-sm float-left">
    <input type="hidden" name="id" value="Atraksi">
    <input type="number" name="ID" value="" style="color:black" required>
    <input type="submit" name="submit" value="submit">
    </div>
    </form>
    </div>
    <?php
}
?>
</div>

  
    </div>

  <script src="../js/slideshow.js"></script>
  <script src="../js/navbar.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
  <script src="../js/navbar.js"></script>
  </body>
</html>