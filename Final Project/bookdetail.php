<?php


require('../classes/cont.php');

session_start();
if(!isset($_SESSION['is_logged_in']) && !isset($_SESSION['is_admin_in'])){
    header('Location: login/login.php');
}

$idk= $_GET["idk"];
 $selc = "SELECT * FROM books  WHERE Id ='$idk'";
 $doing = $connection->query($selc);
 $row = $doing -> fetch_assoc();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HiBook</title>
    <!-- main icon -->

    <link rel="icon" type="image/png" href="mainpic/title-logo.png" />
    <!-- normalize file -->
    <link rel="stylesheet" href="css/normalize.css" />
    <!-- icon library  -->
    <link rel="stylesheet" href="css/all.min.css" />
    <!-- main css file-->
    <link href="css/hi-book.css" rel="stylesheet" />
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet" />
</head>

<body>
    <!-- Start Header -->
    <div class="nav-header">
        <div class="container">
            <nav>
                <div class="logo">
                    <img style="margin-top: 5px; border-radius: 5px; width: 40px" src="mainpic/main-logo.png" />
                </div>
                <input type="checkbox" id="click" />
                <label for="click" class="menu-btn">
                    <i class="fas fa-bars"></i>
                </label>
                <ul>

                    <li><a href='#'>Home</a></li>
                    <li><a href='indexe.php'>Library</a></li>
                    <li><a href='#'>Services</a></li>

                    <li><a style='background-color:#d91a1a;' href='../classes/01desSession.php'>Log Out</a></li>
                </ul>
            </nav>


        </div>
    </div>

    <!-- End Header -->

    <!--Start Body-->

    <div class="bookdetail">
        <div class="container">
            <div class="handdetail">
                <div class="leftpic"><img style="width:300px;height:400px" src="<?php echo $row['Image'] ?>" /></div>
                <div class="rightinfo">
                    <h1><?php echo $row['Name'] ?></h1>
                    <a href="<?php echo $row['Download'] ?>" class="thedown">Read</a>
                    <div class="textdisc">
                        <p class="discTitle">Description</p>
                        <p class="thediscription">
                            <?php echo $row['Description'] ?>
                        </p>
                    </div>
                    <div class="textdisc">
                        <p class="discTitle">Book Details</p>
                        <p>ID : <?php echo $row['Id'] ?></p>
                        <p>Language : <?php echo $row['Language'] ?></p>



                        <p>Price :<?php $f44=$row['Price'];
                                  if($f44 == 0){
                                    $f44 = " Free";
                                  }else{
                                    $f44 = "$".$f44;
                                  }
                                  echo $f44;       ?> </p>



                        <p>Pages :<?php echo $row['Pages'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--End Body-->

    <!--Start Footer-->

    <div class="footer">
        <div class="container">
            <div class="allfooter">
                <div class="copyright">
                    <h3>~Hi Book~</h3>
                    <p>&copy; 2021 All Rights Reserved.</p>
                    <p>~Hi Book~ By Mohammad Azim</p>
                </div>
                <div class="office">
                    <p>OUR SOCIAL MEDIA</p>
                    <a href="#"><i class="fab fa-twitter" style="color: #00acee"></i></a>
                    <a href="#">
                        <i class="fab fa-instagram" style="color: #d91d58"></i></a>
                    <a href="#"><i class="fab fa-facebook-square" style="color: #0172ba"></i></a>
                    <a href="#">
                        <i class="fab fa-google-plus-g" style="color: #e41f25"></i></a>
                </div>
                <div class="sitelink">
                    <h4>SITE LINKS</h4>
                    <a href="#">Home</a>
                    <a href="#">About Us</a>
                    <a href="#">Services</a>
                    <a href="#">Contact Us</a>
                </div>
                <div class="suggestion">
                    <h4>Suggest a Book</h4>
                    <form action='sugg01.php' method='GET'>
                        <input name='suggestion' class='thetext' type='text' placeholder='The Book Name'> <br>
                        <input name='submit2' class='thebutton' type='submit' value='Send'>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--End Footer-->
</body>

</html>