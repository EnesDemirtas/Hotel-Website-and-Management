var newElement = `
<div class="row">
<div class="col-md-2 border border-dark"
    style="background-color: #198754cc; height: 1rem; width:auto; margin-top: 4rem;">
</div>

<div class="col-md-2 text-center" style="margin-top: 3.5rem; font-weight:500; letter-spacing:1px">
    <span>Available Rooms</span>
</div>

<div class="col-md-2 border border-dark"
    style="background-color: rgba(253, 215, 0, 0.800); height: 1rem; width:auto; margin-top: 4rem;">
</div>

<div class="col-md-2 text-center" style="margin-top: 3.5rem; font-weight:500; letter-spacing:1px">
    <span>Reserved Rooms</span>
</div>

</div>

<div class="row">
<div class="col-md-2 border border-dark"
    style="background-color: rgba(241, 23, 23, 0.800); height: 1rem; width:auto; margin-top: 4rem;">
</div>

<div class="col-md-2 text-center" style="margin-top: 3.5rem; font-weight:500; letter-spacing:1px">
    <span>Unavailable Rooms</span>
</div>

<div class="col-md-2 border border-dark"
    style="background-color: rgba(145, 124, 57, 0.856); height: 1rem; width:auto; margin-top: 4rem;">
</div>

<div class="col-md-3 text-center" style="margin-top: 3.5rem; font-weight:500; letter-spacing:1px">
    <span>Rooms that need to be cleaned</span>
</div>

</div>
`;

document.getElementById('rooms').innerHTML += newElement;