<?php
// database connection code
include 'connection.php';

//open connection
$conn = OpenCon();
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
};



$txtNombre = $_POST['txtNombre'];
$txtEmail = $_POST['txtEmail'];
$txtComentario = $_POST['txtComentario'];

$sqlinsert = "INSERT INTO `dbo.comentarios` (Nombre, Email, Comentario) VALUES ('$txtNombre','$txtEmail','$txtComentario')";
$sqlinsert2 = "INSERT INTO `dbo.suscripcion` (Correo, Nombre) VALUES ('$txtEmail', '$txtNombre')";

if (empty($_POST['check'])) {
    mysqli_query($conn, $sqlinsert);
  } else {
    mysqli_query($conn, $sqlinsert);
    mysqli_query($conn, $sqlinsert2);
  }

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

CloseCon($conn);
header("Location: ../index.html");

?>