<?php

include "cont.php"; 





if(isset($_POST['submit'])) {
    $Bname=$_POST['name'];
    $Description=$_POST['description'];
    $Language=$_POST['language'];
    $Price=$_POST['price'];
    $Pages=$_POST['Pages'];
    $Category=$_POST['category'];
    $cusId=$_POST['custId'];

$sql = "UPDATE books SET Name = '$Bname',Description = '$Description', Language = '$Language', Price = '$Price' ,Pages = '$Pages', CategoryId = '$Category'  WHERE Id = '$cusId'";

if (mysqli_query($connection, $sql)) {
    header("Location: ".$_SERVER['HTTP_REFERER']);

} else {
  echo "Error updating record: " . mysqli_error($connection);
}
}
mysqli_close($connection);
?>