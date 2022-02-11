<?php
session_start();

if(!isset($_SESSION['is_admin_in'])){
    header('Location:../Final Project/login/loginAdmin.php');
}
require('../classes/cont.php');

$idk2= $_GET['id'];
 $selc = "SELECT * FROM books  WHERE Id = '$idk2' ";
 $doing = $connection->query($selc);
 $row = $doing -> fetch_assoc();

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
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->


</head>

<body>

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
                                <a class="nav-link active" href="#">
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
                                <a class="nav-link" href="accounts.php">
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
                                    <h2 class="tm-block-title d-inline-block">Edit Product</h2>
                                    <h2 class="tm-block-title">ID : <?php  echo $row['Id']; ?></h2>
                                </div>
                            </div>
                            <div class="row tm-edit-product-row">
                                <div class="col-md-12">
                                    <form action="../classes/editBook.php" method="POST" class="tm-edit-product-form">
                                        <div class="form-group mb-3">
                                            <label for="name">Name: <?php  echo $row['Name']; ?>
                                            </label>
                                            <input id="name" name="name" type="text" class="form-control validate "
                                                required />
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="description">Description :</label>
                                            <textarea name="description" class="form-control validate tm-small" rows="5"
                                                required>  <?php echo $row['Description'] ?></textarea>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="category">Category: <?php switch ($row['CategoryId']) {
                                                                               case 1:
                                                                                  echo "political";
                                                                                  break;
                                                                                case 2:
                                                                                  echo "comic";
                                                                                  break;
                                                                                case 3:
                                                                                  echo "novels";
                                                                                  break;
                                                                                case 4:
                                                                                  echo "economic";
                                                                                  break;
                                                                          }
                                                                          ?> </label>
                                            <select name="category" class="custom-select tm-select-accounts"
                                                id="category">
                                                <?php 
                                            $sql1 ="SELECT * FROM bookscategory";
                                            $ddd= $connection -> query($sql1);
                                            while($selected = $ddd -> fetch_assoc()){
                                              echo "<option  value='".$selected["Id"]."'>" . $selected["Catname"]."</option>";
                                              } 
                                          ?>

                                            </select>
                                        </div>
                                        <div class="row">

                                            <div class="form-group mb-3 col-xs-12 col-sm-6">
                                                <label for="Price">Price: <?php echo $row['Price'] ?>
                                                </label>
                                                <input id="price" name="Price" type="text" class="form-control validate"
                                                    required />
                                            </div>

                                            <div class="form-group mb-3 col-xs-12 col-sm-6">
                                                <label for="Pages">Pages: <?php echo $row['Pages'] ?>
                                                </label>
                                                <input id="Pages" name="Pages" type="text" class="form-control validate"
                                                    required />
                                            </div>


                                        </div>



                                        <div class="row">

                                            <div class="form-group mb-3 col-xs-12 col-sm-6">
                                                <label for="Language">Language: <?php echo $row['Language'] ?>
                                                </label>
                                                <input id="Language" name="language" type="text"
                                                    class="form-control validate" required />
                                            </div>


                                        </div>
                                        <input type="hidden" id="custId" name="custId" value=<?php echo $idk2; ?> />
                                </div>

                                <div class="col-12">
                                    <input value="Update Now" name="submit" type="submit"
                                        class="btn btn-primary btn-block text-uppercase" />
                                </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="tm-footer row tm-mt-small">
                <div class="col-12 font-weight-light">
                    <p class="text-center text-white mb-0 px-4 small">
                        Copyright &copy; <b>2018</b> All rights reserved.

                        Design: <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link">Template
                            Mo</a>
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