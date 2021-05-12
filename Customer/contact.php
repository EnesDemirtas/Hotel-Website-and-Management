<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Mazarin | Contact</title>
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
                        <a class="nav-link" href="rooms-suites.php">ROOMS/SUITES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="events.php">EVENTS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php" style="text-decoration:underline;">CONTACT</a>
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

    <!--Main Content Start-->

    <section id="contact-section">
        <div class="container">
            <div class="header">
                <h1 class="page-header" style="text-decoration: underline;">Contact</h1>
            </div>


            <div class="row">
                <div class="col-md-8 position-relative">
                    <p class="position-absolute" style="top: 30%; letter-spacing:.5px; font-size: 16px; font-weight: 600;">Lorem ipsum, dolor sit
                        amet consectetur adipisicing
                        elit. Mollitia, cupiditate ratione est perferendis ut blanditiis harum. Commodi odit et libero
                        beatae dolore. Voluptatem architecto et adipisci itaque voluptatum aliquam neque sequi
                        recusandae. Tempore debitis corrupti nam laborum eaque officia maxime, ratione ea nobis tempora
                        iusto. Corporis quo voluptatum, fugit quia nesciunt omnis voluptate eos alias qui, sapiente at
                        minima similique odit maxime eius iste laudantium quae quas enim error laboriosam.</p>
                </div>

                <div class="col-md-4">
                    <div id="googleMap" style="width:100%;height:400px"></div>
                </div>
            </div>

            <br><br><br><br>

            <div class="info-text mt-5">
                <p style="font-weight: 600; letter-spacing:.25px; font-size:14px">Lorem ipsum, dolor sit amet
                    consectetur adipisicing elit. Nihil, amet alias consequatur minus veniam itaque.</p>
            </div>


            <div class="row">
                <form class="col-8 p-4 m-4">
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
                            <label for="telephone">Telephone</label>
                            <input type="tel" name="telephone" id="telephone" class="form-control">
                        </div>

                        <div class="col-6">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                    </div>


                    <div class="row form-row">
                        <div class="col">
                            <textarea style="resize: none;" name="message" id="message" cols="147" rows="10" placeholder="Message..."></textarea>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-10"></div>
                        <div class="col-2">
                            <button class="btn btn-danger">Submit Request</button>
                        </div>
                    </div>
                </form>
            </div>


            <div class="row">
                <div class="col-10">
                    <div class="info-text">
                        <p style="letter-spacing:0.25px; font-size:16px;">Lorem ipsum dolor sit, amet consectetur
                            adipisicing elit. Nobis ratione minima praesentium saepe
                            sed delectus libero doloremque modi quia reiciendis. Aspernatur blanditiis voluptatibus
                            eligendi
                            repellendus. Molestiae magnam tempora rerum aut labore recusandae id facilis quis doloremque
                            consectetur, eius odio veniam?</p>
                    </div>
                </div>
            </div>

            <div class="row d-flex justify-content-center">
                <div class="col-md-3">
                    <a href="#">
                        <i class="fas fa-phone fa-3x text-center m-3" style="color: #000;"></i>
                    </a>

                    <strong>+90 234 34 54 2</strong>
                </div>

                <div class="col-md-3">
                    <a href="#">
                        <i class="fas fa-envelope fa-3x m-3" style="color: #000;"></i>
                    </a>

                    <strong>info@hotelmazarin.com</strong>
                </div>
            </div>


        </div>
    </section>


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
                            <!-- <strong style="color:#fff">+90 234 34 54 2</strong> -->
                        </div>
                    </div>


                    <div class="col-md-2 text-center">
                        <a href="#" class="mail-icon inline-block">
                            <i class="fas fa-envelope fa-2x text-white"></i>
                        </a>
                        <div>
                            <!-- <strong style="color:#fff">info@hotelmazarin.com</strong> -->
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

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGObzhaefT2HU9D2elgX-vc_4ADLFnF3w&callback=myMap">
    </script>
</body>

</html>