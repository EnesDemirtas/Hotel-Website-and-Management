<?php
session_start();
include '../phpFunctions/databaseConnection.php';
include '../phpFunctions/routing.php';

if (!isset($_SESSION['session_username'])) {
    go("../oops.php");
}
?>
<!DOCTYPE php>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Mazarin | Reservation Records</title>
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
        <header class="header">

            <nav class="navbar">
                <div class="container bg-success mb-5" style="height: 5rem">
                    <a class="navbar-brand" href="#">
                        HOTEL MAZARIN
                    </a>


                    <ul class="nav d-flex justify-content-end" style="width:50%">
                        <li class="nav-item">
                            <a class="nav-link" href="staff-profile.php">
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

    <?php
    $current_date = date('Y-m-d');
    $tomorrow_date = date('Y-m-d', strtotime($current_date . " + 1 days"));    ?>

    <!--Sidebar and Main Content Start-->

    <div class="container">
        <div class="sidenav mt-3">
            <a href="rooms.php">Rooms</a>
            <a href="guests-check-in.php" style="padding-right: 0;">Guests Check In</a>
            <a href="guests-check-out.php" style="letter-spacing: -.25px; padding-right:0;">Guests Check Out</a>
            <a href="housekeeping.php">Housekeeping</a>
            <a href="message-box.php">Message Box</a>
            <a href="reservation-logs.php" style="background-color: #198754af; letter-spacing: -.25px; padding-right:0;">Reservation Logs</a>
            <a href="reports.php" style="border-bottom: none;">Reports</a>
        </div>

        <div class="main">

            <div class="row">
                <div class="col-2">
                    <span style="letter-spacing: -0.25px;" >List reservations between</span>
                </div>
                <div class="col-2">
                    <input type="date" id="log-date-1" name="log-date-1" value="<?php echo $current_date;?>">
                </div>
                <div class="col-1" style="width: 4.17%;">
                    <span> and </span>
                </div>
                <div class="col-2">
                    <input type="date" id="log-date-2" name="log-date-2" value="<?php echo $tomorrow_date;?>">
                </div>
                <div class="col-2">
                    <button class="btn" style="background-color: #198754; color: #ffffff;" id="log-search" 
                    onclick="getLogs(document.getElementById('log-date-1').value, document.getElementById('log-date-2').value);">Search</button>
                </div>
            </div>


            <div id="reservation-logs">
            
            </div>


        </div>
    </div>

    <?php
            echo "
            <script type=\"text/javascript\" src=\"getLogs.js\">
            </script> 
            ";
    ?>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

    <script src="../app.js"></script>
</body>

</html>