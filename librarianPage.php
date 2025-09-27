<?php
$conn = new mysqli("db", "root", "rootpassword", "preExamGroup");
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

//handle remove

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
        body {
            font-family: Arial, sans-serif;
            margin: 0px;
            background-color: #ffffffff;
        }
        #welcome {
            text-align: center;
            color: #000000ff;
            background-color: #ffffffff;
            width:99.35%;
            font-size: 28px;
            border: 5px solid #000000ff;
            border-image: linear-gradient(to right, #000000ff, #038b03ff) 1;
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
            top: -18px;
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
            top: -18px;
            position: relative;
            float: left; 
        }

        

        
        </style>
</head>

<body>
    <header class="header">
         <h1 id="welcome">Welcome Librarian</h1>
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
                echo "<td>
                <a href='editBook.php?id=" . $row["id"] . "'>
                    Edit
                </a>
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


