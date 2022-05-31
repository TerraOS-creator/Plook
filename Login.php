<?php
     session_start(); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/contactus.css">
    <title>Login</title>
</head>
<body>
<nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <a href="index.php"><img title="" src="gambar\logo2.png" style="width:150px;height:100px;"/></a>
    </nav>
    <?php
    $status="";
    if(isset($_GET['id'])){
        $status=$_GET['id'];
        if($status=="login-failed"){
            ?>
        <div id="white-background">
        </div>
        <div id="dlgbox">
            <div id="dlg-header">Login Failed</div>
            <div id="dlg-body">invalid e-mail/password</div>
            <div id="dlg-footer">
                <button onclick="dlgClose()">close</button>
            </div>
        </div>
        <script>
            showDialog();
        function dlgClose(){
            window.open('Login.php','_self');
            
        }
            function showDialog(){
                var whitebg = document.getElementById("white-background");
                var dlg = document.getElementById("dlgbox");
                whitebg.style.display = "block";
                dlg.style.display = "block";
                
                var winWidth = window.innerWidth;
                var winHeight = window.innerHeight;
                
                dlg.style.left = (winWidth/2) - 480/2 + "px";
                dlg.style.top = "150px";
            }</script>
       <?php } }?>
        <form class="box"  action="Controller/LoginController.php?id=<?php echo"$status"?>" method="POST">
        <h1> Login <h1>
            <input type="text" name="email" placeholder="email">
            <input type="password" name="password" placeholder="password">
            <a href="#" >Forgot Password?</a>
            <input type="submit" name="" value=Login>
       </form>
    


</body>
</html>