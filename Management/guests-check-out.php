<?php session_start(); ?>
<!DOCTYPE php>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Mazarin | Check Out</title>
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
            <a href="guests-check-in.php" style="padding-right: 0;">Guests Check In</a>
            <a href="guests-check-out.php"
                style="letter-spacing: -.25px; padding-right:0; background-color: #198754af">Guests Check Out</a>
            <a href="housekeeping.php">Housekeeping</a>
            <a href="reservation.php">Reservation</a>
            <a href="reports.php" style="border-bottom: none;">Reports</a>
        </div>

        <div class="main">

            <label for="search-room-number">Search by Room Number: </label>
            <input type="number" id="search-room-number" name="search-room-number" class="m-3">
            <button class="btn btn-secondary">Search</button>

            <div class="row">
                <form class="col-8 my-4 border border-dark p-4">
                    <div class="row form-row mb-4">
                        <div class="col-md-4">
                            <label for="guest-name">Guest Name</label>
                            <input type="text" name="guest-name" id="check-out-guest-name" class="form-control"
                                value="Harun Tekin" readonly>
                        </div>

                        <div class="col-md-4">
                            <label for="check-in-date">Check In Date</label>
                            <input type="date" name="check-in-date" id="check-in-date" class="form-control"
                                value="2021-04-20" readonly>
                        </div>

                        <div class="col-md-4">
                            <label for="check-out-date">Check Out Date</label>
                            <input type="date" name="check-out-date" id="check-out-date" class="form-control">
                        </div>
                    </div>


                    <div class="row form-row mb-4">
                        <div class="col-md-4">
                            <label for="room-number">Room Number</label>
                            <input type="number" name="room-number" id="room-number" class="form-control" value="102" readonly>
                        </div>

                        <div class="col-md-4">
                            <label for="check-in-adults">Adults</label>
                            <input type="number" name="adults" id="check-out-adults" class="form-control" value="2"
                                readonly>
                        </div>

                        <div class="col-md-4">
                            <label for="check-in-children">Children</label>
                            <input type="number" name="children" id="check-out-children" class="form-control" value="1"
                                readonly>
                        </div>
                    </div>


                    <div class="row form-row mb-4">
                        <div class="col-md-4">
                            <label for="gender">Gender</label>
                            <input type="text" id="gender" name="gender" value="Male" class="form-control" readonly>
                            <!-- <select name="gender" id="gender" class="form-control" value="Male" readonly>
                                    <option value="male" selected>Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select> -->
                        </div>

                        <div class="col-md-4">
                            <label for="payment-info">Payment Info</label>
                            <input type="text" name="payment-info" id="payment-info" class="form-control"
                                value="Credit Card" readonly>
                        </div>

                        <div class="col-md-4">
                            <label for="total-price">Total Price (Turkish Lira)</label>
                            <input type="number" name="total-price" id="total-price" class="form-control" value="799"
                                readonly>
                        </div>
                    </div>

                    <div class="row form-row">
                        <div class="col-md-9"></div>

                        <div class="col-md-3">
                            <button class="btn btn-primary w-100 h-100" style="font-size: 18px;">Check Out</button>
                        </div>
                    </div>

                </form>
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