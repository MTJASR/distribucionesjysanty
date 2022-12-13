<?php
require_once '../conexion.php';
require_once 'fpdf/fpdf.php';
$id = $_GET['v'];
$idcliente = $_GET['cl'];

class PDF extends FPDF
{

function Header()
{
global $mysqli;
$id = $_GET['v'];
$idcliente = $_GET['cl'];

$this->SetFont('Arial', 'B', 12);

$tventa = mysqli_query($mysqli, "SELECT * FROM ventas WHERE id = $id");
$totalv = mysqli_fetch_assoc($tventa);
$iduser = $totalv["id_usuario"];
$fechaFactura =date("d-m-Y H:i:s", strtotime($totalv["fecha"]));
//Usuario
$tusuario = mysqli_query($mysqli, "SELECT * FROM tb_usuarios WHERE id = $iduser");
$duser = mysqli_fetch_assoc($tusuario);
$nombreUser = $duser['nombre'];
//End:usuario

$config = mysqli_query($mysqli, "SELECT * FROM configuracion");
$datos = mysqli_fetch_assoc($config);
$clientes = mysqli_query($mysqli, "SELECT * FROM tb_cliente WHERE id = $idcliente");
$datosC = mysqli_fetch_assoc($clientes);

$this->Ln(3);
$this->Image("../assets/images/bg-3.png",0,0,210,278,'PNG');
$this->Cell(195, 5, utf8_decode($datos['nombre']), 0, 1, 'C');
$this->Cell(195, 5, "NIT: 1.065.890.133-6", 0, 1, 'C');
$this->SetFont('Arial', 'B', 10);
$this->Cell(80, 5, '', 0, 0, 'C');
$this->Cell(31, 5, 'Numero de factura:SA000 ', 0, 0, 'C');
$this->SetFont('Arial', 'B', 10);
$this->Cell(15, 5,  number_format($totalv['id']), 0, 1, 'C');
$this->SetFont('Arial', '', 10);
$this->Image("../assets/images/logo.png", 10, 10, 40, 30, 'PNG');
$this->Ln(10);

$this->SetFont('Arial', 'B', 10);
$this->SetFillColor(255, 255, 255);
$this->SetTextColor(0,0,0);
$this->Cell(196, 5, "Datos de la empresa", 1, 1, 'L', 1);
$this->SetTextColor(0, 0, 0);
$this->Cell(25, 5, utf8_decode('Celular '), 0, 0, 'L');
$this->Cell(40, 5, utf8_decode('Direccion'), 0, 0, 'L');
$this->Cell(60, 5, utf8_decode('Correo'), 0, 0, 'L');
$this->Cell(35, 5, utf8_decode('Vendedor'), 0, 0, 'L');
$this->Cell(40, 5, utf8_decode('Fecha'), 0, 1, 'L');

$this->SetFont('Arial', '', 10);
$this->Cell(25, 5, utf8_decode($datos['telefono']), 0, 0, 'L');
$this->Cell(40, 5, utf8_decode($datos['direccion']), 0, 0, 'L');
$this->Cell(60, 5, utf8_decode($datos['email']), 0, 0, 'L');
$this->Cell(35, 5, utf8_decode($nombreUser), 0, 0, 'L');
$this->Cell(40, 5, utf8_decode($fechaFactura), 0, 1, 'L');
$this->Ln(3);

/*Datos del cliente*/
$this->SetFont('Arial', 'B', 10);
$this->SetFillColor(255, 255, 255);
$this->SetTextColor(0,0,0);
$this->Cell(196, 5, "Datos del cliente", 1, 1, 'L', 1);
$this->SetTextColor(0, 0, 0);
$this->Cell(35, 5, utf8_decode('Nombre '), 0, 0, 'L');
$this->Cell(70, 5, utf8_decode('Apellido'), 0, 0, 'L');
$this->Cell(51, 5, utf8_decode('Cedula'), 0, 0, 'L');
$this->Cell(30, 5, utf8_decode('Celular'), 0, 1, 'L');

$this->SetFont('Arial', '', 10);
$this->Cell(35, 5, utf8_decode($datosC['nombre_clie']), 0, 0, 'L');
$this->Cell(70, 5, utf8_decode($datosC['apellido_clie']), 0, 0, 'L');
$this->Cell(50, 5, utf8_decode($datosC['cc_clie']), 0, 0, 'L');
$this->Cell(30, 5, utf8_decode($datosC['celular_clie']), 0, 1, 'L');

$this->Ln(3);

$this->SetFont('Arial', 'B', 10);
$this->SetFillColor(255, 255, 255);
$this->SetTextColor(0,0,0);
$this->Cell(196, 5, "Datos de la tienda", 1, 1, 'L', 1);
$this->SetTextColor(0, 0, 0);

$this->Cell(80, 5, utf8_decode('Barrio'), 0, 0, 'L');
$this->Cell(70, 5, utf8_decode('Negocio'), 0, 0, 'L');
$this->Cell(40, 5, utf8_decode('Dirección'), 0, 1, 'L');
$this->SetFont('Arial', '', 10);

$this->Cell(80, 5, utf8_decode($datosC['barrio_clie']), 0, 0, 'L');
$this->Cell(70, 5, utf8_decode($datosC['nombre_negocio_clie']), 0, 0, 'L');
$this->Cell(40, 5, utf8_decode($datosC['direccion_clie']), 0, 1, 'L');
$this->Ln(3);
$this->SetFont('Arial', 'B', 10);
$this->SetTextColor(0,0,0);
$this->Ln(5);
$this->Cell(14, 5, utf8_decode('N°'), 0, 0, 'L');
$this->Cell(90, 5, utf8_decode('Descripción'), 0, 0, 'L');
$this->Cell(25, 5, 'Cantidad', 0, 0, 'L');
$this->Cell(32, 5, 'Precio', 0, 0, 'L');
$this->Cell(35, 5, 'Total importe.', 0, 1, 'L');
$this->SetFont('Arial', '', 10);
}
//Pie de página
function Footer()
{
	global $mysqli;
$id = $_GET['v'];
$tventa = mysqli_query($mysqli, "SELECT * FROM ventas WHERE id = $id");
$totalv = mysqli_fetch_assoc($tventa);
$iduser = $totalv["obs"];

$this->SetY(-35);

/*$this->SetFont('Arial','B',10);
$this->Cell(0,10,'Page '.$iduser.'',0,0,'C');*/
$this->Ln(1);
$this->SetFont('Arial', 'B', 10);
$this->Cell(150, 5, '', 0, 0, 'L');
$this->Cell(25, 5, 'Total a pagar: ', 0, 0, 'L');
$this->SetFont('Arial', 'B', 10);
$this->Cell(35, 5,  number_format($totalv['total']), 0, 1, 'L');
$this->SetFont('Arial', '', 10);

$this->Ln(2);
$this->SetFont('Arial', 'B', 10);
$this->Cell(142, 5, '', 0, 0, 'L');
$this->Cell(32, 5, 'Metodo de pago: ', 0, 0, 'L');
$this->SetFont('Arial', '', 10);
$this->Cell(35, 5,  $totalv['metodo'], 0, 1, 'L');

$this->Ln(2);
$this->SetFont('Arial', 'B', 10);
$this->Cell(25, 5, 'Observacion: ', 0, 0, 'L');
$this->SetFont('Arial', '', 10);
$this->Cell(35, 5,  $totalv['obs'], 0, 1, 'L');

$this->Ln(2);
$this->SetFont('Arial', 'B', 10);
$this->Cell(25, 5, 'Firma: ', 0, 0, 'L');
$this->SetFont('Arial', '', 10);
$this->Cell(35, 5,  '______________________________________________', 0, 1, 'L');
$this->Ln(2);

$this->Ln(2);
$this->SetFont('Arial', 'B', 6);
$this->Cell(250, 5, ' SISTEMA ELABORADO POR  MT JASR COMPANY CEL:316-773-7490 CORREO ELECTRONICO: mtjasrcompany@gmail.com', 0, 0, 'L');
$this->Ln(3);
   }
}

