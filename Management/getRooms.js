var rooms_container = document.getElementById('rooms');

if (counter <= 4) { var row_id = 1 } else if (counter <= 8) { var row_id = 2 } else if (counter <= 12) { var row_id = 3 } 
else if (counter <= 16) { var row_id = 4 } else if (counter <= 20) {var row_id = 5}

if (counter % 4 == 1) {
    var newRow = `<div class = "row row-${row_id}"></div>`;
    rooms_container.innerHTML += newRow;
}
if (is_available_ui == 1 && is_full_ui == 0) {
    var myElement = `<div class="col-md-3 myRooms" style="background-color: #198754cc; height: 8rem;">${room_no_ui}</div>`;
} else if (is_available_ui == 0 && is_full_ui == 1) {
    var myElement = `<div class="col-md-3 myRooms" style="background-color: rgba(241, 23, 23, 0.800); height: 8rem;">${room_no_ui}</div>`;
} else if (is_available_ui == 0 && is_full_ui == 0) {
    var myElement = `<div class="col-md-3 myRooms" style="background-color: rgba(145, 124, 57, 0.856); height: 8rem;">${room_no_ui}</div>`;
}
rooms_container.lastElementChild.innerHTML += myElement;



