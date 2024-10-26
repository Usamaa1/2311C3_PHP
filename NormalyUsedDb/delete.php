<?php

require "connection.php";



$delId = $_GET['delId'];



$deleteQuery = "DELETE FROM products WHERE prodId = '$delId'";

$result = mysqli_query($connection, $deleteQuery);



header("location: view.php");




?>