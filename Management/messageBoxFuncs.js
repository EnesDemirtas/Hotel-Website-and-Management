function mark_message(val){
    $.ajax({
        url: 'mark-message.php',
        method: 'POST',
        data: { message_id: val },
        success: function (res) {
            var elem = document.getElementById("mark-"+val);
            elem.parentNode.removeChild(elem);

            var elem2 = document.getElementById("badge-"+val);
            elem2.parentNode.removeChild(elem2);
        }

    })
}

function delete_message(val){
    $.ajax({
        url: 'delete-message.php',
        method: 'POST',
        data: { message_id: val },
        success: function (res) {
            var elem = document.getElementById("card-"+val);
            elem.parentNode.removeChild(elem);
        }

    })
}