<?php 

include '../phpFunctions/databaseConnection.php';
include '../phpFunctions/routing.php';
include '../phpFunctions/security.php';

if (isset($_POST['check-out'])) {
    $check_out_id = escape_sanitize_input($conn, $_POST['res-id'], "string");
    $check_out_room_no = escape_sanitize_input($conn, $_POST['room-no'], "string");

    $check_out_sql = "UPDATE reservation_records SET isActive = 0 WHERE id = '$check_out_id'";

    if ($conn->query($check_out_sql) === TRUE) {

        $update_room = "UPDATE rooms SET isFull = 0, customer_id = NULL WHERE room_no = $check_out_room_no";

        if ($conn->query($update_room) === TRUE) {
            go("guests-check-out.php");
        } else {
            echo "Error: " . $update_room . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $check_out_sql . "<br>" . $conn->error;

    }
}


?>