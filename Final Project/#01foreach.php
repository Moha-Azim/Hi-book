<?php


require('../classes/cont.php');

if ($connection -> connect_error){
    die ("Error not connected");
}
$id=$_GET['id'];

if($id == NULL){
$sql1 ="SELECT * FROM books";
}elseif($id == '0'){
    $sql1 ="SELECT * FROM books";
}elseif($id == '1'){
    $sql1 ="SELECT * FROM books WHERE CategoryId=1";
}elseif($id == '2'){
    $sql1 ="SELECT * FROM books WHERE CategoryId=2";
}elseif($id == '3'){
    $sql1 ="SELECT * FROM books WHERE CategoryId=3";
}elseif($id == '4'){
    $sql1 ="SELECT * FROM books WHERE CategoryId=4";
}

$show= $connection -> query($sql1);

while($row = $show -> fetch_assoc()){
  $pord = $pord."
                    <form style='height;300px' action='bookdetail.php' method='get' class='list-element'>
                    <input  type='hidden' value= ".$row['Id']." name = 'idk'  />
                       
                        
                        <a href= 'http://localhost/PHPlife/Beporgrammer/Hi-Book/Final%20Project/bookdetail.php?idk=".$row['Id']."'>
                            <img src=$row[Image] >
                            <div class='overlay'>
                                <div class='textforbook'>$row[Name]</div>
                            </div>
                           
                    
                        </a>
                       
                        
                    </form>
              ";
}



?>