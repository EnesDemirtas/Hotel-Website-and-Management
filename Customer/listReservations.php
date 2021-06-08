<?php include '../phpFunctions/databaseConnection.php';
include '../phpFunctions/security.php';

?>

<?php 


function listCurrentReservations($conn){


    $current_date = date('Y-m-d');
    $session_username = escape_sanitize_input($conn, $_SESSION['session_username'], "string");

    $checkCurrentReservations = mysqli_query(
        $conn,
        "SELECT rr.room_no, r.room_type, rt.room_name, rrd.number_of_adults, rrd.number_of_children, rrd.check_in_date, rrd.check_out_date 
    FROM reservation_records rr 
    INNER JOIN users u 
    ON rr.customer_username = u.username
    INNER JOIN reservation_record_details rrd
    ON rr.id = rrd.reservation_id
    INNER JOIN rooms r
    ON rr.room_no = r.room_no 
    INNER JOIN room_types rt
    ON r.room_type = rt.id
    WHERE  u.username = '$session_username' AND rrd.check_out_date >= '$current_date' AND isActive = 1 
    ORDER BY check_in_date"
    
    );

    $currentReservations = $checkCurrentReservations->fetch_all(1);



    for ($x = 0; $x < sizeof($currentReservations); $x++) {
        $room_no = escape_sanitize_output($currentReservations[$x]['room_no']);
        $room_type = escape_sanitize_output($currentReservations[$x]['room_type']);
        
        $room_name = escape_sanitize_output($currentReservations[$x]['room_name']);
        



        $number_of_adults = escape_sanitize_output($currentReservations[$x]['number_of_adults']);
        $number_of_children = escape_sanitize_output($currentReservations[$x]['number_of_children']);
        $check_in_date = $currentReservations[$x]['check_in_date'];

        $check_in_date_year = explode("-", $check_in_date)[0];
        $check_in_date_month = explode("-", $check_in_date)[1];
        $check_in_date_day = explode("-", $check_in_date)[2];

        $check_out_date = $currentReservations[$x]['check_out_date'];

        $check_out_date_year = explode("-", $check_out_date)[0];
        $check_out_date_month = explode("-", $check_out_date)[1];
        $check_out_date_day = explode("-", $check_out_date)[2];


        echo "
        <script type=\"text/javascript\">

            var isCurrent = true;

            var room_name_ui = \"" . $room_name .  "\";

            var room_no_ui = " . $room_no . ";
            var room_type_ui = " . $room_type . ";
            var number_of_adults_ui = " . $number_of_adults . ";
            var number_of_children_ui = " . $number_of_children . ";



            var check_in_date_ui_year = " .  $check_in_date_year . ";
            var check_in_date_ui_month = " .  $check_in_date_month . ";
            var check_in_date_ui_day = " .  $check_in_date_day . ";

            var check_out_date_ui_year = " .  $check_out_date_year . ";
            var check_out_date_ui_month = " .  $check_out_date_month . ";
            var check_out_date_ui_day = " .  $check_out_date_day . ";

            
            
            
        </script>
        
        ";



        echo "
            <script type=\"text/javascript\" src=\"listReservations.js\">
            </script> 
            ";
    }
}


function listPastReservations($conn){

    
    $current_date = date('Y-m-d');

    $session_username = $_SESSION['session_username'];

    $checkPastReservations = mysqli_query(
        $conn,
        "SELECT rr.room_no, r.room_type, rt.room_name, rrd.number_of_adults, rrd.number_of_children, rrd.check_in_date, rrd.check_out_date 
    FROM reservation_records rr 
    INNER JOIN users u 
    ON rr.customer_username = u.username
    INNER JOIN reservation_record_details rrd
    ON rr.id = rrd.reservation_id
    INNER JOIN rooms r
    ON rr.room_no = r.room_no
    INNER JOIN room_types rt
    ON r.room_type = rt.id
    WHERE  u.username = '$session_username' AND (rrd.check_out_date < '$current_date' OR (rrd.check_out_date >= '$current_date' AND isActive = 0)) 
    ORDER BY check_in_date"
    );

    $pastReservations = $checkPastReservations->fetch_all(1);

    


    for ($x = 0; $x < sizeof($pastReservations); $x++) {
        $room_no = escape_sanitize_output($pastReservations[$x]['room_no']);
        $room_type = escape_sanitize_output($pastReservations[$x]['room_type']);
        $room_name = escape_sanitize_output($pastReservations[$x]['room_name']);
        $number_of_adults = escape_sanitize_output($pastReservations[$x]['number_of_adults']);
        $number_of_children = escape_sanitize_output($pastReservations[$x]['number_of_children']);
        $check_in_date = $pastReservations[$x]['check_in_date'];

        $check_in_date_year = explode("-", $check_in_date)[0];
        $check_in_date_month = explode("-", $check_in_date)[1];
        $check_in_date_day = explode("-", $check_in_date)[2];

        $check_out_date = $pastReservations[$x]['check_out_date'];

        $check_out_date_year = explode("-", $check_out_date)[0];
        $check_out_date_month = explode("-", $check_out_date)[1];
        $check_out_date_day = explode("-", $check_out_date)[2];


        echo "
        <script type=\"text/javascript\">

            var isCurrent = false;

            var room_no_ui = " . $room_no . ";
            var room_type_ui = " . $room_type . ";
            var room_name_ui = \"" . $room_name . "\";
            var number_of_adults_ui = " . $number_of_adults . ";
            var number_of_children_ui = " . $number_of_children . ";

            var check_in_date_ui_year = " .  $check_in_date_year . ";
            var check_in_date_ui_month = " .  $check_in_date_month . ";
            var check_in_date_ui_day = " .  $check_in_date_day . ";

            var check_out_date_ui_year = " .  $check_out_date_year . ";
            var check_out_date_ui_month = " .  $check_out_date_month . ";
            var check_out_date_ui_day = " .  $check_out_date_day . ";
            
            
        </script>
        
        ";



        echo "
            <script type=\"text/javascript\" src=\"listReservations.js\">
            </script> 
            ";
    }
}

?>