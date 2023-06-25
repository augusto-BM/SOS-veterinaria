<?php

require ('../../../../controlador/fpdf/plantilla.php');
require ('../../../../modelo/config.php');


$consulta = "SELECT id_detalle_compra, id_compra, id_producto, nombre, precio, cantidad FROM detalle_compra";
$resultado = $conn->query($consulta);

$pdf = new PDF("P","mm", array(400,250));   
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',9);

$pdf->Ln(10);

$pdf->Cell(52, 5,  mb_convert_encoding('Reporte de Tabla Detalle Compra', 'ISO-8859-1', 'UTF-8'), 0, 0, "C");
$pdf->Image('../img/logo.png', 200, -3, 40);

$pdf->Ln(10);

$pdf->Cell(25,5,"ID",1,0,"C");
$pdf->Cell(30,5,"ID Compra",1,0,"C");
$pdf->Cell(30,5,"ID Producto",1,0,"C");
$pdf->Cell(80,5,"Nombre",1,0,"C");
$pdf->Cell(30,5,utf8_decode("Precio"),1,0,"C");
$pdf->Cell(30,5,"Cantidad",1,1,"C");



$pdf->SetFont("Arial", "B", 9);

while ($fila = $resultado->fetch_assoc()){
    $pdf->Cell(25,5,$fila['id_detalle_compra'],1,0,"C");
    $pdf->Cell(30,5,$fila['id_compra'],1,0,"C");
    $pdf->Cell(30,5,$fila['id_producto'],1,0,"C");
    $pdf->Cell(80,5,$fila['nombre'],1,0,"C");
    $pdf->Cell(30,5,$fila[utf8_decode('precio')],1,0,"C");
    $pdf->Cell(30,5,$fila['cantidad'],1,1,"C");
}



$pdf->Output();
?>