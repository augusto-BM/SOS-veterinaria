<?php

require ('../../../../controlador/fpdf/plantilla.php');
require ('../../../../modelo/config.php');


$consulta = "SELECT id_reserva, id_cliente, fecha_reserva, hora_reserva, tipo_reserva, modalidad_reserva, comentarios FROM reserva";
$resultado = $conn->query($consulta);

$pdf = new PDF("P","mm", array(400,270));   
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',9);

$pdf->Ln(10);

$pdf->Cell(45, 5,  mb_convert_encoding('Reporte de Tabla Reserva', 'ISO-8859-1', 'UTF-8'), 0, 0, "C");
$pdf->Image('../img/logo.png', 220, -3, 40);

$pdf->Ln(10);

$pdf->Cell(20,5,"ID",1,0,"C");
$pdf->Cell(20,5,"ID Cliente",1,0,"C");
$pdf->Cell(20,5,"Fecha",1,0,"C");
$pdf->Cell(30,5,"Hora",1,0,"C");
$pdf->Cell(55,5,"Tipo",1,0,"C");
$pdf->Cell(35,5,"Modalidad",1,0,"C");
$pdf->Cell(65,5,"Comentarios",1,1,"C");

$pdf->SetFont("Arial", "B", 9);

while ($fila = $resultado->fetch_assoc()){
    $pdf->Cell(20,5,$fila['id_reserva'],1,0,"C");
    $pdf->Cell(20,5,$fila['id_cliente'],1,0,"C");
    $pdf->Cell(20,5,$fila['fecha_reserva'],1,0,"C");
    $pdf->Cell(30,5,$fila['hora_reserva'],1,0,"C");
    $pdf->Cell(55,5,$fila[utf8_decode('tipo_reserva')],1,0,"C");
    $pdf->Cell(35,5,$fila[utf8_decode('modalidad_reserva')],1,0,"C");
    $pdf->Cell(65,5,$fila[utf8_decode('comentarios')],1,1,"C");
}



$pdf->Output();
?>