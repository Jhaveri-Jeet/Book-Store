<?php

include('../includes/config.php');

$name = $_POST['name'];
$author = $_POST['author'];
$description = $_POST['description'];
$price = $_POST['price'];
$image = $_FILES['image'];

$time = time();
$fileName = "$time-" . $_FILES['image']['name'];
$tmpFileName = $_FILES['image']['tmp_name'];

$fileUploaded = move_uploaded_file($tmpFileName, pathOf("assets/uploaded_img/$fileName"));

if (!$fileUploaded) {
    echo json_encode(["status" => false, "message" => "Error uploading file."]);
    exit();
}


$insertProduct = "INSERT INTO `products` (`name`, `author`,`price`,`description`,`image`) VALUES ('$name', '$author', '$price','$description','$fileName') ";
mysqli_query($conn, $insertProduct);

mysqli_close($conn);

Header("Location: ../../pages/products.php");
