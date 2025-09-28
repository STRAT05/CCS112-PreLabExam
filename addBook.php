<!-- Adding books to the library (Title, Author, etc)--><!-- Adding books to the library (Title, Author, etc)-->
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
    <style>
        *{
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        #header{
            text-align: center;
            color: #000000ff;
            background: linear-gradient(to right, #7bf58cff, #1d961dff);
            width:100%;
            font-size: 28px;
            border-bottom: 5px solid #000000ff;
            border-image: linear-gradient(to right, #000000ff, #000000ff) 3;
            padding: 10px 0;
        }

        .labelBorder {
            border: 3px solid #ccc;
            border-radius: 4px;
            padding: 8px;
            width: 100%;
        }

        #addBtn {
            width: 50%;
            height: 35px;
            font-size: 16px;
            font-weight: bold;
            background-color: #c7f7c7ff;
            border: 2.5px solid #000000ff;
        }

        #backBtn {
            width: 150px;
            height: 35px;
            font-size: 16px;
            font-weight: bold;
            background-color: #f7c7c7ff;
            border: 2.5px solid #000000ff;
        }

    </style>
</head>
<body>
    <h1 id="header">Add Book</h1>
    <br><br>

    <?php if ($message) echo "<p><b>$message</b></p>"; ?>

    <form method="POST" style="max-width:400px; margin:auto; padding:20px; border:1px solid #ccc; border-radius:5px; text-align:center;">
        <label>Title:</label><br>
        <input type="text" name="title" required class="labelBorder"><br><br>

        <label>Author:</label><br>
        <input type="text" name="author" required class="labelBorder"><br><br>

        <label>Year Published:</label><br>
        <input type="number" min="1000" max="9999" name="year_published" required class="labelBorder"><br><br>

        <label>ISBN:</label><br>
        <input type="text" name="isbn" maxlength="13" required><br><br>

       <!--<label>Status:</label> -->
       <br>
        <input type="hidden" name="status" value="Available" required><br><br>

        <button type="submit" id="addBtn">Add Book</button>
    </form>
        <br><br>
    <h2 style="text-align:center;"><a href="librarianPage.php"><button id="backBtn">⬅ Back to Library</button></a></h2>
</body>
</html>
<?php $conn->close(); ?>