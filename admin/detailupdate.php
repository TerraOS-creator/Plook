<?php
require_once('../Controller/connection.php');
require_once('../support/ObjectIntoArr.php');
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
        $search=$_POST['search'];
        $query="UPDATE transportation SET nama='$nama',supir='$supir',BBM='$BBM',harga='$harga',waktu='$waktu',kapasitas='$capacity',image='$gambar' where id='$search')";
        $res = mysqli_query($connection,$query);
        // $query="INSERT INTO transportation values(?,?,?,?,?,?,?,?)";
        // $res=$connection->prepare($query);
        // $res->bind_param("sssiiisi",$nama,$supir,$BBM,$harga,$waktu,$capacity,$gambar,$kosong);
        // $res->execute();
        // $res->close();
        header('Location: Update.php');
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
        $search=$_POST['search'];
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
        $query="UPDATE hotels SET nama='$nama',description='$complete',gambar='$gambar',text='$hotel_detail' where id='$search'";
        $res = mysqli_query($connection,$query);

        // $query="UPDATE hotels SET nama=?,description=?,gambar=?,text=? where id=?";
        // $res=$connection->prepare($query);
    
        // $res->bind_param("ssssi",$nama,$complete,$gambar,$hotel_detail,$search);
        // $res->execute();
        // $res->close();
        header('Location: Update.php');
    }
    elseif($_POST['id']=="Atraksi"){
        $kosong="";
        $nama=$_POST['nama'];
        $detail=$_POST['atraksi_detail'];
        $gambar=$_POST['gambar'];
        $harga=$_POST['harga'];
        $search=$_POST['search'];
        $query="UPDATE atraksi SET nama='$nama',harga='$harga',image='$gambar',description='$detail' where id='$search'";
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
        header('Location: Update.php');
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
        background-color:white;
        color:black;
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
<h1>Hotel Name</h1>
<?php
    if(isset($_POST['ID'])){
        $ID=$_POST['ID'];
    }
    else{
        $ID=$search;
    }
    $query="SELECT * FROM hotels where id='$ID'";
    $result=mysqli_query($connection,$query);
    $rowcount = mysqli_num_rows($result);
    echo "<table class='table table-bordered table-striped table-hover'>
        <thead>
        <tr>
        <th>ID</th>
            <th>Name</th>   
        </tr>
        </thead>";
      
    $row=$result->fetch_row();
    $temp=json_decode($row[1]);
    $temp=objectsIntoArray($temp);
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
    $fas1=$desc1["fasilitas"];
    $fas2=$desc2["fasilitas"];
    $makanan1=$fas1["1"];
    $makanan2=$fas2["1"];
    $wifi1=$fas1["2"];
    $wifi2=$fas2["2"];
      echo "<tbody><tr>";
      echo "<td>" . $row[3] . "</td>";
      echo "<td>" . $row[0] . "</td>";
      echo "</tr>";

    $result->free_result();
    echo " </tbody></table>";
?>
<div class="input-form">
<form method="post">
<h1>Hotel Name/Pic</h1>
<div class="btn btn-primary btn-sm float-left">
<input type="text" name="nama" value="<?php echo $row[0];?>" placeholder="name" style="color:black" required>
<input type="text" name="gambar" value="<?php echo $row[2];?>" placeholder="gambar(ex:hotel.jpg)" style="color:black" required>
<input type="hidden" name="search" value="<?php echo $_POST['ID'];?>">
</div>
<br>
<br>
<h1>Hotel description:</h1>
<textarea name="Hotel_detail" rows="4" cols="50">
<?php echo $row[4];?>
</textarea>

<?php

echo "<table class='table table-bordered table-striped table-hover'>
          <thead>
          <tr>
          <th>Type</th>
            <th>Bed</th> 
            <th>Price</th>
            <th>Capacity</th>
            <th>bed Quantity</th>
            <th>Luas</th>
            <th>Sarapan</th>
            <th>Wifi</th>  
          </tr>
          </thead>";
          echo "<tbody><tr>";
          
          ?>
<?php echo "<td>"; ?>
<input type="hidden" name="id" value="Hotel">
<input type="text" name="type1" value="<?php echo $type1;?>" placeholder="Room Type(1)" style="color:black" required>
<?php echo "</td>"; ?>

<?php echo "<td>"; ?>

<input type="text" name="bed1" value="<?php echo $bed1;?>" placeholder="Bed Type(1)" style="color:black" required>
<?php echo "</td>"; ?>

<?php echo "<td>"; ?>

<input type="number" name="price1" value="<?php echo $price1;?>" placeholder="Price Type(1)" style="color:black" required>
<?php echo "</td>"; ?>

<?php echo "<td>"; ?>

<input type="number" name="capacity1" value="<?php echo $max1;?>" placeholder="Max.person Type(1)" style="color:black" required>
<?php echo "</td>"; ?>

<?php echo "<td>"; ?>

<input type="number" name="bedQ1" value="<?php echo $bedQ1;?>" placeholder="bed Quantity" style="color:black" required>
<?php echo "</td>"; ?>
<?php echo "<td>"; ?>

<input type="text" name="luas1" value="<?php echo $luas1;?>" placeholder="Luas(ex: 40m) Type(1)" style="color:black" required>
<?php echo "</td>"; ?>

<?php echo "<td>"; ?>

<input type="text" name="sarapan1" value="<?php echo $makanan1;?>" placeholder="Sarapan Gratis/Tanpa Sarapan" style="color:black" required>
<?php echo "</td>"; ?>
<?php echo "<td>"; ?>

<input type="text" name="wifi1" value="<?php echo $wifi1;?>" placeholder="Wifi Gratis/tanpa Wifi" style="color:black" required>
<?php echo "</td>"; ?>



<?php  echo "</tr>"; echo " </tbody></table>";?>
<br>


<?php

echo "<table class='table table-bordered table-striped table-hover'>
          <thead>
          <tr>
          <th>Type</th>
            <th>Bed</th> 
            <th>Price</th>
            <th>Capacity</th>
            <th>bed Quantity</th>
            <th>Luas</th>
            <th>Sarapan</th>
            <th>Wifi</th>  
          </tr>
          </thead>";
          echo "<tbody><tr>";
          ?>
<?php echo "<td>"; ?>
<input type="hidden" name="id" value="Hotel">
<input type="text" name="type2" value="<?php echo $type2;?>" placeholder="Room Type(1)" style="color:black" required>
<?php echo "</td>"; ?>

<?php echo "<td>"; ?>

<input type="text" name="bed2" value="<?php echo $bed2;?>" placeholder="Bed Type(1)" style="color:black" required>
<?php echo "</td>"; ?>

<?php echo "<td>"; ?>

<input type="number" name="price2" value="<?php echo $price2;?>" placeholder="Price Type(1)" style="color:black" required>
<?php echo "</td>"; ?>

<?php echo "<td>"; ?>

<input type="number" name="capacity2" value="<?php echo $max2;?>" placeholder="Max.person Type(1)" style="color:black" required>
<?php echo "</td>"; ?>

<?php echo "<td>"; ?>

<input type="number" name="bedQ2" value="<?php echo $bedQ2;?>" placeholder="bed Quantity" style="color:black" required>
<?php echo "</td>"; ?>
<?php echo "<td>"; ?>

<input type="text" name="luas2" value="<?php echo $luas2;?>" placeholder="Luas(ex: 40m) Type(1)" style="color:black" required>
<?php echo "</td>"; ?>

<?php echo "<td>"; ?>

<input type="text" name="sarapan2" value="<?php echo $makanan2;?>" placeholder="Sarapan Gratis/Tanpa Sarapan" style="color:black" required>
<?php echo "</td>"; ?>
<?php echo "<td>"; ?>

<input type="text" name="wifi2" value="<?php echo $wifi2;?>" placeholder="Wifi Gratis/tanpa Wifi" style="color:black" required>
<?php echo "</td>"; ?>
<?php  echo "</tr>"; echo " </tbody></table>";?>

<br>
<h1>Note:</h1>
<li>Hotel Description (maximum:300 character)</li>
<li>bed type (ex: queen bed, double bed, etc)</li>
<li>room type (ex: VIP room, family room, etc)</li>
<li>Price type (ex: 1333445, 2223790, etc "without Rp" )</li>
<li>Luas type (ex: 20m, 40m, etc)</li>
<li>Sarapan (ex: Sarapan gratis / Tanpa Sarapan)</li>
<li>Wifi (ex: Wifi gratis / Tanpa Wifi)</li>
<input type="submit" name="submit" value="submit" style="margin-left:85%;background-color:red;color:white;width:200px;height:50px;margin-bottom:5%;">

</form>
</div>

<?php
}
elseif($id=="Transportation"){
    ?>
    <h1>Transportation</h1>
    <?php
    if(isset($_POST['ID'])){
        $ID=$_POST['ID'];
    }
    else{
        $ID=$search;
    }
    $query="SELECT * FROM transportation where id='$ID'";
    $result=mysqli_query($connection,$query);
    $rowcount = mysqli_num_rows($result);
    $row=$result->fetch_row();
    echo "<table class='table table-bordered table-striped table-hover'>
          <thead>
          <tr>
          <th>ID</th>
            <th>Name</th>   
          </tr>
          </thead>";
    
    $nama=$row[0];
    $supir=$row[1];
    $BBM=$row[2];
    $harga=$row[3];
    $waktu=$row[4];
    $kapasitas=$row[5];
    $image=$row[6];
    $id=$row[7];
    // print($nama);
    // print($supir);
    // print($BBM);
    // print($waktu);
    // print($kapasitas);
    // print($image);
    // print($search);
          echo "<tbody><tr>";
          echo "<td>" . $row[7] . "</td>";
          echo "<td>" . $row[0] . "</td>";
          echo "</tr>";
    
    $result->free_result();
    echo " </tbody></table>";

    echo "<table class='table table-bordered table-striped table-hover'>
          <thead>
          <tr>
          <th>Nama</th>
            <th>File Gambar</th>   
            <th>Supir</th> 
            <th>BBM</th> 
            <th>Harga</th> 
            <th>Waktu</th> 
            <th>Kapasitas</th> 
          </tr>
          </thead>";
          echo "<tbody><tr>";
       
          
    ?>
    <div class="input-form">
    <form method="post">
    <h1>Update Transportasi:</h1>
    <?php echo "<td>";?>
    <input type="hidden" name="search" value="<?php echo $_POST['ID'];?>">
    <input type="hidden" name="id" value="Transportation" style="color:black" required>
    <input type="text" name="nama" placeholder="nama" style="color:black" value="<?php echo $nama; ?>" required>
    <?php echo "</td>";?>

    <?php echo "<td>";?>
    <input type="text" name="gambar" placeholder="file gambar(ex: bali.jpg)" style="color:black" value="<?php echo $image; ?>" required>
    <?php echo "</td>";?>
    
    <?php echo "<td>";?>
    <input type="text" name="supir" placeholder="supir(sudah/belum)" style="color:black" value="<?php echo $supir; ?>" required>
    <?php echo "</td>";?>

   
    <?php echo "<td>";?>
    <input type="text" name="BBM" placeholder="BBM(sudah/belum)" style="color:black" value="<?php echo $BBM; ?>" required>
    <?php echo "</td>";?>
    
    <?php echo "<td>";?>
    <input type="number" name="harga" placeholder="harga" style="color:black"value="<?php echo $harga; ?>" required>
    <?php echo "</td>";?>
   
    <?php echo "<td>";?>
    <input type="number" name="waktu" placeholder="jangka waktu sewa" style="color:black" value="<?php echo $waktu; ?>" required>
    <?php echo "</td>";?>
    
    <?php echo "<td>";?>
    <input type="number" name="capacity" placeholder="capacity(ex: 14 orng)" style="color:black" value="<?php echo $kapasitas; ?>" required>
    <?php echo "</td>";?>
    
    
    <?php echo "</tr>"; echo " </tbody></table>";?>
   
    <br>
    <br>

    <input type="submit" name="submit" value="submit" style="margin-left:85%;background-color:red;color:white;width:200px;height:50px;margin-bottom:5%;">

    </form>
    </div>
    <?php
}
elseif($id=="Atraksi"){
    ?>
    <h1>Atraksi</h1>
    <?php
    if(isset($_POST['ID'])){
        $ID=$_POST['ID'];
    }
    else{
        $ID=$search;
    }
    $query="SELECT * FROM atraksi where id='$ID'";
    $result=mysqli_query($connection,$query);
    $rowcount = mysqli_num_rows($result);
    echo "<table class='table table-bordered table-striped table-hover'>
          <thead>
          <tr>
          <th>ID</th>
            <th>Name</th>   
          </tr>
          </thead>";
    $row=$result->fetch_row();
    
          echo "<tbody><tr>";
          echo "<td>" . $row[3] . "</td>";
          echo "<td>" . $row[0] . "</td>";
          echo "</tr>";
    
    $result->free_result();
    echo " </tbody></table>";
    echo "<table class='table table-bordered table-striped table-hover'>
    <thead>
    <tr>
    <th>Nama</th>
      <th>File Gambar</th>
      <th>Harga</th>
    </tr>
    </thead>";
    echo "<tbody><tr>";
    ?>
    <div class="input-form">
    <form method="post">
    <h1>Update Atraksi:</h1>
  <?php echo "<td>";?>
    <input type="hidden" name="search" value="<?php echo $_POST['ID'];?>">
    <input type="text" name="nama" value="<?php echo $row[0];?>" placeholder="nama lokasi" style="color:black" required>
    <?php echo "</td>";?>
    <?php echo "<td>";?>
    <input type="text" name="gambar" value="<?php echo $row[2];?>" placeholder="file gambar(ex: bali.jpg)" style="color:black" required>
    <?php echo "</td>";?>

    <input type="hidden" name="id" value="Atraksi">
    <?php echo "<td>";?>
    <input type="number" name="harga" placeholder="harga tiket" value="<?php echo $row[1];?>" style="color:black" required>
    <?php echo "</td>";?>
    <?php echo "</tr>"; echo " </tbody></table>";?>
    <textarea name="atraksi_detail" rows="4" cols="50" >
    <?php if($row[4]!=NULL){echo $row[4];}else{echo "Currently no Description for this attraction";}?>
</textarea>

    
<input type="submit" name="submit" value="submit" style="margin-left:85%;background-color:red;color:white;width:200px;height:50px;margin-bottom:5%;">
    
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