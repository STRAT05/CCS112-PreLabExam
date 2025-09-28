<?php
$conn = new mysqli("db", "user1", "pass1", "zieTestDB");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch only borrowed books
$sql = "SELECT * FROM Books WHERE status='Borrowed' ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Borrowed Books</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background:#f9f9f9;
            padding:20px;
        }
        h2 { color:#333; }
        table {
            width:95%;
            border-collapse: collapse;
            background:#fff;
            margin-top:20px;
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
        .return { background:#9b59b6; }
        .return:hover { background:#8e44ad; }
        .back-btn {
            background:#007bff;
            padding:8px 15px;
            border-radius:4px;
            text-decoration:none;
            color:white;
        }
        .back-btn:hover { background:#0056b3; }
        .return-selected {
            background:#27ae60;
            margin-top:15px;
        }
        .return-selected:hover { background:#1e8449; }
        label {
            cursor: pointer;
        }
    </style>
    <script>
        // Toggle all checkboxes
        function toggleSelectAll(source) {
            const checkboxes = document.querySelectorAll('.book-checkbox');
            checkboxes.forEach(cb => cb.checked = source.checked);
        }
    </script>
</head>
<body>
    <h2>📕 Borrowed Books</h2>

    <form method="POST" action="returnFunc.php">
        <table>
            <tr>
                <th>
                    <input type="checkbox" id="selectAll" onclick="toggleSelectAll(this)">
                    <label for="selectAll">Return All</label>
                </th>
                <th>ID</th>
                <th>Book Name</th>
                <th>Author</th>
                <th>Year Published</th>
                <th>ISBN</th>
                <th>Status</th>
            </tr>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td>
                            <label>
                                <input type="checkbox" class="book-checkbox" name="selected_books[]" value="<?= $row['id'] ?>">
                                Return
                            </label>
                        </td>
                        <td><?= $row['id'] ?></td>
                        <td><?= htmlspecialchars($row['title']) ?></td>
                        <td><?= htmlspecialchars($row['author']) ?></td>
                        <td><?= htmlspecialchars($row['year_published']) ?></td>
                        <td><?= htmlspecialchars($row['isbn']) ?></td>
                        <td><?= $row['status'] ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="7">No borrowed books found</td></tr>
            <?php endif; ?>
        </table>

        <!-- Return selected books button -->
        <div style="text-align:center; margin-top:20px;">
            <button type="submit" class="btn return-selected">Return Selected</button>
        </div>
    </form>

    <!-- Back to Catalog Button -->
    <div style="text-align:center; margin-top:15px;">
        <a class="back-btn" href="userPage.php">Back to Catalog</a>
    </div>
</body>
</html>