<?php
$conn = new mysqli("db", "user1", "pass1", "zieTestDB");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['selected_books']) && is_array($_POST['selected_books'])) {
    $selectedBooks = $_POST['selected_books'];

    // Prepare statement
    $stmt = $conn->prepare("UPDATE Books SET status='Available' WHERE id=?");

    foreach ($selectedBooks as $bookId) {
        $id = intval($bookId);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
    $stmt->close();
}

// Redirect back to borrowed_books.php
header("Location: borrowedCatalog.php");
exit();
?>