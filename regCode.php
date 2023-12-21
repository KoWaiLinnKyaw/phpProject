<?php
$server = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'projectdb';

try {
    $conn = new PDO("mysql:host=$server;dbname=$dbname",$dbuser,$dbpass);

    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $presql = $conn->prepare("INSERT INTO users(user_name, email, password) VALUES (:username, :email, :password)");

}catch(PDOException $err){
    echo "Connection Error: " . $err->getMessage();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];

if(empty($username)){
    $emptyname = "Please enter your full name!";
}else if (!preg_match("/^[a-zA-Z-' ]*$/", $username)){
    $nameErr = "Please enter letter Only!";
}else if(empty($email)){
    $emptyemail = "Please enter your email!";
}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $emailErr = "Please enter valid email!";
}else if(empty($password)){
    $emptypass = "Please enter new password!";
}else if(strlen($password)<8){
    $passErr = "Please enter at least 8 charater";
}else if(empty($confirmpassword)){
    $emptyconfirmpass = "Please enter confirm password!";
}else if ($password != $confirmpassword){
    $confirmpassErr = "Password does not match!";
}else{

    $encrpytpass = password_hash($password, PASSWORD_DEFAULT);

    $presql->bindParam(':username', $username);
    $presql->bindParam(':email', $email);
    $presql->bindParam(':password', $encrpytpass);
    $presql->execute();

    header("location: index.php");
    exit();
}
}
$conn = null;

?>
