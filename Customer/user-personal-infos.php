<?php session_start();
include '../phpFunctions/databaseConnection.php';
include 'getPersonalInfos.php';
require "../phpFunctions/routing.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Mazarin | User Info</title>
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
                        <a class="nav-link" href="contact.php">CONTACT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" href="#" style="text-decoration:underline;"><?php echo $_SESSION['session_username'] ?></a>
                    </li>
                    <li class="nav-item">
                        <!-- <a class="nav-link logout" href="login.php">
                                Log out <span><i class="fa fa-sign-out-alt"></i></span>
                            </a> -->
                        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
                            <button type="submit" name="navbar-logout" class="border-0">
                                <a class="nav-link logout" href="exit.php">
                                    Log out <span><i class="fa fa-sign-out-alt"></i></span>
                                </a>
                            </button>
                        </form>
                    </li>
                </ul>



            </div>


        </nav>
    </header>
    <!--Navbar End-->


    <!--User Info Section Start-->

    <section id="user-info-section">
        <div class="container w-100 h-auto">
            <div class="row">
                <h1>User</h1>
                <hr class="mb-5" style="color: #043b22; height: 6px; width: 10%;">

            </div>

            <div class="row">
                <div class="col-3 personal-information-link">
                    <a href="user-personal-infos.php" style="color: rgba(96, 150, 94, 0.863); transition: .25s;">
                        <h3 style="font-weight: 400; text-decoration: underline;">Personal Information</h3>
                    </a>
                </div>

                <div class="col-1" style="height: 3rem; border-left: 3px solid #043b22;"></div>

                <div class="col-3 reservations-link">
                    <a href="reservations.php" style="color: rgba(39, 39, 39, 0.822); transition: .25s;">
                        <h3 style="font-weight: 600;">Reservations</h3>
                    </a>
                </div>
            </div>

            <?php

            $user_infos = getPersonalInfos($conn);
            
            echo "
            <script type=\"text/javascript\">
            function confirmChanges(){
                if(confirm(\"Are you sure you want to change your information?\")){
                    " . saveUserChanges($conn) . "
                } 
            }
            </script>
            ";


            ?>

            <div class="row">
                <form class="col-8 my-4" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                    <div class="row form-row mb-4">

                        <?php

                        $user_infos = getPersonalInfos($conn);
                        echo "
                    <div class='col-6'>
                    <label for='name'>Username</label>
                    <input type='text' name='username' id='username' readonly class='form-control' value='" . $user_infos['username'] . "'>
                </div>

                <div class='col-6'>
                    <label for='Fullname'>Full Name</label>
                    <input type='text' name='fullname' id='fullname' class='form-control' value='" . $user_infos['name'] . "'>
                </div>
            </div>


            <div class='row form-row mb-4'>
                <div class='col-6'>
                    <label for='telephone'>Telephone</label>
                    <input type='tel' name='telephone' id='telephone' class='form-control' value='" . $user_infos['phone_number'] . "'>
                </div>

                <div class='col-6'>
                    <label for='email'>Email</label>
                    <input type='email' name='email' id='email' class='form-control' value='" . $user_infos['email'] . "'>
                </div>
            </div>


            <div class='row form-row'>
                <div class='col-6'>
                    <label for='password'>Password</label>
                    <input type='password' name='password' id='password' class='form-control' value='" . $user_infos['password'] . "'>
                </div>
            </div>

            <div class='row'>

                <div class='col-7'></div>
                <div class='col-2'>
                    <input type='submit' onclick=\"confirmChanges()\" name='personal-infos-changes' class='btn btn-danger' id='save-changes' value='Save Changes'>
                </div>
            </div>
                    ";

                        ?>

                        <!-- <div class="col-6">
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
                        <div class="col-6">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-7"></div>
                        <div class="col-2">
                            <button class="btn btn-danger">Save Changes</button>
                        </div>
                    </div> -->
                </form>
            </div>

        </div>
    </section>

    <!--User Info Section End-->








    <!--Footer Start-->

    <footer class="page-footer fixed-bottom">
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