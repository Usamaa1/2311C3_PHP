<<<<<<< HEAD
<?php

require("connection/connection.php");



$delId= $_GET['delId'];

$deleteQuery= "DELETE FROM pdo_users WHERE userId = :delId";

$deletePrepare = $conn->prepare($deleteQuery);

$deletePrepare->bindParam(":delId", $delId, PDO::PARAM_INT);

if($deletePrepare->execute())
{
    header("location: view.php");
}
else
{
    echo "Deletion Failed";
}







=======
<?php

require("connection/connection.php");



$delId= $_GET['delId'];

$deleteQuery= "DELETE FROM pdo_users WHERE userId = :delId";

$deletePrepare = $conn->prepare($deleteQuery);

$deletePrepare->bindParam(":delId", $delId, PDO::PARAM_INT);

if($deletePrepare->execute())
{
    header("location: view.php");
}
else
{
    echo "Deletion Failed";
}







>>>>>>> c5505b415c11d199844f0745284bfddd0885f7b0
?>