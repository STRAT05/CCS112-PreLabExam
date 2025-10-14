<?php 
$server = "db";
$user = "userEcommerce";
$password = "passEcommerce";
$database = "mainDataBase";

$conn = new mysqli($server, $user, $password, $database);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
