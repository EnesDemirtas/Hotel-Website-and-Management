<?php
session_start();
include '../phpFunctions/databaseConnection.php';
require "../phpFunctions/routing.php"; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Mazarin | Card Validation</title>
    <meta name="keyword" content="Hotel, Mazarin, Hotel Mazarin">
    <meta name="description" content="Hotel Mazarin">

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        window.onload = function() {
            var threeMinutes = 60 * 3,
                display = document.querySelector('#confirm-val-time');
            startTimer(threeMinutes, display);
        };
    </script>





    <link rel="stylesheet" href="../main.css">
</head>

<body>

    <?php

    if (isset($_POST['confirm-validation'])) {
        $myUsername = $_SESSION['session_username'];
        $booking_room_no = $_SESSION['booking_room_no'];
        $booking_special_request = $_SESSION['booking_special_request'];
        $sql = "INSERT INTO reservation_requests (room_no, customer_username) VALUES ('$booking_room_no', '$myUsername')";

        if ($conn->query($sql) === TRUE) {

            $get_res_request_id = mysqli_query($conn, "SELECT id FROM reservation_requests WHERE room_no = $booking_room_no LIMIT 1");
            $fetch_res_request_id = $get_res_request_id->fetch_all(1);
            $res_request_id = $fetch_res_request_id[0]['id'];

            $number_of_adults = $_SESSION['booking_adults'];
            $number_of_children = $_SESSION['booking_children'];
            $check_in_date = $_SESSION['booking_check_in_date'];
            $check_out_date = $_SESSION['booking_check_out_date'];
            echo $check_in_date . " ,  ". $check_out_date;
            $total_price = $_SESSION['booking_total_price'];

            $new_sql = "INSERT INTO reservation_request_details (reservation_request_id, number_of_adults, number_of_children, check_in_date,
            check_out_date, total_price_TL, special_request, isAccepted) VALUES ('$res_request_id', '$number_of_adults', '$number_of_children',
            '$check_in_date', '$check_out_date', '$total_price', '$booking_special_request', '0')";

            if($conn->query($new_sql) === TRUE){
                //   echo "New reservation request created successfully"; 
                echo "<div class='text-center bg-success text-white'> Reservation request is created successfully. Hotel will activate it soon... </div>";
                go("user-personal-infos.php",5);
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }


        } 
    }

    ?>

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

                    if (isset($_SESSION['session_username']) && $_SESSION["logged_in"] === true) {

                        echo "<li class='nav-item'>
                            <a class='nav-link text-uppercase' href='user-personal-infos.php' style='text-decoration:underline;'>" . $_SESSION['session_username'] . " </a>
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

    <!--Login Section Start-->

    <section id="login-section">
        <div class="container h-100">

            <div class="d-flex justify-content-center h-100">



                <div class="user_card">

                    <div class="d-flex justify-content-center form_container">
                        <form action="" method="POST">

                            <div class="header text-center mb-3">
                                <h1>Mazarin Bank</h1>
                            </div>
                            <hr class="mb-5" style="color: #198754; height: 3px;">
                            <div class="mb-3">
                                <h5>Enter the validation code sent to your phone from your bank.</h5>

                                <div class="text-center">Validation code will be expired in <span id="confirm-val-time" class="fw-bold">03:00</span> minutes!</div>
                            </div>
                            <div class="input-group mb-2">
                                <input type="password" name="val-code" class="form-control input_pass" value="" placeholder="Validation Code">
                            </div>



                            <div class="d-flex justify-content-center mt-3 login_container">
                                <input type="submit" name="confirm-validation" class="btn login_btn btn-primary" value="Confirm">
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </section>










    <!--Footer Start-->

    <footer class=" page-footer">
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

</body>