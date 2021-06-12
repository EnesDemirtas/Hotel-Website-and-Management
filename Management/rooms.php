<?php
session_start();
include '../phpFunctions/databaseConnection.php';
include '../phpFunctions/routing.php';
include '../phpFunctions/security.php';
if (!isset($_SESSION['session_username'])) {
    go("../oops.php");
}
?>
<!DOCTYPE php>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Mazarin | Rooms</title>
    <meta name="keyword" content="Hotel, Mazarin, Hotel Mazarin">
    <meta name="description" content="Hotel Mazarin">

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="../main.css">
</head>

<body>


    <!--Navbar Start-->

    <div class="container">
        <header class="header">

            <nav class="navbar">
                <div class="container bg-success mb-5" style="height: 5rem">
                    <a class="navbar-brand" href="#">
                        HOTEL MAZARIN
                    </a>


                    <ul class="nav d-flex justify-content-end" style="width:50%">
                        <li class="nav-item">
                            <a class="nav-link" href="staff-profile.php">
                                <?php echo $_SESSION["session_username"] ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="logout" href="login.php">
                                Log out <span><i class="fa fa-sign-out-alt"></i></span>
                            </a>
                        </li>
                    </ul>

                </div>
            </nav>
        </header>
    </div>
    <!--Navbar End-->

    <?php

    if(isset($_POST['new-room-submit'])){
        $new_room_no = escape_sanitize_input($conn, $_POST['new-room-no'], "string");
        $new_room_type_id = escape_sanitize_input($conn, $_POST['new-room-type'], "string");
        $new_room_cleaner_id = escape_sanitize_input($conn, $_POST['new-room-cleaner'], "string");

        $new_room_sql = "INSERT INTO rooms (room_no, room_type, isAvailable, isFull, customer_id, cleaner_id)
        VALUES ($new_room_no, $new_room_type_id, 1, 0, NULL, $new_room_cleaner_id)";

        if($conn->query($new_room_sql) === TRUE){
            echo "
            <script type=\"text/javascript\">
                alert('New room is added successfully...');
            </script>
            ";
        } else {
            echo "
            <script type=\"text/javascript\">
                alert('Please enter a unique room number...');
            </script>
            ";
        }
    }

    ?>

    <?php
    $get_rooms_sql = mysqli_query($conn, "SELECT r.room_no, r.room_type, rt.room_name, r.isAvailable, r.isFull, r.customer_id, 
    u.name AS customer_name, r.cleaner_id, s.name AS staff_name 
    FROM rooms r 
    LEFT JOIN room_types rt ON r.room_type = rt.id
    LEFT JOIN users u ON r.customer_id = u.id
    LEFT JOIN staffs s ON r.cleaner_id = s.id");
    $all_rooms = $get_rooms_sql->fetch_all(1);
    ?>


    <!--Sidebar and Main Content Start-->

    <div class="container">
        <div class="sidenav mt-3">
            <a href="rooms.php" style="background-color: #198754af">Rooms</a>
            <a href="guests-check-in.php" style="padding-right: 0;">Guests Check In</a>
            <a href="guests-check-out.php" style="letter-spacing: -.25px; padding-right:0;">Guests Check Out</a>
            <a href="housekeeping.php">Housekeeping</a>
            <a href="message-box.php">Message Box</a>
            <a href="reservation-logs.php" style="letter-spacing: -.25px; padding-right:0;">Reservation Logs</a>
            <a href="reports.php" style="border-bottom: none;">Reports</a>
        </div>

        <div class="main" id="rooms">




        </div>
    </div>

    <!--Sidebar and Main Content End-->

    <?php

    for ($x = 0, $counter = 1; $x < sizeof($all_rooms); $x++, $counter++) {
        $room_no = $all_rooms[$x]['room_no'];
        $room_name = $all_rooms[$x]['room_name'];
        $is_available = $all_rooms[$x]['isAvailable'];
        $is_full = $all_rooms[$x]['isFull'];

        $customer_id = $all_rooms[$x]['customer_id'];
        $customer_name = $all_rooms[$x]['customer_name'];
        if ($customer_id === NULL) {
            $customer_id = 'im null';
            $customer_name = 'im null';
        }


        $cleaner_id = $all_rooms[$x]['cleaner_id'];
        $cleaner_name = $all_rooms[$x]['staff_name'];

        $current_date = date('Y-m-d');

        if ($is_available == 0 and $is_full == 1) {
            $details_sql = mysqli_query($conn, "SELECT r.room_no, rrd.check_in_date, rrd.check_out_date, rrd.number_of_adults, 
            rrd.number_of_children, rrd.total_price_TL, rrd.special_request 
            FROM rooms r 
            INNER JOIN reservation_records rr ON rr.room_no = r.room_no 
            INNER JOIN reservation_record_details rrd ON rrd.reservation_id = rr.id
            WHERE rr.isActive = 1 AND rr.room_no = $room_no");

            $details = $details_sql->fetch_all(1);

            if (sizeof($details) != 0) {
                $check_in_date = $details[0]['check_in_date'];
                $check_out_date = $details[0]['check_out_date'];
                $number_of_adults = $details[0]['number_of_adults'];
                $number_of_children = $details[0]['number_of_children'];
                $total_price_TL = $details[0]['total_price_TL'];
                $special_request = $details[0]['special_request'];

                if ($special_request === "" or $special_request === NULL) {
                    $special_request = "im null";
                }

                echo "
                <script type=\"text/javascript\">
                    var check_in_date_ui = '" . $check_in_date . "';
                    var check_out_date_ui = '" . $check_out_date . "';
                    var number_of_adults_ui = '" . $number_of_adults . "';
                    var number_of_children_ui = '" . $number_of_children . "';
                    var total_price_TL_ui = '" . $total_price_TL . "';
                    var special_request_ui = '" . $special_request . "';
                </script>
                ";

                if ($details[0]['check_in_date'] <= $current_date) {
                    echo "
                    <script type=\"text/javascript\">
                        var liveReservation = 1;
                    </script>
                    ";
                } else {
                    echo "
                    <script type=\"text/javascript\">
                        var liveReservation = 0;
                    </script>
                    ";
                }
            }
        }

        echo "
        <script type=\"text/javascript\">


        var room_no_ui = '" . $room_no .  "';
        var room_name_ui = '" . $room_name .  "';
        var is_available_ui = '" . $is_available . "';
        var is_full_ui = '" . $is_full . "';
        var cleaner_id_ui = '" . $cleaner_id . "';
        var cleaner_name_ui = '" . $cleaner_name . "';
        
        var customer_id_ui = '" . $customer_id . "';
        var customer_name_ui = '" . $customer_name . "';



        var counter = '" . $counter . "';
        </script>
        ";

        echo "
        <script type=\"text/javascript\" src=\"getRooms.js\">
        </script> 
        ";
    }

    echo "
    <script type=\"text/javascript\" src=\"roomsLegend.js\">
    </script>
    ";


    echo "
    <script type=\"text/javascript\">

    document.getElementById('rooms').innerHTML += `
    <button class='btn btn-danger mt-5' data-bs-toggle='modal' data-bs-target='#add-room'>Add a Room</button>

    <div class='modal fade' id='add-room' tabindex='-1' aria-labelledby='add-room-title' aria-hidden='true'>
    <div class='modal-dialog modal-dialog-centered'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='add-room-title'>Add a New Room</h5>
                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
            </div>
            <form action='' method='post'>
            <div class='modal-body'>

                    <div class='row'>
                        <div class='col'>
                            <label>Room No</label>
                            <input name='new-room-no' id='new-room-no' type='number' min='0'>
                        </div>   
                    </div>

                    <div class='row'>
                        <div class='col'>
                            <label>Room Type</label>
                            <select id='new-room-type' name='new-room-type'>
                            </select>
                        </div>   
                    </div>

                    <div class='row'>
                        <div class='col'>
                            <label>Housekeeper</label>
                            <select id='new-room-cleaner' name='new-room-cleaner'>
                            </select>
                        </div>   
                    </div>


            </div>
            <div class='modal-footer'>
            <input type='submit' id='new-room-submit' name='new-room-submit' value='Add' class='btn btn-success'>
            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
        </div>
        </form>

        </div>
    </div>
</div>
    
    `;

    </script>
    ";

    ?>

    <?php

    $room_types = mysqli_query($conn, "SELECT id, room_name FROM room_types");
    $get_room_types = $room_types->fetch_all(1);

    for($x = 0; $x < sizeof($get_room_types); $x++){
        $room_name = $get_room_types[$x]['room_name'];
        $room_type_id = $get_room_types[$x]['id'];

        echo "
        <script type=\"text/javascript\">
            document.getElementById('new-room-type').innerHTML += `<option value='".$room_type_id."'>".$room_name."</option>`;
        </script>
        ";

    }

    $cleaners = mysqli_query($conn, "SELECT id, name FROM staffs WHERE staff_type = 3");
    $get_cleaners = $cleaners->fetch_all(1);

    for($x = 0; $x < sizeof($get_cleaners); $x++){
        $cleaner_name = $get_cleaners[$x]['name'];
        $cleaner_id = $get_cleaners[$x]['id'];

        echo "
        <script type=\"text/javascript\">
            document.getElementById('new-room-cleaner').innerHTML += `<option value='".$cleaner_id."'>".$cleaner_name."</option>`;
        </script>
        ";

    }

    ?>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

    <script src="../app.js"></script>
</body>

</html>