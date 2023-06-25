<?php

require ('../../../../controlador/fpdf/plantilla.php');
require ('../../../../modelo/config.php');


$consulta = "SELECT id_cliente, dni_cliente, nombre_cliente, apellido_cliente, genero_cliente, direccion_cliente, telefono_cliente, email, password, user_type FROM cliente";
$resultado = $conn->query($consulta);

$pdf = new PDF("P","mm", array(400,365));   
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',9);

$pdf->Ln(10);

$pdf->Cell(45, 5,  mb_convert_encoding('Reporte de Tabla Cliente', 'ISO-8859-1', 'UTF-8'), 0, 0, "C");
$pdf->Image('../img/logo.png', 320, -3, 40);

$pdf->Ln(10);

$pdf->Cell(20,5,"ID",1,0,"C");
$pdf->Cell(25,5,"DNI",1,0,"C");
$pdf->Cell(40,5,"Nombre",1,0,"C");
$pdf->Cell(30,5,"Apellido",1,0,"C");
$pdf->Cell(30,5,"Genero",1,0,"C");
$pdf->Cell(35,5,utf8_decode("Direccion"),1,0,"C");
$pdf->Cell(35,5,"Telefono",1,0,"C");
$pdf->Cell(45,5,"Email",1,0,"C");
$pdf->Cell(65,5,utf8_decode("Contraseña"),1,0,"C");
$pdf->Cell(20,5,"Tipo",1,1,"C");

$pdf->SetFont("Arial", "B", 9);

while ($fila = $resultado->fetch_assoc()){
    $pdf->Cell(20,5,$fila['id_cliente'],1,0,"C");
    $pdf->Cell(25,5,$fila['dni_cliente'],1,0,"C");
    $pdf->Cell(40,5,$fila['nombre_cliente'],1,0,"C");
    $pdf->Cell(30,5,$fila['apellido_cliente'],1,0,"C");
    $pdf->Cell(30,5,$fila['genero_cliente'],1,0,"C");
    $pdf->Cell(35,5,$fila[utf8_decode('direccion_cliente')],1,0,"C");
    $pdf->Cell(35,5,$fila['telefono_cliente'],1,0,"C");
    $pdf->Cell(45,5,$fila["email"],1,0,"C");
    $pdf->Cell(65,5,$fila[utf8_decode("password")],1,0,"C");
    $pdf->Cell(20,5,$fila["user_type"],1,1,"C");
}



$pdf->Output();
?>