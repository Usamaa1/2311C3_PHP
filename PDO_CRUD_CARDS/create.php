<?php

    require "connection.php";


    if(isset($_POST['btn'])){
        $prodName = $_POST['prodName'];
        $prodPrice = $_POST['prodPrice'];
        $prodDesc = $_POST['prodDesc'];
        $prodRating = $_POST['prodRating'];
        $prodImage = $_FILES['prodImage'];
        echo '<pre>';
        print_r($prodImage);
        echo '</pre>';
        if($prodImage['size'] > 5000000){
            echo "<script>alert('Your image size is to big')</script>";
        }
        else{
            $extension = explode(".", $prodImage["name"]);
            $extension = $extension[1];
            $imageUniqueName = uniqid();
            print_r($imageUniqueName);
            $imageName = $imageUniqueName . "." . $extension;
            print_r($imageName);
            move_uploaded_file($prodImage['tmp_name'], "images/".$imageName);



            $createQuery = "INSERT INTO pdo_products (prodName, prodPrice, prodDesc, prodRating, prodImage) VALUES(:prodName, :prodPrice, :prodDesc, :prodRating, :prodImage)";

            $insertPrepare = $conn->prepare($createQuery);

            $insertPrepare->bindParam(":prodName",$prodName, PDO::PARAM_STR);
            $insertPrepare->bindParam(":prodPrice",$prodPrice, PDO::PARAM_INT);
            $insertPrepare->bindParam(":prodDesc",$prodDesc, PDO::PARAM_STR);
            $insertPrepare->bindParam(":prodRating",$prodRating);
            $insertPrepare->bindParam(":prodImage",$imageName, PDO::PARAM_STR);

            if($insertPrepare->execute()){
                echo "<script>alert('Your Data Insert Succefully')</script>";
            }
            else{
                echo "Your Data Insert failed";
            }


            
        }

        
       
    }




?>









<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PDO CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center">User Registration Form!</h1>
    <div class="container">
        <div class="row">
            <form class="row g-3" method="post" enctype="multipart/form-data">
                <div class="col-md-12">
                    <label for="inputEmail4" class="form-label">Products Name</label>
                    <input type="text" class="form-control" name="prodName">
                </div>
                <div class="col-md-12">
                    <label for="inputEmail4" class="form-label">Products Price</label>
                    <input type="text" class="form-control" name="prodPrice">
                </div>
                <div class="col-md-12">
                    <label for="inputPassword4" class="form-label">Products Descriptions</label>
                    <input type="text" class="form-control" name="prodDesc">
                </div>
                <div class="col-md-12">
                    <label for="inputCity" class="form-label">Products Rating</label>
                    <input type="text" class="form-control" name="prodRating">
                </div>
                <div class="col-md-12">
                    <label for="inputCity" class="form-label">Products Image</label>
                    <input type="file" class="form-control" name="prodImage" accept="image/png,image/jpg,image/jpeg">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary" name="btn">Register</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>