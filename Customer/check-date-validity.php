<?php
include '../phpFunctions/dateExplode.php';

$get_dates = $_POST['dates'];
$in_date = date_create($get_dates[0]);
$in_date_str = date_format($in_date, "Y-m-d");

$out_date = date_create($get_dates[1]);
$out_date_str = date_format($out_date, "Y-m-d");

$current_day_temp = date("Y-m-d");
$current_day = date_create($current_day_temp);

$tomorrow_day_temp = date('Y-m-d', strtotime($current_day_temp . " + 1 days"));
$tomorrow_day = date_create($tomorrow_day_temp);

$myArray = array();

if($in_date < $current_day){
    $myArray[0] = dateToJS($current_day_temp, $out_date_str)[0]; 
    $myArray[1] = dateToJS($current_day_temp, $out_date_str)[1]; 
    print json_encode($myArray);

} else if($out_date < $tomorrow_day){
    $myArray[0] = dateToJS($in_date_str, $tomorrow_day_temp)[0]; 
    $myArray[1] = dateToJS($in_date_str, $tomorrow_day_temp)[1]; 
    print json_encode($myArray);

} else if($out_date <= $in_date){
    $myArray[0] = dateToJS($current_day_temp, $tomorrow_day_temp)[0]; 
    $myArray[1] = dateToJS($current_day_temp, $tomorrow_day_temp)[1]; 
    print json_encode($myArray);
} else {
    $myArray[0] = dateToJS($in_date_str, $out_date_str)[0]; 
    $myArray[1] = dateToJS($in_date_str, $out_date_str)[1]; 
    print json_encode($myArray);
}

?>