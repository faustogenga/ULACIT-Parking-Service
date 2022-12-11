<?php
include 'connection.php';
//open connection
$conn = OpenCon();
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
};

// get the session records
$user = $_POST['username'];
$password = $_POST['password'];

// check if the user is in the database
$sql = "SELECT * FROM `dbo.usuario` WHERE user = '$user' AND password = '$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    header("Location: ../src/admin.html");
} else {
    echo "<script> alert('Usuario o contraseña incorrectos'); window.location = '../src/login.html'; </script>";
}

//close connection
CloseCon($conn);
?>