$pdf = new PDF('P', 'mm', 'letter');
$pdf->AliasNbPages();
$pdf->addPage('','',false); 
$pdf->SetMargins(10, 10, 10);
$pdf->SetTitle("Ventas");

$ventas = mysqli_query($mysqli, "SELECT d.*, p.codigo, p.nombre_pro FROM detalle_venta d INNER JOIN tb_productos p ON d.id_producto = p.id WHERE d.id_venta = $id");
$contador = 1;

while ($row = mysqli_fetch_assoc($ventas)) {
    $pdf->Cell(14, 5, $contador, 0, 0, 'L');
    $pdf->Cell(90, 5, utf8_decode($row['nombre_pro']), 0, 0, 'L');
    $pdf->Cell(25, 5, $row['cantidad'], 0, 0, 'L');
    $pdf->Cell(32, 5,  number_format($row['precio']), 0, 0, 'L');
    $pdf->Cell(35, 5, number_format($row['cantidad'] * $row['precio']), 0, 1, 'L');
	
	if ((($contador) % 28) === 0) {
            $pdf->AddPage();

          }
    $contador++;
	
}




$pdf->Output("ventas.pdf", "I");


//Creación del objeto de la clase heredada
/*$pdf=new PDF();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
//Aquí escribimos lo que deseamos mostrar

*/
?>