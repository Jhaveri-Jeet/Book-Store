<?php
require "../includes/config.php";

$name = $_POST['name'];
$password = $_POST['password'];

$select = "SELECT * FROM users WHERE name = '$name' AND password = '$password'";
$result = mysqli_query($conn, $select);

if ($result > 0) {
    $_SESSION['admin'] = "AdminLoginSuccess";
    header("Location: ../../index.php");
} else {
    header("Location: ../../pages/login.php");
}
