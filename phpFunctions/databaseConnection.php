<?php 
    $servername = "localhost";
    $username_con = "root";
    $password_con = "";
    $dbname = "hms";

    // Create connection
    $conn = new mysqli($servername, $username_con, $password_con, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>