<?php

    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "agroculture";
    $port = 3307;

    $conn = mysqli_connect($serverName, $userName, $password, $dbName, port: 3307);
    if (!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }

?>
