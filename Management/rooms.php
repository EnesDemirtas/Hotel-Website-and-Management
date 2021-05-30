<?php
session_start();
include '../phpFunctions/databaseConnection.php';
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
                            <a class="nav-link" href="#">
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
    $get_rooms_sql = mysqli_query($conn, "SELECT r.room_no, r.room_type, rt.room_name, r.isAvailable, r.isFull, r.customer_id, 
    u.name AS customer_name, r.cleaner_id, s.name AS staff_name FROM rooms r 
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
            <a href="reservation.php">Reservation</a>
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
        if($customer_id === NULL){
            $customer_id = 'im null';
            $customer_name = 'im null';
        }
        
        
        $cleaner_id = $all_rooms[$x]['cleaner_id'];
        $cleaner_name = $all_rooms[$x]['staff_name'];

        echo "
        <script type=\"text/javascript\">


        var room_no_ui = '" . $room_no .  "';
        var room_name_ui = '" . $room_name .  "';
        var is_available_ui = '". $is_available . "';
        var is_full_ui = '". $is_full . "';
        var cleaner_id_ui = '". $cleaner_id . "';
        var cleaner_name_ui = '". $cleaner_name . "';
        
        var customer_id_ui = '". $customer_id . "';
        var customer_name_ui = '". $customer_name . "';

        var counter = '". $counter. "';
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

    ?>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

    <script src="../app.js"></script>
</body>

</html>