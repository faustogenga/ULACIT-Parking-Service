<?php
require('../src/FPDF/fpdf.php');

session_start();
// session

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
$numEspacio = $_SESSION['numEspacio'];

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',36);
$pdf->setTitle('Reservacion');
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'Reservacion',0,1,'C');
$pdf->Cell(0,10,"Nombre : $txtNombre",0,1,'C');
$pdf->Cell(0,10,"Apellido : $txtApellido",0,1,'C');
$pdf->Cell(0,10,"Email : $txtEmail",0,1,'C');
$pdf->Cell(0,10,"Telefono : $numTelefono",0,1,'C');
$pdf->Cell(0,10,"Cedula : $numCedula",0,1,'C');
$pdf->Cell(0,10,"Placa : $numPlaca",0,1,'C');
$pdf->Cell(0,10,"Marca : $txtMarca",0,1,'C');
$pdf->Cell(0,10,"Color : $txtColor",0,1,'C');
$pdf->Cell(0,10,"Fecha : $Fecha",0,1,'C');
$pdf->Cell(0,10,"Hora : $Hora",0,1,'C');
$pdf->Cell(0,20,"Espacio : $numEspacio",0,1,'C');


$logoFile = '../img/Reservacion.jpg';
$logoFile2 = '../img/logo_ulacit_morado.png';
$pdf->Image( $logoFile,10,150,120,90, 'JPG' );
$pdf->Image( $logoFile2,10,250,100,30, 'PNG' );
$pdf->Output('Reservacion.pdf','D');
?>