<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "bank";

//create the connection
$con = mysqli_connect($server,$username,$password,$database);

//check if connection is successfull
if(!$con)
{
    die("connection to database failed due to ".mysqli_connect_error());
}

//echo "success conn";

?>