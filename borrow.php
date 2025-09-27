<?php 
require_once __DIR__ . '/db_connection.php'; 
$id = intval($_GET['id']);
$stmt = $conn->prepare("UPDATE books SET status='Borrowed' WHERE book_id=? AND status='Available'");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();
header("Location: catalog.php");
exit();
?>
