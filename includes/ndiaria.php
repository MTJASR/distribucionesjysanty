<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="<?= $ruta_path?>/assets/bootstrap.min.css">
    <meta charset="UTF-8">
    <title>Facturas</title>
    <style>

@page {
  margin: 5px 0cm 0cm 0cm !important;
}
body {
margin: 28px 28px 20px 28px !important;
}
.caja{
	 font-size:12px
}
.table {
    margin-bottom: 1px;
}
p {
	text-align:left;
	padding:1px 1px 2px 15px;
	margin-bottom:0px;

}   

.table-condensed > tbody > tr > td, .table-condensed > tbody > tr > th, .table-condensed > tfoot > tr > td, .table-condensed > tfoot > tr > th, .table-condensed > thead > tr > td, .table-condensed > thead > tr > th {
    padding: 3px !important;
        padding-top: 3px !important;
        padding-right: 3px !important;
        padding-bottom: 3px !important;
        padding-left: 3px !important;
}

/** Define the footer rules **/
footer {
	position: fixed; 
	bottom: 0cm; 
	left: 0cm; 
	right: 0cm;
	height: 20px;

	/** Extra personal styles **/
	color: #292929;
	text-align: center;
	font-size:8px;
	
}

</style>
</head>
<body>
<div style="text-align:center">
<img src="<?= $ruta_path?>/assets/images/logo.png" width="150" alt="">
</div>
<div style="text-align:center; border:1px solid #000000">
<p style="text-align:center">VENTA DIARIA POR PROVEEDOR</p>
</div>
<br>
<div class="container4"> 

    <div class="row">
        <div class="col-xs-12">
        
	<!-- table-striped-->
<table class="table table-condensed table-bordered" style="width:100%">
<thead>
	<tr style="font-size:11px">
		<th style="text-align:left;" width="13%"><div class="col-xs-2 text-center"><strong>Producto</strong></div></th>
		<th style="text-align:left;" width="35%">Nombre</th>
        <th style="text-align:right;" width="8%">Cantidad</th>
		<th style="text-align:right;" width="10%">Valor</th>
		<th style="text-align:right;" width="15%">Fecha Venta</th>
	</tr>	
</thead>
<tbody style="font-size:10px">

<?php
if(isset($_GET["diaria"])){
  $ho = $_GET["diaria"];
}else{
  $ho = date('Y-m-d');
}


$sql_pro = "SELECT p.proveedor_fk, p.nombre_pro, u.nombre,  id_producto, id_venta  FROM ventas v
LEFT JOIN detalle_venta d ON d.id_venta=v.id
LEFT JOIN tb_productos p ON p.id=d.id_producto
LEFT JOIN tb_usuarios u ON u.id=v.id_usuario
where DATE(v.fecha) = :fecha  and p.proveedor_fk !='' AND v.id_usuario = {$_GET["proveedor_fk"]} group by p.proveedor_fk";
//articulos
$sql_arti = "SELECT p.codigo, p.nombre_pro, d.cantidad, v.fecha,  SUM(d.precio * d.cantidad) as precio, SUM(d.cantidad) as cantidad  FROM ventas v
LEFT JOIN detalle_venta d ON d.id_venta=v.id
LEFT JOIN tb_productos p ON p.id=d.id_producto

where DATE(v.fecha) = :fecha and proveedor_fk = :proveedor AND v.id_usuario = {$_GET["proveedor_fk"]} group by p.codigo,v.id_usuario";

$sitem = $bd->prepare($sql_pro);
$sitem->bindParam(':fecha', $ho);
$sitem->execute();
$listapedido = $sitem->fetchAll();


    foreach ($listapedido as $pro):
	  $arti = $bd->prepare($sql_arti);
	  $arti->bindParam(':fecha', $ho);
	  $arti->bindParam(':proveedor', $pro["proveedor_fk"]);
	  $arti->execute();
	  $lista_arti = $arti->fetchAll();

	  echo '<tr>';
	  echo '<td colspan="5" style="color:green; font-weight:bold; font-size:14px;" align="left"><b>Vendedor:</b> '.$pro["nombre"].'</td>';  
	  
	  echo '<tr>';
	  echo '<td colspan="5" align="left"><b>Proveedor:</b> '.$pro["proveedor_fk"].'</td>';


			echo '</tr>';
			$canti = 0;
			$topre = 0;
			
			foreach ($lista_arti as $articulo):
			$canti = $canti + $articulo["cantidad"];
			$topre = $topre + $articulo["precio"];
			if (!empty($articulo["fecha"])){$n = date("d-m-Y H:i:s", strtotime($articulo["fecha"]));}else{$n ="-";}

	echo '<tr>';
	echo '<td align="left">'.$articulo["codigo"].'</td>';
	echo '<td align="left">'.$articulo["nombre_pro"].'</td>';
	echo '<td align="right">'.$articulo["cantidad"].'</td>';
	echo '<td align="right">'.number_format($articulo["precio"],0,",",".").'</td>';
	echo '<td align="right">'.$n.'</td>';
			echo '</tr>';
			endforeach;
				echo '<tr>';
	echo '<td align="right" colspan="2"><b>Totales:</b></td>';
	echo '<td align="right">'.$canti.'</td>';
	echo '<td align="right">'.number_format($topre,0,",",".").'</td>';
	echo '<td align="right"></td>';
			echo '</tr>';
	endforeach;

//end: item productos		
?>
 </tbody>
</table>

	
  <?php

?>
        </div>
    </div>
</div><footer>
<div class="col-xs-2 text-center">
<strong></strong></div>
</footer>	
</body>
</html>