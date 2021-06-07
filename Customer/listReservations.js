
var current_reservations = document.getElementById("current-reservations");
var past_reservations = document.getElementById("past-reservations");
var monthNames = ["January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"
];

check_in_date_ui_month = monthNames[check_in_date_ui_month-1];
check_out_date_ui_month = monthNames[check_out_date_ui_month-1];

console.log(room_no_ui);
console.log(isCurrent);

var myElement = `<div class="row mt-5">
    <div class="col-4 events-main-content-img">
        <img src="../images/room_${room_type_ui}.jpg" alt="" style="max-width:700px; max-height:600px; width: 100%;">
    </div>
    
    <div class="col-5">
    
        <div class="events-main-content-text">
            <h4 class="ms-5">${room_name_ui} | Room No: ${room_no_ui}</h4>
            <span class="ms-5" style="font-size: 14px; font-weight: 600">Number of Adults: ${number_of_adults_ui}</span>
            <span class="ms-5" style="font-size: 14px; font-weight: 600">Number of Children: ${number_of_children_ui}</span>
            </br></br>
            <span class="m-5" style="font-size: 14px; font-weight: 600">Check-in Date: ${check_in_date_ui_month} ${check_in_date_ui_day}, ${check_in_date_ui_year}</span> 
            </br>
            <span class="m-5" style="font-size: 14px; font-weight: 600">Check-out Date: ${check_out_date_ui_month} ${check_out_date_ui_day}, ${check_out_date_ui_year}</span> 
            <p class="m-5" style="font-size:14px; letter-spacing:.25px;">Lorem ipsum dolor sit amet
                consectetur adipisicing elit.
                Mollitia sit, adipisci sunt rerum
                ipsam,
                tempora ex culpa quas pariatur odit voluptates ea veniam animi distinctio libero eius maxime
                dicta illum expedita dolores enim quae, hic eligendi.</p>
    
    
        </div>
    
        `;

if (isCurrent) {
    myElement += `        <div class="buttons m-5">
    <div class='row'>
    <div class='col-6'>

    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#request-message">
        Send Us A Message
    </button>

    <div class="modal fade" id="request-message" tabindex="-1" aria-labelledby="request-message-title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="request-message-title">Send Us a Message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="message" style="font-size:14px; font-weight:600;">Message</label>
                        </div>
                    </div>
                    <textarea name="message" id="request_message" cols="70" rows="10" style="resize: none;" placeholder="Write your message here..."></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="hidden" name="message-room-no" value="${room_no_ui}">
                    <input type="submit"  class="btn btn-primary" name="request-message" value="Send Your Message">
                </div>
                </form>
            </div>
        </div>
    </div>
    
    </div>
    <div class='col-6'>
    <form action="" method="POST" onsubmit="return confirmCancel()">
    <input type="hidden" name="cancel-room-no" value="${room_no_ui}">
    <input type="submit" class="btn btn-danger ms-5"  name="cancel-reservation" value="Cancel Reservation">
    </form>
    </div>
    </div>
</div>

</div>
</div>`;

    current_reservations.innerHTML += myElement;

} else {
    myElement += `<div class="buttons m-5">
                    <button type="button" class="btn btn-primary me-5" data-bs-toggle="modal" data-bs-target="#feedback-message">
                        Let us know your review
                    </button>

                    <div class="modal fade" id="feedback-message" tabindex="-1" aria-labelledby="feedback-message-title" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="feedback-message-title">Send Us a Feedback</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="" method="POST">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="feedbackmessage" style="font-size:14px; font-weight:600;">Message</label>
                                    </div>
                                </div>
                                <textarea name="feedbackmessage" id="feedbackmessage" cols="70" rows="10" style="resize: none;" placeholder="Write your message here..."></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input type="hidden" name="feedback-message-room-no" value="${room_no_ui}">
                                <input type="submit"  class="btn btn-primary" name="feedback-message" value="Send Your Message">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
    
                    </div>

</div>
</div>`;

    past_reservations.innerHTML += myElement;

}
