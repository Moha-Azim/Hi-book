<?php

include "cont.php"; 





if(isset($_POST['submit'])) {
    $Fname=$_POST['Fname'];
    $Lname=$_POST['Lname'];
    $Email=$_POST['Email'];
    $Password=$_POST['Password'];
    $cusId=$_POST['custId'];
   

$sql = "UPDATE userinfo SET Fname = '$Fname', Lname = '$Lname', Email = '$Email', Password = '$Password'   WHERE Id = '$cusId'";

if (mysqli_query($connection, $sql)) {
    header("Location: ".$_SERVER['HTTP_REFERER']);

} else {
  echo "Error updating record: " . mysqli_error($connection);
}
}
mysqli_close($connection);
?>