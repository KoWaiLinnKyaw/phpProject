<?php
$server = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'projectdb';

try {
    $conn = new PDO("mysql:host=$server;dbname=$dbname", $dbuser, $dbpass);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $err) {
    echo "Connection Error: " . $err->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $useremail = $_POST['useremail'];
    $newpassword = $_POST['newpassword'];
    $confirmpassword = $_POST['confirmpassword'];

    if (empty($useremail)) {
        $nameErr = "Please fill your email!";
    } else if (!filter_var($useremail, FILTER_VALIDATE_EMAIL)) {
        $emailmatchErr = "Email invalide!";
    } else if (empty($newpassword)) {
        $emptynewpass = "Please enter your new password!";
    } else if (strlen($newpassword) < 8) {
        $passErr = "Please enter at least 8 charater";
    } else if (empty($confirmpassword)) {
        $emptyconpass = "Please enter your confirm password!";
    } else if ($newpassword != $confirmpassword) {
        $confirmpassErr = "Password does not match!";
    } else {
        $presql = $conn->prepare("SELECT * FROM users WHERE email = '$useremail'");
        $presql->execute();
        $row = $presql->fetch();

        if ($row['email'] == $useremail) {
            $newencpass = password_hash($newpassword, PASSWORD_DEFAULT);

            $newsql = $conn->prepare("UPDATE users SET password = '$newencpass' WHERE email = '$useremail'");
            $newsql->execute();

            $passOK = "Your password is changed!";
            header('Refresh:3; url=index.php');
        } else {
            $matchErr = "Your email does not exist! <a href='register.php'>Register Here!</a>";
        }
    }
}
$conn = null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>My Project</title>
</head>

</style>

<body class="bg-body">
    <h2 class="text-center my-5">Welcome Our Project</h2>
    <div class="formback">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form-control shadow rounded-3 py-2 bg-light">
            <p class="text-center fs-5 mt-3">Password Reset</p>

            <p class="text-danger"><?php echo $matchErr; ?></p>
            <p class="text-success"><?php echo $passOK; ?></p>

            <label class="label" for="userEmail">Email:</label>
            <input class="rounded shadow input" type="text" name="useremail" id="userEmail" value="<?php echo $useremail ?>">
            <p class="text-danger"><?php echo $nameErr;
                                    echo $emailmatchErr; ?></p>

            <label class="label" for="newPassword">New Password:</label>
            <input class="rounded shadow input" type="password" name="newpassword" id="newPassword" value="<?php echo $newpassword; ?>">
            <p class="text-danger"><?php echo $emptynewpass;
                                    echo $passErr; ?></p>

            <label class="label" for="confirmPassword">Confirm Password:</label>
            <input class="rounded shadow input" type="password" name="confirmpassword" id="confirmPassword" value="<?php echo $confirmpassword; ?>">
            <p class="text-danger"><?php echo $emptyconpass;
                                    echo $confirmpassErr; ?></p>

            <input class="d-block mx-auto btn btn-primary rounded" type="submit" name="submit" value="Submit">
            <div class="text-center py-3">
                <a href="index.php">Go Back To Login!</a>
            </div>

        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</html>
