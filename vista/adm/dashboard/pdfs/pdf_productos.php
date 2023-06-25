<?php

require ('../../../../controlador/fpdf/plantilla.php');
require ('../../../../modelo/config.php');


$consulta = "SELECT id_producto, nombre_producto, descripcion_producto, precio_producto, descuento, id_categoria, activo FROM producto";
$resultado = $conn->query($consulta);

$pdf = new PDF("P","mm", array(400,400));   
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',9);

$pdf->Ln(10);

$pdf->Cell(45, 5,  mb_convert_encoding('Reporte de Tabla Productos', 'ISO-8859-1', 'UTF-8'), 0, 0, "C");
$pdf->Image('../img/logo.png', 220, -3, 40);

$pdf->Ln(10);

$pdf->Cell(25,5,"ID",1,0,"C");
$pdf->Cell(85,5,"Nombre",1,0,"C");
$pdf->Cell(70,30,"Descripcion",1,0,"C");
$pdf->Cell(30,5,"Precio",1,0,"C");
$pdf->Cell(25,5,"Descuento",1,0,"C");
$pdf->Cell(20,5,"Categoria",1,0,"C");
$pdf->Cell(25,5,"Estado",1,1,"C");


$pdf->SetFont("Arial", "B", 9);

while ($fila = $resultado->fetch_assoc()){
    $pdf->Cell(25,5,$fila['id_producto'],1,0,"C");
    $pdf->Cell(85,5,$fila['nombre_producto'],1,0,"C");
    $pdf->Cell(70,30,strip_tags($fila[utf8_decode('descripcion_producto')]),1,0,"B");
    $pdf->Cell(30,5,$fila['precio_producto'],1,0,"C");
    $pdf->Cell(25,5,$fila[utf8_decode('descuento')],1,0,"C");
    $pdf->Cell(20,5,$fila[utf8_decode('id_categoria')],1,0,"C");
    $pdf->Cell(25,5,$fila['activo'],1,1,"C");
}



$pdf->Output();
?>