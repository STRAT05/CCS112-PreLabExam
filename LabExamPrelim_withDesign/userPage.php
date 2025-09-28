<?php
$conn = new mysqli("db", "user1", "pass1", "zieTestDB");
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
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

// fetch books from the database
$sql = "SELECT * FROM Books $searchQuery ORDER BY id DESC";
$books = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <style>
        body { font-family: Arial, sans-serif; background:#f9f9f9; margin:0; padding:0; }

        /* Header */
        header { background:#007bff; padding:15px 20px; }
        .header-inner { display:flex; align-items:center; justify-content:space-between; }
        header h1 { margin:0; color:white; font-size:22px; }
        nav a { color:white; margin-left:15px; text-decoration:none; font-weight:bold; }
        nav a:hover { text-decoration:underline; }

        .container { padding:20px; }
        h2 { margin-bottom:10px; }

        /* Search same as catalog */
        form { margin-top:10px; }
        input[type="text"] { padding:6px; width:250px; }
        button { padding:7.5px 12px; background:#007bff; color:white; border:none; border-radius:4px; cursor:pointer; }
        button:hover { background:#0056b3; }
        .reset { 
            color:white;     
            margin-left:-10px;
        }
       



        /* Table */
        table { width:100%; border-collapse:collapse; background:#fff; margin-top:50px; }
        th, td { border:1px solid #ccc; padding:10px; text-align:center; }
        th { background:#f4f4f4; }

        /* Buttons */
        a.btn, span.btn { padding:5px 10px; border-radius:4px; color:white; text-decoration:none; margin-right:5px; display:inline-block; }
        .borrow { background:#2ecc71; } .borrow:hover { background:#27ae60; }
        .borrowed { background:gray; cursor:not-allowed; opacity:0.7; }
        .logout { background:#e74c3c; } .logout:hover { background:#c0392b; }
        .return { background:#f39c12; } .return:hover { background:#e67e22; }
    </style>
</head>
<body>

    <!-- Header -->
    <header>
        <div class="header-inner">
            <h1>📖 Library System</h1>
            <nav>
                <a href="borrowedCatalog.php">Return Books</a>
                <a href="index.php">Logout</a>
            </nav>
        </div>
    </header>

    <div class="container">
        <h2>Available Books</h2>

       <!-- Search (styled same as catalog) -->
        <form method="POST" style="display:inline-block;">
            <input type="text" name="search" placeholder="Search by Title, Author, or ISBN">
            <button type="submit">Search</button>
            <a href="userPage.php" class="btn reset"><button type="submit">Reset</button></a>
        </form>


        <!-- Books Table -->
        <table>
            <tr>
                <th>ID</th><th>Title</th><th>Author</th><th>Year Published</th><th>ISBN</th><th>Status</th><th>Actions</th>
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
                    echo "<td>";
                    if ($row["status"] === "Available") {
                        echo "<a class='btn borrow' href='borrow.php?id=" . $row["id"] . "'>Borrow</a>";
                    } else {
                        echo "<span class='btn borrowed'>Borrowed</span>";
                    }
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No books found</td></tr>";
            }
            $conn->close();
            ?>
        </table>
    </div>

</body>
</html>

