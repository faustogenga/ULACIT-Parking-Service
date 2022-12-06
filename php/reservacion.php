<?php
// database connection code
include 'connection.php';
$conn = OpenCon();
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// get the post records
$txtNombre = $_POST['txtNombre'];
$txtApellido = $_POST['txtApellido'];
$txtEmail = $_POST['txtEmail'];
$numCedula = $_POST['numCedula'];
$numPlaca = $_POST['numPlaca'];
$Fecha = $_POST['Fecha'];
$numHora = $_POST['numHora'];
$numMinuto = $_POST['numMinuto'];
$AMPM = $_POST['AMPM'];


// database insert SQL code
$sql = "INSERT INTO `dbo.persona` (ID_Persona, Nombre, Correo, Telefono) VALUES ('$numCedula', '$txtNombre', '$txtEmail', '99999999')";

// insert in database 
if (mysqli_query($conn, $sql)) {
    header("Location: ../Grupo04.html");
    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>