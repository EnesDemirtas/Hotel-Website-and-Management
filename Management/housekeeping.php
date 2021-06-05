<?php session_start(); ?>
<!DOCTYPE php>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Mazarin | Housekeeping</title>
    <meta name="keyword" content="Hotel, Mazarin, Hotel Mazarin">
    <meta name="description" content="Hotel Mazarin">

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />


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
                            <a class="nav-link" class="logout" href="login.php">
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
            <a href="rooms.php">Rooms</a>
            <a href="guests-check-in.php" style="padding-right: 0;">Guests Check In</a>
            <a href="guests-check-out.php" style="letter-spacing: -.25px; padding-right:0;">Guests Check Out</a>
            <a href="housekeeping.php" style="background-color: #198754af">Housekeeping</a>
            <a href="message-box.php">Message Box</a>
            <a href="reports.php" style="border-bottom: none;">Reports</a>
        </div>

        <div class="main">
            <table class="mx-auto table table-hover text-center table-striped" style="width: 100%;">
                <thead class="bg-danger text-light">
                    <tr>
                        <th>Room Number</th>
                        <th>Room Type</th>
                        <th>Cleaner</th>
                        <th>Housekeeping Status</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <th><span class="border border-dark px-4 py-1">203</span></th>
                        <td><span class="border border-dark px-4 py-1">Relax Deluxe</span></td>
                        <td><span class="border border-dark px-4 py-1">Jenny Taylor</span></td>
                        <td>
                            <select name="status" id="status">
                                <option value="dirty">Dirty</option>
                                <option value="clean" selected>Clean</option>
                                <option value="clean-again">Need to be clean again</option>
                                <option value="">Select Housekeeping Status...</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <th><span class="border border-dark px-4 py-1">101</span></th>
                        <td><span class="border border-dark px-4 py-1">Platinum Deluxe</span></td>
                        <td><span class="border border-dark px-4 py-1">Nana Fox</span></td>
                        <td>
                            <select name="status" id="status">
                                <option value="dirty" selected>Dirty</option>
                                <option value="clean">Clean</option>
                                <option value="clean-again">Need to be clean again</option>
                                <option value="">Select Housekeeping Status...</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <th><span class="border border-dark px-4 py-1">56</span></th>
                        <td><span class="border border-dark px-4 py-1">Corner Exclusive</span></td>
                        <td><span class="border border-dark px-4 py-1">Jenny Taylor</span></td>
                        <td>
                            <select name="status" id="status">
                                <option value="dirty">Dirty</option>
                                <option value="clean">Clean</option>
                                <option value="clean-again" selected>Need to be clean again</option>
                                <option value="">Select Housekeeping Status...</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <th><span class="border border-dark px-4 py-1">501</span></th>
                        <td><span class="border border-dark px-4 py-1">Premier Master Suite</span></td>
                        <td><span class="border border-dark px-4 py-1">Alex Trinidad</span></td>
                        <td>
                            <select name="status" id="status">
                                <option value="dirty">Dirty</option>
                                <option value="clean">Clean</option>
                                <option value="clean-again">Need to be clean again</option>
                                <option value="" selected>Select Housekeeping Status...</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <th><span class="border border-dark px-4 py-1">103</span></th>
                        <td><span class="border border-dark px-4 py-1">Relax Deluxe</span></td>
                        <td><span class="border border-dark px-4 py-1">Haylee Milroy</span></td>
                        <td>
                            <select name="status" id="status">
                                <option value="dirty">Dirty</option>
                                <option value="clean">Clean</option>
                                <option value="clean-again">Need to be clean again</option>
                                <option value="" selected>Select Housekeeping Status...</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="row">
                <div class="col-md-9"></div>
                <div class="col-md-3">
                    <button class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

    <!--Sidebar and Main Content End-->





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

    <script src="../app.js"></script>
</body>

</html>