<?php

include('../includes/config.php');

$id = $_GET['id'];

$delete = "DELETE FROM message WHERE id = '$id'";
mysqli_query($conn, $delete);

Header("Location: ../../pages/message.php");
