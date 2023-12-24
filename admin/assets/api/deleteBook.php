<?php

include('../includes/config.php');

$id = $_GET['id'];

$deleteBook = "DELETE FROM products WHERE id = '$id'";
mysqli_query($conn, $deleteBook);

Header("Location: ../../pages/products.php");
