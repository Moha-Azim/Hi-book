<?php


require('../classes/cont.php');

if ($connection -> connect_error){
    die ("Error not connected");
}



$sql2 ="SELECT * FROM userinfo";



$show= $connection -> query($sql2);



while($row = $show -> fetch_assoc()){
   
  $sse = $sse."
  <tr>
  <th scope='row'> <a href='../AddDelete/edit-accounts.php?id=".$row['Id']."'> <i style='font-size:22px; color:#FFF;' class='far fa-edit'></i></a></th>
  <td n >$row[Email]</td>
  
  <td>$row[Fname]</td>
  <td>$row[Lname]</td>
  <td> $row[Id] </td>
  
  <td>
      <a href='../classes/acDelete.php?id=".$row['Id']."' class='tm-product-delete-link'>
          <i class='far fa-trash-alt tm-product-delete-icon'></i>
      </a>
  </td>
</tr>
";
}



?>