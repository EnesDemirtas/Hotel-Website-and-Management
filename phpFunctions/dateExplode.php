<?php 

function dateExplode($check_in_date, $check_out_date){
    $check_in_date_year = explode("-", $check_in_date)[0];
    $check_in_date_month = explode("-", $check_in_date)[1];
    $check_in_date_day = explode("-", $check_in_date)[2];

    $check_out_date_year = explode("-", $check_out_date)[0];
    $check_out_date_month = explode("-", $check_out_date)[1];
    $check_out_date_day = explode("-", $check_out_date)[2];

    return array($check_in_date_year, $check_in_date_month, $check_in_date_day, $check_out_date_year, $check_out_date_month, $check_out_date_day);
}

?>