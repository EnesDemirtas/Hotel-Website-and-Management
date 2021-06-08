<?php
include '../phpFunctions/databaseConnection.php';
include '../phpFunctions/security.php';

$room_no = escape_sanitize_input($conn, $_POST['room_no'], "string");

$clear_room_sql = "UPDATE rooms SET isAvailable = 1 WHERE room_no = $room_no";

if($conn->query($clear_room_sql) === FALSE){
    echo "Error: " . $clear_room_sql . "<br>" . $conn->error;
} else {
    echo "Room is marked as cleared successfully...";
}


?>