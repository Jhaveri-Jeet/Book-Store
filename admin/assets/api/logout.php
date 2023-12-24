<?php
require "../includes/config.php";

session_destroy();

header("Location: ../../pages/login.php");
