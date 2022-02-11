<?php

session_start();


if($_SERVER['REQUEST_METHOD'] === 'POST'){

      require('../classes/cont.php');

      $email= $_POST['email'];
      $password= $_POST['password'];
    

      filter_var($email,FILTER_VALIDATE_EMAIL);
      filter_var($password ,FILTER_SANITIZE_STRING);

      $_SESSION['email'] = $email;
      $_SESSION['pass'] = $password;

   

      $thewrong = 'none';
      
      $selc = "SELECT * FROM userinfo WHERE Email='$email' and Password='$password'";
      $doing = $connection->query($selc);
       if($doing -> num_rows > 0){
        $_SESSION['is_logged_in'] = 1;
       }else{
        header('Location: login/login.php');
        }
}
    

    if(!isset($_SESSION['is_logged_in']) && !isset($_SESSION['is_admin_in'])){
        header('Location: login/login.php');
     }
        require('#01foreach.php');
       
         ?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8' />
    <meta http-equiv='X-UA-Compatible' content='IE=edge' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <title>HiBook</title>
    <!-- main icon -->

    <link rel='icon' type='image/png' href='mainpic/title-logo.png' />
    <!-- normalize file -->
    <link rel='stylesheet' href='css/normalize.css' />
    <!-- icon library  -->
    <link rel='stylesheet' href='css/all.min.css' />
    <!-- main css file-->
    <link href='css/hi-book.css' rel='stylesheet' />
    <!-- google fonts -->
    <link rel='preconnect' href='https://fonts.googleapis.com' />
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin />
    <link
        href='https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300&display=swap'
        rel='stylesheet' />
    <link href='https://fonts.googleapis.com/css2?family=Open+Sans&display=swap' rel='stylesheet' />
</head>

<!-- Start Header -->
<div class='nav-header'>
    <div class='container'>
        <nav>
            <div class='logo'><img style=' margin-top:5px;border-radius: 5px ; width: 40px;'
                    src='mainpic/main-logo.png' /></div>
            <input type='checkbox' id='click'>
            <label for='click' class='menu-btn'>
                <i class='fas fa-bars'></i>
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

<!-- Start Landing -->
<div class='landing'>
    <div class='container'>
        <div class='testsize' style='background-image: url(mainpic/landing11.jpg)'>
            <div class='overlay11'>
                <div class='text'>
                    <h1>~ Hi Book ~</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Landing -->

<!-- Start types -->

<div class='types'>
    <div class='container'>
        <div class='booktype'>
            <ul>
                <li><a href='indexe.php?id=0'>All</a></li>
                <li><a href='indexe.php?id=1'>Political</a></li>
                <li><a href='indexe.php?id=2'>Comic</a></li>
                <li><a href='indexe.php?id=3'>Novels</a></li>
                <li><a href='indexe.php?id=4'>Economic</a></li>
            </ul>
        </div>
    </div>
</div>

<!-- End types -->

<!-- Start Books show-->

<div class='bookshow'>
    <div class='container'>
        <div class='list'>



            <?php echo $pord ?>



        </div>
        <button id='loadmore'>LOAD MORE</button>
    </div>
</div>
<!-- End Books show-->



<!--Start Footer-->

<div class='footer'>
    <div class='container'>
        <div class='allfooter'>
            <div class='copyright'>
                <h3>~Hi Book~</h3>
                <p>&copy; 2021 All Rights Reserved.</p>
                <p>~Hi Book~ By Mohammad Azim</p>
            </div>
            <div class='office'>
                <p>OUR SOCIAL MEDIA</p>
                <a href='#'><i class='fab fa-twitter' style='color: #00ACEE;'></i></a>
                <a href='#'> <i class='fab fa-instagram' style='color: #D91D58;'></i></a>
                <a href='#'><i class='fab fa-facebook-square' style='color: #0172BA;'></i></a>
                <a href='#'> <i class='fab fa-google-plus-g' style='color: #E41F25;'></i></a>
            </div>
            <div class='sitelink'>
                <h4>SITE LINKS</h4>
                <a href='#'>Home</a>
                <a href='#'>About Us</a>
                <a href='#'>Services</a>
                <a href='#'>Contact Us</a>
            </div>
            <div class='suggestion'>
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







<script src='javaScript/hi-book.js'></script>
<script>
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}
</script>
</body>

</html>