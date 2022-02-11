<?php


require('../classes/cont.php');

if ($connection -> connect_error){
    die ("Error not connected");
}



$sql2 ="SELECT * FROM books";



$show= $connection -> query($sql2);



while($row = $show -> fetch_assoc()){
    if($row['Price'] == 0){
        $row['Price']='Free';
    }
  $sse = $sse."
  <tr>
  <th scope='row'> <a href='../AddDelete/edit-product.php?id=".$row['Id']."'> <i style='font-size:22px; color:#FFF;' class='far fa-edit'></i></a></th>
  <td n >$row[Name]</td>
  
  <td>$row[Price]</td>
  <td>$row[Pages]</td>
  <td> <a style='text-decoration:underline;' href= 'http://localhost/PHPlife/Beporgrammer/Hi-Book/Final%20Project/bookdetail.php?idk=".$row['Id']."'>$row[Id]</a> </td>
  
  <td>
      <a href='../classes/delete.php?id=".$row['Id']."'  class='tm-product-delete-link'>
          <i class='far fa-trash-alt'></i>
      </a>
  </td>
</tr>
";
}



?>