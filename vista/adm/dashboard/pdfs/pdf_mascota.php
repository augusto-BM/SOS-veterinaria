<?php

require ('../../../../controlador/fpdf/plantilla.php');
require ('../../../../modelo/config.php');


$consulta = "SELECT id_mascota, id_reserva, tipo_mascota, nombre_mascota, edad_mascota, raza_mascota FROM mascota";
$resultado = $conn->query($consulta);

$pdf = new PDF("P","mm", array(400,210));   
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',9);

$pdf->Ln(10);

$pdf->Cell(45, 5,  mb_convert_encoding('Reporte de Tabla Mascota', 'ISO-8859-1', 'UTF-8'), 0, 0, "C");
$pdf->Image('../img/logo.png', 160, -3, 40);

$pdf->Ln(10);

$pdf->Cell(20,5,"ID",1,0,"C");
$pdf->Cell(20,5,"ID Reserva",1,0,"C");
$pdf->Cell(30,5,"Tipo",1,0,"C");
$pdf->Cell(40,5,"Nombre",1,0,"C");
$pdf->Cell(30,5,"Edad",1,0,"C");
$pdf->Cell(50,5,"Raza",1,1,"C");


$pdf->SetFont("Arial", "B", 9);

while ($fila = $resultado->fetch_assoc()){
    $pdf->Cell(20,5,$fila['id_mascota'],1,0,"C");
    $pdf->Cell(20,5,$fila['id_reserva'],1,0,"C");
    $pdf->Cell(30,5,$fila['tipo_mascota'],1,0,"C");
    $pdf->Cell(40,5,$fila[utf8_decode('nombre_mascota')],1,0,"C");
    $pdf->Cell(30,5,$fila[utf8_decode('edad_mascota')],1,0,"C");
    $pdf->Cell(50,5,$fila[utf8_decode('raza_mascota')],1,1,"C");
}



$pdf->Output();
?>