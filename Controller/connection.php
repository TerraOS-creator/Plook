<?php
//nama database plook di port 3306(Phpmyadmin)
$connection=mysqli_connect('localhost','root','','plook','3306');
session_start();
session_regenerate_id(TRUE);