<?php
    
    require "connection.php";

    $viewQuery = "SELECT * FROM pdo_products";
    $viewPrepare = $conn->prepare($viewQuery);
    $viewPrepare->execute();

    $viewData = $viewPrepare->fetchAll(PDO::FETCH_ASSOC);


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
    <h1>Hello, world!</h1>
    <div class="container">
        <div class="row">

    <?php
    foreach($viewData as $row )
    {
    ?>
        
    <div class="card" style="width: 18rem;">
  <img src="images/<?= $row['prodImage']?>" class="card-img-top" alt="..." >
  <div class="card-body">
    <p class="card-text">Product Name: <?=$row['prodName']?></p>
    <p class="card-text">Product Price: <?=$row['prodPrice']?></p>
    <p class="card-text">Product Descriptions: <?=$row['prodDesc']?></p>
    <p class="card-text">Product Rating: <?=$row['prodRating']?></p>
  </div>
</div>


<?php } ?>



</div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>