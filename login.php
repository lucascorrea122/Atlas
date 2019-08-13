<?php

include_once("connection.php");

$email = $_POST['loginEmail'];
$password = $_POST['loginPassword'];



$stm = "SELECT email from users WHERE email=('$email')";

$query = mysqli_query($connection, $stm);
$row = mysqli_num_rows($query);


if($row > 0){
    $stmPassword = "SELECT user_password from users WHERE email=('$email')";
    $queryPassword = mysqli_query($connection, $stmPassword);
    $percorer = mysqli_fetch_array($queryPassword);
    $word = $percorer['user_password'];

    if (password_verify($password, $word)) {
        echo "password correct <br/><br/><br/><br/>";
    } else {
        echo "password incorret ";
    }
}else{
    echo "Usuário Inexistente";
}


mysqli_close($connection);

?>