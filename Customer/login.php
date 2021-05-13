<?php session_start(); include 'databaseConnection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Mazarin | Login</title>
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
                        <a class="nav-link" href="login.php" style="text-decoration:underline;">LOGIN</a>
                    </li>
                </ul>



            </div>


        </nav>
    </header>
    <!--Navbar End-->

    <?php


    if (isset($_POST['login_username'])) {
        $username = $_POST['login_username'];
        $password = $_POST['login_password'];

        $_SESSION["session_username"] = $username;


        if ($username != '' and $password != '') {

            $result1 = $conn->query("SELECT username, password FROM users WHERE username = '" . $username . "' AND  password = '" . $password . "'");

            if ($result1->num_rows > 0) {
                session_regenerate_id(true);
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $username;



                header("Location:user-personal-infos.php");
            } else {
                echo "<div class='text-center bg-danger text-white'> Invalid username or/and password! </div>";
            }
            // if($username == 'admin' and $password == 'admin'){
            //     header("Location:user-personal-infos.php?username=$username");
            //     die();
            // } else {
            //     echo "<div class='text-center bg-danger text-white'> Invalid username or/and password! </div>";
            // }

        } else {
            echo "<div class='text-center bg-danger text-white'> Please provide a username and password </div>";
        }
    };

    ?>

    <!--Login Section Start-->

    <section id="login-section">
        <div class="container h-100">

            <div class="d-flex justify-content-center h-100">



                <div class="user_card">

                    <div class="d-flex justify-content-center form_container">
                        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">

                            <div class="header text-center mb-3">
                                <h1>Login</h1>
                            </div>
                            <hr class="mb-5" style="color: #198754; height: 3px;">
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="login_username" class="form-control input_user" value="" placeholder="username">
                            </div>
                            <div class="input-group mb-2">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="login_password" class="form-control input_pass" value="" placeholder="password">
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customControlInline">
                                    <label class="custom-control-label" for="customControlInline">Remember me</label>
                                </div>
                            </div>


                            <div class="mt-4">
                                <div class="d-flex justify-content-center links">
                                    Don't have an account? <a href="signup.php" class="ml-2">Sign Up</a>
                                </div>
                                <div class="d-flex justify-content-center links">
                                    <a href="#" id="invalid-try-text">Forgot your password?</a>
                                </div>
                            </div>


                            <div class="d-flex justify-content-center mt-3 login_container">
                                <a href="user-personal-infos.php">
                                    <button type="submit" name="button" class="btn login_btn btn-primary">Login</button>
                                </a>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </section>


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