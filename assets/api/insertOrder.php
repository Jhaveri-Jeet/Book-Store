<?php
require "../includes/config.php";

$userId = $_SESSION['userId'];
$cartId = $_GET['id'];
$amount = $_GET['amount'];
$quantity = $_GET['quantity'];
$date = date("Y-m-d");

$update = "UPDATE cart SET status= 'Purchased' WHERE id = '$cartId'";
$resultUpdate = mysqli_query($conn, $update);

$insert = "INSERT INTO orders (user_id, cart_id,amount,quantity,date) VALUES ('$userId', '$cartId', '$amount', '$quantity', '$date')";
$result = mysqli_query($conn, $insert);

if ($result > 0)
    header("Location: ../../pages/checkout.php");
