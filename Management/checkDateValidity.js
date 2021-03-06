function check_date_validity(){

    var check_in_date = document.getElementById("check-in-date").value;
    var in_date_day = check_in_date.split('-')[2];
    var in_date_month = check_in_date.split('-')[1];
    var in_date_year = check_in_date.split('-')[0];
    var myString_in = in_date_year + "-" + in_date_month + "-" + in_date_day;
    

    var check_out_date = document.getElementById("check-out-date").value;
    var out_date_day = check_out_date.split('-')[2];
    var out_date_month = check_out_date.split('-')[1];
    var out_date_year = check_out_date.split('-')[0];
    var myString_out = out_date_year + "-" + out_date_month + "-" + out_date_day;
    
    var myArray = {};
    myArray[0] = myString_in;
    myArray[1] = myString_out;

    $.ajax({
        url: '../Customer/check-date-validity.php',
        method: 'POST',
        data: { dates: myArray },
        success: function (res) {
            var array_temp = JSON.parse(res);
            document.getElementById("check-in-date").value = array_temp[0];
            document.getElementById("check-out-date").value = array_temp[1];
            
            update_total_price();
            
        }

    })

}

function update_total_price() {
    var in_date = document.getElementById('check-in-date').value;
    var in_date_day = in_date.split('-')[2];
    var in_date_month = in_date.split('-')[1];
    var in_date_year = in_date.split('-')[0];
    var myString = in_date_month + "/" + in_date_day + "/" + in_date_year;
    var check_in_date = new Date(myString);


    var out_date = document.getElementById('check-out-date').value;
    var out_date_day = out_date.split('-')[2];
    var out_date_month = out_date.split('-')[1];
    var out_date_year = out_date.split('-')[0];
    var myString2 = out_date_month + "/" + out_date_day + "/" + out_date_year;
    var check_out_date = new Date(myString2);

    var diffTime = Math.abs(check_out_date - check_in_date);

    var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

    var selected_room = document.getElementById('room-number').value;
    $.ajax({
        url: 'calc.php',
        method: 'POST',
        data: { diff: diffDays, room: selected_room },
        success: function (res) {
            var myArray = JSON.parse(res);
            document.getElementById('total-price').value = myArray[0];

            var max_adult = Number(myArray[1]);
            document.getElementById('check-in-adults').innerHTML = "";
            for (var i = 0; i < max_adult; i++) {
                var myElement = `<option value='${i + 1}'>${i + 1}</option>`;
                document.getElementById('check-in-adults').innerHTML += myElement;
            }

            var max_children = Number(myArray[2]);
            document.getElementById('check-in-children').innerHTML = "";
            for (var i = 0; i < max_children; i++) {
                var myElement = `<option value='${i}'>${i}</option>`;
                document.getElementById('check-in-children').innerHTML += myElement;
            }



        }

    })
}

