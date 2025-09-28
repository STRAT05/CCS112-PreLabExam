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
            top: 0;
            left: 0;
            display: relative;
            text-align: left;
            position: relative;
            color: #000000ff;
            background: linear-gradient(to right, #7bf58cff, #1d961dff);
            width:100%;
            font-size: 28px;
            border-bottom: 5px solid #000000ff;
            border-image: linear-gradient(to right, #000000ff, #000000ff) 3;
        }
        .buttons {

            text-align: center;


        }

        #logoutBtn {
            width: 78px;
            height: 28px;
            font-size: 14px;
            font-weight: bold;
            background-color: #f7c7c7ff;
            border: .5px solid #000000ff;
            position: relative;
            float: right; 
        }

        #returnBookBtn {
            width: 100px;
            height: 28px;
            font-size: 14px;
            font-weight: bold;
            background-color: #c7f7c7ff;
            border: 2.5px solid #000000ff;
            position: relative;
            float: left; 
        }

        #booksTable {
            margin-top: 20px;   
            border-collapse: collapse;
            width: 100%;
            text-align: center;
            font-size: 18px;
            background-color: #ffffffff;
            border: 2px solid #000000ff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        

        
        </style>
</head>

<body>
    <header class="header">
         <p id="welcome">      
            Library System<br>       
        </p>
      

         <!-- Return Book -->
        <a href="borrowedCatalog.php"><button id="returnBookBtn"> Return Books</button></a>
         <!-- Back Button -->
        <a href="index.php"><button id="logoutBtn"> Logout</button></a>
    </header>
   

    <!-- Search -->


    <!-- Book table -->
     <table border="1" style="width:100%; text-align: center; margin-top: 50px;" id="booksTable">
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
                echo "<td>";
                if ($row["status"] === "Available") {
                    echo "<a href='borrow.php?id=" . $row["id"] . "'>
                            <button style='background-color: #5cf503ff; color: black; border: 0.1px solid black; padding: 5px 10px; cursor: pointer;'>
                        Borrow
                             </button>
                    </a>";
                } else {
                    echo "<button disabled style='background-color: grey; color: white; border: none; padding: 5px 10px; cursor: not-allowed;'>
                         Borrowed
                    </button>";
                }
                
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
