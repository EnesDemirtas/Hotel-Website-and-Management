var rooms_container = document.getElementById('rooms');

if (counter <= 4) { var row_id = 1 } else if (counter <= 8) { var row_id = 2 } else if (counter <= 12) { var row_id = 3 } 
else if (counter <= 16) { var row_id = 4 } else if (counter <= 20) {var row_id = 5}

if (counter % 4 == 1) {
    var newRow = `<div class = "row row-${row_id}"></div>`;
    rooms_container.innerHTML += newRow;
}
if (is_available_ui == 1 && is_full_ui == 0) {
    var myElement = `<div class="col-md-3 myRooms" style="background-color: #198754cc; height: 8rem; white-space: pre;">
    ${room_name_ui}
    Room ${room_no_ui}
    Housekeeper: ${cleaner_name_ui}
    </div>`;


} else if (is_available_ui == 0 && is_full_ui == 1 && liveReservation == 1) {
    var myElement = `
    <div class="col-md-3 myRooms" onclick="location.href='#';" data-bs-toggle="modal" data-bs-target="#room-details-${room_no_ui}"
    style="background-color: rgba(241, 23, 23, 0.800); height: 8rem; white-space: pre; cursor: pointer;">
    ${room_name_ui}
    Room ${room_no_ui}
    Housekeeper: ${cleaner_name_ui}
    </div>
    


<div class="modal fade" id="room-details-${room_no_ui}" tabindex="-1" aria-labelledby="room-details-${room_no_ui}-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="room-details-${room_no_ui}-title">Room ${room_no_ui} Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row"><div class="col-6"><div>Customer Name: ${customer_name_ui}</div></div></div>
                <div class="row"><div class="col-6"><div>Check-in Date: ${check_in_date_ui}</div></div></div>
                <div class="row"><div class="col-6"><div>Check-out Date: ${check_out_date_ui}</div></div></div>
                <div class="row"><div class="col-6"><div>Adults: ${number_of_adults_ui}</div></div></div>
                <div class="row"><div class="col-6"><div>Children: ${number_of_children_ui}</div></div></div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>
    
    
    `;



} else if (is_available_ui == 0 && is_full_ui == 1 && liveReservation == 0) {
    var myElement = `
    <div class="col-md-3 myRooms" onclick="location.href='#';" data-bs-toggle="modal" data-bs-target="#room-details-${room_no_ui}"
    style="background-color: rgba(253, 215, 0, 0.800); height: 8rem; white-space: pre; cursor: pointer;">
    ${room_name_ui}
    Room ${room_no_ui}
    Housekeeper: ${cleaner_name_ui}
    </div>
    


<div class="modal fade" id="room-details-${room_no_ui}" tabindex="-1" aria-labelledby="room-details-${room_no_ui}-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="room-details-${room_no_ui}-title">Room ${room_no_ui} Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row"><div class="col-6"><div>Customer Name: ${customer_name_ui}</div></div></div>
                <div class="row"><div class="col-6"><div>Check-in Date: ${check_in_date_ui}</div></div></div>
                <div class="row"><div class="col-6"><div>Check-out Date: ${check_out_date_ui}</div></div></div>
                <div class="row"><div class="col-6"><div>Adults: ${number_of_adults_ui}</div></div></div>
                <div class="row"><div class="col-6"><div>Children: ${number_of_children_ui}</div></div></div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>
    
    
    `;



} 
else if (is_available_ui == 0 && is_full_ui == 0) {
    var myElement = `<div class="col-md-3 myRooms" style="background-color: rgba(145, 124, 57, 0.856); height: 8rem; white-space: pre;">
    ${room_name_ui}
    Room ${room_no_ui}
    Housekeeper: ${cleaner_name_ui}
    </div>`;




}
rooms_container.lastElementChild.innerHTML += myElement;



