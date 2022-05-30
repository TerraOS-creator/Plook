<?php
require_once('connection.php');
session_regenerate_id();
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }
$id=$_SESSION['user_id'];
// $username=test_input($_POST['disp_name']);
// $email=test_input($_POST['email']);
// $phone=test_input($_POST['phone']);
$username=($_POST['disp_name']);
$email=($_POST['email']);
$phone=($_POST['phone']);

$query="UPDATE users SET disp_name='$username' , email='$email' , phone='$phone' where id='$id'";
$res = mysqli_query($connection,$query);
// $query='UPDATE users SET disp_name=? , email=? , phone=? where id=?';
// $stmt=$connection->prepare($query);
// $stmt->bind_param("sssi",$username,$email,$phone,$id);
// $stmt->execute();
// $stmt->close();
header('Location:complete.php?complete='."updating user information . . .");

?>