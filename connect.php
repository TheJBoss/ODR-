<?php
    
    $_servername = "localhost";
    $_username = "root";
    $_password = "";
    $_dbname = "ODRusers";


    // Create connection
    $conn = mysqli_connect($_servername, $_username, $_password,  $_dbname);

    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }
?>