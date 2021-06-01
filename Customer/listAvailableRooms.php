<?php 
include '../phpFunctions/databaseConnection.php';
require "../phpFunctions/routing.php";
?>

<?php  

function listAvailableRooms($conn, $search_check_in_date, $search_check_out_date, $adults, $children){

    echo "
    <script type=\"text/javascript\">
    var available_rooms = document.getElementById('rooms-main-content');
    available_rooms.innerHTML = '';

    var check_in_date_ui = document.getElementById('checkin-room-searching');
    check_in_date_ui.value = '" . $search_check_in_date . "';

    var check_out_date_ui = document.getElementById('checkout-room-searching');
    check_out_date_ui.value = '" . $search_check_out_date . "';

    var adults_ui = document.getElementById('adults-room-searching');
    adults_ui.value = '" . $adults . "';

    var children_ui = document.getElementById('children-room-searching');
    children_ui.value = '" . $children . "';

    </script>
    
    ";

    

    $checkAvailableRooms = mysqli_query(
        $conn,
        "SELECT r.room_no, r.room_type, rt.room_name, rt.room_price
         FROM rooms r
         INNER JOIN room_types rt
         ON rt.id = r.room_type
         WHERE (isAvailable = 1) AND (rt.max_adult >= '$adults' AND rt.max_child >= '$children')
         
         UNION

         SELECT r.room_no, r.room_type, rt.room_name, rt.room_price
         FROM rooms r
         INNER JOIN room_types rt
         ON rt.id = r.room_type
         INNER JOIN reservation_records rr
         ON rr.room_no = r.room_no
         INNER JOIN reservation_record_details rrd
         ON rrd.reservation_record_id = rr.id
         WHERE (r.isAvailable = 0 OR r.isAvailable IS NULL) 
         AND (rrd.check_in_date > '$search_check_out_date' OR rrd.check_out_date < '$search_check_in_date')
         AND rt.max_adult >= '$adults' AND rt.max_child >= '$children'

         ORDER BY room_type, room_no

        "    
        );

    $availableRooms = $checkAvailableRooms->fetch_all(1);

    $num_of_standard = $num_of_platinum = $num_of_exclusive = $num_of_kingsuite = 0; 
    for($x = 0; $x < sizeof($availableRooms); $x++){

        $room_no = $availableRooms[$x]['room_no'];
        $room_type = $availableRooms[$x]['room_type'];
        $room_name = $availableRooms[$x]['room_name'];
        $room_price = $availableRooms[$x]['room_price'];

        $date_checkin = date_create($search_check_in_date);
        $date_checkout = date_create($search_check_out_date);


        $total_days = date_diff($date_checkin, $date_checkout);
        $total_days_int = $total_days->format("%a");
        $total_price = $total_days_int * $room_price;

        switch($room_type){
            case 1:
                $num_of_standard++;
                break;
            case 2:
                $num_of_platinum++;
                break;
            case 3:
                $num_of_exclusive++;
                break;
            case 4:
                $num_of_kingsuite++;
                break;
        }



        echo "
        <script type=\"text/javascript\">


            var room_name_ui = \"" . $room_name .  "\";

            var room_no_ui = " . $room_no . ";
            var room_type_ui = " . $room_type . ";
            var room_total_price_ui = " . $total_price . ";

            var booking_adults_ui = " . $adults . ";
            var booking_children_ui = " . $children . ";

            var booking_check_in_ui = '" . $search_check_in_date . "';
            
            var booking_check_out_ui = '" . $search_check_out_date . "';

            var num_of_standard_ui = ". $num_of_standard . ";
            var num_of_platinum_ui = ". $num_of_platinum . ";
            var num_of_exclusive_ui = ". $num_of_exclusive . ";
            var num_of_kingsuite_ui = ". $num_of_kingsuite . ";
            
        </script>
        
        ";



        echo "
            <script type=\"text/javascript\" src=\"listAvailableRooms.js\">
            </script> 
            ";
    }





}



?>