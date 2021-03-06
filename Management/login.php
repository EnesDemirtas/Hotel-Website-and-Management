<?php 
session_start();
include '../phpFunctions/databaseConnection.php'; 
include '../phpFunctions/routing.php';
include '../phpFunctions/security.php';
?>
<!DOCTYPE php>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Mazarin | Manager Login</title>
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

    <?php


    if (isset($_POST['login_username'])) {
        $username = escape_sanitize_input($conn, $_POST['login_username'], "string");
        $password = $_POST['login_password'];

        if ($username != '' and $password != '') {

            $get_hashed_pw_sql = mysqli_query($conn, "SELECT password FROM staffs WHERE username = '$username'");
            $get_hashed_pw = $get_hashed_pw_sql->fetch_all(1);

            if(sizeof($get_hashed_pw) > 0){
                $hashed_pw = $get_hashed_pw[0]['password'];

                if(password_verify($password, $hashed_pw)){
                    $_SESSION["logged_in"] = true;
                    $_SESSION["username"] = $username;
    
                    $_SESSION["session_username"] = $username;
    
                    go('rooms.php');
                    die();
                }else {
                    echo "<div class='text-center bg-danger text-white'> Invalid username or/and password! </div>";
                }
            }else {
                echo "<div class='text-center bg-danger text-white'> Invalid username or/and password! </div>";
            }

        } else {
            echo "<div class='text-center bg-danger text-white'> Please provide a username and password </div>";
        }
    };

    ?>

    <!-- <section id="login-section"> -->
    <div class="container h-100" style="position:fixed; top: 25%;">


        <div class="d-flex justify-content-center h-100">



            <div class="user_card">

                <div class="d-flex justify-content-center form_container p-5 border border-primary">
                    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">

                        <div class="header text-center mb-3">
                            <h1>Mazarin Hotel</h1>
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

                        <div class="d-flex justify-content-center mt-3 login_container">
                            <a href="rooms.html">
                                <button type="submit" name="button" class="btn login_btn btn-primary">Login</button>
                            </a>
                        </div>

                        <div class="d-flex justify-content-center mt-3">
                            <a href="signup.php">
                                Click Here
                            </a>
                            <span class="ms-2"> to add a new Staff member.</span>

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