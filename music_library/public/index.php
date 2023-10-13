<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Music library</title>
</head>
<body>
    <header>

    <?php
    include('../source/menu.php');
    ?>
    
    <?php
    $servername = "localhost";
    $username = "producer";
    $password = "2Ziwa2412andJUAN";
    $dbname = "music_database";
    

    $conn = new mysqli($servername, $username, $password, $dbname);
    

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    

    $sql = "SELECT * FROM songs";
    

    $result = $conn->query($sql);
    

    if ($result) {

        while ($row = $result->fetch_assoc()) {
            echo "Song Title: " . $row["title"] . "<br>";
            echo "Artist: " . $row["artist"] . "<br>";
            echo "Genre: " . $row["genre"] . "<br><br>";
        }
    

        $conn->close();
    } else {

        echo "Error: " . $conn->error;
    }
    ?>

 


    </header>
</body>
</html>





<?php
phpinfo();
?>