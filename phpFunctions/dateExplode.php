<?php 

function dateToJS($check_in_date, $check_out_date){
    $check_in_date_year = explode("-", $check_in_date)[0];
    $check_in_date_month = explode("-", $check_in_date)[1];
    $check_in_date_day = explode("-", $check_in_date)[2];

    $in_date_js = $check_in_date_year."-".$check_in_date_month."-".$check_in_date_day;

    $check_out_date_year = explode("-", $check_out_date)[0];
    $check_out_date_month = explode("-", $check_out_date)[1];
    $check_out_date_day = explode("-", $check_out_date)[2];

    $out_date_js = $check_out_date_year."-".$check_out_date_month."-".$check_out_date_day;
    

    return array($in_date_js, $out_date_js);
}

?>