<?php
include 'connection.php';
//open connection

$conn = OpenCon();
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
};

// get the session records
$Nombre = $_POST['txtNombre'];
$Email = $_POST['txtEmail'];

$sqlselect = "SELECT * FROM `dbo.suscripcion` WHERE Correo = '$Email'";
$sqlinsert = "INSERT INTO `dbo.suscripcion` (Correo, Nombre) VALUES ('$Email', '$Nombre')";

// check if the email is already in the database
$result = mysqli_query($conn, $sqlselect);

if (mysqli_num_rows($result) > 0) {
    echo "El correo ya se encuentra registrado";
} else {
    mysqli_query($conn, $sqlinsert);
}
// Recipient's email address
$to = 'bycilifa@ema-sofia.eu';

// Subject of the email
$subject = 'Hello from PHP';

// Body of the email
$body = 'This is a test email sent from PHP';

// Additional headers
$headers = 'From: bycilifa@ema-sofia.eu' . "\r\n" .
           'Reply-To: bycilifa@ema-sofia.eu' . "\r\n" .
           'X-Mailer: PHP/' . phpversion();

// Send the email
mail($to, $subject, $body, $headers);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
CloseCon($conn);

header("Location: ../Grupo04.html");

die();
?>