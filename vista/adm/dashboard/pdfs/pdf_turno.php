<?php

require ('../../../../controlador/fpdf/plantilla.php');
require ('../../../../modelo/config.php');


$consulta = "SELECT id_turno, hora_inicio, hora_final FROM turno";
$resultado = $conn->query($consulta);

$pdf = new PDF("P","mm", array(200,150));   
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',9);

$pdf->Ln(10);

$pdf->Cell(40, 5,  mb_convert_encoding('Reporte de Tabla Turno', 'ISO-8859-1', 'UTF-8'), 0, 0, "C");
$pdf->Image('../img/logo.png', 100, -3, 40);

$pdf->Ln(10);

$pdf->Cell(20,5,"ID",1,0,"C");
$pdf->Cell(20,5,"Hora Inicio",1,0,"C");
$pdf->Cell(20,5,"Hora Salida",1,1,"C");

$pdf->SetFont("Arial", "B", 9);

while ($fila = $resultado->fetch_assoc()){
    $pdf->Cell(20,5,$fila['id_turno'],1,0,"C");
    $pdf->Cell(20,5,$fila['hora_inicio'],1,0,"C");
    $pdf->Cell(20,5,$fila['hora_final'],1,1,"C");

}



$pdf->Output();
?>