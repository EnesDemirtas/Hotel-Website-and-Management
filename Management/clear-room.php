<?php
include '../phpFunctions/databaseConnection.php';

$room_no = $_POST['room_no'];

$clear_room_sql = "UPDATE rooms SET isAvailable = 1 WHERE room_no = $room_no";

if($conn->query($clear_room_sql) === FALSE){
    echo "Error: " . $mark_message_sql . "<br>" . $conn->error;
} else {
    echo "Room is marked as cleared successfully...";
}


?>