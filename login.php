<?php
session_start();
include_once("connection.php");

$email = $_POST['loginEmail'];
$password = $_POST['loginPassword'];



$stm = "SELECT email from users WHERE email=('$email')";

$query = mysqli_query($connection, $stm);
$row = mysqli_num_rows($query);


if($row > 0){
    $stmPassword = "SELECT * from users WHERE email=('$email')";
    $queryPassword = mysqli_query($connection, $stmPassword);
    $percorer = mysqli_fetch_array($queryPassword);
    $pass = $percorer['user_password'];
    $name = $percorer['name'];

    if (password_verify($password, $pass)) {
        header('Location: home.php');
        $_SESSION['user'] = $name;
        echo $_SESSION['user'];
        session_destroy(['noUser']);
    } else {

        $_SESSION['noUser']= true;
        exit();
    }
}else{
    echo "Usuário Inexistente";
}


mysqli_close($connection);

?>