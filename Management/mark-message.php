<?php
include '../phpFunctions/databaseConnection.php';
include '../phpFunctions/security.php';
$message_id_mark = escape_sanitize_input($conn, $_POST['message_id'], "string");

$mark_message_sql = "UPDATE message_box SET isRead = 1  WHERE id = $message_id_mark";

if($conn->query($mark_message_sql) === FALSE){
    echo "Error: " . $mark_message_sql . "<br>" . $conn->error;
} else {
    echo "Message is marked as read successfully...";
}

?>