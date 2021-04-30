<?php session_start(); ?>
<!DOCTYPE php>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Mazarin | Rooms</title>
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


    <!--Sidebar and Main Content Start-->

    <div class="container">
        <div class="sidenav mt-3">
            <a href="rooms.php" style="background-color: #198754af">Rooms</a>
            <a href="guests-check-in.php" style="padding-right: 0;">Guests Check In</a>
            <a href="guests-check-out.php" style="letter-spacing: -.25px; padding-right:0;">Guests Check Out</a>
            <a href="housekeeping.php">Housekeeping</a>
            <a href="reservation.php">Reservation</a>
            <a href="reports.php" style="border-bottom: none;">Reports</a>
        </div>

        <div class="main">
            <div class="row">
                <div class="col-md-2 myRooms" style="background-color: rgba(253, 215, 0, 0.800); height: 8rem;">Room 1</div>
                <div class="col-md-2 myRooms" style="background-color: rgba(241, 23, 23, 0.800); height: 8rem;">Room 2</div>
                <div class="col-md-2 myRooms" style="background-color: rgba(253, 215, 0, 0.800); height: 8rem;">Room 3</div>
                <div class="col-md-2 myRooms" style="background-color: rgba(253, 215, 0, 0.800); height: 8rem;">Room 4</div>
                <div class="col-md-2 myRooms" style="background-color: rgba(241, 23, 23, 0.800); height: 8rem;">Room 5</div>
            </div>

            <div class="row">
                <div class="col-md-2 myRooms" style="background-color: rgba(253, 215, 0, 0.800); height: 8rem;">Room 6</div>
                <div class="col-md-2 myRooms" style="background-color: #198754cc; height: 8rem;">Room 7</div>
                <div class="col-md-2 myRooms" style="background-color: rgba(145, 124, 57, 0.856); height: 8rem;">Room 8</div>
                <div class="col-md-2 myRooms" style="background-color: rgba(241, 23, 23, 0.800); height: 8rem;">Room 9</div>
                <div class="col-md-2 myRooms" style="background-color: rgba(241, 23, 23, 0.800); height: 8rem;">Room 10</div>
            </div>

            <div class="row">
                <div class="col-md-2 myRooms" style="background-color: rgba(241, 23, 23, 0.800); height: 8rem;">Room 11</div>
                <div class="col-md-2 myRooms" style="background-color: rgba(241, 23, 23, 0.800); height: 8rem;">Room 12</div>
                <div class="col-md-2 myRooms" style="background-color: rgba(145, 124, 57, 0.856); height: 8rem;">Room 13</div>
                <div class="col-md-2 myRooms" style="background-color: rgba(241, 23, 23, 0.800); height: 8rem;">Room 14</div>
                <div class="col-md-2 myRooms" style="background-color: rgba(253, 215, 0, 0.800); height: 8rem;">Room 15</div>
            </div>

            <div class="row">
                <div class="col-md-2 myRooms" style="background-color: rgba(241, 23, 23, 0.800); height: 8rem;">Room 16</div>
                <div class="col-md-2 myRooms" style="background-color: rgba(241, 23, 23, 0.800); height: 8rem;">Room 17</div>
                <div class="col-md-2 myRooms" style="background-color: rgba(145, 124, 57, 0.856); height: 8rem;">Room 18</div>
                <div class="col-md-2 myRooms" style="background-color: rgba(241, 23, 23, 0.800); height: 8rem;">Room 19</div>
                <div class="col-md-2 myRooms" style="background-color: rgba(253, 215, 0, 0.800); height: 8rem;">Room 20</div>
            </div>

            <div class="row">
                <div class="col-md-2 myRooms" style="background-color: #198754cc; height: 8rem;">Room 21</div>
                <div class="col-md-2 myRooms" style="background-color: #198754cc; height: 8rem;">Room 22</div>
                <div class="col-md-2 myRooms" style="background-color: #198754cc; height: 8rem;">Room 23</div>
                <div class="col-md-2 myRooms" style="background-color: rgba(145, 124, 57, 0.856); height: 8rem;">Room 24</div>
                <div class="col-md-2 myRooms" style="background-color: rgba(253, 215, 0, 0.800); height: 8rem;">Room 25</div>
            </div>

            <div class="row">
                <div class="col-md-2 border border-dark" style="background-color: #198754cc; height: 1rem; width:auto; margin-top: 4rem;">
                </div>

                <div class="col-md-2 text-center" style="margin-top: 3.5rem; font-weight:500; letter-spacing:1px">
                    <span>Available Rooms</span>
                </div>

                <div class="col-md-2 border border-dark" style="background-color: rgba(253, 215, 0, 0.800); height: 1rem; width:auto; margin-top: 4rem;">
                </div>

                <div class="col-md-2 text-center" style="margin-top: 3.5rem; font-weight:500; letter-spacing:1px">
                    <span>Reserved Rooms</span>
                </div>

            </div>

            <div class="row">
                <div class="col-md-2 border border-dark" style="background-color: rgba(241, 23, 23, 0.800); height: 1rem; width:auto; margin-top: 4rem;">
                </div>

                <div class="col-md-2 text-center" style="margin-top: 3.5rem; font-weight:500; letter-spacing:1px">
                    <span>Unavailable Rooms</span>
                </div>

                <div class="col-md-2 border border-dark" style="background-color: rgba(145, 124, 57, 0.856); height: 1rem; width:auto; margin-top: 4rem;">
                </div>

                <div class="col-md-3 text-center" style="margin-top: 3.5rem; font-weight:500; letter-spacing:1px">
                    <span>Rooms that need to be cleaned</span>
                </div>

            </div>



        </div>
    </div>

    <!--Sidebar and Main Content End-->






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

    <script src="../app.js"></script>
</body>

</html>