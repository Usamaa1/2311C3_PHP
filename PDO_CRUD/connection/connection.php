<?php


define("dsn","mysql:host=localhost;dbname=2311c3_products");
define("username","root");
define("password","");






try{

    // $conn = new PDO("mysql:host=localhost;dbname=2311c3_products","root","");
    $conn = new PDO(dsn,username,password);
    echo "connected successfully";
}
catch(PDOException $e){
    echo $e->getMessage();
}





?>