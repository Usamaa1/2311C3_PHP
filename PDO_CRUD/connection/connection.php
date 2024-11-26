<<<<<<< HEAD
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





=======
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





>>>>>>> c5505b415c11d199844f0745284bfddd0885f7b0
?>