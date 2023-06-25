<?php

require ('../../../../controlador/fpdf/plantilla.php');
require ('../../../../modelo/config.php');


$consulta = "SELECT id_historial, id_mascota, diagnostico, tratamiento, evolucion, vacuna, fecha_historial, nivel_gravedad, conclusiones FROM historial_mascota";
$resultado = $conn->query($consulta);

$pdf = new PDF("P","mm", array(400,380));   
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',9);

$pdf->Ln(10);

$pdf->Cell(45, 5,  mb_convert_encoding('Reporte de Tabla Historial', 'ISO-8859-1', 'UTF-8'), 0, 0, "C");
$pdf->Image('../img/logo.png', 330, -3, 40);

$pdf->Ln(10);

$pdf->Cell(15,5,"ID",1,0,"C");
$pdf->Cell(20,5,"ID Mascota",1,0,"C");
$pdf->Cell(30,5,"Diagnostico",1,0,"C");
$pdf->Cell(50,5,"Tratamiento",1,0,"C");
$pdf->Cell(25,5,utf8_decode("Evolución"),1,0,"C");
$pdf->Cell(40,5,"Vacuna",1,0,"C");
$pdf->Cell(35,5,"Fecha",1,0,"C");
$pdf->Cell(25,5,"Gravedad",1,0,"C");
$pdf->Cell(120,5,"Conclusiones",1,1,"C");


$pdf->SetFont("Arial", "B", 9);

while ($fila = $resultado->fetch_assoc()){
    $pdf->Cell(15,5,$fila['id_historial'],1,0,"C");
    $pdf->Cell(20,5,$fila['id_mascota'],1,0,"C");
    $pdf->Cell(30,5,$fila['diagnostico'],1,0,"C");
    $pdf->Cell(50,5,$fila['tratamiento'],1,0,"C");
    $pdf->Cell(25,5,$fila[utf8_decode('evolucion')],1,0,"C");
    $pdf->Cell(40,5,$fila[utf8_decode('vacuna')],1,0,"C");
    $pdf->Cell(35,5,$fila['fecha_historial'],1,0,"C");
    $pdf->Cell(25,5,$fila['nivel_gravedad'],1,0,"C");
    $pdf->Cell(120,5,$fila['conclusiones'],1,1,"C");
}



$pdf->Output();
?>