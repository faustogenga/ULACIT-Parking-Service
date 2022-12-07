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
$numHora = $_POST['numHora'];
$numMinuto = $_POST['numMinuto'];
$AMPM = $_POST['AMPM'];


// check si existe ya el usuario

$foundID = false;
$foundplaca = false;

$sqlquery = "SELECT ID_Persona, Nombre FROM `dbo.persona`";

$sqlinsert1 = "INSERT INTO `dbo.reservacion` (ID_Persona, ID_Parqueo, Fecha, Hora, Minuto, AM_PM) VALUES ('$numCedula', '1', '$Fecha', '$numHora', '$numMinuto', '$AMPM')";
$sqlinsert2 = "INSERT INTO `dbo.parqueo` (Espacio, Tipo_seguridad, Disponibilidad) VALUES ($numEspacio, 'Parqueo_Privado', 'O')";
$sqlinsert3 = "INSERT INTO `dbo.vehiculo` (Placa, Marca, ID_Persona, Color, Modelo) VALUES ('$numPlaca', '$txtMarca', '$numCedula', '$txtColor')";
$sqlinsert4 = "INSERT INTO `dbo.persona` (ID_Persona, Nombre, Correo, Telefono) VALUES ('$numCedula', '$txtNombre', '$txtEmail', '$numTelefono')";

$result = mysqli_query($conn, $sqlquery);

if (mysqli_num_rows($result) > 0) {
    // output data of each row

    while($row = mysqli_fetch_assoc($result)) {
        if ($row["ID_Persona"] == $numCedula && $row["Nombre"] == $txtNombre) {

            //usuario existente
            $found = true;
            alert("usuario existente");

            //check si existe la placa
            $sqlquery2 = "SELECT Placa, ID_Persona FROM dbo.vehiculo WHERE ID_Persona = '$numCedula'";
            $result2 = mysqli_query($conn, $sqlquery2);

            while($row = mysqli_fetch_assoc($result2)) {
                
                if ($row["Placa"] == $numPlaca) {
                    //placa existente, insertar reservacion y parqueo
                    $found = true;

                    mysqli_query($conn, $sqlinsert1);
                    mysqli_query($conn, $sqlinsert2);
    
                    alert("persona y placa existentes");
                    header("Location: ../Grupo04.html");
                }
            }

            if ($found == false) {
                //placa no existente, insertar vehiculo, reservacion y parqueo
                mysqli_query($conn, $sqlinsert1);
                mysqli_query($conn, $sqlinsert2);
                mysqli_query($conn, $sqlinsert3);

                alert("persona existente, placa no existente");
                header("Location: ../Grupo04.html");
            }
        }
    }
    if ($foundID == false) {
        //Usuario no existente, insertar persona, vehiculo, reservacion y parqueo
        mysqli_query($conn, $sqlinsert1);
        mysqli_query($conn, $sqlinsert2);
        mysqli_query($conn, $sqlinsert3);
        mysqli_query($conn, $sqlinsert4);

        alert("persona no existente")
        header("Location: ../Grupo04.html");
    }

} else {
    alert("0 results")
}
   
mysqli_close($conn);
?>