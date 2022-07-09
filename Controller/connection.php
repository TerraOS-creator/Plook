<?php
//nama database plook di port 3306(Phpmyadmin)
$connection=mysqli_connect('localhost','root','','plook','3306');
// $connection=mysqli_connect("mysql:host=34.101.98.63;dbname=plook","root","");
session_start();
session_regenerate_id(TRUE);