<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Mazarin | Home Page</title>
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
        <header>
            <nav class="navbar navbar-expand-md bg-success mb-5">
                <div class="container bg-success" style="height: 5rem">
                    <a class="navbar-brand me-5" href="index.php">
                        HOTEL MAZARIN
                    </a>


                    <ul class="nav d-flex justify-content-between navbar-nav ms-5" id="myNav" style="width:50%">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php" style="text-decoration:underline;">HOME</a>
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
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="login.php">LOGIN</a>
                        </li> -->
                    </ul>

                </div>

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
            </nav>
        </header>
        <!--Navbar End-->

        <!--Main Content Start-->
        <section id="main-content">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../images/slide_1.jpg" class="d-block w-100 .active" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../images/slide_2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../images/slide_3.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
    </div>

    <br><br><br><br>

    <!--Main Content End-->

    <!--Quick Booking-->

    <script src="checkDateValidity.js"></script>

    <?php

    $current_date = date('Y-m-d');
    $tomorrow_date = date('Y-m-d', strtotime($current_date . " + 1 days"));

    ?>

    <section id="quick-booking">
        <form action="rooms-suites.php" method="POST">
            <div class="form-row d-flex justify-content-center">
                <span class="checkin">Check In</span>
                <div class="form-group col-md-2" style="display: inline-block">
                    <input class="form-control" type="date" name="checkin-guest" onchange="check_date_validity();" id="checkin-room-searching" 
                    value="<?php echo $current_date; ?>" min="<?php echo $current_date; ?>" 
                    max="javascript:document.getElementById('checkout-room-searching').value">
                </div>
                <span class="checkout">Check Out</span>
                <div class="form-group col-md-2" style="display: inline-block">
                    <input class="form-control" type="date" name="checkout-guest" id="checkout-room-searching" onchange="check_date_validity();" value="<?php echo $tomorrow_date; ?>" min="<?php echo $tomorrow_date; ?>">
                </div>
                <span class="adults">Adults</span>
                <div class="form-group col-md-2" style="display: inline-block">
                    <select class='form-control' type='number' name='adults-guest' id='adults-room-searching' value='1'>
                        <option value='1'>1</option>
                        <option value='2'>2</option>
                        <option value='3'>3</option>
                        <option value='4'>4</option>
                    </select>
                </div>
                <span class="children">Children</span>
                <div class="form-group col-md-2" style="display: inline-block">
                    <select class='form-control inline-block' type='number' name='children-guest' id='children-room-searching' value='0'>
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

                <button type="submit" class="btn btn-danger" name="booking-guest" style="display: inline-block">Book Now</button>
            </div>

        </form>
    </section>
    <!--Quick Booking End-->

    <br><br><br>

    <!--Before Footer Start-->

    <section id="before-footer">
        <div id="before-footer-container" class="container">
            <div class="row">
                <div class="col-7 before-footer-img">
                    <img src="../images/landing_page_1.jpg" alt="" style="max-width:700px; max-height:600px; width: 100%;">
                </div>

                <div class="col-5" style="position:relative">

                    <div class="before-footer-text" style="position:absolute;left: 0; top: 20%;">
                        <h2 style="margin-bottom: 4rem">Our Hotel</h2>
                        <p style="margin-bottom: 3rem;">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Mollitia sit, adipisci sunt rerum
                            ipsam,
                            tempora ex culpa quas pariatur odit voluptates ea veniam animi distinctio libero eius maxime
                            dicta illum expedita dolores enim quae, hic eligendi. Esse earum, nulla quia autem porro vel
                            voluptas illo repudiandae optio necessitatibus quam reiciendis.</p>

                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia sit, adipisci sunt rerum
                            ipsam,
                            tempora ex culpa quas pariatur odit voluptates ea veniam animi distinctio libero eius maxime
                            dicta illum expedita dolores enim quae, hic eligendi. Esse earum, nulla quia autem porro vel
                            voluptas illo repudiandae optio necessitatibus quam reiciendis.</p>
                    </div>

                </div>
            </div>

            <br><br><br>

            <div class="row">

                <div class="col-5" style="position:relative">

                    <div class="before-footer-text" style="position:absolute;left: 0; top: 20%;">
                        <h2 style="margin-bottom: 4rem">COVID-19 Measures</h2>
                        <p style="margin-bottom: 3rem;">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Mollitia sit, adipisci sunt rerum
                            ipsam,
                            tempora ex culpa quas pariatur odit voluptates ea veniam animi distinctio libero eius maxime
                            dicta illum expedita dolores enim quae, hic eligendi. Esse earum, nulla quia autem porro vel
                            voluptas illo repudiandae optio necessitatibus quam reiciendis.</p>

                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia sit, adipisci sunt rerum
                            ipsam,
                            tempora ex culpa quas pariatur odit voluptates ea veniam animi distinctio libero eius maxime
                            dicta illum expedita dolores enim quae, hic eligendi. Esse earum, nulla quia autem porro vel
                            voluptas illo repudiandae optio necessitatibus quam reiciendis.</p>
                    </div>

                </div>


                <div class="col-7 before-footer-img">
                    <img src="../images/landing_page_2.jpg" alt="" style="max-width:700px; max-height:600px; width: 100%;">
                </div>


            </div>


        </div>
    </section>

    <!-- Before Footer End-->


    <!--Footer Start-->

    <footer class="page-footer bg-dark">
        <div class="bg-success">
            <div class="container mt-5">
                <div class="row py-4 d-flex align-items-between justify-content-between">
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