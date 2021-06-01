function toggler (divId) {
    $("#" + divId).toggle(400);
}

switch(room_type_ui){
    case 1:
        if(num_of_standard_ui == 1){
            var standard_rooms_btn_div = `
            <section id='main-content' class='mt-5'>
            <div class='row d-flex justify-content-center mb-5'>
                <div class='col-3'>
                    <button type='button' class='btn btn-primary' onclick=\"javascript:toggler('standard-rooms');\">Show Standard Rooms</button>
                </div>
            </div>
            <div class='container' id='standard-rooms' style='display:none;'></div>
            `;
            document.getElementById("main-content").innerHTML += standard_rooms_btn_div;
        }
        var standard_rooms = document.getElementById('standard-rooms');
        break;
    
    case 2:
        if(num_of_platinum_ui == 1){
            var platinum_rooms_btn_div = `
            <div class='row d-flex justify-content-center mb-5'>
            <div class='col-3'>
                <button type='button' class='btn btn-primary' onclick=\"javascript:toggler('platinum-rooms');\">Show Platinum Rooms</button>
            </div>
            </div>
            <div class='container' id='platinum-rooms' style='display:none;'></div>
            `;
            document.getElementById("main-content").innerHTML += platinum_rooms_btn_div;
        }
        var platinum_rooms = document.getElementById("platinum-rooms");
        break;

    case 3:
        if(num_of_exclusive_ui == 1){
            var exclusive_rooms_btn_div = `
            <div class='row d-flex justify-content-center mb-5'>
            <div class='col-3'>
                <button type='button' class='btn btn-primary' onclick=\"javascript:toggler('exclusive-rooms');\">Show Exclusive Rooms</button>
            </div>
            </div>
            <div class='container' id='exclusive-rooms' style='display:none;'></div>
            `;
            document.getElementById("main-content").innerHTML += exclusive_rooms_btn_div;
        }
        var exclusive_rooms = document.getElementById("exclusive-rooms");
        break;

    case 4:
        if(num_of_kingsuite_ui == 1){
            var kingsuites_btn_div = `
            <div class='row d-flex justify-content-center mb-5'>
            <div class='col-3'>
                <button type='button' class='btn btn-primary' onclick=\"javascript:toggler('kingsuites');\">Show King Suites</button>
            </div>
            </div>
            <div class='container' id='kingsuites' style='display:none;'></div>
            `;
            document.getElementById("main-content").innerHTML += kingsuites_btn_div;
        }
        var kingsuites = document.getElementById("kingsuites");
        break;
}



var myRoom = `<div class="row room-${room_no_ui}" style="margin-bottom: 6rem">
<div class="col-md-4">
    <img src="../images/room_${room_type_ui}.jpg" alt="">
</div>

<div class="col-md-6 mx-4">
    <div class="main-content-text">
        <h2>${room_name_ui} | Room No: ${room_no_ui}</h2>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque ut illum, placeat minima
            aliquam eos? Quaerat obcaecati et atque fuga ipsa cumque reprehenderit animi, est quos
            illum quas doloremque consequatur sapiente quis facere aliquid facilis quasi hic!
            Ducimus provident ipsam, dicta adipisci pariatur atque facilis, non commodi voluptate
            itaque quae? Non similique dolorum nam sit fugiat minus itaque aliquid optio! Voluptatum
            alias pariatur nesciunt aspernatur natus, totam animi atque autem.</p>

    </div>

    <div class="main-content-button d-flex justify-content-end">

        <h4 class="mx-5">Total Price: ${room_total_price_ui}</h4>

        <form action="reservation.php" method="POST">
            <input type="hidden" name="booking-room-no" value="${room_no_ui}">
            <input type="hidden" name="booking-room-name" value="${room_name_ui}">
            <input type="hidden" name="booking-room-type" value="${room_type_ui}">
            <input type="hidden" name="booking-total-price" value="${room_total_price_ui}">
            <input type="hidden" name="booking-adults" value="${booking_adults_ui}">
            <input type="hidden" name="booking-children" value="${booking_children_ui}">
            <input type="hidden" name="booking-check-in-date" value="${booking_check_in_ui}">
            <input type="hidden" name="booking-check-out-date" value="${booking_check_out_ui}">
            <input type="submit" name="book-button" value="Book Now" class="btn btn-danger book-button" id="${room_no_ui}">
        </form> 
    </div>
</div>
</div>



`;

switch(room_type_ui) {
    case 1:
        standard_rooms.innerHTML += myRoom;
        break;
    case 2: 
        platinum_rooms.innerHTML += myRoom;
        break;
    case 3:
        exclusive_rooms.innerHTML += myRoom;
        break;
    case 4:
        kingsuites.innerHTML += myRoom;
        break;
}
