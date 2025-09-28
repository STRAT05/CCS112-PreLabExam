<?php
$conn = new mysqli("db", "user1", "pass1", "zieTestDB");
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

// handle remove
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_id"])) {
    $id = intval($_POST["delete_id"]);
    $conn->query("DELETE FROM Books WHERE id = $id");
}

// handle Search
$searchQuery = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search"])) {
    $searchTerm = $conn->real_escape_string($_POST["search"]);
    $searchQuery = "WHERE title LIKE '%$searchTerm%' OR
                    author LIKE '%$searchTerm%' OR
                    year_published LIKE '%$searchTerm%' OR
                    isbn LIKE '%$searchTerm%'";
}

// fetch books
$sql = "SELECT * FROM Books $searchQuery ORDER BY id DESC";
$books = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Library Catalog</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background:#f9f9f9;
            margin:0;
        }
        header {
            display:flex;
            justify-content:space-between;
            align-items:center;
            background:#007bff;
            color:white;
            padding:15px 20px;
        }
        header .left {
            font-size:20px;
            font-weight:bold;
        }
        header .right a {
            margin-left:15px;
            text-decoration:none;
            font-weight:bold;
            color:white;
        }
        header .right a:hover { text-decoration:underline; }
         
        .reset { 
            color:white;     
            margin-left:-10px;
        }
        main {
            padding:20px;
        }
        h2 { margin-bottom:15px; }
        .search-form {
            margin-bottom:20px;
        }
        .search-form input {
            width:300px;
            padding:6px;
            border:1px solid #ccc;
            border-radius:4px;
        }
        .search-form button {
            padding:6px 12px;
            border-radius:4px;
            background:#007bff;
            color:white;
            border:none;
            cursor:pointer;
        }
        .search-form button:hover { background:#0056b3; }
        table {
            width:100%;
            border-collapse: collapse;
            background:#fff;
        }
        th, td {
            border:1px solid #ccc;
            padding:10px;
            text-align:left;
        }
        th { background:#eee; }
        a.btn, button.btn {
            padding:5px 10px;
            border-radius:4px;
            color:white;
            text-decoration:none;
            border:none;
            cursor:pointer;
        }
        .edit { background:#4CAF50; }
        .edit:hover { background:#45a049; }
        .delete { background:#f44336; }
        .delete:hover { background:#d32f2f; }
    </style>
</head>
<body>
    <header>
        <div class="left">📚 Library Management System</div>
        <div class="right">
            <a href="addBook.php">Add Book</a>
            <a href="index.php">Logout</a>
        </div>
    </header>

    <main>
        <h2>Library Catalog</h2>
        <form method="POST" class="search-form">
            <input type="text" name="search" placeholder="Search by Title, Author, Year, or ISBN">
            <button type="submit">Search</button>
             <a href="userPage.php" class="btn reset"><button type="submit">Reset</button></a>
        </form>

        <!-- Book table -->
        <table>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Year Published</th>
                <th>ISBN</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            <?php
            if ($books->num_rows > 0) {
                while($row = $books->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["title"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["author"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["year_published"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["isbn"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["status"]) . "</td>";
                    echo "<td style='display:flex; gap:5px;'>
                            <form method='post' action='editBook.php' style='display:inline;'>
                                <input type='hidden' name='edit_id' value='" . $row["id"] . "'>
                                <button type='submit' class='btn edit'>Edit</button>
                            </form>
                            <form method='post' style='display:inline;' onsubmit=\"return confirm('Are you sure you want to delete this book?');\">
                                <input type='hidden' name='delete_id' value='" . $row["id"] . "'>
                                <button type='submit' class='btn delete'>Delete</button>
                            </form>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No books found</td></tr>";
            }
            $conn->close();
            ?>
        </table>
    </main>
</body>
</html>
