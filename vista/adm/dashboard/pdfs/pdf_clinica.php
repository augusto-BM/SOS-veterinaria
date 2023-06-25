<?php

require ('../../../../controlador/fpdf/plantilla.php');
require ('../../../../modelo/config.php');


$consulta = "SELECT id_clinica, ruc_clinica, nombre_clinica, telefono_clinica, direccion_clinica FROM clinica";
$resultado = $conn->query($consulta);

$pdf = new PDF("P","mm", array(210,250));   
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',9);

$pdf->Ln(10);

$pdf->Cell(42, 5,  mb_convert_encoding('Reporte de Tabla Producto', 'ISO-8859-1', 'UTF-8'), 0, 0, "C");
$pdf->Image('../img/logo.png', 165, -3, 40);

$pdf->Ln(10);

$pdf->Cell(20,5,"ID",1,0,"C");
$pdf->Cell(35,5,"RUC",1,0,"C");
$pdf->Cell(25,5,"Nombre",1,0,"C");
$pdf->Cell(35,5,utf8_decode("Teléfono"),1,0,"C");
$pdf->Cell(80,5,utf8_decode("Dirección"),1,1,"C");

$pdf->SetFont("Arial", "B", 9);

while ($fila = $resultado->fetch_assoc()){
    $pdf->Cell(20,5,$fila['id_clinica'],1,0,"C");
    $pdf->Cell(35,5,$fila['ruc_clinica'],1,0,"C");
    $pdf->Cell(25,5,$fila['nombre_clinica'],1,0,"C");
    $pdf->Cell(35,5,$fila['telefono_clinica'],1,0,"C");
    $pdf->Cell(80,5,$fila['direccion_clinica'],1,1,"C");

}



$pdf->Output();
?>