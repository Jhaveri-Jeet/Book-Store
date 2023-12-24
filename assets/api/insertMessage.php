<?php
include '../includes/config.php';

$userId = $_SESSION['userId'];
$name = $_POST['name'];
$email = $_POST['email'];
$msg = $_POST['message'];

$insertMsg = mysqli_query($conn, "INSERT INTO `message` (user_id, name, email, message) VALUES ('$userId','$name', '$email', '$msg')");

if ($insertMsg > 0) {
    echo 'Message sent';
} else {
    echo 'Not sent';
}

header('location: ../../index.php');
