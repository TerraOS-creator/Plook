<?php
require_once('connection.php');
session_regenerate_id();
// using \ for directory in windows
$target_dir = "D:\\xampp\\htdocs\\MAKING\\uploads\\";
$target_dir=getcwd();
$target_dir.="\\..\\uploads\\";

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$avatarfile=basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $temp= "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $temp="Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $temp="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
if (file_exists($target_file)) {

    $new_image_name = 'image_' . date('Y-m-d-H-i-s') . '_' . uniqid() . '.jpg';
    
    $query="UPDATE users SET image='$new_image_name' where id='{$_SESSION['user_id']}'";
    $res = mysqli_query($connection,$query);
    // $query='UPDATE users SET image=? where id=?';
    // $stmt=$connection->prepare($query);
    // $stmt->bind_param("si",$new_image_name,$_SESSION['user_id']);
    // $stmt->execute();
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "$target_dir".$new_image_name);
    header('Location:complete.php?complete='."changing ur avatar");
}
else{
    
        if ($uploadOk == 0) {
            header('Location:..\profile.php?error_upload='.$temp);
            
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                
                $query='UPDATE users SET image=? where id=?';
                $stmt=$connection->prepare($query);
                $stmt->bind_param("si",$avatarfile,$_SESSION['user_id']);
                $stmt->execute();
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                $stmt->close();
                header('Location:complete.php?complete='."changing ur avatar");
            }
}
}

?>