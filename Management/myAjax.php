<?php include '../phpFunctions/databaseConnection.php'; 

$selected_room = $_POST['room'];

$get_capacity = mysqli_query($conn, "SELECT rt.max_adult, rt.max_child FROM rooms r INNER JOIN room_types rt ON r.room_type = rt.id 
WHERE r.room_no = $selected_room");
$capacity_temp = $get_capacity->fetch_all(1);
$max_adult = $capacity_temp[0]['max_adult'];
$max_child = $capacity_temp[0]['max_child'];

echo (int)$max_adult;

?>