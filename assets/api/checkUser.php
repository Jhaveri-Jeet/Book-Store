<?php
require "../includes/config.php";

$email = $_POST['email'];
$password = $_POST['password'];

$select = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($conn, $select);
$userData = mysqli_fetch_assoc($result);

if ($result > 0) {
    $_SESSION['userId'] = $userData['id'];
    header("Location: ../../index.php");
} else {
    header("Location: ../../pages/authentication-login.php");
}
