<?php 
require_once __DIR__ . '/db_connection.php'; 
$id = intval($_GET['id']);
$stmt = $conn->prepare("UPDATE books SET status='Available' WHERE book_id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();
header("Location: catalog.php");
exit();
?>
