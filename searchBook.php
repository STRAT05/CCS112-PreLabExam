<?php
$conn = new mysqli("db", "root", "rootpassword", "preExamGroup");
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}


$searchQuery = "";
if (isset($_GET["query"]) && $_GET["query"] !== "") {
    $q = $conn->real_escape_string($_GET["query"]);
    $searchQuery = "WHERE title LIKE '%$q%' OR author LIKE '%$q%'";
} else {
    $result = $conn->query("SELECT * FROM Books");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Library Search</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 70%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid black; padding: 8px; }
        th { background: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Library - Search Books</h2>

    <!-- Search Form -->
     <form method="GET">
        <input type="text" name="query" placeholder="Search books..."
               value="<?php echo isset($_GET['query']) ? htmlspecialchars($_GET['query']) : ''; ?>">
        <button type="submit">Search</button>
        <button type="button" onclick="window.location='index.php'">Reset</button>
    </form>

    <?php if (isset($_POST['search'])): ?>
        <h3>Search Results for "<?php echo $search; ?>"</h3>
        <?php if ($result->num_rows > 0): ?>
            <table>
                <tr>
                    <th>ID</th><th>Title</th><th>Author</th><th>Status</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['author']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>No books found.</p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>