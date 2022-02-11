<?php
    require('../classes/cont.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="./mainpic/title-logo.png" />
    <title>Hi-book SingUp</title>
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!-- Font-->
    <link rel="stylesheet" type="text/css" href="css/opensans-font.css" />
    <link rel="stylesheet" type="text/css" href="fonts/line-awesome/css/line-awesome.min.css" />
    <!-- Jquery -->
    <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css" />
    <!-- Main Style Css -->
    <link rel="stylesheet" href="css/style.css" />
</head>

<body class="form-v4">
    <div class="page-content" style="background-image: url('login/images/bg-01.jpg')">
        <div class="form-v4-content">
            <div class="form-left">
                <h2>~Hi Book~</h2>
                <p class="text-1">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Et
                    molestie ac feugiat sed. Diam volutpat commodo.
                </p>
                <p class="text-2">
                    <span>Eu ultrices:</span> Vitae auctor eu augue ut. Malesuada nunc
                    vel risus commodo viverra. Praesent elementum facilisis leo vel.
                </p>

                <a style="padding:10px 20px; text-decoration:none" href="login/login.php" class="account"> Have An
                    Account </a>

            </div>

            <form action="singup.php" method="post" id="myform" class="form-detail">
                <h2>Sing Up</h2>
                <div class="form-group">
                    <div class="form-row form-row-1">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" id="first_name" class="input-text" required />
                    </div>
                    <div class="form-row form-row-1">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" id="last_name" class="input-text" required />
                    </div>
                </div>
                <div class="form-row">
                    <label for="your_email">Your Email</label>
                    <input type="email" name="Email" id="your_email" class="input-text" required />
                </div>
                <div class="form-group">
                    <div class="form-row form-row-1">
                        <label for="password">Password</label>
                        <input type="password" name="Password" id="password" class="input-text" required />
                    </div>
                </div>

                <input type="submit" name="submit" class="register" value="Sing Up" />

                <?php


if(isset($_POST['submit'])) {
    $Fname=htmlspecialchars($_POST['first_name']);
    $Lname=htmlspecialchars($_POST['last_name']);
    $Email=htmlspecialchars($_POST['Email']);
    $Pass=htmlspecialchars($_POST['Password']);


    $query = "INSERT INTO userinfo (Fname,Lname,Email,Password) VALUES('$Fname','$Lname','$Email','$Pass')";
    if(mysqli_query($connection, $query)){
         header('Location:login/login.php'); 
    }
}

 
?>
            </form>
        </div>
    </div>
</body>

</html>