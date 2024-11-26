<<<<<<< HEAD

<?php

require "connection/connection.php";

// VIEWING DATA START

$upId = $_GET['upId'];

$viewQuery = "SELECT * FROM pdo_users WHERE userId = :id";

$viewPrepare = $conn->prepare($viewQuery);

$viewPrepare->bindParam(':id', $upId, PDO::PARAM_INT);

$viewPrepare->execute();

$viewData = $viewPrepare->fetchAll(PDO::FETCH_ASSOC);

$viewData = $viewData[0];

echo "<pre>";
print_r($viewData);
echo "</pre>";
// VIEWING DATA END


// UPDATING DATA START
if(isset($_POST['btn']))
{
    $userName = $_POST['userName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $city = $_POST['city'];



    $userImage = $_FILES['userImage'];


// echo "<pre>";
// print_r($userImage);
// echo "</pre>";

// echo empty($userImage["name"]) ? "Image Not Found" : "Image Found";

// $image = empty($userImage["name"]) ?  $viewData["userImage"] : $userImage["name"];

// echo $image;



if($userImage['size'] > 5000000)
{
    echo "<script>alert('Your Image size is too large')</script>";
}
else
{

    $extension = explode(".",$userImage['name']);

    // print_r($extension);

    $extension = $extension[1];

    echo $extension;



    $imageUniqueName = uniqid();
    echo $imageUniqueName;

    $imageName = $imageUniqueName . "." . $extension;

    // echo "<br>";
    // echo $imageName;

    move_uploaded_file($userImage["tmp_name"],"images/".$imageName);
    $image = empty($userImage["name"]) ?  $viewData["userImage"] : $imageName;
    
    
    
    $updateQuery = "UPDATE pdo_users SET username = :username, email = :email, password = :pass, city = :city, userImage = :userImage WHERE userId = :userId";
    
    $updatePrepare = $conn->prepare($updateQuery);
    
    
    
    $updatePrepare->bindParam(":username",$userName, PDO::PARAM_STR);
    $updatePrepare->bindParam(":email",$email, PDO::PARAM_STR);
    $updatePrepare->bindParam(":pass",$password, PDO::PARAM_STR);
    $updatePrepare->bindParam(":city",$city, PDO::PARAM_STR);
    $updatePrepare->bindParam(":userImage",$image, PDO::PARAM_STR);
    $updatePrepare->bindParam(":userId",$upId, PDO::PARAM_STR);
    
    
    if($updatePrepare->execute())
    {
        header("location:view.php");
    }
}
    
}
// UPDATING DATA END




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
    <h1 class="text-center">User Update!</h1>
    <div class="container">
        <div class="row">
            <form class="row g-3" method="post" enctype="multipart/form-data">
                <div class="col-md-12">
                    <label for="inputEmail4" class="form-label">Username</label>
                    <input type="text" class="form-control" name="userName" value="<?= $viewData['username'] ?>">
                </div>
                <div class="col-md-12">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="<?= $viewData['email'] ?>">
                </div>
                <div class="col-md-12">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" value="<?= $viewData['password'] ?>">
                </div>
                <div class="col-md-12">
                    <label for="inputCity" class="form-label">City</label>
                    <input type="text" class="form-control" name="city" value="<?= $viewData['city'] ?>">
                </div>
                <div class="col-md-12">
                    <label for="inputCity" class="form-label">User Image</label>
                    <input type="file" class="form-control" name="userImage">
                    <img width="100px" src="images/<?= $viewData['userImage'] ?>" alt="" srcset="">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary" name="btn">Update User</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

=======

<?php

require "connection/connection.php";

// VIEWING DATA START

$upId = $_GET['upId'];

$viewQuery = "SELECT * FROM pdo_users WHERE userId = :id";

$viewPrepare = $conn->prepare($viewQuery);

$viewPrepare->bindParam(':id', $upId, PDO::PARAM_INT);

$viewPrepare->execute();

$viewData = $viewPrepare->fetchAll(PDO::FETCH_ASSOC);

$viewData = $viewData[0];

echo "<pre>";
print_r($viewData);
echo "</pre>";
// VIEWING DATA END


// UPDATING DATA START
if(isset($_POST['btn']))
{
    $userName = $_POST['userName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $city = $_POST['city'];



    $userImage = $_FILES['userImage'];


// echo "<pre>";
// print_r($userImage);
// echo "</pre>";

// echo empty($userImage["name"]) ? "Image Not Found" : "Image Found";

// $image = empty($userImage["name"]) ?  $viewData["userImage"] : $userImage["name"];

// echo $image;



if($userImage['size'] > 5000000)
{
    echo "<script>alert('Your Image size is too large')</script>";
}
else
{

    $extension = explode(".",$userImage['name']);

    // print_r($extension);

    $extension = $extension[1];

    echo $extension;



    $imageUniqueName = uniqid();
    echo $imageUniqueName;

    $imageName = $imageUniqueName . "." . $extension;

    // echo "<br>";
    // echo $imageName;

    move_uploaded_file($userImage["tmp_name"],"images/".$imageName);
    $image = empty($userImage["name"]) ?  $viewData["userImage"] : $imageName;
    
    
    
    $updateQuery = "UPDATE pdo_users SET username = :username, email = :email, password = :pass, city = :city, userImage = :userImage WHERE userId = :userId";
    
    $updatePrepare = $conn->prepare($updateQuery);
    
    
    
    $updatePrepare->bindParam(":username",$userName, PDO::PARAM_STR);
    $updatePrepare->bindParam(":email",$email, PDO::PARAM_STR);
    $updatePrepare->bindParam(":pass",$password, PDO::PARAM_STR);
    $updatePrepare->bindParam(":city",$city, PDO::PARAM_STR);
    $updatePrepare->bindParam(":userImage",$image, PDO::PARAM_STR);
    $updatePrepare->bindParam(":userId",$upId, PDO::PARAM_STR);
    
    
    if($updatePrepare->execute())
    {
        header("location:view.php");
    }
}
    
}
// UPDATING DATA END




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
    <h1 class="text-center">User Update!</h1>
    <div class="container">
        <div class="row">
            <form class="row g-3" method="post" enctype="multipart/form-data">
                <div class="col-md-12">
                    <label for="inputEmail4" class="form-label">Username</label>
                    <input type="text" class="form-control" name="userName" value="<?= $viewData['username'] ?>">
                </div>
                <div class="col-md-12">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="<?= $viewData['email'] ?>">
                </div>
                <div class="col-md-12">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" value="<?= $viewData['password'] ?>">
                </div>
                <div class="col-md-12">
                    <label for="inputCity" class="form-label">City</label>
                    <input type="text" class="form-control" name="city" value="<?= $viewData['city'] ?>">
                </div>
                <div class="col-md-12">
                    <label for="inputCity" class="form-label">User Image</label>
                    <input type="file" class="form-control" name="userImage">
                    <img width="100px" src="images/<?= $viewData['userImage'] ?>" alt="" srcset="">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary" name="btn">Update User</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

>>>>>>> c5505b415c11d199844f0745284bfddd0885f7b0
</html>