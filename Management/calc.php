<?php include '../phpFunctions/databaseConnection.php'; 
$selected_room = $_POST['room'];
$get_daily_charge = mysqli_query($conn, "SELECT rt.room_price FROM rooms r INNER JOIN room_types rt ON r.room_type = rt.id 
WHERE r.room_no =$selected_room");
$daily_charge_temp = $get_daily_charge->fetch_all(1);
$daily_charge = $daily_charge_temp[0]['room_price'];
$dayDiff = $_POST['diff'];

$total_price = $daily_charge * $dayDiff;



$get_capacity = mysqli_query($conn, "SELECT rt.max_adult, rt.max_child FROM rooms r INNER JOIN room_types rt ON r.room_type = rt.id 
WHERE r.room_no = $selected_room");
$capacity_temp = $get_capacity->fetch_all(1);
$max_adult = $capacity_temp[0]['max_adult'];
$max_child = $capacity_temp[0]['max_child'];

$myArray = array();
$myArray[0] = $total_price;
$myArray[1] = $max_adult;
$myArray[2] = $max_child;

print json_encode($myArray); 
?>