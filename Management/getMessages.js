if(message_is_read_ui === "0"){
    var myElement = `
<div class="card" style="background: #f3f3f3;" id="card-${message_id_ui}">
<div class="card-title" id="badge-${message_id_ui}"><h5><span class="badge bg-danger">New</span></h5></div>
<div class="card-body">
    <div class="row mb-4">
        <div class="col-3">
            Customer Name: ${message_name_ui}
        </div>
        <div class="col-2">
            Room No: ${message_room_no_ui}
        </div>
        <div class="col-3">
            Message Time: ${message_time_ui}
        </div>
        <div class="col-2" id="mark-${message_id_ui}">
            <input type="hidden" name="message-id" value="${message_id_ui}">
            <input type="submit" class="btn btn-success" name="read-message" value="Mark as Read" onclick="mark_message(this.previousElementSibling.value);">
        </div>
        <div class="col-2">
            <input type="hidden" name="message-id" value="${message_id_ui}">
            <input type="submit" class="btn btn-success" name="delete-message" value="Delete" onclick="delete_message(this.previousElementSibling.value);">
        </div>
    </div>

    <div class="row">
        <p>${message_ui}</p>
    </div>
</div>
</div>
</div>
<hr class="mb-5" style="color: #043b22; height: 3px; width: 100%;">

`;
} else {
    var myElement = `
    <div class="card" style="background: #f3f3f3;" id="card-${message_id_ui}">
    <div class="card-body">
        <div class="row mb-4">
            <div class="col-3">
                Customer Name: ${message_name_ui}
            </div>
            <div class="col-2">
                Room No: ${message_room_no_ui}
            </div>
            <div class="col-3">
                Message Time: ${message_time_ui}
            </div>
            <div class="col-2">
                <input type="hidden" name="message-id" value="${message_id_ui}">
                <input type="submit" class="btn btn-success" name="delete-message" value="Delete" onclick="delete_message(this.previousElementSibling.value);">
            </div>
        </div>
    
        <div class="row">
            <p>${message_ui}</p>
        </div>
    </div>
    </div>
    </div>
    <hr class="mb-5" style="color: #043b22; height: 3px; width: 100%;">
    
    `;
}



if(message_type_ui === "request"){
    document.getElementById("requests-body").innerHTML += myElement;
} else {
    document.getElementById("feedbacks-body").innerHTML += myElement;
}