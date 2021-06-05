<?php session_start();
include '../phpFunctions/databaseConnection.php';
?>
<!DOCTYPE php>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Mazarin | Reservations</title>
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
<script type=\"text/javascript\" src=\"messageBoxFuncs.js\">
</script>
";

    $get_messages_sql = mysqli_query($conn, "SELECT mb.id, u.name, mb.message_room_no, mb.message_type, mb.message_time, mb.message, mb.isRead FROM message_box mb 
    INNER JOIN users u ON u.username = mb.sender_username");
    $messages = $get_messages_sql->fetch_all(1);
    ?>



    <!--Sidebar and Main Content Start-->

    <div class="container">
        <div class="sidenav mt-3">
            <a href="rooms.php">Rooms</a>
            <a href="guests-check-in.php" style="padding-right: 0;">Guests Check In</a>
            <a href="guests-check-out.php" style="letter-spacing: -.25px; padding-right:0;">Guests Check Out</a>
            <a href="housekeeping.php">Housekeeping</a>
            <a href="message-box.php" style="background-color: #198754af">Message Box</a>
            <a href="reports.php" style="border-bottom: none;">Reports</a>
        </div>

        <div class="main">
            <div class="container border border-dark p-3 m-3" id="requests">
                <div class="title">
                    <h2>Customer Requests</h2>
                </div>

                <div class="container-body" id="requests-body">

                </div>
            </div>


            <div class="container border border-dark p-3 m-3" id="feedbacks">
                <div class="title">
                    <h2>Customer Feedbacks</h2>
                </div>

                <div class="container-body" id="feedbacks-body">

                </div>

            </div>
        </div>
    </div>

    <!--Sidebar and Main Content End-->

    <?php

    for ($x = 0; $x < sizeof($messages); $x++) {
        $message_id = $messages[$x]['id'];
        $message_name = $messages[$x]['name'];
        $message_room_no = $messages[$x]['message_room_no'];
        $message_type = $messages[$x]['message_type'];
        $message_time = $messages[$x]['message_time'];
        $message = $messages[$x]['message'];
        $message_is_read = $messages[$x]['isRead'];

        echo "
        <script type=\"text/javascript\">
            var message_id_ui = '" . $message_id . "';
            var message_name_ui = '" . $message_name . "';
            var message_room_no_ui = '" . $message_room_no . "';
            var message_type_ui = '" . $message_type . "';
            var message_time_ui = '" . $message_time . "';
            var message_ui = '" . $message . "';
            var message_is_read_ui = '" . $message_is_read . "';
        </script>
        ";

        echo "
        <script type=\"text/javascript\" src=\"getMessages.js\">
        </script>
        ";
    }

    ?>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

    <script src="../app.js"></script>


</body>

</html>