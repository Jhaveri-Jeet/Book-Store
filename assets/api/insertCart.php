<?php
require "../includes/config.php";

$userId = $_SESSION['userId'];
$productId = $_POST['id'];
$price = $_POST['newPrice'];
$quantity = $_POST['quantity'];
$date = date("Y-m-d");

$insert = "INSERT INTO cart (user_id, product_id,price,quantity,date) VALUES ('$userId', '$productId', '$price', '$quantity', '$date')";
$result = mysqli_query($conn, $insert);

if ($result > 0)
    header("Location: ../../pages/user_products.php");
