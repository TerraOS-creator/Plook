<?php 
require_once('connection.php');
if(!empty($_POST['complete'])){
    $status=$_POST['complete'];
    
}
if(!empty($_GET['complete'])){
    $status=$_GET['complete'];
    
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/complete.css">
    <style>
    .header{
        width:10%;
        align-items:center;
    }
    .wrap{
        align-items:center;
        text-align:center;
     
    }
    .wrap img{
        width:50%;
        align-items:center;
        justify-content:center;
    }
    </style>
</head>
<body>
    <div id="main">
        <header id="header">
             <div class="wrap">
                <img src="../gambar/logo2.png" alt="">
            </div>
        </header>
            <section id="contents">
                <div class="wrap">
                    <h2><br><?php echo $status;?></h2>
                    <div class="loader">
                        <div class="load">
                            <div id="count" class="percentage" style="width:0%">
                        </div>
                        </div>
                   
                    <div class="info">
                        <span>0%</span>
                        <span id="progress">0%</span>
                        <span>100%</span>
                    </div>
                </div>
            </section>
            
    <?php
    ?>
    </div>
    <script>
    var status="<?php echo $status; ?>";
    var token="<?php echo $_SESSION['csrf-token']; ?>";
        var elem=document.getElementById("count");
        var width=0;
        
        var id=setInterval(frame,50);
        function frame(){
            if(width>=100){
                clearInterval(id);
                if(status=="changing ur avatar" ||status=="updating user information . . ."){
                    window.open('../profile.php?token='+token,'_self');
                }
                else if(status=="Please wait while we completing ur request . . ."){
                    window.open('../Login.php','_self');
                }
                else
                {
                window.open('../index.php','_self');
                }

            }
            else{
                width++;
                elem.style.width=width + '%';
                document.getElementById("progress").innerHTML=width * 1 +'%';
            }
        }
    </script>
</body>
</html>