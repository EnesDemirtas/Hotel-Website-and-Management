<?php
include '../phpFunctions/databaseConnection.php';
include '../phpFunctions/security.php';

$typed_room_no = escape_sanitize_input($conn, $_POST['room_no'], "string");
$reservation_sql = mysqli_query($conn, "SELECT rr.id, rr.customer_username, rr.room_no, rt.room_name, rrd.check_in_date, 
rrd.check_out_date, rrd.number_of_adults, rrd.number_of_children, rrd.total_price_TL FROM reservation_records rr 
INNER JOIN reservation_record_details rrd ON rr.id = rrd.reservation_id INNER JOIN rooms r ON r.room_no = rr.room_no
INNER JOIN room_types rt ON rt.id = r.room_type 
WHERE rr.isActive = 1 AND rr.room_no = '$typed_room_no'");

$reservation_temp = $reservation_sql->fetch_all(1);


$get_reservation = array();

if(sizeof($reservation_temp) > 0){
    for($x = 0; $x < sizeof($reservation_temp); $x++){
        $get_reservation[$x] = $reservation_temp[$x];
    }

    print json_encode($get_reservation);

} else {
    echo "<div class='text-center bg-success text-white'> Reservation is not found... </div>";
}
