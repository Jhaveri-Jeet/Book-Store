<?php
require "../includes/config.php";

$name = $_POST['name'];
$number = $_POST['number'];
$email = $_POST['email'];
$password = $_POST['password'];

$insert = "INSERT INTO users (name, number, email, password) VALUES ('$name', '$number', '$email', '$password')";
$result = mysqli_query($conn, $insert);

if ($result > 0)
    header("Location: ../../pages/authentication-login.php");
