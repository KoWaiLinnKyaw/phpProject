<?php
session_start();
$userid = $_SESSION['userid'];

 if($userid != ''){

$server = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'projectdb';

try {
    $conn = new PDO("mysql:host=$server;dbname=$dbname",$dbuser,$dbpass);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $presql = $conn->prepare("SELECT * FROM users WHERE id = '$userid'");
    $presql->execute();

    $row = $presql->fetch();


}catch(PDOException $err){
    echo "Connection Error: " . $err->getMessage();
}

//upload image
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $imageName = $_FILES['profileimage']['name'];
    $tmpName = $_FILES['profileimage']['tmp_name'];
    $type = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

    $path = "./images/". $imageName;

    if($imageName == ''){
        $emptyImage = "Please choose your profile picture!";
    }else if($imageName == $row['image']){
        $sameImage = "Image already exist!";
    }else if($type == 'png' || $type == 'jpg' || $type == 'jpeg'){

        move_uploaded_file($tmpName, $path);

        $imagesql = $conn->prepare("UPDATE users SET image = '$imageName' WHERE id = '$userid'");
        $imagesql->execute();
        $uploadOK = "Upload success!";
        header("Refresh:3");

    }else {
        $typeErr = "Only (png, jpg & jpeg) files allowed!";
    }
}
// logout
if(isset($_POST['logoutBtn'])){
    session_destroy();
    header('location: ./index.php');
    exit();
}} else {
    header("location: index.php");
}

$conn = null;
?>
