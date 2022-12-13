<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}


/*error_reporting(0);*/
include_once "./dompdf/vendor/autoload.php";
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$options = $dompdf->getOptions();
$options->setDefaultFont('Courier');
$dompdf->setOptions($options);
ob_start();
include("conexion.php");
include "./includes/ndiaria.php";
$html = ob_get_clean();
$dompdf->loadHtml($html);
$dompdf->render();
$dompdf->add_info('Title', 'Venta_proveedor_'.date("d-m-Y").''.time());
//Page numbers
$font = $dompdf->getFontMetrics()->getFont("Arial", "bold");
$dompdf->getCanvas()->page_text(552, 14, "Pag.: {PAGE_NUM} de {PAGE_COUNT}", $font, 8, array(0, 0, 0));
	 
$pedido = "./files/Venta_proveedor_".date("d-m-Y")."_".time().".pdf";
$ruta = "/files/Venta_proveedor_".date("d-m-Y")."_".time().".pdf";
file_put_contents($pedido, $dompdf->output());

header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=Venta_proveedor_".date("d-m-Y")."_".time().".pdf");
echo $dompdf->output();
?>