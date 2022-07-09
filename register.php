<?php
require_once('Controller/connection.php');

$error = '';
$name = '';
$email = '';
$password='';
$conf_password='';
$phone='';

function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

if(isset($_POST["submit"]))
{
    $query="SELECT * FROM users where email='$email'";
    $res = mysqli_query($connection,$query);
    
// $query='SELECT * FROM users where email=?';
// $email=clean_text($_POST['email']);
// $stmt=$connection->prepare($query);
// $stmt->bind_param("s",$email);
// $stmt->execute();

// $res=$stmt->get_result();
$res=$res->fetch_assoc();
if($res!=NULL){    
    $error .= '<p><label class="text-danger">email already exist</label></p>';
}
 if(empty($_POST["name"]))
 {
 
 }
 else
 {
  $name = clean_text($_POST["name"]);
  if(!preg_match("/^[a-zA-Z ]*$/",$name))
  {
   $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
  }
 }
 if(empty($_POST["email"]))
 {
  
 }
 else
 {
  $email = clean_text($_POST["email"]);
  if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
   $error .= '<p><label class="text-danger">Invalid email format</label></p>';
  }
  else{
    
  }
 }
 if(empty($_POST["password"]))
 {
  
 }
 else
 {   
     $password = clean_text($_POST["password"]);
     if(strlen($password)<7 ){
        $error .= '<p><label class="text-danger">Password length must be 7 character or more</label></p>';
     }
     else if(strstr($password,$name)){
        $error .= '<p><label class="text-danger">For security issue password must not contain your name</label></p>';
     }
    
 }
 if(empty($_POST["conf-password"]))
 {
  
 }
 else{
     if($_POST["conf-password"]!=$_POST["password"]){
        $error .= '<p><label class="text-danger">Password and Confirm password doesnt match</label></p>';
     }
 }
 if(empty($_POST["phone"]))
 {

 }
 else
 {
  if(is_numeric($_POST["phone"]) && strlen($_POST["phone"])>7 && strlen($_POST["phone"])<13){
    $phone = clean_text($_POST["phone"]);
  }
  else{
    $error .= '<p><label class="text-danger">invalid phone number</label></p>';
  }
 }

 if($error == '')
 {
    $disp_name=$_POST['name'];
    $password=$_POST['password'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
        //proceed
        $type="Reguler";
        $temp="";
        $date=date("Y-m-d");
        //$hash=hash('sha256',$password);
        $pass=$password;
        //$query="INSERT INTO users values('$temp','$hash','$email','$phone','$type','$date','$temp','$name')";
        $query="INSERT INTO users values('$temp','$pass','$email','$phone','$type','$date','$temp','$name')";
        $res = mysqli_query($connection,$query);
        // $query="INSERT INTO users values(?,?,?,?,?,?,?,?)";
        // $stmt=$connection->prepare($query);
        // $stmt->bind_param("isssssss",$temp,$hash,$email,$phone,$type,$date,$temp,$name);
        // $stmt->execute();
        // $stmt->close();
        $error = '';
        $name = '';
        $email = '';
        $password='';
        $conf_password='';
        $phone='';
        header('Location:Login.php');
 }
}


$connection->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/contactus.css">
    <link rel="stylesheet" href="css/register.css">
    <title>Document</title>
    <style>
        .container{
            margin-top:3%;
        }
      
    </style>
</head>
<body>
<nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <a href="index.php"><img title="" src="gambar\logo2.png" style="width:150px;height:100px;"/></a>
    </nav>
<div class="container">
   <h2 align="center" >Register Plook</h2>
   <br />
   <div class="col-md-6" style="margin:0 auto; float:none;">
    <form method="post">
     <h3 align="center"></h3>
     <br />
     <?php echo $error; ?>
     <div class="form-group">
      <label>Name</label>
      <input type="text" name="name" placeholder="Enter username" class="form-control" value="<?php echo $name; ?>" required/>
     </div>
     <div class="form-group">
      <label>Email</label>
      <input type="text" name="email" class="form-control" placeholder="Enter Email" value="<?php echo $email; ?>" required/>
     </div>
     <div class="form-group">
      <label>Password</label>
      <input type="password" name="password" class="form-control" placeholder="Enter password" value="" required/>
     </div>
     <div class="form-group">
      <label>Confirm Password</label>
      <input type="password" name="conf-password" class="form-control" placeholder="Confirm Password" value="" required/>
     </div>
     <div class="form-group">
      <label>Phone</label>
      <input type="text" name="phone" class="form-control" placeholder="ex :081292233432" value="<?php echo $phone; ?>" required/>
     </div>
     <div class="form-group" align="center">
      <input type="submit" name="submit" class="btn btn-info" value="Submit" />
     </div>
    </form>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</body>

</html>

