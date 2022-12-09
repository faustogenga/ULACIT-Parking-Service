"use strict";

var today = new Date().toISOString().split("T")[0];
console.log(today);
var week = new Date(new Date().getTime() + 7 * 24 * 60 * 60 * 1000).toISOString().split("T")[0];
console.log(week);

document.getElementById("Fecha").setAttribute("min", today);
document.getElementById("Fecha").setAttribute("max", week);


function myFunction(e) {
    var x = document.getElementById("Fecha").value;
    document.cookie="x";
}

function openForm() {
    document.getElementById("popupForm").style.display = "block";
}


// Path: src\Reservacion.html


