function clear_room(val){
    $.ajax({
        url: 'clear-room.php',
        method: 'POST',
        data: { room_no: val },
        success: function (res) {
            var elem = document.getElementById("dirty-room-"+val);
            elem.parentNode.removeChild(elem);

        }

    })
}