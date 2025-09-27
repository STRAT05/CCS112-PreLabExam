<?php
// Adding books to the library (Title, Author, Year Published, ISBN, Status)

// Connect to database
$conn = new mysqli("db", "root", "rootpassword", "preExamGroup");
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
<html>
<head>
    <title>Add Book</title>
</head>
<body>
    <h1 style="text-align:center;">Add Book</h1>

    <?php if ($message) echo "<p><b>$message</b></p>"; ?>

    <form method="POST" style="max-width:400px; margin:auto; padding:20px; border:1px solid #ccc; border-radius:5px; text-align:center;">
        <label>Title:</label><br>
        <input type="text" name="title" required><br><br>

        <label>Author:</label><br>
        <input type="text" name="author" required><br><br>

        <label>Year Published:</label><br>
        <input type="number" min="1000" max="9999" name="year_published" required><br><br>

        <label>ISBN:</label><br>
        <input type="text" name="isbn" maxlength="13" required><br><br>

        <label>Status:</label><br>
        <input type="text" name="status" value="Available" required><br><br>

        <button type="submit">Add Book</button>
    </form>

    <h2 style="text-align:center;"><a href="librarianPage.php"><button>⬅ Back to Library</button></a></h2>
</body>
</html>
<?php $conn->close(); ?>