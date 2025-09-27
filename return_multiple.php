<?php
require_once __DIR__ . '/db_connection.php';

if (isset($_POST['selected_books']) && is_array($_POST['selected_books'])) {
    $selectedBooks = $_POST['selected_books'];

    // Prepare statement
    $stmt = $conn->prepare("UPDATE books SET status='Available' WHERE book_id=?");

    foreach ($selectedBooks as $bookId) {
        $id = intval($bookId);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
    $stmt->close();
}

// Redirect back to borrowed_books.php
header("Location: borrowed_books.php");
exit();
?>
