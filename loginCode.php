<?php
$server = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'projectdb';

try {
    $conn = new PDO("mysql:host=$server;dbname=$dbname",$dbuser,$dbpass);

    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(PDOException $err){
    echo "Connection Error: " . $err->getMessage();
}

$useremail = $_POST['useremail'];
$userpassword = $_POST['userpassword'];

$nameErr = $passErr = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(empty($useremail)){
        $nameErr = "Please fill your email!";
    }else if(!filter_var($useremail,FILTER_VALIDATE_EMAIL)){
        $emailmatchErr = "Email invalide!";
    }else if (empty($userpassword)) {
        $passErr = "Please enter your password!";
    }else {
        $presql = $conn->prepare("SELECT * FROM users WHERE email = '$useremail'");
        $presql->execute();

        $row = $presql->fetch();
        $password = $row['password'];
        $_SESSION['userid'] = $row['id'];
        
        if(password_verify($userpassword,$password)){
            header("location: home.php");
            exit();
        }else{
            $matchErr = "Email and Password does not match! <a href='register.php'>Register Here!</a>";
        }

        $conn = null;
 
    }
    
}
?>
