<?php 
require_once __DIR__ . '/db_connection.php'; 
$id = intval($_GET['id']);

// Get book data
$stmt = $conn->prepare("SELECT * FROM books WHERE book_id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$book = $result->fetch_assoc();
$stmt->close();

// Handle update
if (isset($_POST['update'])) {
    $stmt = $conn->prepare("UPDATE books SET book_name=?, book_author=?, year_published=? WHERE book_id=?");
    $stmt->bind_param("sssi", $_POST['book_name'], $_POST['book_author'], $_POST['year_published'], $id);
    $stmt->execute();
    $stmt->close();

    // Redirect to catalog after success
    header("Location: catalog.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Book</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-box {
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
            width: 350px;
            text-align: center;
        }
        h3 { margin-bottom: 15px; color: #333; }
        label { display: block; text-align: left; margin-bottom: 5px; font-weight: bold; }
        input {
            width: 100%; padding: 8px; margin-bottom: 15px;
            border: 1px solid #ccc; border-radius: 4px;
        }
        button {
            width: 100%; padding: 10px;
            background: #28a745; color: white;
            border: none; border-radius: 4px;
            cursor: pointer; font-size: 15px;
        }
        button:hover { background: #218838; }
        .back-btn {
            display: inline-block;
            margin-top: 10px;
            background: #28a745;
            padding: 8px 12px;
            border-radius: 4px;
            color: white;
            text-decoration: none;
        }
        .back-btn:hover { background: #218838; }
    </style>
</head>
<body>
    <div class="form-box">
        <h3>Edit Book</h3>

        <form method="POST" action="">
            <label for="book_name">Book Name:</label>
            <input type="text" id="book_name" name="book_name" value="<?= htmlspecialchars($book['book_name']) ?>" required>

            <label for="book_author">Book Author:</label>
            <input type="text" id="book_author" name="book_author" value="<?= htmlspecialchars($book['book_author']) ?>" required>

            <label for="year_published">Year Published:</label>
            <input type="date" id="year_published" name="year_published" value="<?= htmlspecialchars($book['year_published']) ?>" required>

            <button type="submit" name="update">Update Book</button>
        </form>

        <a class="back-btn" href="catalog.php">Back to Catalog</a>
    </div>
</body>
</html>
