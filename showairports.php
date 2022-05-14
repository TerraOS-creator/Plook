<?php
require_once('Controller/connection.php');

$output='';
$count=0;
$sql = "SELECT *
FROM airports_indo ";
 $query="SELECT * FROM airports4";
 $result=mysqli_query($connection,$query);
$_SESSION['flight']=$result;
?>