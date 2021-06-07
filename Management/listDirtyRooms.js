document.getElementById("dirty-rooms-body").innerHTML += `
<tr id="dirty-room-${dirty_room_no_ui}">
<th><span class="px-4 py-1">${dirty_room_no_ui}</span></th>
<td><span class="px-4 py-1">${dirty_room_name_ui}</span></td>
<td><span class="px-4 py-1">${dirty_room_housekeeper_ui}</span></td>
<td>
<input type="hidden" name="room-id" value="${dirty_room_no_ui}">
<button class="btn btn-success" onclick="clear_room(this.previousElementSibling.value);">Mark</button>
</td>
</tr>
`;