<?php
session_start();

$txtEmail = $_POST['txtEmail'];
$txtNombre = $_POST['txtNombre'];
$txtApellido = $_POST['txtApellido'];
$txtEmail = $_POST['txtEmail'];
$numTelefono = $_POST['numTelefono'];
$numCedula = $_POST['numCedula'];
$numPlaca = $_POST['numPlaca'];
$txtMarca = $_POST['txtMarca'];
$txtColor = $_POST['txtColor'];
$Fecha = $_POST['Fecha'];
$Hora = $_POST['Hora'];

$_SESSION['txtEmail'] = $txtEmail;
$_SESSION['txtNombre'] = $txtNombre;
$_SESSION['txtApellido'] = $txtApellido;
$_SESSION['txtEmail'] = $txtEmail;
$_SESSION['numTelefono'] = $numTelefono;
$_SESSION['numCedula'] = $numCedula;
$_SESSION['numPlaca'] = $numPlaca;
$_SESSION['txtMarca'] = $txtMarca;
$_SESSION['txtColor'] = $txtColor;
$_SESSION['Fecha'] = $Fecha;
$_SESSION['Hora'] = $Hora;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header("Location: ../src/Registro.html");
die();
?>    