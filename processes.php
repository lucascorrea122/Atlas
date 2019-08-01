<?php

include_once("connection.php");


$stmt = $connection->prepare("INSERT INTO users (name, email, user_password, area) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sssi", $name, $email, $passwordHash, $area);

$options = array('cost' => 11);

$name = $_POST['name'];
$area = $_POST['selectArea'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordHash = password_hash($password, PASSWORD_BCRYPT, $options);


$pass = "gaga";

$stmt->execute();

if (password_verify($password, $passwordHash)) {
    echo "password correct <br/><br/><br/><br/>";
} else {
    echo "password incorret ";
}


if (password_verify($pass, $passwordHash)) {
    echo "password correct <br/><br/><br/><br/>";
} else {
    echo "password incorret ";
}


$stmt->close();
mysqli_close($connection);


?>