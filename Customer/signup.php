<?php
session_start();
include '../phpFunctions/databaseConnection.php';
include '../phpFunctions/security.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Mazarin | Sign Up</title>
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



    <!--Signup Section Start-->
    <?php


    if (isset($_POST['signup-submit'])) {
        $username = escape_sanitize_input($conn, $_POST['signup-username'], "string");
        $password = $_POST['signup-password'];
        $password2 = $_POST['signup-password2'];
        $name = escape_sanitize_input($conn, $_POST['signup-name'], "string");
        $phone_number = escape_sanitize_input($conn, $_POST['signup-tel'], "string");
        $email = escape_sanitize_input($conn, $_POST['signup-email'], "email");





        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<div class='text-center bg-danger text-white'> Invalid email format! </div>";
        } else {
            if ($password != $password2) {
                echo "<div class='text-center bg-danger text-white'> Passwords must match! </div>";
            } else {

                $hashed_pw = password_hash($password, PASSWORD_DEFAULT);

                $sql = "INSERT INTO users (username, password, name, phone_number, email) 
                VALUES ('$username', '$hashed_pw', '$name', '$phone_number', '$email')";
                if ($conn->query($sql) === TRUE) {
                    //   echo "New record created successfully"; 
                    header("Location:login.php");
                    die();
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }
    };

    ?>

    <section id="signup-section">
        <div class="container h-100">

            <div class="d-flex justify-content-center h-100">



                <div class="user_card">

                    <div class="d-flex justify-content-center form_container">
                        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">

                            <div class="header text-center mb-3">
                                <h1>Sign Up</h1>
                            </div>
                            <hr class="mb-5" style="color: #198754; height: 3px;">
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="signup-name" class="form-control input_user" value="" placeholder="FullName">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="signup-username" class="form-control input_user" value="" placeholder="Username">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-at"></i></span>
                                </div>
                                <input type="text" name="signup-email" class="form-control input_user" value="" placeholder="Email">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="tel" name="signup-tel" class="form-control input_user" value="" placeholder="Phone Number">
                            </div>
                            <div class="input-group mb-2">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="signup-password" class="form-control input_pass" value="" placeholder="Password">
                            </div>
                            <div class="input-group mb-2">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="signup-password2" class="form-control input_pass" value="" placeholder="Confirm Password">
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customControlInline">
                                    <label class="custom-control-label" for="customControlInline">Remember me</label>
                                </div>
                            </div>


                            <div class="mt-4">
                                <div class="d-flex justify-content-center links">
                                    Do you have already an account? <a href="login.php" class="ml-2">Log In</a>
                                </div>
                                <div class="d-flex justify-content-center links">
                                    <a href="#" id="invalid-try-text">Forgot your password?</a>
                                </div>
                            </div>


                            <div class="d-flex justify-content-center mt-3 login_container">
                                <a href="login.php">
                                    <button type="submit" name="signup-submit" class="btn login_btn btn-primary">Sign Up</button>
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