
<?php

   require 'connection.php';


   $updateId = $_GET['updateId'];



   
$viewQuery = "SELECT * FROM products WHERE prodId = '$updateId'";

$prodResult = mysqli_query($connection, $viewQuery);

$singleProduct = mysqli_fetch_assoc($prodResult);



if(isset($_POST['btn']))
{
  
  $prodName =  $_POST['prodName'];
  $prodPrice = $_POST['prodPrice'];
  $prodDesc =  $_POST['prodDesc'];
  

  $insertQuery = "UPDATE products SET prodName = '$prodName', prodPrice = '$prodPrice', prodDesc = '$prodDesc' WHERE prodId = '$updateId'";

  $result = mysqli_query($connection, $insertQuery);

  if($result){
   header("location: view.php");
  }


}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center">Update Products!</h1>

    <form action="" method="post">
        Product Name: <input type="text" name="prodName" value="<?= $singleProduct['prodName'];  ?>"> <br>
        Product Price: <input type="text" name="prodPrice" value="<?= $singleProduct['prodPrice'];  ?>"> <br>
        Product Description: <input type="text" name="prodDesc" value="<?= $singleProduct['prodDesc'];  ?>"> <br>
        <input class="btn btn-primary" type="submit" value="Update" name="btn">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>