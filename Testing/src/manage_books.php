<?php 
require_once __DIR__ . '/db_connection.php'; 

// Handle adding books
if (isset($_POST['submit'])) {
    $stmt = $conn->prepare("INSERT INTO books (book_name, book_author, year_published, status) VALUES (?, ?, ?, 'Available')");
    $stmt->bind_param("sss", $_POST['book_name'], $_POST['book_author'], $_POST['year_published']);
    $stmt->execute();
    $stmt->close();

    // Redirect back to catalog after adding
    header("Location: catalog.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Books</title>
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
        <h3>Add a New Book</h3>
        <form method="POST" action="manage_books.php">
            <label for="book_name">Book Name:</label>
            <input type="text" id="book_name" name="book_name" required>

            <label for="book_author">Book Author:</label>
            <input type="text" id="book_author" name="book_author" required>

            <label for="year_published">Year Published:</label>
            <input type="date" id="year_published" name="year_published" required>

            <button type="submit" name="submit">Add Book</button>
        </form>

        <a class="back-btn" href="catalog.php">Back to Catalog</a>
    </div>
</body>
</html>
