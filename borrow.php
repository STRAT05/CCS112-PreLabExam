<?php 
$conn = new mysqli("db", "root", "rootpassword", "preExamGroup");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = intval($_GET['id']);
$stmt = $conn->prepare("UPDATE Books SET status='Borrowed' WHERE id=? AND status='Available'");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();
header("Location: userPage.php");
exit();
?>
