<?php
require('fpdf184/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{

}

// Pie de página
function Footer()
{
    
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',30);
$pdf ->Image('assets/images/logo - copia.png',0,0,70);
$pdf->SetXY(75,20);
$pdf->Cell(100,8,'Reporte De Ventas',0,0,'C',0);
$pdf->Ln(35);

$pdf->Output();
?>