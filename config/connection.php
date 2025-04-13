<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "posknjt";


$connect = new mysqli($host, $username, $password, $db);

if ($connect->connect_error)
{
    die("Connection Error : " . $conn->connect_error);
}
