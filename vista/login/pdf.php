<?php
require('../../controlador/fpdf/fpdf.php');



class PDF extends FPDF
{
    function HEADER()
    {
        
        include '../../modelo/config.php';//llama a la conexion BD

        // Obtiene los datos de la cita de la base de datos
        //SELECT id_reserva, id_cliente, fecha_reserva, hora_reserva, tipo_reserva, modalidad_reserva, comentarios FROM reserva ORDER BY id_reserva DESC LIMIT 0,1;
        $consulta_cita= $conn->query("SELECT id_reserva, id_cliente, fecha_reserva, hora_reserva, tipo_reserva, modalidad_reserva, comentarios FROM reserva ORDER BY id_reserva DESC LIMIT 0,1");  //traemos los datos de la tabla reserva desde DB

        $dato_info=$consulta_cita->fetch_object();

           //(logo de la empresa,mover derecha,mover abajo,tamaño img)
        $this->SetFont('Arial','B',19);         //(tipo fuente, negrita(B-I-U-BIU),tamaño Texto)
        $this->Cell(80);                        //movernos a la derecha
        $this->SetTextColor(32, 13, 9);             //color
        
        //creamos una celda o fila

        $this->Cell(110,15, utf8_decode('Resumen de la cita'),1,1,'C',0);//ANCHO CELDA,ALTO CELDA,TITULO,BORDE(1-0),SALTO LINEA(1-0) 
        $this->Ln(3); //SALTO DE LINEA
        $this->SetTextColor(103);   //color
        
        //id_reserva
        $this->Cell(80);  
        $this->SetTextColor(32, 13, 9);
        $this->SetFont('Arial','',12);
        $this->Cell(50, 10, 'Id reserva', 0, 0, 'L');
        $this->Cell(96,10, utf8_decode($dato_info->id_reserva),0,0,'',0);
        $this->Ln(9); 

        //id_cliente

        $this->Cell(80);  
        $this->SetFont('Arial','',12);
        $this->Cell(50, 10, 'ID Cliente', 0, 0, 'L');
        $this->Cell(96,10, utf8_decode($dato_info->id_cliente),0,0,'',0);
        $this->Ln(9);

        //fecha_reserva

        $this->Cell(80);  
        $this->SetFont('Arial','',12);
        $this->Cell(50, 10, "fecha reserva", 0, 0, 'L');
        $this->Cell(96,10, utf8_decode($dato_info->fecha_reserva),0,0,'',0);
        $this->Ln(9);

        //hora_reserva

        $this->Cell(80);  
        $this->SetFont('Arial','',12);
        $this->Cell(50, 10, "Hora reserva", 0, 0, 'L');
        $this->Cell(96,10, utf8_decode($dato_info->hora_reserva),0,0,'',0);
        $this->Ln(9);

        //tipo_reserva

        $this->Cell(80);  
        $this->SetFont('Arial','',12);
        $this->Cell(50, 10, "Tipo reserva", 0, 0, 'L');
        $this->Cell(96,10, utf8_decode($dato_info->tipo_reserva),0,0,'',0);
        $this->Ln(9);

        //modalidad_reserva

        $this->Cell(80);  
        $this->SetFont('Arial','',12);
        $this->Cell(50, 10, 'Modalidad Reserva', 0, 0, 'L');
        $this->Cell(96,10, utf8_decode($dato_info->modalidad_reserva),0,0,'L',0);
        $this->Ln(9); //SALTO DE LINEA

        //comentarios

        $this->Cell(80);  
        $this->SetFont('Arial','',12);
        $this->Cell(50, 10, 'Comentarios', 0, 0, 'L');
        $this->Cell(0,10, utf8_decode($dato_info->comentarios),0,1,'L');
        $this->Ln(0); //SALTO DE LINEA

    }
}

include '../../modelo/config.php';//llama a la conexion BD

$pdf = new PDF();
$pdf->AddPage("landscape");
$pdf->AliasNbPages();



$i=0;
$pdf->SetFont('Arial','',12);
$pdf->SetDrawColor(163,163.163);//color borde
//SELECT id_mascota, id_reserva, tipo_mascota, nombre_mascota, edad_mascota, raza_mascota FROM mascota ORDER BY id_mascota DESC LIMIT 0,1;
$consulta_mascota= $conn->query("SELECT id_mascota, tipo_mascota, nombre_mascota, edad_mascota, raza_mascota FROM mascota ORDER BY id_mascota DESC LIMIT 0,1");

while($datos_reporte=$consulta_mascota->fetch_object()){

$i=$i+1;

$pdf->Cell(80);  
$pdf->Cell(50, 10, 'ID Mascota', 0, 0, 'L');
$pdf->Cell(0, 10, utf8_decode($datos_reporte->id_mascota), 0, 1, 'L');

$pdf->Cell(80);  
$pdf->Cell(50, 10, 'Tipo Mascota', 0, 0, 'L');
$pdf->Cell(0, 10, utf8_decode($datos_reporte->tipo_mascota), 0, 1, 'L');

$pdf->Cell(80);  
$pdf->Cell(50, 10, 'Nombre Mascota', 0, 0, 'L');
$pdf->Cell(0, 10, utf8_decode($datos_reporte->nombre_mascota), 0, 1, 'L');

$pdf->Cell(80);  
$pdf->Cell(50, 10, 'Edad Mascota', 0, 0, 'L');
$pdf->Cell(0, 10, utf8_decode($datos_reporte->edad_mascota), 0, 1, 'L');

$pdf->Cell(80);  
$pdf->Cell(50, 10, 'Raza Mascota', 0, 0, 'L');
$pdf->Cell(0, 10, utf8_decode($datos_reporte->raza_mascota), 0, 1, 'L');
}

// Genera el PDF
$pdf->Output();//nombre DESCARGA, VISOR(I->individual  -  D->descargar)



?>