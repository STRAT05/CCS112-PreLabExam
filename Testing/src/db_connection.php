<?php 
$server = "db";
$user = "user1";
$password = "pass1";
$database = "zieTestDB";

$conn = new mysqli($server, $user, $password, $database);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
