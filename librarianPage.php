<?php
$conn = new mysqli("db", "root", "rootpassword", "preExamGroup");
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

//handle remove
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_id"])) {
    $id = intval($_POST["delete_id"]);
    $conn->query("DELETE FROM Books WHERE id = $id");
}

// handle Search

// fetch books from the database
$sql = "SELECT * FROM Books order by id desc";
$books = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librarian Page</title>
    <style>
        *{
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0px;
            background-color: #ffffffff;
        }
        #welcome {
            text-align: left;
            color: #000000ff;
            background: linear-gradient(to right, #7bf58cff, #1d961dff);
            width:100%;
            font-size: 28px;
            border-bottom: 5px solid #000000ff;
            border-image: linear-gradient(to right, #071d01ff, #002000ff) 1;
        }
        .buttons {

            text-align: center;


        }

        #logoutBtn {
            width: 80px;
            height: 28px;
            font-size: 14px;
            font-weight: bold;
            background-color: #f7c7c7ff;
            border: 2.5px solid #000000ff;
            position: relative;
            float: right; 
        }

        #addBookBtn {
            width: 100px;
            height: 28px;
            font-size: 14px;
            font-weight: bold;
            background-color: #c7f7c7ff;
            border: 2.5px solid #000000ff;
            position: relative;
            float: left; 
        }

        

        
        </style>
</head>

<body>
    <header class="header">
         <h1 id="welcome">Library Management System</h1>
         <!-- Back Button -->
    <a href="index.php"><button id="logoutBtn"> Logout</button></a>
    </header>
   

    <!-- Search -->


    <!-- Add Book -->
    <a href="addBook.php"><button id="addBookBtn"> Add Book</button></a>

    <!-- Book table -->
     <table border="1" style="width:100%; text-align: center; margin-top: 50px;">
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
                echo "<td style='display:flex; gap:5px; justify-content:center;'> 
                                                 <!-- edit form -->
        <form method='post' action='editBook.php' style='display:inline;'>
            <input type='hidden' name='edit_id' value='" . $row["id"] . "'>
            <button type='submit' 
                style='background:#4CAF50; color:white; border:none; padding:5px 10px; border-radius:4px; cursor:pointer;'>
                Edit
            </button>
        </form>

                                                <!-- delete form -->
        <form method='post' style='display:inline;' onsubmit=\"return confirm('Are you sure you want to delete this book?');\">
            <input type='hidden' name='delete_id' value='" . $row["id"] . "'>
            <button type='submit' 
                style='background:#f44336; color:white; border:none; padding:5px 10px; border-radius:4px; cursor:pointer;'>
                Delete
            </button>
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
</body>
</html>
