<?php
session_start();
// database connection code
include 'connection.php';

//open connection
$conn = OpenCon();
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
};
// get the session records
$txtNombre = $_SESSION['txtNombre'];
$txtApellido = $_SESSION['txtApellido'];
$txtEmail = $_SESSION['txtEmail'];
$numTelefono = $_SESSION['numTelefono'];
$numCedula = $_SESSION['numCedula'];
$numPlaca = $_SESSION['numPlaca'];
$txtMarca = $_SESSION['txtMarca'];
$txtColor = $_SESSION['txtColor'];
$Fecha = $_SESSION['Fecha'];
$Hora = $_SESSION['Hora'];
// get post records
$numEspacio = $_POST['numEspacio'];
$_SESSION['numEspacio'] = $numEspacio;
// generar nombre completo
$txtNombreCompleto = $txtNombre . " " . $txtApellido;
// check si existe ya el usuario

$foundID = false;
$foundplaca = false;

$sqlinsert1 = "INSERT INTO `dbo.persona` (ID_Persona, Nombre, Correo, Telefono) VALUES ('$numCedula', '$txtNombreCompleto', '$txtEmail', '$numTelefono')";
$sqlinsert3 = "INSERT INTO `dbo.vehiculo` (Placa, Marca, ID_Persona, Color) VALUES ('$numPlaca', '$txtMarca', '$numCedula', '$txtColor')";
$sqlinsert4 = "INSERT INTO `dbo.reservacion` (ID_Persona, Placa, Espacio, Fecha, Hora) VALUES ('$numCedula', '$numPlaca', '$numEspacio', '$Fecha', '$Hora')";

$sqlquery = "SELECT ID_Persona, Nombre FROM `dbo.persona`";

$result = mysqli_query($conn, $sqlquery);

if (mysqli_num_rows($result) > 0) {
    // output data of each row

    while($row = mysqli_fetch_assoc($result)) {
        if ($row["ID_Persona"] == $numCedula && $row["Nombre"] == $txtNombreCompleto) {

            //usuario existente
            $foundID = true;

            //check si existe la placa
            $sqlquery2 = "SELECT Placa, ID_Persona FROM `dbo.vehiculo` WHERE ID_Persona = '$numCedula'";
            $result2 = mysqli_query($conn, $sqlquery2);

            while($row2 = mysqli_fetch_assoc($result2)) {
                
                if ($row2["Placa"] == $numPlaca) {
                    //placa existente, insertar reservacion y parqueo
                    $foundplaca = true;

                    mysqli_query($conn, $sqlinsert4);  
                }
            }

            if ($foundplaca == false) {
                //placa no existente, insertar vehiculo, reservacion y parqueo
                mysqli_query($conn, $sqlinsert3);
                mysqli_query($conn, $sqlinsert4);
            }
        }
    }
    if ($foundID == false) {
        //Usuario no existente, insertar persona, vehiculo, reservacion y parqueo
        if ($conn->query($sqlinsert1) === TRUE) {
            echo "reservation";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
          if ($conn->query($sqlinsert3) === TRUE) {
            echo "vehiculo";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
          if ($conn->query($sqlinsert4) === TRUE) {
            echo "persona";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
    }

} else {
  echo "<script>alert('No hay registros');</script>";
}

// close connection
$conn->close();

//error reports
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header("Location: ../src/gracias.html");
die();

?>