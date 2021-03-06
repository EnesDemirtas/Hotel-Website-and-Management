<?php
session_start();
include '../phpFunctions/databaseConnection.php';
include '../Customer/getPersonalInfos.php';
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
    <title>Hotel Mazarin | Staff Profile</title>
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
                            <a class="nav-link" href="#">
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
    $session_username = $_SESSION['session_username'];
    $get_staff_infos = mysqli_query($conn, "SELECT st.staff_type, s.username, s.password, s.name, s.phone_number, s.email 
        FROM staffs s INNER JOIN staff_types st ON s.staff_type = st.id 
        WHERE s.username = '$session_username'");

    $fetch_staff_infos = $get_staff_infos->fetch_all(1);
    $staff_infos = $fetch_staff_infos[0];
    ?>

    <?php


    echo "
<script type=\"text/javascript\">
function confirmChanges(){
    if(confirm(\"Are you sure you want to change your information?\")){
        " . saveStaffChanges($conn) . "
    } 
}
</script>
";


    ?>



    <!--Sidebar and Main Content Start-->

    <div class="container">
        <div class="sidenav mt-3">
            <a href="rooms.php">Rooms</a>
            <a href="guests-check-in.php" style="padding-right: 0;">Guests Check In</a>
            <a href="guests-check-out.php" style="letter-spacing: -.25px; padding-right:0;">Guests Check Out</a>
            <a href="housekeeping.php">Housekeeping</a>
            <a href="message-box.php">Message Box</a>
            <a href="reservation-logs.php" style="letter-spacing: -.25px; padding-right:0;">Reservation Logs</a>
            <a href="reports.php" style="border-bottom: none;">Reports</a>
        </div>

        <div class="main">
            <div class="row">
                <form class="col-8 my-4" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                    <div class="row form-row mb-4">

                        <div class='col-6'>
                            <label for='name'>Username</label>
                            <input type='text' name='username' id='username' class='form-control' value="<?php echo $staff_infos['username']; ?>">
                        </div>

                        <div class='col-6'>
                            <label for='Fullname'>Full Name</label>
                            <input type='text' name='fullname' id='fullname' class='form-control' value="<?php echo $staff_infos['name']; ?>">
                        </div>
                    </div>


                    <div class='row form-row mb-4'>
                        <div class='col-6'>
                            <label for='telephone'>Telephone</label>
                            <input type='tel' name='telephone' id='telephone' class='form-control' value="<?php echo $staff_infos['phone_number']; ?>">
                        </div>

                        <div class='col-6'>
                            <label for='email'>Email</label>
                            <input type='email' name='email' id='email' class='form-control' value="<?php echo $staff_infos['email']; ?>">
                        </div>
                    </div>


                    <div class='row form-row'>
                        <div class='col-6'>
                            <label for='password'>Password</label>
                            <input type='password' name='password' id='password' class='form-control' value="<?php echo $staff_infos['password']; ?>">
                        </div>
                        <div class='col-6'>
                            <label for='position'>Position</label>
                            <input type="text" name="position" id="position" class="form-control" value="" readonly>
                        </div>
                    </div>

                    <div class='row mt-5'>

                        <div class='col-7'></div>
                        <div class='col-2'>
                            <input type='submit' onclick="confirmChanges()" name='personal-infos-changes' class='btn btn-danger' id='save-changes' value='Save Changes'>
                        </div>
                    </div>



                </form>
            </div>



        </div>
    </div>

    <?php


    $staff_type_old = mysqli_query($conn, "SELECT st.staff_type FROM staffs s INNER JOIN staff_types st ON st.id = s.staff_type
    WHERE username = '$session_username'");
    $get_staff_type_old = $staff_type_old->fetch_all(1);
    $staff_type_old = $get_staff_type_old[0]['staff_type'];

    echo "
    <script type=\"text/javascript\">
        document.getElementById('position').value = '".$staff_type_old."';
    </script>
    ";

    ?>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

    <script src="../app.js"></script>
</body>

</html>