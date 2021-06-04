<?php include '../phpFunctions/databaseConnection.php'; 
$selected_room = $_POST['room'];
$get_daily_charge = mysqli_query($conn, "SELECT rt.room_price FROM rooms r INNER JOIN room_types rt ON r.room_type = rt.id 
WHERE r.room_no =$selected_room");
$daily_charge_temp = $get_daily_charge->fetch_all(1);
$daily_charge = $daily_charge_temp[0]['room_price'];
$dayDiff = $_POST['diff'];





$total_price = $daily_charge * $dayDiff;

echo $dayDiff * $daily_charge; 
?>