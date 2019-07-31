<?php

$hostname = "localhost";
$user = "root";
$password = "";
$database = "dbatlas";
$connection = mysqli_connect($hostname, $user, $password, $database);


if(!$connection){
    print "database connection failed";

}




?>