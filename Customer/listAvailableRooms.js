var available_rooms = document.getElementById("rooms-main-content");

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

available_rooms.innerHTML += myRoom;