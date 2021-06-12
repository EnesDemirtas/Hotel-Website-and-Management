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
    <title>Hotel Mazarin | Check In</title>
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

    <!--Sidebar and Main Content Start-->

    <div class="container">
        <div class="sidenav mt-3">
            <a href="rooms.php">Rooms</a>
            <a href="guests-check-in.php" style="padding-right: 0; background-color: #198754af">Guests Check In</a>
            <a href="guests-check-out.php" style="letter-spacing: -.25px; padding-right:0;">Guests Check Out</a>
            <a href="housekeeping.php">Housekeeping</a>
            <a href="message-box.php">Message Box</a>
            <a href="reservation-logs.php" style="letter-spacing: -.25px; padding-right:0;">Reservation Logs</a>
            <a href="reports.php" style="border-bottom: none;">Reports</a>
        </div>

        <?php

        if (isset($_POST['guest-check-in'])) {
            $guest_name = escape_sanitize_input($conn, $_POST['guest-name'], "string");
            $check_in_date =  escape_sanitize_input($conn, $_POST['check-in-date'], "string");
            $check_out_date = escape_sanitize_input($conn, $_POST['check-out-date'], "string");
            $room_number = escape_sanitize_input($conn, $_POST['room-number'], "string");
            $num_of_adults = escape_sanitize_input($conn, $_POST['adults'], "string");
            $num_of_children = escape_sanitize_input($conn, $_POST['children'], "string");
            $total_price = escape_sanitize_input($conn, $_POST['total-price'], "string");
            $special_request = escape_sanitize_input($conn, $_POST['special-request'], "string");

            if (empty($guest_name) OR empty($check_in_date) OR empty($check_out_date) OR empty($room_number) OR empty($num_of_adults)
            OR empty($num_of_children) OR empty($total_price)) {
                echo "<div class='text-center bg-danger text-white'> Please provide all inputs correctly... </div>";
            } else {
                $new_guest_sql = "INSERT INTO users (username, password, name) 
                VALUES ('guest-$guest_name', '', '$guest_name')";

                if ($conn->query($new_guest_sql) === TRUE) {
                    $sql = "INSERT INTO reservation_records (customer_username, room_no, isActive) 
                    VALUES ('guest-$guest_name', '$room_number', 1)";

                    if($conn->query($sql) === TRUE){
                        $get_res_request_id = mysqli_query($conn, "SELECT id FROM reservation_records WHERE room_no = $room_number ORDER BY id DESC LIMIT 1");
                        $fetch_res_request_id = $get_res_request_id->fetch_all(1);
                        $res_request_id = $fetch_res_request_id[0]['id'];

                        $guest_reservation = "INSERT INTO reservation_record_details (reservation_id, check_in_date, check_out_date, number_of_adults, 
                        number_of_children, total_price_TL, special_request) VALUES ('$res_request_id', '$check_in_date', '$check_out_date', 
                        '$num_of_adults', '$num_of_children', '$total_price', '$special_request')";

                        if($conn->query($guest_reservation) === TRUE){
                            $get_customer_id = mysqli_query($conn, "SELECT id FROM users WHERE username = 'guest-$guest_name'");
                            $fetch_customer_id = $get_customer_id->fetch_all(1);
                            $customer_id = $fetch_customer_id[0]['id'];

                            $change_room_status = "UPDATE rooms SET isAvailable = 0, isFull = 1, customer_id = '$customer_id' 
                            WHERE room_no = $room_number ";

                            if($conn->query($change_room_status) === TRUE){
                                echo "<div class='text-center bg-success text-white'> New reservation is created successfully. You are redirected to main page... </div>";
                                go("rooms.php",5);
                            }
                        }
                    }
                }
            }
        }

        ?>



        <?php
        $current_date = date('Y-m-d');
        $tomorrow_date = date('Y-m-d', strtotime($current_date . " + 1 days"));


        
        echo "
            <script type=\"text/javascript\" src=\"checkDateValidity.js\">
            </script> 
            ";
        ?>

        <div class="main">
            <div class="row">
                <form class="col-8 my-4" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                    <div class="row form-row mb-4">
                        <div class="col-md-4">
                            <label for="guest-name">Guest Name</label>
                            <input type="text" name="guest-name" id="guest-name" class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label for="check-in-date">Check In Date</label>
                            <input type="date" name="check-in-date" id="check-in-date" class="form-control" 
                            onchange="check_date_validity();" value="<?php echo $current_date ?>" min="<?php echo $current_date ?>"
                            max="javascript:document.getElementById('check-out-date').value">
                        </div>

                        <div class="col-md-4">
                            <label for="check-out-date">Check Out Date</label>
                            <input type="date" name="check-out-date" id="check-out-date" class="form-control" 
                            onchange="check_date_validity();" value="<?php echo $tomorrow_date ?>" min="<?php echo $tomorrow_date ?>">
                        </div>
                    </div>


                    <div class="row form-row mb-4">
                        <div class="col-md-4">
                            <label for="room-number">Room Number</label>
                            <select name="room-number" id="room-number" onchange="update_total_price()" class="form-control">
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="check-in-adults">Adults</label>
                            <select name="adults" id="check-in-adults" class="form-control">
                                <option value="1">1</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="check-in-children">Children</label>
                            <select name="children" id="check-in-children" class="form-control">
                                <option value="0">0</option>
                            </select>
                        </div>
                    </div>


                    <div class="row form-row mb-4">
                        <div class="col-md-8">
                            <label for="special-request">Special Request <small style="color: red;">(Optional)</small></label>
                            <textarea name="special-request" id="special-request" class="form-control border border-dark" style="resize: none;"></textarea>
                        </div>
                        <div class="col-md-4">
                            <label for="total-price">Total Price</label>
                            <input type="number" name="total-price" id="total-price" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="row form-row">
                        <div class="col-md-9">
                        </div>

                        <div class="col-md-3">
                            <input type="submit" class="btn btn-primary w-100 h-100" name="guest-check-in" style="font-size: 18px;" value="Check In">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>



    <?php
    $get_available_rooms = mysqli_query($conn, "SELECT r.room_no, rt.room_name FROM rooms r 
        INNER JOIN room_types rt ON rt.id = r.room_type ORDER by room_no");
    $available_rooms = $get_available_rooms->fetch_all(1);

    for ($x = 0; $x < sizeof($available_rooms); $x++) {
        $room_no = $available_rooms[$x]['room_no'];
        $room_name = $available_rooms[$x]['room_name'];

        echo "
            <script type=\"text/javascript\">
                var room_no_ui = '" . $room_no . "';
                var room_name_ui = '" . $room_name . "';
            </script>
            ";


        echo "
            <script type=\"text/javascript\" src=\"listRoomsCheckIn.js\">
            </script> 
            ";
    }
    ?>


    <!--Sidebar and Main Content End-->








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

    <script src="../app.js"></script>

</body>

</html>