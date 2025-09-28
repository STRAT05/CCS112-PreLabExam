<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library System</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Georgia', serif;
            background: #f4f1ea; /* soft paper tone */
            color: #2c3e50;
        }

        /* Header */
        #welcome {
            text-align: center;
            background: linear-gradient(to right, #3e2723, #795548);
            color: #fff;
            padding: 40px;
            font-size: 42px;
            border-bottom: 6px solid #2c1b18;
            letter-spacing: 1.5px;
            text-shadow: 2px 2px 6px rgba(0,0,0,0.4);
        }

        /* Login as text */
        #loginAs {
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            margin-top: 80px;
            color: #3e2723;
        }

        /* Button container */
        .buttons {
            text-align: center;
            margin-top: 40px;
        }

        /* Buttons styled like book covers */
        .buttons a button {
            width: 220px;
            height: 75px;
            font-size: 26px;
            font-weight: bold;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            margin: 20px;
            transition: transform 0.2s ease, box-shadow 0.3s ease;
        }

        #librarianBtn {
            background: #6d4c41; /* Brown tone like old book */
        }
        #librarianBtn:hover {
            background: #5d4037;
            transform: translateY(-3px);
            box-shadow: 0px 6px 15px rgba(0,0,0,0.3);
        }

        #userBtn {
            background: #2e7d32; /* Green like reading lamps */
        }
        #userBtn:hover {
            background: #1b5e20;
            transform: translateY(-3px);
            box-shadow: 0px 6px 15px rgba(0,0,0,0.3);
        }

        /* Date */
        #date {
            text-align: center;
            margin-top: 200px;
            font-size: 22px;
            font-style: italic;
            color: #3e2723;
        }
    </style>

</head>
<body>
    <h1 id="welcome">📚 Welcome to the Library System</h1>

    <h2 id="loginAs">LOG IN</h2>

    <div class="buttons">
        <a href="librarianPage.php"><button id="librarianBtn">Librarian</button></a>
        <a href="userPage.php"><button id="userBtn">User</button></a>
    </div>

    <?php
        // Display the current date
        echo '<p id="date">Today\'s Date: <b>' . date("F j, Y") . '</b></p>';
    ?>
</body>
</html>
