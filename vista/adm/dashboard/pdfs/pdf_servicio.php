<?php

require ('../../../../controlador/fpdf/plantilla.php');
require ('../../../../modelo/config.php');


$consulta = "SELECT id_servicio, id_veterinario, id_reserva, estado_servicio FROM servicio";
$resultado = $conn->query($consulta);

$pdf = new PDF("P","mm", array(200,130));   
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',9);

$pdf->Ln(10);

$pdf->Cell(40, 5,  mb_convert_encoding('Reporte de Tabla Servicio', 'ISO-8859-1', 'UTF-8'), 0, 0, "C");
$pdf->Image('../img/logo.png', 85, -3, 40);

$pdf->Ln(10);

$pdf->Cell(20,5,"ID",1,0,"C");
$pdf->Cell(35,5,"ID Veterinario",1,0,"C");
$pdf->Cell(25,5,"ID Reserva",1,0,"C");
$pdf->Cell(35,5,"Estado",1,1,"C");

$pdf->SetFont("Arial", "B", 9);

while ($fila = $resultado->fetch_assoc()){
    $pdf->Cell(20,5,$fila['id_servicio'],1,0,"C");
    $pdf->Cell(35,5,$fila['id_veterinario'],1,0,"C");
    $pdf->Cell(25,5,$fila['id_reserva'],1,0,"C");
    $pdf->Cell(35,5,$fila['estado_servicio'],1,1,"C");

}



$pdf->Output();
?>