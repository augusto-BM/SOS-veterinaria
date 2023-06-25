<?php

require ('../../../../controlador/fpdf/plantilla.php');
require ('../../../../modelo/config.php');


$consulta = "SELECT id_compra, id_transaccion, id_cliente, fecha_compra, status, email, id_cliente_paypal, total FROM compra";
$resultado = $conn->query($consulta);

$pdf = new PDF("P","mm", array(400,340));   
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',9);

$pdf->Ln(10);

$pdf->Cell(45, 5,  mb_convert_encoding('Reporte de Tabla Compra', 'ISO-8859-1', 'UTF-8'), 0, 0, "C");
$pdf->Image('../img/logo.png', 290, -3, 40);

$pdf->Ln(10);

$pdf->Cell(25,5,"ID",1,0,"C");
$pdf->Cell(35,5,"ID Transaccion",1,0,"C");
$pdf->Cell(30,5,"ID Cliente",1,0,"C");
$pdf->Cell(35,5,"Fecha",1,0,"C");
$pdf->Cell(30,5,utf8_decode("Estado"),1,0,"C");
$pdf->Cell(80,5,"Email",1,0,"C");
$pdf->Cell(50,5,"ID Cliente Paypal",1,0,"C");
$pdf->Cell(30,5,"Total",1,1,"C");



$pdf->SetFont("Arial", "B", 9);

while ($fila = $resultado->fetch_assoc()){
    $pdf->Cell(25,5,$fila['id_compra'],1,0,"C");
    $pdf->Cell(35,5,$fila['id_transaccion'],1,0,"C");
    $pdf->Cell(30,5,$fila['id_cliente'],1,0,"C");
    $pdf->Cell(35 ,5,$fila['fecha_compra'],1,0,"C");
    $pdf->Cell(30,5,$fila[utf8_decode('status')],1,0,"C");
    $pdf->Cell(80,5,$fila[utf8_decode('email')],1,0,"C");
    $pdf->Cell(50,5,$fila['id_cliente_paypal'],1,0,"C");
    $pdf->Cell(30,5,$fila['total'],1,1,"C");
}



$pdf->Output();
?>