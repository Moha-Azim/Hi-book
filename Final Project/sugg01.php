<?php
session_start();
if(!isset($_SESSION['is_logged_in']) && !isset($_SESSION['is_admin_in'])){
    header('Location: login/login.php');
 }
require('../classes/cont.php');
if(isset($_GET['submit2'])) {
                                $suggestion= $_GET['suggestion'];
                                filter_var($suggestion ,FILTER_SANITIZE_STRING);
                                $query = "INSERT INTO suggestions (Suggestion) VALUES('$suggestion')";
                                if(mysqli_query($connection, $query)){
                                    
                                   header('Location:indexe.php');
                                }else{
                                    header('Location:indexe.php');
                                }
                            }