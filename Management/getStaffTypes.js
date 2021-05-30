var staff_types_select = document.getElementById('staff-type');

var myStaffOption = `<option value='${staff_type_id_ui}'>${staff_type_ui}</option>`;

document.getElementById('staff-type').innerHTML += myStaffOption;