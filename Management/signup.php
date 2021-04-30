<!DOCTYPE php>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Mazarin | Manager Sign Up</title>
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
    <!--Login Section Start-->

    <!-- <section id="login-section"> -->

    <?php
    if (isset($_POST['signup-submit'])) {
        $username = $_POST['signup-username'];
        $password = $_POST['signup-password'];
        $password2 = $_POST['signup-password2'];
        $name = $_POST['signup-name'];
        $phone_number = $_POST['signup-tel'];
        $email = $_POST['signup-email'];




        $servername = "localhost";
        $username_con = "root";
        $password_con = "";
        $dbname = "hms";

        // Create connection
        $conn = new mysqli($servername, $username_con, $password_con, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
                echo "<div class='text-center bg-danger text-white'> Invalid email format! </div>";
            } else {
                if ($password != $password2) {
                    echo "<div class='text-center bg-danger text-white'> Passwords must match! </div>";
                } else {
                    $sql = "INSERT INTO staffs (username, password, name, phone_number, email) 
                VALUES ('$username', '$password', '$name', '$phone_number', '$email')";
                    if ($conn->query($sql) === TRUE) {
                        //   echo "New record created successfully"; 
                        header("Location:login.php");
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                    $conn->close();
                }
            }
        }
    };
    ?>
    <div class="container h-100" style="position:fixed; top: 25%;">


        <div class="d-flex justify-content-center h-100">



            <div class="user_card">

                <div class="d-flex justify-content-center form_container p-5 border border-primary">
                    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">

                        <div class="header text-center mb-3">
                            <h1>Mazarin Hotel</h1>
                        </div>
                        <hr class="mb-5" style="color: #198754; height: 3px;">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="signup-name" class="form-control input_user" value="" placeholder="Fullname">
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
                            <input type="text" name="signup-tel" class="form-control input_user" value="" placeholder="Phone Number">
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


                        <div class="d-flex justify-content-center mt-3 login_container">
                            <a href="rooms.html">
                                <button type="submit" name="signup-submit" class="btn login_btn btn-primary">Sign Up</button>
                            </a>
                        </div>

                        <div class="d-flex justify-content-center links">
                            Do you have already an account? <a href="login.php" class="ml-2">Log In</a>
                        </div>
                    </form>

                </div>


            </div>
        </div>
    </div>
    <!-- </section> -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

    <script src="../app.js"></script>
</body>

</html>