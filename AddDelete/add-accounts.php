<?php


session_start();

if(!isset($_SESSION['is_admin_in'])){
    header('Location:../Final Project/login/loginAdmin.php');
}
require('../classes/cont.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Hi-Book Admin</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700" />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
    <!-- http://api.jqueryui.com/datepicker/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/templatemo-style.css">



</head>

<body style=''>
    <nav class="navbar navbar-expand-xl">
        <div class="container h-100">
            <a class="navbar-brand" href="index.html">
                <h1 class="tm-site-title mb-0">Hi-Book Admin</h1>
            </a>
            <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars tm-nav-icon"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto h-100">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-tachometer-alt"></i>
                            Dashboard
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="far fa-file-alt"></i>
                            <span> Reports <i class="fas fa-angle-down"></i> </span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Daily Report</a>
                            <a class="dropdown-item" href="#">Weekly Report</a>
                            <a class="dropdown-item" href="#">Yearly Report</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products.php">
                            <i class="fas fa-book"></i>
                            All Books
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="accounts.php">
                            <i class="far fa-user"></i>
                            Accounts
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-cog"></i>
                            <span> Settings <i class="fas fa-angle-down"></i> </span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Profile</a>
                            <a class="dropdown-item" href="#">Billing</a>
                            <a class="dropdown-item" href="#">Customize</a>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="../classes/01desSession.php">
                            <b>Logout</b>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container tm-mt-big tm-mb-big">
        <div class="row">
            <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
                <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title d-inline-block">Add User</h2>
                        </div>
                    </div>
                    <div class="row tm-edit-product-row">
                        <div class="col-md-12">
                            <form action="add-accounts.php" method="POST" class="tm-edit-product-form">

                                <div class="row">

                                    <div class="form-group mb-3 col-xs-12 col-sm-6">
                                        <label for="Fname">First Name:
                                        </label>
                                        <input id="Fname" name="Fname" type="text" class="form-control validate"
                                            required />
                                    </div>

                                    <div class="form-group mb-3 col-xs-12 col-sm-6">
                                        <label for="Lname">Last Name:
                                        </label>
                                        <input id="Lname" name="Lname" type="text" class="form-control validate"
                                            required />
                                    </div>


                                </div>


                                <div class="form-group mb-3">
                                    <label for="Email">Email:
                                    </label>
                                    <input id="Email" name="Email" type="email" class="form-control validate "
                                        required />
                                </div>

                                <div class="form-group mb-3">
                                    <label for="Password">Password:
                                    </label>
                                    <input id="Password" name="Password" type="password" class="form-control validate "
                                        required />
                                </div>


                        </div>

                        <div class="col-12">
                            <input value="Add Account" name="submit" type="submit"
                                class="btn btn-primary btn-block text-uppercase" />
                        </div>
                        <?php


if(isset($_POST['submit'])) {
    $Fname=htmlspecialchars($_POST['Fname']);
    $Lname=htmlspecialchars($_POST['Lname']);
    $Email=htmlspecialchars($_POST['Email']);
    $Pass= htmlspecialchars($_POST['Password']);


    $query = "INSERT INTO userinfo (Fname,Lname,Email,Password) VALUES('$Fname','$Lname','$Email','$Pass')";
    if(mysqli_query($connection, $query)){
    }
}

 
?>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="tm-footer row tm-mt-small">
        <div class="col-12 font-weight-light">
            <p class="text-center text-white mb-0 px-4 small">
                Copyright &copy; <b><?php date_default_timezone_set('Asia/Amman');;
                                                $dateNow = date('Y');
                                                 echo $dateNow;
                    ?></b> All rights reserved.


            </p>
        </div>
    </footer>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
    <!-- https://jqueryui.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
    $(function() {
        $("#expire_date").datepicker({
            defaultDate: "10/22/2020"
        });
    });
    </script>
    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>
</body>

</html>