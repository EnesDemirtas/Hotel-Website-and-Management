<?php session_start();
include '../phpFunctions/databaseConnection.php';
include 'listAvailableRooms.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Mazarin | Rooms/Suites</title>
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
                        <a class="nav-link" href="rooms-suites.php" style="text-decoration:underline;">ROOMS/SUITES</a>
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
                        <input type='hidden' id='custId' name='session_temp' value='3487'> 
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

                    <!-- <li class="nav-item">
                        <a class="nav-link" href="login.php">LOGIN</a>
                    </li> -->

                </ul>

                <div class="dropdown" id="dropdown">
                    <button class="btn btn-success border border-dark dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                        GO TO...
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <li><a href="index.php"><button class="dropdown-item" type="button">HOME</button></a></li>
                        <li><a href="rooms-suites.php"><button class="dropdown-item" type="button">ROOMS/SUITES</button></a></li>
                        <li><a href="events.php"><button class="dropdown-item" type="button">EVENTS</button></a></li>
                        <li><a href="contact.php"><button class="dropdown-item" type="button">CONTACT</button></a></li>
                        <li><a href="login.php"><button class="dropdown-item" type="button">LOGIN</button></a></li>
                    </ul>
                </div>

            </div>
        </nav>
    </header>
    <!--Navbar End-->


    <!--Room Search Start-->




    <script type="text/javascript" src="checkDateValidity.js">
    </script>

    <?php

    $current_date = date('Y-m-d');
    $tomorrow_date = date('Y-m-d', strtotime($current_date . " + 1 days"));

    ?>


    <section id='room-searching'>
        <div class='container'>
            <form id='available-rooms-searching' method='POST'>
                <div class='row form-row d-flex justify-content-between align-items-center'>
                    <div class='col-md-3'>
                        <div class='form-group'>
                            <span class='text-center' style='color: #2c43c7; font-weight:700;'>Check In</span>
                            <input class='form-control inline-block' type='date' name='checkin-room-searching' min="<?php echo $current_date; ?>" 
                            onchange='check_date_validity()' id='checkin-room-searching' value='<?php echo $current_date; ?>'
                            max="javascript:document.getElementById('checkout-room-searching').value">
                        </div>
                    </div>


                    <div class='col-md-3'>
                        <div class='form-group'>
                            <span class='text-center' style='color: #2c43c7; font-weight:700;'>Check Out</span>
                            <input class='form-control inline-block' type='date' name='checkout-room-searching' id='checkout-room-searching' onchange="check_date_validity();" value='<?php echo $tomorrow_date; ?>' min="<?php echo $tomorrow_date; ?>">
                        </div>
                    </div>


                    <div class='col-md-2'>
                        <div class='form-group'>
                            <span class='text-center' style='color: #2c43c7; font-weight:700;'>Adults</span>
                            <select class='form-control' type='number' name='adults-room-searching' id='adults-room-searching' value='1'>
                                <option value='1'>1</option>
                                <option value='2'>2</option>
                                <option value='3'>3</option>
                                <option value='4'>4</option>
                            </select>

                        </div>
                    </div>


                    <div class='col-md-2'>
                        <div class='form-group'>
                            <span class='text-center' style='color: #2c43c7; font-weight:700;'>Children</span>
                            <select class='form-control inline-block' type='number' name='children-room-searching' id='children-room-searching' value='0'>
                                <option value='0'>0</option>
                                <option value='1'>1</option>
                                <option value='2'>2</option>
                                <option value='3'>3</option>
                                <option value='4'>4</option>
                                <option value='5'>5</option>
                                <option value='6'>6</option>
                                <option value='7'>7</option>
                                <option value='8'>8</option>
                            </select>
                        </div>
                    </div>


                    <div class='col-md-2'>
                        <input type='submit' name='list-available-rooms' class='btn btn-secondary' id='list-available-rooms' value='Search'>
                    </div>
                </div>
            </form>





        </div>
    </section>



    <script type="text/javascript">
        function toggler(divId) {
            $("#" + divId).toggle(400);
        }
    </script>


    <section id='main-content' class='mt-5'>


    </section>


    ";

    ?>

    <?php

    if (isset($_POST['list-available-rooms'])) {
        $user_check_in_date = escape_sanitize_input($conn, $_POST['checkin-room-searching'], "string");
        $user_check_out_date = escape_sanitize_input($conn, $_POST['checkout-room-searching'], "string");
        $user_adults = escape_sanitize_input($conn, $_POST['adults-room-searching'], "string");
        $user_children = escape_sanitize_input($conn, $_POST['children-room-searching'], "string");

        listAvailableRooms($conn, $user_check_in_date, $user_check_out_date, $user_adults, $user_children);
    } else if (isset($_POST['booking-guest'])) {
        $guest_check_in_date = escape_sanitize_input($conn, $_POST['checkin-guest'], "string");
        $guest_check_out_date = escape_sanitize_input($conn, $_POST['checkout-guest'], "string");
        $guest_adults = escape_sanitize_input($conn, $_POST['adults-guest'], "string");
        $guest_children = escape_sanitize_input($conn, $_POST['children-guest'], "string");

        listAvailableRooms($conn, $guest_check_in_date, $guest_check_out_date, $guest_adults, $guest_children);
    } else {
        listAvailableRooms($conn, $current_date, $tomorrow_date, 1, 1);
    }

    ?>

    <!--Footer Start-->

    <footer class="page-footer bg-dark">
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

</html>