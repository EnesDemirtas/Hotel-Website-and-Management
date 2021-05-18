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
        <a href="reservation.php">
            <button class="${room_no_ui} btn btn-danger book-button">Book Now</button>
        </a>
    </div>
</div>
</div>



`;

available_rooms.innerHTML += myRoom;