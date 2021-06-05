<?php
include '../phpFunctions/databaseConnection.php';

$message_id_mark = $_POST['message_id'];

$mark_message_sql = "UPDATE message_box SET isRead = 1  WHERE id = $message_id_mark";

if($conn->query($mark_message_sql) === FALSE){
    echo "Error: " . $mark_message_sql . "<br>" . $conn->error;
} else {
    echo "Message is marked as read successfully...";
}

?>