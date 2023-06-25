<?php

require ('../../../../controlador/fpdf/plantilla.php');
require ('../../../../modelo/config.php');


$consulta = "SELECT id_veterinario, id_turno, id_clinica, dni_veterinario, nombre_veterinario, apellido_veterinario, genero_veterinario, telefono_veterinario FROM veterinario";
$resultado = $conn->query($consulta);

$pdf = new PDF("P","mm", array(400,270));   
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',9);

$pdf->Ln(10);

$pdf->Cell(45, 5,  mb_convert_encoding('Reporte de Tabla Veterinario', 'ISO-8859-1', 'UTF-8'), 0, 0, "C");
$pdf->Image('../img/logo.png', 220, -3, 40);

$pdf->Ln(10);

$pdf->Cell(20,5,"ID",1,0,"C");
$pdf->Cell(20,5,"ID Turno",1,0,"C");
$pdf->Cell(20,5,"ID Clinica",1,0,"C");
$pdf->Cell(40,5,"DNI",1,0,"C");
$pdf->Cell(30,5,"Nombre",1,0,"C");
$pdf->Cell(50,5,"Apellido",1,0,"C");
$pdf->Cell(35,5,"Genero",1,0,"C");
$pdf->Cell(35,5,"Telefono",1,1,"C");

$pdf->SetFont("Arial", "B", 9);

while ($fila = $resultado->fetch_assoc()){
    $pdf->Cell(20,5,$fila['id_veterinario'],1,0,"C");
    $pdf->Cell(20,5,$fila['id_turno'],1,0,"C");
    $pdf->Cell(20,5,$fila['id_clinica'],1,0,"C");
    $pdf->Cell(40,5,$fila['dni_veterinario'],1,0,"C");
    $pdf->Cell(30,5,$fila[utf8_decode('nombre_veterinario')],1,0,"C");
    $pdf->Cell(50,5,$fila[utf8_decode('apellido_veterinario')],1,0,"C");
    $pdf->Cell(35,5,$fila['genero_veterinario'],1,0,"C");
    $pdf->Cell(35,5,$fila['telefono_veterinario'],1,1,"C");
}



$pdf->Output();
?>