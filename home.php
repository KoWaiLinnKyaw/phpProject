<?php
include("homeCode.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>My Profile</title>
</head>

<body class="bg-body">
    <div class="navbars d-flex justify-content-center align-items-center bg-primary">
        <img src="./images/logo.png" alt="logo">
        <h4 class="navtext mx-5 text-light">My PHP Project</h4>
    </div>
    <!-- Card body -->
    <div class="p-3 p-lg-5">
        <div class="card mx-auto bg-light-subtle shadow-lg w-100 px-0 px-lg-5">
        <img src='
            <?php
            if($row['image'] == NULL){
                echo "./images/noimage.jpg";
            }else {
                echo "./images/" . $row['image'];
            }
            ?>' class='profileImage mx-auto shadow bg-dark' alt='profileImage' style='width: 200px;'>
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['user_name'] ?></h5>
                <p class="card-text">Web development, also known as website development, refers to the tasks associated with creating, building, and maintaining websites and web applications that run online on a browser. It may, however, also include web design, web programming, and database management.</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">ID: <b class="ms-3">100<?php echo $row['id'] ?></b></li>
                <li class="list-group-item">Email: <b class="ms-3"><?php echo $row['email'] ?></b></li>
                <li class="list-group-item">Join Date: <b class="ms-3"><?php echo $row['date'] ?></b></li>
                <li class="list-group-item">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                    <label for="profileImage">Change Profile Picture:</label>
                    <input type="file" name="profileimage" id="profileImage">
                    <input type="submit" value="Upload" name="uploadBtn" class="btn btn-primary">
                    </form>
                    <p class="text-danger"><?php echo $emptyImage; echo $sameImage; echo $typeErr; ?></p>
                    <p class="text-success"><?php echo $uploadOK; ?></p>
                </li>
            </ul>
            <div class="card-body text-center">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <input type="submit" value="Log Out" name="logoutBtn" class="btn btn-primary px-4">
                </form>
            </div>
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</html>