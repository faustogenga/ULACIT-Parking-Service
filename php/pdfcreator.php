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
$pdf->AddPage('P', 'A4');
$pdf->SetAutoPageBreak(true, 10);
$pdf->SetFont('Arial', '', 12);
$pdf->SetTopMargin(10);
$pdf->SetLeftMargin(10);
$pdf->SetRightMargin(10);
$pdf->setTitle('Reservacion');  

/* --- Cell --- */
$pdf->SetXY(10, 10);
$pdf->SetFont('Times', 'B', 36);
$pdf->Cell(109, 21, 'Reservacion', 'B', 1, 'L', false);

$pdf->SetFontSize(18);
$pdf->SetXY(10, 38);
$pdf->Cell(97, 19, "Nombre : $txtNombre", 0, 1, 'L', false);
$pdf->SetXY(10, 68);
$pdf->Cell(93, 17, "Apellido : $txtApellido", 0, 1, 'L', false);
$pdf->SetXY(10, 98);
$pdf->Cell(93, 17, "Email : $txtEmail", 0, 1, 'L', false);
$pdf->SetXY(10, 128);
$pdf->Cell(93, 17, "Telefono : $numTelefono", 0, 1, 'L', false);

$pdf->SetXY(110, 37);
$pdf->SetFont('Times', 'B', 18);
$pdf->Cell(89, 20, "Placa : $numPlaca", 0, 1, 'L', false);
$pdf->SetXY(110, 62);
$pdf->SetFont('Times', '', 18);
$pdf->Cell(88, 20, "Marca : $txtMarca", 0, 1, 'L', false);
$pdf->SetXY(110, 87);
$pdf->Cell(88, 20, "Color : $txtColor", 0, 1, 'L', false);
$pdf->SetXY(110, 107);
$pdf->Cell(88, 20, "Fecha : $Fecha", 0, 1, 'L', false);
$pdf->SetXY(110, 127);
$pdf->Cell(88, 20, "Hora : $Hora", 0, 1, 'L', false);


$pdf->SetFillColor(214,215,255);
$pdf->SetXY(10, 159);
$pdf->SetFont('', 'B', 18);
$pdf->Cell(190, 17, "Cedula : $numCedula", 1, 1, 'L', true);
$pdf->SetFillColor(255);
$pdf->SetFillColor(226,255,240);
$pdf->SetXY(10, 187);
$pdf->Cell(190, 19, "Espacio : $numEspacio", 1, 1, 'L', true);
$pdf->SetFillColor(255);

$logoFile = '../img/logo_ulacit_morado.png';
$logoFile2 = '../img/Reservacion.jpg';

$pdf->Image( $logoFile,125,7,80,25, 'PNG' );

$pdf->Image( $logoFile2,11, 213,110,80, 'JPG' );

$pdf->Output('Reservacion.pdf','D');

/*
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
*/

?>