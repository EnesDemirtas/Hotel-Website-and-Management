function check_date_validity(){

    var check_in_date = document.getElementById("checkin-room-searching").value;
    var in_date_day = check_in_date.split('-')[2];
    var in_date_month = check_in_date.split('-')[1];
    var in_date_year = check_in_date.split('-')[0];
    var myString_in = in_date_year + "-" + in_date_month + "-" + in_date_day;
    

    var check_out_date = document.getElementById("checkout-room-searching").value;
    var out_date_day = check_out_date.split('-')[2];
    var out_date_month = check_out_date.split('-')[1];
    var out_date_year = check_out_date.split('-')[0];
    var myString_out = out_date_year + "-" + out_date_month + "-" + out_date_day;
    
    var myArray = {};
    myArray[0] = myString_in;
    myArray[1] = myString_out;

    $.ajax({
        url: 'check-date-validity.php',
        method: 'POST',
        data: { dates: myArray },
        success: function (res) {
            var myArray = JSON.parse(res);
            document.getElementById("checkin-room-searching").value = myArray[0];
            document.getElementById("checkout-room-searching").value = myArray[1];

        }

    })

}