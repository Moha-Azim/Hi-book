<?php

session_start();

if(!isset($_SESSION['is_admin_in'])){
    header('Location:../Final Project/login/loginAdmin.php');
}
  require('../Final Project/#03foreach.php')
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
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/templatemo-style.css" />
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
</head>

<body id="reportsPage">

    <body id="reportsPage">
        <div class="" id="home">
            <nav class="navbar navbar-expand-xl">
                <div class="container h-100">
                    <a class="navbar-brand" href="index.html">
                        <h1 class="tm-site-title mb-0">Hi-Book Admin</h1>
                    </a>
                    <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
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
            <div class="container mt-5">
                <div class="row tm-content-row">
                    <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
                        <div class="tm-bg-primary-dark tm-block tm-block-products">
                            <h2 style='text-align:center; color:#FFF'>Users</h2>
                            <div class="tm-product-table-container">
                                <table class="table table-hover tm-table-small tm-product-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">&nbsp;</th>
                                            <th scope="col">User Email</th>
                                            <th scope="col">Fname</th>
                                            <th scope="col">Lname</th>
                                            <th scope="col">Id</th>
                                            <th scope="col">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php echo $sse; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- table container -->
                            <a href="add-accounts.php" class="btn btn-primary btn-block text-uppercase mb-3">Add new
                                Account</a>

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
            <script src="js/bootstrap.min.js"></script>
            <!-- https://getbootstrap.com/ -->
            <script>
            $(function() {
                $(".tm-product-name").on("click", function() {
                    window.location.href = "edit-product.html";
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