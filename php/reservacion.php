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
$numTelefono = $_POST['numTelefono'];
$numCedula = $_POST['numCedula'];
$numPlaca = $_POST['numPlaca'];
$txtMarca = $_POST['txtMarca'];
$txtColor = $_POST['txtColor'];
$numEspacio = $_POST['numEspacio'];
$Fecha = $_POST['Fecha'];
$Hora = $_POST['Hora'];


// check si existe ya el usuario

$foundID = false;
$foundplaca = false;



$sqlinsert1 = "INSERT INTO `dbo.persona` (ID_Persona, Nombre, Correo, Telefono) VALUES ('$numCedula', '$txtNombre', '$txtEmail', '$numTelefono')";
$sqlinsert3 = "INSERT INTO `dbo.vehiculo` (Placa, Marca, ID_Persona, Color) VALUES ('$numPlaca', '$txtMarca', '$numCedula', '$txtColor')";
$sqlinsert4 = "INSERT INTO `dbo.reservacion` (ID_Persona, Placa, Espacio, Fecha, Hora) VALUES ('$numCedula', '$numPlaca', '$numEspacio', '$Fecha', '$Hora')";

$sqlquery = "SELECT ID_Persona, Nombre FROM `dbo.persona`";

$result = mysqli_query($conn, $sqlquery);

if (mysqli_num_rows($result) > 0) {
    // output data of each row

    while($row = mysqli_fetch_assoc($result)) {
        if ($row["ID_Persona"] == $numCedula && $row["Nombre"] == $txtNombre) {

            //usuario existente
            $foundID = true;

            echo '<script>alert("usuario existente");</script>';

            //check si existe la placa
            $sqlquery2 = "SELECT Placa, ID_Persona FROM `dbo.vehiculo` WHERE ID_Persona = '$numCedula'";
            $result2 = mysqli_query($conn, $sqlquery2);

            while($row2 = mysqli_fetch_assoc($result2)) {
                
                if ($row2["Placa"] == $numPlaca) {
                    //placa existente, insertar reservacion y parqueo
                    $foundplaca = true;

                    mysqli_query($conn, $sqlinsert4);
    
                    echo '<script>alert("persona y placa existentes");</script>';
                    
                }
            }

            if ($foundplaca == false) {
                //placa no existente, insertar vehiculo, reservacion y parqueo
                mysqli_query($conn, $sqlinsert3);
                mysqli_query($conn, $sqlinsert4);

                echo '<script>alert("persona existente, placa no existente");</script>';
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

          echo '<script>alert("persona no existente");</script>';
    }

} else {
    echo '<script>alert("0 resultados");</script>';
}

$conn->close();
?>