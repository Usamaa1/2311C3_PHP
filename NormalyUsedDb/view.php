<<<<<<< HEAD
<?php

require("connection.php");

$viewQuery = "SELECT * FROM products";

$result = mysqli_query($connection, $viewQuery);

// $row = mysqli_fetch_assoc($result);



// echo "<pre>";
// print_r($row);
// echo "</pre>";



// foreach($result as $row) {

//     echo $row['prodName'];

// }

// foreach($result as $row) {

//     echo $row['prodName'];

// }




    // while ($row = mysqli_fetch_assoc($result)) {

    //     echo "<br>". $row['prodName'];
    //     echo "<br>". $row['prodPrice'];
    //     echo "<br>". $row['prodDesc'];
    
    // }






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
    <h1 class="text-center">All Products!</h1>


    <div class="container">
        <div class="row g-5">


        <?php 
        
        foreach ($result as $row) {
        
        ?>

            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $row['prodName'];  ?></h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary"><?= $row['prodPrice'];  ?></h6>
                    <p class="card-text"><?= $row['prodDesc'];  ?></p>
                    <a href="update.php?updateId=<?= $row['prodId'] ?>" class="btn btn-warning">Update</a>
                    <a href="delete.php?delId=<?= $row['prodId'] ?>" class="btn btn-danger">Delete</a>
                </div>
            </div>


            <?php
            
        }
            
            ?>

        </div>
    </div>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

































<!-- 

<?php

require("connection.php");

$viewQuery = "SELECT * FROM products";
$result = mysqli_query($connection, $viewQuery);

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
    <h1 class="text-center">All Products!</h1>
    <div class="container">
        <div class="row g-5">

        <?php 
        
        foreach ($result as $row) {
        
        ?>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $row['prodName'];  ?></h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary"><?= $row['prodPrice'];  ?></h6>
                    <p class="card-text"><?= $row['prodDesc'];  ?></p>
                    <a href="#" class="btn btn-warning">Update</a>
                    <a href="#" class="btn btn-danger">Delete</a>
                </div>
            </div>

            <?php } ?>

        </div>
    </div>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

=======
<?php

require("connection.php");

$viewQuery = "SELECT * FROM products";

$result = mysqli_query($connection, $viewQuery);

// $row = mysqli_fetch_assoc($result);



// echo "<pre>";
// print_r($row);
// echo "</pre>";



// foreach($result as $row) {

//     echo $row['prodName'];

// }

// foreach($result as $row) {

//     echo $row['prodName'];

// }




    // while ($row = mysqli_fetch_assoc($result)) {

    //     echo "<br>". $row['prodName'];
    //     echo "<br>". $row['prodPrice'];
    //     echo "<br>". $row['prodDesc'];
    
    // }






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
    <h1 class="text-center">All Products!</h1>


    <div class="container">
        <div class="row g-5">


        <?php 
        
        foreach ($result as $row) {
        
        ?>

            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $row['prodName'];  ?></h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary"><?= $row['prodPrice'];  ?></h6>
                    <p class="card-text"><?= $row['prodDesc'];  ?></p>
                    <a href="update.php?updateId=<?= $row['prodId'] ?>" class="btn btn-warning">Update</a>
                    <a href="delete.php?delId=<?= $row['prodId'] ?>" class="btn btn-danger">Delete</a>
                </div>
            </div>


            <?php
            
        }
            
            ?>

        </div>
    </div>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

































<!-- 

<?php

require("connection.php");

$viewQuery = "SELECT * FROM products";
$result = mysqli_query($connection, $viewQuery);

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
    <h1 class="text-center">All Products!</h1>
    <div class="container">
        <div class="row g-5">

        <?php 
        
        foreach ($result as $row) {
        
        ?>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $row['prodName'];  ?></h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary"><?= $row['prodPrice'];  ?></h6>
                    <p class="card-text"><?= $row['prodDesc'];  ?></p>
                    <a href="#" class="btn btn-warning">Update</a>
                    <a href="#" class="btn btn-danger">Delete</a>
                </div>
            </div>

            <?php } ?>

        </div>
    </div>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

>>>>>>> c5505b415c11d199844f0745284bfddd0885f7b0
</html> -->