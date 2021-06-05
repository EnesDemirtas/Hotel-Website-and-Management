<?php
include '../phpFunctions/databaseConnection.php';

$message_id_delete = $_POST['message_id'];

$delete_message_sql = "DELETE FROM message_box  WHERE id = $message_id_delete";

if($conn->query($delete_message_sql) === FALSE){
    echo "Error: " . $delete_message_sql . "<br>" . $conn->error;
} else {
    echo "Message is deleted successfully...";
}

?>