<?php
include_once 'conexion.php';


## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = mysqli_real_escape_string($mysqli, $_POST['search']['value']); // Search value

## Date search value
$searchByFromdate = mysqli_real_escape_string($mysqli, $_POST['searchByFromdate']);
$searchByTodate = mysqli_real_escape_string($mysqli, $_POST['searchByTodate']);

## Search 
$searchQuery = " ";
if ($searchValue != '') {
	$searchQuery = " and (cc_clie like '%" . $searchValue . "%' or nombre_clie like '%" . $searchValue . "%' or apellido_clie like'%" . $searchValue . "%' ) ";
}

// Date filter
if ($searchByFromdate != '' && $searchByTodate != '') {
	$searchQuery .= " and (DATE(fecha) between '" . $searchByFromdate . "' and '" . $searchByTodate . "' ) ";
}

## Total number of records without filtering
$sel = mysqli_query($mysqli, "select count(*) as allcount from ventas ve
	INNER JOIN tb_cliente cl ON cl.id = ve.id_cliente ");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of records with filtering
$sel = mysqli_query($mysqli, "select count(*) as allcount from ventas ve
	INNER JOIN tb_cliente cl ON cl.id = ve.id_cliente  WHERE 1 " . $searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "SELECT cl.cc_clie, cl.nombre_clie,cl.apellido_clie,ve.total,ve.fecha, ve.id_cliente,ve.id, ve.estado FROM ventas ve
	INNER JOIN tb_cliente cl ON cl.id = ve.id_cliente   WHERE 1 " . $searchQuery . " order by " . $columnName . " " . $columnSortOrder . " limit " . $row . "," . $rowperpage;
$empRecords = mysqli_query($mysqli, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {
	if ($row['estado'] == "A") {
		$estado = '<div class="badge badge-success badge-pill">Activo</div>';
		$op = '<a class="btn btn-primary" target="_blank" title="Ver comprobante" href="pdf/generar.php?cl=' . $row['id_cliente'] . '&v=' . $row['id'] . '"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
<a class="btn btn-primary" title="Editar comprobante" href="venta_editar.php?idventa=' . $row['id'] . '"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>	   
<a class="btn btn-danger" title="Anular comprobante" href="misventas.php?idv=' . $row['id'] . '&confirma=ok"><i class="fa fa-ban" aria-hidden="true"></i></a>';
	} else {
		$estado = '<div class="badge badge-danger badge-pill">Anulado</div>';
		$op = '<a class="btn btn-primary" target="_blank" title="Ver comprobante" href="pdf/generar.php?cl=' . $row['id_cliente'] . '&v=' . $row['id'] . '"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
	';
	}



	$data[] = array(
		"cc_clie" => $row['cc_clie'],
		"nombre_clie" => $row['nombre_clie'],
		"apellido_clie" => $row['apellido_clie'],
		"total" => number_format($row['total']),
		"fecha" => $row['fecha'],
		"estado" => $estado,
		"op" => $op
	);
}

## Response
$response = array(
	"draw" => intval($draw),
	"iTotalRecords" => $totalRecords,
	"iTotalDisplayRecords" => $totalRecordwithFilter,
	"aaData" => $data
);

echo json_encode($response);
die;
