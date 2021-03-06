<?php session_start();
include '../phpFunctions/databaseConnection.php';
include 'getPersonalInfos.php';
require "../phpFunctions/routing.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Mazarin | Reservation</title>
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

    <?php

    if (isset($_POST['confirm-reservation'])) {
        if (empty($_POST['name']) or empty($_POST['lastname']) or empty($_POST['card-number']) or empty($_POST['expireMM']) or empty($_POST['expireYY']) or empty($_POST['cvc'])) {
            echo "<div class='text-center bg-danger text-white'> Please provide all inputs correctly... </div>";
        } else {
            $_SESSION['booking_special_request'] = escape_sanitize_input($conn, $_POST['special-request'], "string");
            go("cardValidation.php");
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

    <!--User Info Section Start-->

    <?php

    if (isset($_POST['book-button'])) {

        $_SESSION['booking_room_no'] = escape_sanitize_input($conn, $_POST['booking-room-no'], "string");
        $_SESSION['booking_room_name'] = escape_sanitize_input($conn, $_POST['booking-room-name'], "string");
        $_SESSION['booking_room_type'] = escape_sanitize_input($conn, $_POST['booking-room-type'], "string");
        $_SESSION['booking_total_price'] = escape_sanitize_input($conn, $_POST['booking-total-price'], "string");
        $_SESSION['booking_adults'] = escape_sanitize_input($conn, $_POST['booking-adults'], "string");
        $_SESSION['booking_children'] = escape_sanitize_input($conn, $_POST['booking-children'], "string");
        $_SESSION['booking_check_in_date'] = escape_sanitize_input($conn, $_POST['booking-check-in-date'], "string");
        $_SESSION['booking_check_out_date'] = escape_sanitize_input($conn, $_POST['booking-check-out-date'], "string");

        if (!isset($_SESSION['session_username_customer']) && !$_SESSION["logged_in"] === true) {
            go("guest-booking.php");
        }
    }

    ?>


    <section id="user-info-section">
        <div class="container">
            <div class="row">
                <h3>Reservation</h3>
                <hr class="mb-5" style="color: #043b22; height: 6px; width: 10%;">

            </div>

            <div class="row mt-5">
                <div class="col-4 events-main-content-img">
                    <img src="../images/room_<?php echo $_SESSION['booking_room_type'] ?>.jpg" alt="" style="max-width:700px; max-height:600px; width: 100%;">
                </div>

                <div class="col-5 mx-4">

                    <div class="events-main-content-text">
                        <h2><?php echo $_SESSION['booking_room_name'] . " | " . $_SESSION['booking_room_no'] ?></h2>
                        <p style="font-size:14px; letter-spacing:.25px;">Lorem ipsum dolor sit amet
                            consectetur adipisicing elit.
                            Mollitia sit, adipisci sunt rerum
                            ipsam,
                            tempora ex culpa quas pariatur odit voluptates ea veniam animi distinctio libero eius maxime
                            dicta illum expedita dolores enim quae, hic eligendi. Esse earum, nulla quia autem porro vel
                            voluptas illo repudiandae optio necessitatibus quam reiciendis.</p>


                    </div>

                    <h4 class="my-4">Total Price: <?php echo $_SESSION['booking_total_price'] ?></h4>
                    <h5>Adults: <?php echo $_SESSION['booking_adults'] ?> Children: <?php echo $_SESSION['booking_children'] ?></h5>


                </div>
            </div>

            <h4 class="my-5" style="font-weight:400; letter-spacing:1px">Personal Information</h4>

            <div class="row">
                <form class="col-8 my-4">

                    <?php

                    $user_personal_infos = getPersonalInfos($conn);

                    echo "
                    
                    <div class='row form-row mb-4'>
                    <div class='col-6'>
                        <label>Name</label>
                        <input type='text' name='name_d' id='name_D' class='form-control border border-secondary' readonly value='" . $user_personal_infos['name'] . "'>
                    </div>

                    <div class='col-6'>
                    <label for='email'>Email</label>
                    <input type='email' name='email' id='email' class='form-control border border-secondary' readonly value='" . $user_personal_infos['email'] . "'>
                </div>
 
                </div>


                <div class='row form-row mb-4'>
                    <div class='col-6'>
                        <label for='telephone'>Telephone</label>
                        <input type='tel' name='telephone' id='telephone' class='form-control border border-secondary' readonly value='" . $user_personal_infos['phone_number'] . "'>
                    </div>


                </div>
                    
                    ";

                    ?>


                </form>
            </div>

            <div class="row">
                <form class="col-8 my-4" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="special-request" style="font-weight:500; font-size:14px">Special Request <small><i>*Optional</i></small></label>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-6">
                            <textarea name="special-request" id="special-request" cols="90" rows="10" style="resize: none;"></textarea>
                        </div>
                    </div>


                    <h4 class=" my-5" style="font-weight:400; letter-spacing:1px">Payment Details</h4>


                    <div class="row form-row mb-4">
                        <div class="col-6">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>

                        <div class="col-6">
                            <label for="lastname">Last Name</label>
                            <input type="text" name="lastname" id="lastname" class="form-control">
                        </div>
                    </div>


                    <div class="row form-row mb-4">
                        <div class="col-6">
                            <label for="card-number">Card Number</label>
                            <input type="number" name="card-number" id="card-number" class="form-control">
                        </div>

                        <div class="col-6">
                            <label class="text-center">MM/YY</label>
                            <!-- <input type="email" name="email" id="email" class="form-control"> -->
                            <div class="row">
                                <div class="col-md-3">
                                    <select name='expireMM' id='expireMM'>
                                        <option value=''>Month</option>
                                        <option value='01'>January</option>
                                        <option value='02'>February</option>
                                        <option value='03'>March</option>
                                        <option value='04'>April</option>
                                        <option value='05'>May</option>
                                        <option value='06'>June</option>
                                        <option value='07'>July</option>
                                        <option value='08'>August</option>
                                        <option value='09'>September</option>
                                        <option value='10'>October</option>
                                        <option value='11'>November</option>
                                        <option value='12'>December</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select name='expireYY' id='expireYY'>
                                        <option value=''>Year</option>
                                        <option value='2021'>2021</option>
                                        <option value='2022'>2022</option>
                                        <option value='2023'>2023</option>
                                        <option value='2024'>2024</option>
                                        <option value='2025'>2025</option>
                                        <option value='2026'>2026</option>
                                        <option value='2027'>2027</option>
                                        <option value='2028'>2028</option>
                                        <option value='2029'>2029</option>

                                    </select>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row form-row mb-4">
                        <div class="col-6">
                            <label for="cvc">CVC</label>
                            <input type="number" name="cvc" id="cvc" class="form-control w-25">
                        </div>

                        <div class="col-6 mt-4">
                            <input type='submit' name='confirm-reservation' class='btn btn-success' id='confirm-reservation' value='Confirm Reservation'>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </section>

    <!--User Info Section End-->







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

</html>