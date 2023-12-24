<?php

include('../includes/config.php');

$id = $_GET['id'];

$deleteCart = "DELETE FROM cart WHERE id = '$id'";
mysqli_query($conn, $deleteCart);

Header("Location: ../../pages/checkout.php");
