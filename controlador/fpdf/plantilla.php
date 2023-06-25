<?php
session_start();
if(!isset($_SESSION['admin_name'])){
    header('location:login_form.php');
 }

require ('fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {

        // Arial bold 15
        $this->SetFont("Arial", "B", 15);

        // Título
        $this->Cell(25);
        $this->Cell(1, 5,  mb_convert_encoding('Veterinaria SOS', 'ISO-8859-1', 'UTF-8'), 0, 0, "C");

        //Fecha
        $this->SetFont("Arial", "", 9);
        $this->Cell(5, 25, "Fecha: " . date("d/m/Y"), 0, 1, "C");
        $this->Cell(57, -10, "Administrador: " . $_SESSION['admin_name'], 0, 0, "C");

        // Salto de línea
        $this->Ln(5);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}
