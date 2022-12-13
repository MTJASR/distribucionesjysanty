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
<p style="text-align:center">VENTA POR CADA VENDEDOR</p>
</div>
<br>
<div class="container4"> 

    <div class="row">
        <div class="col-xs-12">
        
	<!-- table-striped-->
<table class="table table-condensed table-bordered" style="width:100%">
<thead>
	<tr style="font-size:11px">
		<th style="text-align:left;" width="15%"><div class="col-xs-2 text-center"><strong>Documento</strong></div></th>
		<th style="text-align:left;" width="15%">Fecha</th>
        <th style="text-align:right;" width="15%">Monto</th>
		<th style="text-align:right;" width="15%">NIT</th>
		<th style="text-align:right;" width="30%">Nombre del Cliente</th>
	</tr>	
</thead>
<tbody style="font-size:10px">

<?php
if(isset($_GET["diaria"])){
  $ho = $_GET["diaria"];
}else{
  $ho = date('Y-m-d');
}


$sql_pro = "SELECT u.nombre, v.id_usuario  FROM ventas v
INNER JOIN tb_usuarios u ON u.id=v.id_usuario
where DATE(v.fecha) = :fecha group by v.id_usuario";
//articulos

$sitem = $bd->prepare($sql_pro);
$sitem->bindParam(':fecha', $ho);
$sitem->execute();
$listapedido = $sitem->fetchAll();	

    foreach ($listapedido as $pro):
	$sql_arti = "SELECT  v.fecha, v.total, v.id, c.cc_clie, c.nombre_clie, c.apellido_clie FROM ventas v
INNER JOIN tb_usuarios u ON u.id=v.id_usuario
INNER JOIN tb_cliente c ON c.id=v.id_cliente
where DATE(v.fecha) = :fecha and u.id = :user";
	  $arti = $bd->prepare($sql_arti);
	  $arti->bindParam(':fecha', $ho);
	  $arti->bindParam(':user', $pro["id_usuario"]);
	  $arti->execute();
	  $lista_arti = $arti->fetchAll();
	  
	echo '<tr>';
	echo '<td colspan="5" align="left"><b>Vendedor:</b> '.$pro["nombre"].'</td>';
			echo '</tr>';
			$tofact = 0;
			$topre = 0;
			foreach ($lista_arti as $articulo):
			$tofact = $tofact + $articulo["total"];
			//$topre = $topre + $articulo["precio"];
			if (!empty($articulo["fecha"])){$n = date("d-m-Y H:i:s", strtotime($articulo["fecha"]));}else{$n ="-";}

	echo '<tr>';
	echo '<td align="left">'.$articulo["id"].'</td>';
	echo '<td align="left">'.$n.'</td>';
	echo '<td align="right">'.number_format($articulo["total"],0,",",".").'</td>';
	echo '<td align="right">'.$articulo["cc_clie"].'</td>';
	echo '<td align="right">'.$articulo["nombre_clie"].', '.$articulo["apellido_clie"].'</td>';
			echo '</tr>';
			endforeach;
				echo '<tr>';
	echo '<td align="right" colspan="2"><b>Totales:</b></td>';
	echo '<td align="right">'.number_format($tofact,0,",",".").'</td>';
	echo '<td align="right"></td>';
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