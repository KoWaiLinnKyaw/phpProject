<?php
session_start();
include("loginCode.php");
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
            <p class="text-center text-primary fs-5 mt-3">Please login</p>

            <p class="text-danger"><?php echo $matchErr; ?></p>

            <label class="label" for="userEmail">Email:</label>
            <input class="rounded shadow input" type="text" name="useremail" id="userEmail" value="<?php echo $useremail ?>">
            <p class="text-danger"><?php echo $nameErr; echo $emailmatchErr; ?></p>

            <label class="label" for="Password">Password:</label>
            <input class="rounded shadow input" type="password" name="userpassword" id="Password" value="<?php echo $userpassword ?>">
            <p class="text-danger"><?php echo $passErr; ?></p>

            <input class="d-block mx-auto btn btn-primary rounded" type="submit" name="login" value="Login">
            <p class="text-center pt-2"><a class="fs-6" href="passreset.php">Forgot Password?</a></p>

            <div class="text-center py-2">
            <p>Don't have account? <a href="register.php">Register Here!</a></p>
        </div>

        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</html>