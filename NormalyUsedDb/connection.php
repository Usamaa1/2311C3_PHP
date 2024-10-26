<?php

try
{
   $connection = mysqli_connect('localhost','root','','2311c3_products');
    // echo "connected Successfully";
}
catch (Exception $e)
{
    echo $e->getMessage();
}




?>