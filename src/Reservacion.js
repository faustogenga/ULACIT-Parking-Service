"use strict";

var today = new Date().toISOString().split("T")[0];
var week = new Date(new Date().getTime() + 7 * 24 * 60 * 60 * 1000).toISOString().split("T")[0];

document.getElementById("Fecha").setAttribute("min", today);
document.getElementById("Fecha").setAttribute("max", week);

// Path: src\Reservacion.html


