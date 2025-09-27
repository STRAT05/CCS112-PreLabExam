<?php
require_once __DIR__ . '/db_connection.php';

// Search
$search = $_GET['search'] ?? '';
$sql = "SELECT * FROM books";
if (!empty($search)) {
    $search = $conn->real_escape_string($search);
    $sql .= " WHERE book_name LIKE '%$search%' OR book_author LIKE '%$search%'";
}
$sql .= " ORDER BY book_id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Library Catalog</title>
    <style>
        body { font-family: Arial, sans-serif; background:#f9f9f9; margin:0; padding:0; }
        
       header {background: #007bff;padding: 15px 20px;}
       .header-inner {display: flex;align-items: center;justify-content: space-between; /* pushes links to the right */}
        header h1 {margin: 0;color: white;font-size: 22px;}
        nav a {color: white;margin-left: 15px;text-decoration: none;font-weight: bold;}
        nav a:hover {text-decoration: underline;}

        .container { padding:20px; }
        table { width:100%; border-collapse: collapse; background:#fff; margin-top:20px; }
        th, td { border:1px solid #ccc; padding:10px; text-align:left; }
        th { background:#f4f4f4; }
        a.btn, span.btn { padding:5px 10px; border-radius:4px; color:white; text-decoration:none; margin-right:5px; display:inline-block; }
        .edit { background:#f39c12; } .edit:hover { background:#e67e22; }
        .delete { background:#e74c3c; } .delete:hover { background:#c0392b; }
        .borrow { background:#2ecc71; } .borrow:hover { background:#27ae60; }
        .borrowed { background:gray; cursor:not-allowed; opacity:0.7; }
        .add { background:#007bff; } .add:hover { background:#0056b3; }
        form { margin-top:10px; }
        input[type="text"] { padding:6px; width:250px; }
        button { padding: 7.5px 12px; background:#007bff; color:white; border:none; border-radius:4px; cursor:pointer; }
        button:hover { background:#0056b3; }
    </style>
</head>
<body>
    <!-- Header + Nav -->
   <header>
    <div class="header-inner">
        <h1>📚 Library Management System</h1>
        <nav>
            <a href="catalog.php">Home</a>
            <a href="manage_books.php">Add Book</a>
            <a href="borrowed_books.php">Borrowed Books</a>
        </nav>
    </div>
</header>


    <div class="container">
        <h2>Library Catalog</h2>

        <!-- Search -->
        <form method="GET" action="catalog.php">
            <input type="text" name="search" placeholder="Search by title or author" value="<?= htmlspecialchars($search) ?>">
            <button type="submit">Search</button>
        </form>

        <table>
            <tr>
                <th>ID</th><th>Title</th><th>Author</th><th>Year</th><th>Status</th><th>Actions</th>
            </tr>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['book_id'] ?></td>
                        <td><?= $row['book_name'] ?></td>
                        <td><?= $row['book_author'] ?></td>
                        <td><?= $row['year_published'] ?></td>
                        <td><?= $row['status'] ?></td>
                        <td>
                            <a class="btn edit" href="edit_book.php?id=<?= $row['book_id'] ?>">Edit</a>
                            <a class="btn delete" href="delete.php?id=<?= $row['book_id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                            
                            <?php if ($row['status'] == 'Available'): ?>
                                <a class="btn borrow" href="borrow.php?id=<?= $row['book_id'] ?>">Borrow</a>
                            <?php else: ?>
                                <span class="btn borrowed">Borrowed</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="6">No books found</td></tr>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>
