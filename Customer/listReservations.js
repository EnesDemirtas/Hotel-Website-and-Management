window.addEventListener("DOMContentLoaded", myFunc());

function myFunc() {
    let current_reservations = document.getElementById("current-reservations");
    console.log(current_reservations);

    let myElement = `<div class="row mt-5">
    <div class="col-4 events-main-content-img">
        <img src="../images/room_1.jpg" alt="" style="max-width:700px; max-height:600px; width: 100%;">
    </div>
    
    <div class="col-5">
    
        <div class="events-main-content-text">
            <p class="m-5" style="font-size:14px; letter-spacing:.25px;">Lorem ipsum dolor sit amet
                consectetur adipisicing elit.
                Mollitia sit, adipisci sunt rerum
                ipsam,
                tempora ex culpa quas pariatur odit voluptates ea veniam animi distinctio libero eius maxime
                dicta illum expedita dolores enim quae, hic eligendi. Esse earum, nulla quia autem porro vel
                voluptas illo repudiandae optio necessitatibus quam reiciendis.</p>
    
    
        </div>
    
        <div class="buttons m-5">
            <button class="btn btn-secondary me-5">Change Reservation Date</button>
            <button class="btn btn-danger ms-5">Cancel Reservation</button>
        </div>
    
    </div>
    </div>`;

    console.log(myElement);

    current_reservations.innerHTML += myElement;

}


