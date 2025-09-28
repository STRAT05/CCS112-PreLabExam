<?php
$conn = new mysqli("db", "root", "rootpassword", "preExamGroup");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = isset($_POST['edit_id']) ? intval($_POST['edit_id']) : 0;

// handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $id = intval($_POST["id"]);
    $title = $conn->real_escape_string($_POST["title"]);
    $author = $conn->real_escape_string($_POST["author"]);
    $isbn = $conn->real_escape_string($_POST["isbn"]);
    $status = $conn->real_escape_string($_POST["status"]);

    $conn->query("UPDATE Books SET title='$title', author='$author', isbn='$isbn', status='$status' WHERE id=$id");
    header("Location: librarianPage.php");
    exit();
}
// fetch book details
if ($id > 0) {
    $stmt = $conn->prepare("SELECT * FROM Books WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $book = $result->fetch_assoc();
    $stmt->close();
} else {
    die("Invalid book ID.");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Book</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background: #f9f9f9;
                padding: 20px;
            }
            h2 { color: #333; }
            form {
                background: #fff;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0,0,0,0.1);
                width: 400px;
            }
            label {
                display: block;
                margin-bottom: 8px;
                font-weight: bold;
            }
            input[type="text"], select {
                width: 100%;
                padding: 8px;
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 4px;
            }
            button {
                background-color: #28a745;
                color: white;
                padding: 10px 15px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
            button:hover {
                background-color: #218838;
            }
            .back-btn {
                background:#007bff;
                padding:8px 15px;
                border-radius:4px;
                text-decoration:none;
                color:white;
                margin-bottom:15px;
                display:inline-block;
            }
            .back-btn:hover { background:#0056b3; }
        </style>
    </head>
    <body>
        <a href="librarianPage.php" class="back-btn">Back to Catalog</a>
        <h2>Edit Book</h2>
        <form method="post" action="">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($book['id']); ?>">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($book['title']); ?>" required>

            <label for="author">Author:</label>
            <input type="text" id="author" name="author" value="<?php echo htmlspecialchars($book['author']); ?>" required>

            <label for="isbn">ISBN:</label>
            <input type="text" id="isbn" name="isbn" value="<?php echo htmlspecialchars($book['isbn']); ?>" required>

            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="available" <?php if ($book['status'] == 'available') echo 'selected'; ?>>Available</option>
                <option value="borrowed" <?php if ($book['status'] == 'borrowed') echo 'selected'; ?>>Borrowed</option>
            </select>

            <button type="submit" name="update">Update Book</button>
        </form>