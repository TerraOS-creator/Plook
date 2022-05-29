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
    }
    elseif($_POST['id']=="Transportation"){
        $gambar=$_POST['gambar'];
        $supir=$_POST['supir'];
        $BBM=$_POST['BBM'];
        $harga=$_POST['harga'];
        $waktu=$_POST['waktu'];
        $capacity=$_POST['capacity'];
        $nama=$_POST['nama'];
        $kosong="";
        $query="INSERT INTO transportation values('$nama','$supir','$BBM','$harga','$waktu','$capacity','$gambar','$kosong')";
        $res = mysqli_query($connection,$query);

        // $gambar=$_POST['gambar'];
        // $supir=$_POST['supir'];
        // $BBM=$_POST['BBM'];
        // $harga=$_POST['harga'];
        // $waktu=$_POST['waktu'];
        // $capacity=$_POST['capacity'];
        // $nama=$_POST['nama'];
        // $kosong="";
        // $query="INSERT INTO transportation values(?,?,?,?,?,?,?,?)";
        // $res=$connection->prepare($query);
        // $res->bind_param("sssiiisi",$nama,$supir,$BBM,$harga,$waktu,$capacity,$gambar,$kosong);
        // $res->execute();
        // $res->close();
    }
    elseif($_POST['id']=="Hotel"){
      
        $sarapan1=$_POST['sarapan1'];
        $wifi1=$_POST['wifi1'];
        $sarapan2=$_POST['sarapan2'];
        $wifi2=$_POST['wifi2'];

        $nama=$_POST['nama'];
        $gambar=$_POST['gambar'];

        $type1=$_POST['type1'];
        $bed1=$_POST['bed1'];
        $price1=$_POST['price1'];
        $cap1=$_POST['capacity1'];
        $luas1=$_POST['luas1'];
        $quantity1=$_POST['bedQ1'];

        $type2=$_POST['type2'];
        $bed2=$_POST['bed2'];
        $price2=$_POST['price2'];
        $cap2=$_POST['capacity2'];
        $luas2=$_POST['luas2'];
        $quantity2=$_POST['bedQ2'];

        $hotel_detail=$_POST['Hotel_detail'];
        $fas1=array(
            "1"=>$sarapan1,
            "2"=>$wifi1
        );
        $fas2=array(
            "1"=>$sarapan2,
            "2"=>$wifi2,
        );
        $desc1=array(
            "type"=>$type1,
            "bed"=>$bed1,
            "bedQuantity"=>$quantity1,
            "price"=>$price1,
            "maximum"=>$cap1,
            "luas"=>$luas1,
            "fasilitas"=>$fas1,
        );
        
        $desc2=array(
            "type"=>$type2,
            "bed"=>$bed2,
            "bedQuantity"=>$quantity2,
            "price"=>$price2,
            "maximum"=>$cap2,
            "luas"=>$luas2,
            "fasilitas"=>$fas2,
        );
        $payload=array(
            "nama"=>$nama,
            "description1"=>$desc1,
            "description2"=>$desc2,
        );
        $complete=json_encode($payload);
        $kosong="";
        $query="INSERT INTO hotels values('$nama','$complete','$gambar','$kosong','$hotel_detail')";
        $res = mysqli_query($connection,$query);

        // $query="INSERT INTO hotels values(?,?,?,?,?)";
        // $res=$connection->prepare($query);
        // $res->bind_param("sssis",$nama,$complete,$gambar,$kosong,$hotel_detail);
        // $res->execute();
        // $res->close();
    }
    elseif($_POST['id']=="Atraksi"){
        $kosong="";
        $nama=$_POST['nama'];
        $detail=$_POST['atraksi_detail'];
        $gambar=$_POST['gambar'];
        $harga=$_POST['harga'];
        $query="INSERT into atraksi values('$nama','$harga','$gambar','$kosong','$detail')";

        $res = mysqli_query($connection,$query);

        // $query="INSERT into atraksi values(?,?,?,?,?)";
        // $kosong="";
        // $nama=$_POST['nama'];
        // $detail=$_POST['atraksi_detail'];
        // $gambar=$_POST['gambar'];
        // $harga=$_POST['harga'];
        // $res=$connection->prepare($query);
        // $res->bind_param("sisis",$nama,$harga,$gambar,$kosong,$detail);
        // $res->execute();
        // $res->close();
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
    li{
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
<h1>Hotel Name/Pic</h1>
<div class="btn btn-primary btn-sm float-left">
<input type="text" name="nama" value="" placeholder="name" style="color:black" required>
<input type="text" name="gambar" value="" placeholder="gambar(ex:hotel.jpg)" style="color:black" required>
</div>
<br>
<br>
<h1>Hotel description:</h1>
<textarea name="Hotel_detail" rows="4" cols="50">
Hotel Description Goes here..
</textarea>
<h1>Room (1)</h1>

<div class="btn btn-primary btn-sm float-left">
<input type="hidden" name="id" value="Hotel">
<input type="text" name="type1" value="" placeholder="Room Type(1)" style="color:black" required>
<input type="text" name="bed1" value="" placeholder="Bed Type(1)" style="color:black" required>
<input type="number" name="price1" value="" placeholder="Price Type(1)" style="color:black" required>
<input type="number" name="capacity1" value="" placeholder="Max.person Type(1)" style="color:black" required>
<input type="number" name="bedQ1" value="" placeholder="bed Quantity" style="color:black" required>
<input type="text" name="luas1" value="" placeholder="Luas(ex: 40m) Type(1)" style="color:black" required>
<input type="text" name="sarapan1" value="" placeholder="Sarapan Gratis/Tanpa Sarapan" style="color:black" required>
<input type="text" name="wifi1" value="" placeholder="Wifi Gratis/tanpa Wifi" style="color:black" required>
</div>
<br>
<br>
<h1>Room (2)</h1>
<div class="btn btn-primary btn-sm float-left">

<input type="text" name="type2" value="" placeholder="Room Type(2)" style="color:black" required>
<input type="text" name="bed2" value="" placeholder="Bed Type(2)" style="color:black" required>
<input type="number" name="price2" value="" placeholder="Price Type(2)" style="color:black" required>
<input type="number" name="capacity2" value="" placeholder="Max.person Type(2)" style="color:black" required>
<input type="number" name="bedQ2" value="" placeholder="bed Quantity" style="color:black" required>
<input type="text" name="luas2" value="" placeholder="Luas(ex: 40m) Type(2)" style="color:black" required>
<input type="text" name="sarapan2" value="" placeholder="Sarapan Gratis/Tanpa Sarapan" style="color:black" required>
<input type="text" name="wifi2" value="" placeholder="Wifi Gratis/tanpa Wifi" style="color:black" required>


</div>
<br>
<br>
<h1>Note:</h1>
<li>Hotel Description (maximum:300 character)</li>
<li>bed type (ex: queen bed, double bed, etc)</li>
<li>room type (ex: VIP room, family room, etc)</li>
<li>Price type (ex: 1333445, 2223790, etc "without Rp" )</li>
<li>Luas type (ex: 20m, 40m, etc)</li>
<li>Sarapan (ex: Sarapan gratis / Tanpa Sarapan)</li>
<li>Wifi (ex: Wifi gratis / Tanpa Wifi)</li>
<br>
<div class="btn btn-primary btn-sm float-left">
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
    <h1>Insert:</h1>
    <div class="btn btn-primary btn-sm float-left">
    <input type="hidden" name="id" value="Transportation" style="color:black" required>
    <input type="text" name="nama" value="" placeholder="nama" style="color:black" required>
    <input type="text" name="gambar" placeholder="file gambar(ex: bali.jpg)" style="color:black" required>
    </div>
    <br>
    <br>
    <div class="btn btn-primary btn-sm float-left">
    <input type="text" name="supir" placeholder="supir(sudah/belum)" style="color:black" required>
    <input type="text" name="BBM" placeholder="BBM(sudah/belum)" style="color:black" required>
    <input type="number" name="harga" placeholder="harga" style="color:black" required>
    <input type="number" name="waktu" placeholder="jangka waktu sewa" style="color:black" required>
    <input type="number" name="capacity" placeholder="capacity(ex: 14 orng)" style="color:black" required>
    
    
    </div>
    <br>
    <br>
    <div class="btn btn-primary btn-sm float-left">
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
    <h1>Insert Attraksi:</h1>
    <div class="btn btn-primary btn-sm float-left">
    <input type="text" name="nama" value="" placeholder="nama lokasi" style="color:black" required>
    <input type="text" name="gambar" value="" placeholder="file gambar(ex: bali.jpg)" style="color:black" required>
    </div>
    <br>
    <br>
    <div class="btn btn-primary btn-sm float-left">
    <input type="hidden" name="id" value="Atraksi">
    <input type="number" name="harga" placeholder="harga tiket" value="" style="color:black" required>
    
    </div>
    <br>
    <br>
    <textarea name="atraksi_detail" rows="4" cols="50">
Atraksi Description Goes here..
</textarea>
<br>
<br>
    <div class="btn btn-primary btn-sm float-left">
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