<?php





if(isset($_POST['btn']))
{
  
  
  $prodName =  $_GET['prodName'];
  $prodPrice = $_GET['prodPrice'];
  $prodDesc =  $_GET['prodDesc'];
  
  
//   $prodName =  $_POST['prodName'];
//   $prodPrice = $_POST['prodPrice'];
//   $prodDesc =  $_POST['prodDesc'];
  
  
  echo '<br>'.$prodName.'<br>'.$prodPrice.'<br>'.$prodDesc. '<br>';
  // echo "$prodName";
















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
    <h1 class="text-center">Add Products!</h1>



    <form action="" method="get">
        Product Name: <input type="text" name="prodName" > <br>
        Product Price: <input type="text" name="prodPrice"> <br>
        Product Description: <input type="text" name="prodDesc"> <br>
        <input type="submit" value="submit" name="btn">
    </form>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>