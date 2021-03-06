<?php session_start();
include '../phpFunctions/databaseConnection.php';
include 'listReservations.php';
include '../phpFunctions/routing.php';

if (!isset($_SESSION['session_username_customer']) && !$_SESSION["logged_in"] === true) {
    go("../oops.php");
}
?>
<!DOCTYPE html>
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


    <script>
        function confirmCancel() {
            if (confirm("Are you sure you want to cancel your reservation?"))
                return true;

            return false;
        }
    </script>




    <link rel="stylesheet" href="../main.css">
</head>

<body>

    <!--Navbar Start-->


    <header class="header">

        <nav class="navbar">
            <div class="container bg-success mb-5" style="height: 5rem">
                <a class="navbar-brand" href="index.php">
                    HOTEL MAZARIN
                </a>


                <ul class="nav d-flex justify-content-between" style="width:50%">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="rooms-suites.php">ROOMS/SUITES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="events.php">EVENTS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">CONTACT</a>
                    </li>
                    <?php

                    if (isset($_SESSION['session_username_customer']) && $_SESSION["logged_in"] === true) {

                        echo "<li class='nav-item'>
        <a class='nav-link text-uppercase' href='user-personal-infos.php' style='text-decoration:underline;'>" . $_SESSION['session_username_customer'] . " </a>
    </li>
    <li class='nav-item'>
    <form action=" . $_SERVER["PHP_SELF"]  . " method='POST'>
        <button type='submit' name='navbar-logout' class='border-0'>
            <a class='nav-link logout' href='exit.php'>
                Log out <span><i class='fa fa-sign-out-alt'></i></span>
            </a>
        </button>
    </form>
    </li>";
                    } else {
                        echo " <li class='nav-item'>
        <a class='nav-link' href='login.php'>LOGIN</a>
    </li>";
                    }




                    ?>

                </ul>



            </div>


        </nav>
    </header>
    <!--Navbar End-->

    <?php

    if (isset($_POST['cancel-reservation'])) {


        $cancel_room_no = escape_sanitize_input($conn, $_POST['cancel-room-no'], "string");
        $session_username = escape_sanitize_input($conn, $_SESSION['session_username_customer'], "string");

        $new_sql = "UPDATE reservation_records SET isActive = 0 
        WHERE customer_username = '$session_username' and room_no = '$cancel_room_no' and isActive = 1 ";

        if ($conn->query($new_sql) === TRUE) {

            $change_room_status_sql = "UPDATE rooms SET isFull = 0, customer_id = NULL
            WHERE room_no = $cancel_room_no ";

            if($conn->query($change_room_status_sql) === TRUE){
                echo "<div class='text-center bg-success text-white'> The reservation has been cancelled/finished successfully... </div>";
            } else {
                echo "Error: " . $change_room_status_sql . "<br>" . $conn->error;
            }

        } else {
            echo "Error: " . $new_sql . "<br>" . $conn->error;
        }
    }

    ?>

    <?php

    if (isset($_POST['request-message'])) {

        $username_session = $_SESSION['session_username_customer'];
        $message_room_no = escape_sanitize_input($conn, $_POST['message-room-no'], "string");
        $current_datetime = date('Y-m-d H:i:s');
        $request_message =  escape_sanitize_input($conn,$_POST['message'], "string");


        $request_sql = "INSERT INTO message_box (sender_username, message_room_no, message_type, message_time, message, isRead) 
        VALUES('$username_session', '$message_room_no', 'request', '$current_datetime', '$request_message', 0)";

        if ($conn->query($request_sql) === TRUE) {
            echo "<div class='text-center bg-success text-white'> Your message has been sent to the hotel management successfully. </div>";
        } else {
            echo "Error: " . $request_sql . "<br>" . $conn->error;
        }
    }


    if (isset($_POST['feedback-message'])) {

        $username_session = $_SESSION['session_username_customer'];
        $feedback_message_room_no = escape_sanitize_input($conn, $_POST['feedback-message-room-no'], "string");
        $current_datetime = date('Y-m-d H:i:s');
        $feedback_message = escape_sanitize_input($conn, $_POST['feedbackmessage'], "string");


        $feedback_sql = "INSERT INTO message_box (sender_username, message_room_no, message_type, message_time, message, isRead) 
        VALUES('$username_session', '$feedback_message_room_no', 'feedback', '$current_datetime', '$feedback_message', 0)";

        if ($conn->query($feedback_sql) === TRUE) {
            echo "<div class='text-center bg-success text-white'> Your feedback has been sent to the hotel management successfully. </div>";
        } else {
            echo "Error: " . $feedback_sql . "<br>" . $conn->error;
        }
    }

    ?>


    <!--Reservations Start-->


    <section id="reservations-section">
        <div class="container">
            <div class="row">
                <h1>User</h1>
                <hr class="mb-5" style="color: #043b22; height: 6px; width: 10%;">

            </div>

            <div class="row">
                <div class="col-2 me-5 reservations-link">
                    <a href="user-personal-infos.php" style="color: rgba(39, 39, 39, 0.822); transition: .25s;">
                        <h3 style="font-weight: 600;">Personal Information</h3>
                    </a>
                </div>

                <div class="col-1" style="height: 3rem; border-left: 3px solid #043b22;"></div>

                <div class="col-1 me-5 personal-information-link">
                    <a href="#" style="color: rgba(96, 150, 94, 0.863); transition: .25s;">
                        <h3 style="font-weight: 400; text-decoration: underline;">Reservations</h3>
                    </a>

                </div>
                <div class="col-3">
                    <a href="rooms-suites.php">
                        <button class="btn btn-success ms-5">New Reservation</button>
                    </a>
                </div>
            </div>



            <section id="current-reservations">
                <div class="current-reservations-header">
                    <h2>Current Reservations</h2>
                </div>
                <!-- <div class="row mt-5">
                    <div class="col-4 events-main-content-img">
                        <img src="../images/room_1.jpg" alt="" style="max-width:700px; max-height:600px; width: 100%;">
                    </div>

                    <div class="col-5">

                        <div class="events-main-content-text">
                            <p class="m-5" style="font-size:14px; letter-spacing:.25px;">Lorem ipsum dolor sit amet
                                consectetur adipisicing elit.
                                Mollitia sit, adipisci sunt rerum
                                ipsam,
                                tempora ex culpa quas pariatur odit voluptates ea veniam animi distinctio libero eius maxime
                                dicta illum expedita dolores enim quae, hic eligendi. Esse earum, nulla quia autem porro vel
                                voluptas illo repudiandae optio necessitatibus quam reiciendis.</p>


                        </div>

                        <div class="buttons m-5">
                            <button class="btn btn-secondary me-5">Change Reservation Date</button>
                            <button class="btn btn-danger ms-5">Cancel Reservation</button>
                        </div>

                    </div>
                </div> -->


            </section>
            <?php

            listCurrentReservations($conn);
            ?>




            <hr class="my-5" style="width:100%; height: 3px; color: #000">

            <section id="past-reservations">
                <div class="past-reservations-header">
                    <h2>Past Reservations</h2>
                </div>
                <!-- <div class="row mt-5">

                <div class="header mb-5">
                    <h3>Past Reservations</h3>
                </div>

                <div class="col-4 events-main-content-img">
                    <img src="../images/room_1.jpg" alt="" style="max-width:700px; max-height:600px; width: 100%;">
                </div>

                <div class="col-5">

                    <div class="events-main-content-text">
                        <p class="m-5" style="font-size:14px; letter-spacing:.25px;">Lorem ipsum dolor sit amet
                            consectetur adipisicing elit.
                            Mollitia sit, adipisci sunt rerum
                            ipsam,
                            tempora ex culpa quas pariatur odit voluptates ea veniam animi distinctio libero eius maxime
                            dicta illum expedita dolores enim quae, hic eligendi. Esse earum, nulla quia autem porro vel
                            voluptas illo repudiandae optio necessitatibus quam reiciendis.</p>


                    </div>

                    <div class="buttons m-5">
                        <a href="reservation.php">
                            <button class="btn btn-success me-5">Book Again</button>
                        </a>
                    </div>

                </div>
            </div> -->

            </section>
            <?php

            listPastReservations($conn);
            ?>





        </div>
    </section>


    <!--Reservations End-->









    <!--Footer Start-->

    <footer class="page-footer">
        <div class="bg-success">
            <div class="container mt-5">
                <div class="row py-4 d-flex align-items-between d-flex justify-content-between">
                    <div class="col-md-3 text-center">
                        <a href="#" class="location-icon inline-block">
                            <i class="fas fa-map-marker-alt fa-2x text-white"></i>
                        </a>
                        <div>
                            <strong style="color:#fff">Somewhere on the Earth</strong>
                        </div>
                    </div>

                    <div class="col-md-2 text-center">
                        <a href="#" class="phone-icon inline-block">
                            <i class="fas fa-phone fa-2x text-white"></i>
                        </a>
                        <div>
                            <strong style="color:#fff">+90 234 34 54 2</strong>
                        </div>
                    </div>


                    <div class="col-md-2 text-center">
                        <a href="#" class="mail-icon inline-block">
                            <i class="fas fa-envelope fa-2x text-white"></i>
                        </a>
                        <div>
                            <strong style="color:#fff">info@hotelmazarin.com</strong>
                        </div>
                    </div>

                    <div class="col-md-2 text-center align-items-center">
                        <a href="#" class="follow-us">
                            <span style="color:#fff; font-weight:800; margin-right: 12px">Follow Us</span>
                        </a>
                        <a href="#" class="facebook-icon inline-block">
                            <i class="fab fa-facebook-f fa-2x text-white"></i>
                        </a>

                        <a href="#" class="twitter-icon inline-block">
                            <i class="fab fa-twitter fa-2x text-white"></i>
                        </a>


                        <!-- <a href="#" class="phone-icon inline-block">
                            <i class="fas fa-envelope fa-2x text-white"></i>
                        </a>
                        <div>
                            <strong style="color:#fff">info@hotelmarazin.com</strong>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!--Footer End-->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

    <script src="../app.js"></script>
    <!-- <script src="listReservations.js"></script> -->
</body>

</html>