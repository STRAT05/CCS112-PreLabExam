<?php
$conn = new mysqli("db", "user1", "pass1", "zieTestDB");
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
    <title>Edit Book</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            margin: 0;
        }
        /* Header */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #007bff;
            color: white;
            padding: 15px 20px;
        }
        header .left {
            font-size: 20px;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        header .right a {
            margin-left: 15px;
            text-decoration: none;
            font-weight: bold;
            color: white;
        }
        header .right a:hover { text-decoration: underline; }
        /* Centered Form */
        main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 60px);
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
        label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input, select {
            width: 100%; 
            padding: 8px; 
            margin-bottom: 15px;
            border: 1px solid #ccc; 
            border-radius: 4px;
        }
        button {
            width: 100%; 
            padding: 10px;
            background: #28a745; 
            color: white;
            border: none; 
            border-radius: 4px;
            cursor: pointer; 
            font-size: 15px;
        }
        button:hover { background: #218838; }
        .back-btn {
            display: inline-block;
            margin-top: 10px;
            background: #007bff;
            padding: 8px 12px;
            border-radius: 4px;
            color: white;
            text-decoration: none;
        }
        .back-btn:hover { background: #0056b3; }
    </style>
</head>
<body>
    <!-- Navigation Header -->
    <header>
        <div class="left">
            📚 Library Management System
        </div>
        <div class="right">
            <a href="addBook.php">Add Book</a>
            <a href="index.php">Logout</a>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <div class="form-box">
            <h3>Edit Book</h3>
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
            <a class="back-btn" href="librarianPage.php">⬅ Back to Catalog</a>
        </div>
    </main>
</body>
</html>
