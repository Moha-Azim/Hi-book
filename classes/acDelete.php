<?php

include "cont.php"; 

$idd = $_GET['id']; 

$sql2 ="DELETE FROM userinfo where id = '$idd'";

$del = mysqli_query($connection,$sql2); 

if($del)
{
    mysqli_close($connection); 
    header("Location:../AddDelete/accounts.php"); 
    exit;	
}

?>