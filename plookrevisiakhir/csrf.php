<!DOCTYPE html>
<html>
<body>

<?php
require_once 'Controller/connection.php';

$key=bin2hex(random_bytes(32));
$csrf=uniqid();
$_SESSION['csrf-token']=$key;
$_SESSION['csrf-token'].=$csrf;
echo $_SESSION['csrf-token'];
$_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
echo $_SESSION['user_agent'];
?>

</body>
</html>