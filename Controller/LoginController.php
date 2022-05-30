<?php
require_once('connection.php');
//login
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }
// $email=test_input($_POST['email']);
$email=($_POST['email']);
$password=hash('sha256',$_POST['password']);
$query="SELECT * FROM users where email='$email'";
$res = mysqli_query($connection,$query);
$res=$res->fetch_assoc();
// $query='SELECT * FROM users where email=?';
// $stmt=$connection->prepare($query);
// $stmt->bind_param("s",$email);
// $stmt->execute();
// $res=$stmt->get_result();
// $res=$res->fetch_assoc();
//checking prev session
// $session=session_id();
// echo $session;
if($password==$res['password']){
//verify login
session_regenerate_id();
//checking new session
// $session=session_id();
// echo "<br>";
// echo $session;
$key=bin2hex(random_bytes(32));
$csrf=uniqid();
$_SESSION['csrf-token']=$key;
$_SESSION['csrf-token'].=$csrf;
$_SESSION['user']=$email;
$_SESSION['user_id']=$res['id'];
$type=$res['type'];
if($type=="admin"){
    $_SESSION['type']=1;
    header('Location:../admin/admin.php');
}
else{
    $_SESSION['type']=2;
  header('Location:../index.php');  
}

}
else{
//deny
header('Location:../Login.php?id='."login-failed" );
}
$stmt->close();

