<?php 

    require "connection/connection.php";

    $cartId = $_GET['cartId'];

    $deleteQuery = 'DELETE FROM `cart` WHERE cart_id = :cartId';
    $deletePrepare = $connect->prepare($deleteQuery);
    $deletePrepare->bindParam(':cartId',$cartId, PDO::PARAM_INT);
    if($deletePrepare->execute())
    {
        header('location:cart.php');
    }


?>