<?php 

  // require '../connection/connection.php'

?>


<?php

  $id = $_GET['id'];

  $deleteQuery = "DELETE FROM `categories` WHERE category_id = :id";
  $deletePrepare = $connect->prepare($deleteQuery);
  $deletePrepare->bindParam(':id',$id,PDO::PARAM_INT);
  
  if($deletePrepare->execute())
  {
    header('location:viewCategory.php');
  }



?>