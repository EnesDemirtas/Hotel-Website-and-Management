<?php session_start(); ?>
<!DOCTYPE php>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Mazarin | Reservations</title>
    <meta name="keyword" content="Hotel, Mazarin, Hotel Mazarin">
    <meta name="description" content="Hotel Mazarin">

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />


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



    <!--Sidebar and Main Content Start-->

    <div class="container">
        <div class="sidenav mt-3">
            <a href="rooms.php">Rooms</a>
            <a href="guests-check-in.php" style="padding-right: 0;">Guests Check In</a>
            <a href="guests-check-out.php" style="letter-spacing: -.25px; padding-right:0;">Guests Check Out</a>
            <a href="housekeeping.php">Housekeeping</a>
            <a href="reservation.php" style="background-color: #198754af">Reservation</a>
            <a href="reports.php" style="border-bottom: none;">Reports</a>
        </div>

        <div class="main">
            <div class="card w-75 border border-dark">
                <div class="card-body">
                    <div class="row m-3">
                        <div class="col-md-4">
                            <span>Name: </span><span id="reservation-name">Alex</span>
                        </div>

                        <div class="col-md-4">
                            <span>Check In Date: </span><span id="reservation-check-in-date">22/04/2021</span>
                        </div>
                    </div>

                    <div class="row m-3">
                        <div class="col-md-4">
                            <span>Surname: </span><span id="reservation-surname">Jame</span>
                        </div>

                        <div class="col-md-4">
                            <span>Check Out Date: </span><span id="reservation-check-out-date">29/04/2021</span>
                        </div>

                        <div class="col-md-4">
                            <span>Room Number: </span><span id="reservation-room-number">203</span>
                        </div>
                    </div>

                    <div class="row m-3">
                        <div class="col-md-4">
                            <span>Gender: </span><span id="reservation-gender">Male</span>
                        </div>

                        <div class="col-md-4">
                            <span>Payment: </span><span id="reservation-payment">Online</span>
                        </div>
                    </div>

                    <div class="row m-3">
                        <div class="col-md-4">
                            <span>Adults: </span><span id="reservation-adults">2</span>
                        </div>

                        <div class="col-md-4">
                            <span>Total Price (&#8378): </span><span id="reservation-total-price">1560</span>
                        </div>
                    </div>

                    <div class="row m-3">
                        <div class="col-md-4">
                            <span>Children: </span><span id="reservation-children">1</span>
                        </div>

                        <div class="col-md-4"></div>

                        <div class="col-md-4">
                            <button class="btn btn-secondary">Confirm Reservation</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Sidebar and Main Content End-->








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

    <script src="../app.js"></script>


</body>

</html>