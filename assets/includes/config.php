<?php

date_default_timezone_set('Asia/Kolkata');

$host = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore_db";

$conn = mysqli_connect($host, $username, $password, $dbname);

define("BASE_DIR", $_SERVER['DOCUMENT_ROOT'] . "/BookStore");
define("BASE_URL", "/BookStore");

function pathOf($path)
{
    return BASE_DIR . "/" . $path;
}

function urlOf($path)
{
    return BASE_URL . '/' . $path;
}

session_start();
