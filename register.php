<?php
 include("regCode.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>My Project Reg</title>
</head>

<body class="bg-info">
    <h2 class="text-center my-5">Registration Form</h2>
    <div class="formback">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form-control shadow py-2 bg-light rounded-3 shadow-lg">

            <p class="text-center text-primary fs-5 mt-3">Please register here!</p>
            
            <label class="label" for="username">Username:</label>
            <input class="rounded shadow-sm ps-2 input" type="text" name="username" id="username" value="<?php echo $username; ?>" autocomplete="off">
            <p class="text-danger"><?php echo $emptyname; echo $nameErr; ?></p>

            <label class="label" for="email">Email:</label>
            <input class="rounded shadow-sm ps-2 input" type="text" name="email" id="email" value="<?php echo $email ?>">
            <p class="text-danger"><?php echo $emptyemail; echo $emailErr; ?></p>

            <label class="label" for="Password">Password:</label>
            <input class="rounded shadow-sm ps-2 input" type="password" name="password" id="Password" value="<?php echo $password ?>">
            <p class="text-danger"><?php echo $emptypass; echo $passErr; ?></p>

            <label class="label" for="confirmPassword">Confirm Password:</label>
            <input class="rounded shadow-sm ps-2 input" type="password" name="confirmpassword" id="confirmPassword" value="<?php echo $confirmpassword ?>">
            <p class="text-danger"><?php echo $emptyconfirmpass; echo $confirmpassErr; ?></p>

            <input class="d-block mx-auto btn btn-primary rounded" type="submit" name="register" value="Register">

            <div class="text-center py-3">
            <p>Have account? <a href="index.php">Login Here!</a></p>
        </div>

        </form>
        
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</html>