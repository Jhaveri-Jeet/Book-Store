<?php
include '../includes/config.php';

$id = $_POST["id"];
$name = $_POST["name"];
$email = $_POST["email"];
$number = $_POST["number"];
$address = $_POST["address"];
$password = $_POST["password"];

$query = "UPDATE users SET name = '$name', email = '$email' , number = '$number', address = '$address', password = '$password' WHERE id = $id";
$result = mysqli_query($conn, $query);

header("location: ../../pages/updateProfile.php");
