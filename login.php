<?php

include_once("connection.php");

$email = $_POST['loginEmail'];
$password = $_POST['loginPassword'];

$stm = "SELECT COUNT(email) AS counter FROM users WHERE email='$email' ";
$query = mysqli_query($connection, $stm);

$array = mysqli_fetch_array($query);

if ($array['counter'] > 0){
    header('Location: dashboard.php');
}else{
    header('Location: gpNotation.php');
}

$stmt->close();
mysqli_close($connection);

?>