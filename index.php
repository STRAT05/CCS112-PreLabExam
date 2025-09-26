<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My PHP Page</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0px;
            background-color: #cacacaff;
        }
        #welcome {
            text-align: center;
            color: #000000ff;
            background-color: #ffffffff;
            width:96%;
            padding: 30px;
            font-size: 40px;
            border: 5px solid #000000ff;
            border-image: linear-gradient(to right, #000000ff, #038b03ff) 1;
        }
        .buttons {

            text-align: center;
            margin-top: 120px;
           
        }

        #librarianBtn, #userBtn {
            width: 200px;
            height: 70px;
            font-size: 28px;
            font-weight: bold;
            background-color: #ffffffff;
            border: 5px solid #000000ff;
        }

        #date {
            text-align: center;
            margin-top: 210px;
            font-size: 25px;
        }



        button {
            color: #000000ff;
            background-color: #c7c7c7ff;
            margin: 10px;
            padding: 10px 20px;
            font-size: 20px;
            cursor: pointer;
        }
    </style>

</head>
<body>
    <h1 id="welcome">Welcome to the Library System</h1>
    <br><br><br>

    <div class="buttons">
    <a href="librarianPage.php"><button id="librarianBtn">Librarian</button></a>
    <a href="userPage.php"><button id="userBtn">User</button></a>
    </div>

    <?php
        // Display the current date and time
        echo '<p id="date">Current date: <b>' . date("Y-m-d") . '</b></p>';
    ?>
</body>
</html>