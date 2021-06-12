<?php
include '../phpFunctions/databaseConnection.php';

$type = $_POST['type'];

if($type === "active"){
    $mySql = mysqli_query($conn, "SELECT rr.id, rr.customer_username, rr.room_no, rt.room_name, rrd.check_in_date, 
rrd.check_out_date, rrd.number_of_adults, rrd.number_of_children, rrd.total_price_TL, rrd.special_request FROM reservation_records rr 
INNER JOIN reservation_record_details rrd ON rr.id = rrd.reservation_id INNER JOIN rooms r ON r.room_no = rr.room_no
INNER JOIN room_types rt ON rt.id = r.room_type 
WHERE rr.isActive = 1 ORDER BY rrd.check_in_date DESC");
} else if($type === "logs"){
    $date1 = $_POST['dates'][0];
    $date2 = $_POST['dates'][1];

    $mySql = mysqli_query($conn, "SELECT rr.id, rr.customer_username, rr.room_no, rt.room_name, rrd.check_in_date, 
rrd.check_out_date, rrd.number_of_adults, rrd.number_of_children, rrd.total_price_TL, rrd.special_request FROM reservation_records rr 
INNER JOIN reservation_record_details rrd ON rr.id = rrd.reservation_id INNER JOIN rooms r ON r.room_no = rr.room_no
INNER JOIN room_types rt ON rt.id = r.room_type 
WHERE rrd.check_in_date BETWEEN '$date1' AND '$date2' ORDER BY rrd.check_in_date DESC");
}



$get_active_reservations = $mySql->fetch_all(1);

$active_reservations = array();

for($x = 0; $x < sizeof($get_active_reservations); $x++){
    $active_reservations[$x] = $get_active_reservations[$x];
}

print json_encode($active_reservations);
