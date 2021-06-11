<?php session_start();
include '../phpFunctions/databaseConnection.php';
include '../phpFunctions/security.php';
?>
<!DOCTYPE php>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Mazarin | Housekeeping</title>
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
                            <a class="nav-link" class="logout" href="login.php">
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

echo "
<script type=\"text/javascript\" src=\"clearDirtyRooms.js\">
</script>
";

    $get_dirty_rooms_sql = mysqli_query($conn, "SELECT r.room_no, rt.room_name, s.name FROM rooms r 
    INNER JOIN room_types rt ON r.room_type = rt.id
    INNER JOIN staffs s ON r.cleaner_id = s.id
    WHERE isAvailable = 0 AND isFull = 0");
    $get_dirty_rooms = $get_dirty_rooms_sql->fetch_all(1);
    ?>




    <!--Sidebar and Main Content Start-->

    <div class="container">
        <div class="sidenav mt-3">
            <a href="rooms.php">Rooms</a>
            <a href="guests-check-in.php" style="padding-right: 0;">Guests Check In</a>
            <a href="guests-check-out.php" style="letter-spacing: -.25px; padding-right:0;">Guests Check Out</a>
            <a href="housekeeping.php" style="background-color: #198754af">Housekeeping</a>
            <a href="message-box.php">Message Box</a>
            <a href="reservation-logs.php" style="letter-spacing: -.25px; padding-right:0;">Reservation Logs</a>
            <a href="reports.php" style="border-bottom: none;">Reports</a>
        </div>

        <div class="main">
            <table class="mx-auto table table-hover text-center table-striped" style="width: 100%;">
                <thead class="bg-danger text-light">
                    <tr>
                        <th>Room Number</th>
                        <th>Room Type</th>
                        <th>Cleaner</th>
                        <th>Mark as Cleared</th>
                    </tr>
                </thead>

                <tbody id="dirty-rooms-body">

                </tbody>
            </table>
        </div>
    </div>

    <!--Sidebar and Main Content End-->

    <?php

    for ($x = 0; $x < sizeof($get_dirty_rooms); $x++) {
        $dirty_room_no = escape_sanitize_output($get_dirty_rooms[$x]['room_no']);
        $dirty_room_name = escape_sanitize_output($get_dirty_rooms[$x]['room_name']);
        $dirty_room_housekeeper = escape_sanitize_output($get_dirty_rooms[$x]['name']);

        echo "
        <script type=\"text/javascript\">
            var dirty_room_no_ui = '" . $dirty_room_no . "';
            var dirty_room_name_ui = '" . $dirty_room_name . "';
            var dirty_room_housekeeper_ui = '" . $dirty_room_housekeeper . "';
        </script>
        ";

        echo "
        <script type=\"text/javascript\" src=\"listDirtyRooms.js\">
        </script>
        ";
    }

    ?>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

    <script src="../app.js"></script>
</body>

</html>