<?php
// Connect to database
$conn = new mysqli("db", "user1", "pass1", "zieTestDB");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $conn->real_escape_string($_POST["title"]);
    $author = $conn->real_escape_string($_POST["author"]);
    $year_published = (int) $_POST["year_published"];
    $isbn = $conn->real_escape_string($_POST["isbn"]);
    $status = $conn->real_escape_string($_POST["status"]);

    $sql = "INSERT INTO Books (title, author, year_published, isbn, status) 
            VALUES ('$title', '$author', $year_published, '$isbn', '$status')";

    if ($conn->query($sql)) {
        $message = "✅ Book added successfully!";
    } else {
        $message = "❌ Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Book</title>
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
        /* Center form */
        main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 60px); /* subtract header height */
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
            background: #007bff;
            padding: 8px 12px;
            border-radius: 4px;
            color: white;
            text-decoration: none;
        }
        .back-btn:hover { background: #0056b3; }
        .msg { margin-bottom: 10px; font-weight: bold; }
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
            <h3>Add a New Book</h3>
            <?php if ($message) echo "<p class='msg'>$message</p>"; ?>
            <form method="POST" action="addbook.php">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>

                <label for="author">Author:</label>
                <input type="text" id="author" name="author" required>

                <label for="year_published">Year Published:</label>
                <input type="number" min="1000" max="9999" id="year_published" name="year_published" required>

                <label for="isbn">ISBN:</label>
                <input type="text" id="isbn" name="isbn" maxlength="13" required>

                <input type="hidden" name="status" value="Available">

                <button type="submit">Add Book</button>
            </form>
            <a class="back-btn" href="librarianPage.php">⬅ Back to Library</a>
        </div>
    </main>
</body>
</html>
<?php $conn->close(); ?>
