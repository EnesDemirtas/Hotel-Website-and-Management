function listActiveReservations() {
    $.ajax({
        url: 'listActiveReservations.php',
        method: 'POST',
        success: function (result) {
            document.getElementById('active-reservations').innerHTML = "";
            var res = JSON.parse(result);
            for (var i = 0; i < res.length; i++) {
                var res_id = res[i]['id'];
                var customer_username = res[i]['customer_username'];
                var room_no = res[i]['room_no'];
                var room_name = res[i]['room_name'];
                var check_in_date = res[i]['check_in_date'];
                var check_out_date = res[i]['check_out_date'];
                var number_of_adults = res[i]['number_of_adults'];
                var number_of_children = res[i]['number_of_children'];
                var total_price = res[i]['total_price_TL'];

                document.getElementById('active-reservations').innerHTML += `
                <div class="row">
                <form class="col-8 my-4 border border-dark p-4" action="manual-check-out.php" method="POST">
                    <div class="row form-row mb-4">
                        <div class="col-md-4">
                            <label for="guest-name">Guest Name</label>
                            <input type="text" id="check-out-guest-name-${room_no}" class="form-control" value="${customer_username}" readonly>
                        </div>

                        <div class="col-md-4">
                            <label for="check-in-date">Check In Date</label>
                            <input type="date" id="check-in-date-${room_no}" class="form-control" value="${check_in_date}" readonly>
                        </div>

                        <div class="col-md-4">
                            <label for="check-out-date">Check Out Date</label>
                            <input type="date" id="check-out-date-${room_no}" class="form-control" value="${check_out_date}" readonly>
                        </div>
                    </div>


                    <div class="row form-row mb-4">
                        <div class="col-md-4">
                            <label for="room-number">Room Number</label>
                            <input type="number" name="room-no" id="room-number-${room_no}" class="form-control" value="${room_no}" readonly>
                        </div>

                        <div class="col-md-4">
                            <label for="check-in-adults">Adults</label>
                            <input type="number" id="check-out-adults-${room_no}" class="form-control" value="${number_of_adults}" readonly>
                        </div>

                        <div class="col-md-4">
                            <label for="check-in-children">Children</label>
                            <input type="number" id="check-out-children-${room_no}" class="form-control" value="${number_of_children}" readonly>
                        </div>
                    </div>


                    <div class="row form-row mb-4">
                        <div class="col-md-4">
                            <label for="room-name">Room Type</label>
                            <input type="text" " id="room-name-${room_no}" value="${room_name}" class="form-control" readonly>
                        </div>

                        <div class="col-md-4">
                            <input type="hidden" name="res-id" value="${res_id}">
                        </div>

                        <div class="col-md-4">
                            <label for="total-price">Total Price (Turkish Lira)</label>
                            <input type="number" id="total-price-${room_no}" class="form-control" value="${total_price}" readonly>
                        </div>
                    </div>

                    <div class="row form-row">
                        <div class="col-md-9"></div>

                        <div class="col-md-3">
                            <input type="submit" name="check-out" class="btn btn-primary w-100 h-100" style="font-size: 18px;" 
                            id="${room_no}" value="Check Out">
                        </div>
                    </div>

                </form>
            </div>
                `;
            }
        }
    });
}

function getSearchedReservation(val) {
    $.ajax({
        url: 'getSearchedReservation.php',
        method: 'POST',
        data: { room_no: val },
        success: function (result) {
            document.getElementById('active-reservations').innerHTML = "";
            if(result.length == 82){
                document.getElementById('active-reservations').innerHTML = result;
            } else {
                var myArray = JSON.parse(result);
                for (var i = 0; i < myArray.length; i++) {
                    var res_id = myArray[i]['id'];
                    var customer_username = myArray[i]['customer_username'];
                    var room_no = myArray[i]['room_no'];
                    var room_name = myArray[i]['room_name'];
                    var check_in_date = myArray[i]['check_in_date'];
                    var check_out_date = myArray[i]['check_out_date'];
                    var number_of_adults = myArray[i]['number_of_adults'];
                    var number_of_children = myArray[i]['number_of_children'];
                    var total_price = myArray[i]['total_price_TL'];
    
                    document.getElementById('active-reservations').innerHTML += `
                    <div class="row">
                    <form class="col-8 my-4 border border-dark p-4" action="manual-check-out.php" method="POST">
                        <div class="row form-row mb-4">
                            <div class="col-md-4">
                                <label for="guest-name">Guest Name</label>
                                <input type="text" id="check-out-guest-name-${room_no}" class="form-control" value="${customer_username}" readonly>
                            </div>
    
                            <div class="col-md-4">
                                <label for="check-in-date">Check In Date</label>
                                <input type="date" id="check-in-date-${room_no}" class="form-control" value="${check_in_date}" readonly>
                            </div>
    
                            <div class="col-md-4">
                                <label for="check-out-date">Check Out Date</label>
                                <input type="date" id="check-out-date-${room_no}" class="form-control" value="${check_out_date}" readonly>
                            </div>
                        </div>
    
    
                        <div class="row form-row mb-4">
                            <div class="col-md-4">
                                <label for="room-number">Room Number</label>
                                <input type="number" name="room-no" id="room-number-${room_no}" class="form-control" value="${room_no}" readonly>
                            </div>
    
                            <div class="col-md-4">
                                <label for="check-in-adults">Adults</label>
                                <input type="number" id="check-out-adults-${room_no}" class="form-control" value="${number_of_adults}" readonly>
                            </div>
    
                            <div class="col-md-4">
                                <label for="check-in-children">Children</label>
                                <input type="number" id="check-out-children-${room_no}" class="form-control" value="${number_of_children}" readonly>
                            </div>
                        </div>
    
    
                        <div class="row form-row mb-4">
                            <div class="col-md-4">
                                <label for="room-name">Room Type</label>
                                <input type="text" " id="room-name-${room_no}" value="${room_name}" class="form-control" readonly>
                            </div>
    
                            <div class="col-md-4">
                                <input type="hidden" name="res-id" value="${res_id}">
                            </div>
    
                            <div class="col-md-4">
                                <label for="total-price">Total Price (Turkish Lira)</label>
                                <input type="number" id="total-price-${room_no}" class="form-control" value="${total_price}" readonly>
                            </div>
                        </div>
    
                        <div class="row form-row">
                            <div class="col-md-9"></div>
    
                            <div class="col-md-3">
                                <input type="submit" name="check-out" class="btn btn-primary w-100 h-100" style="font-size: 18px;" 
                                id="${room_no}" value="Check Out">
                            </div>
                        </div>
    
                    </form>
                </div>
                    `;
                }
            }
        }

    })
}