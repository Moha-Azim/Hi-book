<?php
session_start();

if(!isset($_SESSION['is_admin_in'])){
    header('Location:../Final Project/login/loginAdmin.php');
}

  require('../classes/cont.php');


  if ($connection -> connect_error){
    die ("Error not connected now");
}
$sql1 ="SELECT * FROM bookscategory";

$ddd= $connection -> query($sql1);

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
    <style>
    @media(min-width: 983px) {
        form {
            width: 700px;
        }
    }
    </style>
</head>

<body>
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
                        <a class="nav-link" href="index.html">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
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
                        <a class="nav-link active" href="products.php">
                            <i class="fas fa-book"></i> All Books
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="accounts.php">
                            <i class="far fa-user"></i> Accounts
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
                            <h2 class="tm-block-title d-inline-block">Add Book</h2>
                        </div>
                    </div>
                    <div class="row tm-edit-product-row">
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <form style="color:white;" action="add-product.php" method="POST"
                                class="tm-edit-product-form" enctype="multipart/form-data">
                                <div class="form-group mb-3">
                                    <label for="name">Product Name
                                    </label>
                                    <input id="name" name="name" type="text" class="form-control validate" required />
                                </div>

                                <div class="form-group mb-3">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control validate" rows="3"
                                        required></textarea>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="name">Language
                                    </label>
                                    <input id="Language" name="language" type="text" class="form-control validate"
                                        required />
                                </div>

                                <div class="form-group mb-3">
                                    <label for="category">Select Category</label>
                                    <select name="category" class="custom-select tm-select-accounts" id="category">
                                        <?php
                        while($selected = $ddd -> fetch_assoc()){
                        echo "<option  value='".$selected["Id"]."'>" . $selected["Catname"]."</option>";
                        } 
                        ?>

                                    </select>
                                </div>

                                <div class="row">
                                    <div class="form-group mb-3 col-xs-12 col-sm-6">
                                        <label for="Price">Price
                                        </label>
                                        <input id="Price" name="price" type="text" class="form-control validate"
                                            data-large-mode="true" />
                                    </div>
                                    <div class="form-group mb-3 col-xs-12 col-sm-6">
                                        <label for="stock">Pages
                                        </label>
                                        <input id="Pages" name="pages" type="text" class="form-control validate"
                                            required />
                                    </div>
                                </div>


                                <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                                    <div class="tm-product-img-dummy mx-auto">
                                        <i class="fas fa-cloud-upload-alt tm-upload-icon"
                                            onclick="document.getElementById('fileInput').click();"></i>
                                    </div>
                                    <div class="custom-file mt-3 mb-3">
                                        <p style="color:#FFF">Note: the Image Should be 300x400 </p>
                                        <input id="fileInput" type="file" name="fileToUpload" style="display:none;" />
                                        <input type="button" class="btn btn-primary btn-block mx-auto"
                                            value="UPLOAD PRODUCT IMAGE"
                                            onclick="document.getElementById('fileInput').click();" />
                                    </div>

                                    <div class="custom-file mt-3 mb-3">
                                        <input id="bookfile" type="file" name="pdfUpload" style="display:none;" />
                                        <input type="button" class="btn btn-primary btn-block mx-auto"
                                            value="UPLOAD BOOK FILE"
                                            onclick="document.getElementById('bookfile').click();" />
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" name="submit"
                                        class="btn btn-primary btn-block text-uppercase">Add Product
                                        Now</button>
                                </div>
                                <?php




           //////////////
           $target_dir = "pdfFiles/";
           $target_file = $target_dir . basename($_FILES["pdfUpload"]["name"]);
           $uploadKK = 1;
           $pdfFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

           
                        echo "$pdfFileType";
           // Check if file already exists
           if (file_exists($target_file)) {
             echo "Sorry, file already exists.";
             $uploadKK = 0;
           }

        

           // Allow certain file formats
           if($pdfFileType != "pdf" && $pdfFileType != "txt") {
             echo "Sorry, only PDF and TXT files are allowed.";
             $uploadKK = 0;
           }

           // Check if $uploadOk is set to 0 by an error
           if ($uploadKK == 0) {
             echo "Sorry, your file was not uploaded.";
           // if everything is ok, try to upload file
           } else {
             if (move_uploaded_file($_FILES["pdfUpload"]["tmp_name"], $target_file)) {
               echo "The file ". htmlspecialchars( basename( $_FILES["pdfUpload"]["name"])). " has been uploaded.";
               $Namepdf= "../AddDelete/pdfFiles/".htmlspecialchars( basename( $_FILES["pdfUpload"]["name"]));
             } else {
               echo "Sorry, there was an error uploading your file.";
             }
           }


           ////////////


                                                    //////////////
                                                    $target_dir = "uploads/";
                                                    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                                                    $uploadOk = 1;
                                                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                                                    // Check if image file is a actual image or fake image
                                                    if(isset($_POST["submit"])) {
                                                      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                                                      if($check !== false) {
                                                        echo "File is an image - " . $check["mime"] . ".";
                                                        $uploadOk = 1;
                                                      } else {
                                                        echo "File is not an image.";
                                                        $uploadOk = 0;
                                                      }
                                                    }

                                                    // Check if file already exists
                                                    if (file_exists($target_file)) {
                                                      echo "Sorry, file already exists.";
                                                      $uploadOk = 0;
                                                    }

                                                    // Check file size
                                                    if ($_FILES["fileToUpload"]["size"] > 5100000) {
                                                      echo "Sorry, your file is too large.";
                                                      $uploadOk = 0;
                                                    }

                                                    // Allow certain file formats
                                                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                                                    && $imageFileType != "gif" ) {
                                                      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                                                      $uploadOk = 0;
                                                    }

                                                    // Check if $uploadOk is set to 0 by an error
                                                    if ($uploadOk == 0) {
                                                      echo "Sorry, your file was not uploaded.";
                                                    // if everything is ok, try to upload file
                                                    } else {
                                                      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                                                        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                                                        $NameFi= "../AddDelete/uploads/".htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
                                                      } else {
                                                        echo "Sorry, there was an error uploading your file.";
                                                      }
                                                    }


                                                    ////////////




                      if(isset($_POST['submit'])) {
                        $Bname      =   htmlspecialchars($_POST['name']);
                        $Description=   htmlspecialchars($_POST['description']);
                        $Language   =   htmlspecialchars($_POST['language']);
                        $Price      =   htmlspecialchars($_POST['price']);
                        $Pages      =   htmlspecialchars($_POST['pages']);
                        $Category   =   htmlspecialchars($_POST['category']);
                          
                          
                          


                          $query = "INSERT INTO books (Name,Description,Language,Price,Pages,Image,Download,CategoryId) VALUES('$Bname','$Description','$Language','$Price','$Pages','$NameFi','$Namepdf','$Category')";
                          if(mysqli_query($connection, $query)){
                              
                          }else{
                            echo ' child not working';
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
            $("#expire_date").datepicker();
        });
        </script>
        <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
        </script>
</body>

</html>