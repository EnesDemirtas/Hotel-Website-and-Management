<?php session_start();
include '../phpFunctions/databaseConnection.php';
?>
<!DOCTYPE php>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Mazarin | Reports</title>
    <meta name="keyword" content="Hotel, Mazarin, Hotel Mazarin">
    <meta name="description" content="Hotel Mazarin">

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

    <!--charts.js-->
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@3.1.1/dist/chart.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.1/chart.min.js" integrity="sha512-BqNYFBAzGfZDnIWSAEGZSD/QFKeVxms2dIBPfw11gZubWwKUjEgmFUtUls8vZ6xTRZN/jaXGHD/ZaxD9+fDo0A==" crossorigin="anonymous"></script>


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
            <a href="housekeeping.php">Housekeeping</a>
            <a href="message-box.php">Message Box</a>
            <a href="reports.php" style="border-bottom: none; background-color: #198754af">Reports</a>
        </div>

        <div class="main w-75">

            <div class="row">
                <div class="col-md-6">
                    <canvas id="myChart_1" width="400" height="400"></canvas>
                </div>

                <div class="col-md-6">
                    <canvas id="myChart_2" width="400" height="400"></canvas>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-4"></div>
                <div class="col-md-6">
                    <canvas id="myChart_3" width="400" height="400"></canvas>
                </div>
            </div>

        </div>
    </div>

    <!--Sidebar and Main Content End-->


    <?php

    $total_room_number_sql = mysqli_query($conn, "SELECT COUNT(*) AS number_of_rooms FROM rooms");
    $total_room_number = $total_room_number_sql->fetch_all(1);
    $number_of_rooms = $total_room_number[0]['number_of_rooms'];

    $get_past_week_sql = mysqli_query($conn, "SELECT curdate() - INTERVAL DAYOFWEEK(curdate())+5 DAY AS past_week_start,  
    curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY AS past_week_end");

    $get_past_week = $get_past_week_sql->fetch_all(1);

    $past_week_start_str = $get_past_week[0]['past_week_start'];
    $past_week_start = date_create($past_week_start_str);

    $past_week_end_str = $get_past_week[0]['past_week_end'];
    $past_week_end = date_create($past_week_end_str);

    $weekly_report_sql = mysqli_query($conn, "SELECT rrd.check_in_date, rrd.check_out_date FROM reservation_record_details rrd
    WHERE (rrd.check_in_date < '$past_week_start_str' AND rrd.check_out_date >= '$past_week_start_str') 
    OR
    (rrd.check_in_date >= '$past_week_start_str' AND rrd.check_in_date <= '$past_week_end_str')");

    $get_weekly_report = $weekly_report_sql->fetch_all(1);

    $report_days = array();
    $report_days['Mon'] = 0;
    $report_days['Tue'] = 0;
    $report_days['Wed'] = 0;
    $report_days['Thu'] = 0;
    $report_days['Fri'] = 0;
    $report_days['Sat'] = 0;
    $report_days['Sun'] = 0;

    for ($x = 0; $x < sizeof($get_weekly_report); $x++) {
        $check_in_date = $get_weekly_report[$x]['check_in_date'];
        $new_check_in_date = date_create($check_in_date);

        $check_out_date = $get_weekly_report[$x]['check_out_date'];
        $new_check_out_date = date_create($check_out_date);

        $interval = date_diff($new_check_in_date, $new_check_out_date);
        $dayDiff = (int)$interval->format('%a');

        $temp = date_create($check_in_date);
        for ($k = 0; $k < $dayDiff; $k++) {

            if ($temp >= $past_week_start and $temp <= $past_week_end) {
                switch (date_format($temp, "D")) {
                    case "Mon":
                        $report_days['Mon'] += 1;
                        break;
                    case "Tue":
                        $report_days['Tue'] += 1;
                        break;
                    case "Wed":
                        $report_days['Wed'] += 1;
                        break;
                    case "Thu":
                        $report_days['Thu'] += 1;
                        break;
                    case "Fri":
                        $report_days['Fri'] += 1;
                        break;
                    case "Sat":
                        $report_days['Sat'] += 1;
                        break;
                    case "Sun":
                        $report_days['Sun'] += 1;
                        break;
                }
            }
            $my_temp = date_format($temp, "Y-m-d");
            $new_temp = date('Y-m-d', strtotime($my_temp . " + 1 days"));
            $temp = date_create($new_temp);
        }
    }

    $report_weekly = json_encode($report_days);

    echo "
    <script type=\"text/javascript\">
        var report_weekly_ui = '" . $report_weekly . "';
        var report_weekly = JSON.parse(report_weekly_ui);
        var total_rooms = " . $number_of_rooms . ";
    </script>
    ";


    $monthly_report_sql = mysqli_query($conn, "SELECT check_in_date, check_out_date, total_price_TL 
    FROM reservation_record_details 
    WHERE MONTH(check_in_date) <= MONTH(CURRENT_DATE) AND MONTH(check_in_date) >= MONTH(CURRENT_DATE)-3");
    $monthly_report = $monthly_report_sql->fetch_all(1);

    $current_month = date("m");
    $monthly_income = array();
    $monthly_income[$current_month - 3] = 0;
    $monthly_income[$current_month - 2] = 0;
    $monthly_income[$current_month - 1] = 0;
    $monthly_income[$current_month - 1 + 1] = 0;

    for ($x = 0; $x < sizeof($monthly_report); $x++) {
        $income_check_in_date = date_create($monthly_report[$x]['check_in_date']);
        $income_month = date_format($income_check_in_date, "m");
        $income = $monthly_report[$x]['total_price_TL'];

        switch ($income_month) {
            case $current_month - 3:
                $monthly_income[$current_month - 3] += $income;
                break;
            case $current_month - 2:
                $monthly_income[$current_month - 2] += $income;
                break;
            case $current_month - 1:
                $monthly_income[$current_month - 1] += $income;
                break;
            case $current_month -1+1:
                $monthly_income[$current_month-1+1] += $income;
                break;
        }
    }

    $report_monthly_income = json_encode($monthly_income);

    echo "
    <script type=\"text/javascript\">
        var monthly_income_ui = '" . $report_monthly_income . "';
        var monthly_income = JSON.parse(monthly_income_ui);
    </script>
    ";



    echo "
            <script type=\"text/javascript\" src=\"reports.js\">
            </script>
            ";
    ?>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

    <script src="../app.js"></script>

</body>

</html>