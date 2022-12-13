<?php
require_once "conexion.php";
session_start();
if (isset($_GET['q'])) {
    $datos = array();
    $nombre = $_GET['q'];
    $cliente = mysqli_query($mysqli, "SELECT * FROM tb_cliente WHERE CONCAT(nombre_clie,' ', apellido_clie) LIKE '%$nombre%'");
    while ($row = mysqli_fetch_assoc($cliente)) {
        $data['id'] = $row['id'];
        $data['label'] = $row['nombre_clie'].", ".$row['apellido_clie'];
        $data['direccion'] = $row['direccion_clie'];
        $data['telefono'] = $row['celular_clie'];
        array_push($datos, $data);
    }
    echo json_encode($datos);
    die();
}else if (isset($_GET['pro'])) {
    $datos = array();
    $nombre = $_GET['pro'];
    $producto = mysqli_query($mysqli, "SELECT * FROM tb_productos WHERE codigo LIKE '%" . $nombre . "%' OR nombre_pro LIKE '%" . $nombre . "%'");
    while ($row = mysqli_fetch_assoc($producto)) {
        $data['id'] = $row['id'];
        $data['label'] = $row['codigo'] . ' - ' .$row['nombre_pro'];
        $data['value'] = $row['nombre_pro'];
        $data['precio'] = $row['prc_venta_1'];
        $data['existencia'] = $row['stock'];
        array_push($datos, $data);
    }
    echo json_encode($datos);
    die();
}else if (isset($_GET['detalle'])) {
    $id = $_SESSION['id'];
    $idventa = $_GET['idventa'];
    $datos = array();
    $detalle = mysqli_query($mysqli, "SELECT d.*, p.codigo, p.nombre_pro FROM detalle_venta d INNER JOIN tb_productos p ON d.id_producto = p.id WHERE d.id_venta = $idventa");
    $sumar = mysqli_query($mysqli, "SELECT SUM(precio * cantidad) AS total_pagar FROM detalle_venta  WHERE id_venta = $idventa");
	$to = mysqli_fetch_array($sumar);
	$tota = $to["total_pagar"];
    while ($row = mysqli_fetch_assoc($detalle)) {
        $data['id'] = $row['id'];
        $data['descripcion'] = $row['nombre_pro'];
        $data['cantidad'] = $row['cantidad'];
        $data['precio'] = number_format($row['precio']);
        $da = $row['precio'] * $row['cantidad'];
		$data['sub_total'] = number_format($da);
		$data['total'] = number_format($tota);
        array_push($datos, $data);
    }
    echo json_encode($datos);
    die();
	
} else if (isset($_GET['delete_detalle'])) {
    $id_detalle = $_GET['id'];
    $verificar = mysqli_query($mysqli, "SELECT * FROM detalle_venta WHERE id = $id_detalle");
    $datos = mysqli_fetch_assoc($verificar);
    if ($datos['cantidad'] > 1) {
        $cantidad = $datos['cantidad'] - 1;
		$total_precio = $cantidad * $datos['precio'];
        $query = mysqli_query($mysqli, "UPDATE detalle_venta SET cantidad = $cantidad WHERE id = $id_detalle");
		$sto = mysqli_query($mysqli, "SELECT stock FROM tb_productos where id ='".$datos["id_producto"]."'");
        $resultStock = mysqli_fetch_assoc($sto);
        $mtotal = $resultStock['stock'];
		$stockTotal = $mtotal + 1;
		$stock = mysqli_query($mysqli, "UPDATE tb_productos SET stock = $stockTotal WHERE id = '".$datos["id_producto"]."'");
		
		/////////////
	$consulta = mysqli_query($mysqli, "SELECT SUM(precio *cantidad) AS total_pagar FROM detalle_venta WHERE id_venta = '".$datos["id_venta"]."'");
    $result = mysqli_fetch_assoc($consulta); 
    $total = $result['total_pagar']; 
	$insertar = mysqli_query($mysqli, "UPDATE ventas SET total = '$total' WHERE id ='".$datos["id_venta"]."'");
		/////////////
        if ($query) {
            $msg = "restado";
        } else {
            $msg = "Error";
        }
    }else{
        $query = mysqli_query($mysqli, "DELETE FROM detalle_venta WHERE id = $id_detalle");
		
		$sto = mysqli_query($mysqli, "SELECT stock FROM tb_productos where id ='".$datos["id_producto"]."'");
        $resultStock = mysqli_fetch_assoc($sto);
        $mtotal = $resultStock['stock'];
		$stockTotal = $mtotal + 1;
		$stock = mysqli_query($mysqli, "UPDATE tb_productos SET stock = $stockTotal WHERE id = '".$datos["id_producto"]."'");
		/////////////
	$consulta = mysqli_query($mysqli, "SELECT SUM(precio *cantidad) AS total_pagar FROM detalle_venta WHERE id_venta = '".$datos["id_venta"]."'");
    $result = mysqli_fetch_assoc($consulta); 
    $total = $result['total_pagar']; 
	$insertar = mysqli_query($mysqli, "UPDATE ventas SET total = '$total' WHERE id ='".$datos["id_venta"]."'");
		/////////////
        if ($query) {
            $msg = "ok";
        } else {
            $msg = "Error";
        }
    }
    echo $msg;
    die();
} 

else if (isset($_GET['detalleMas'])) {
    $id_detalle = $_GET['idd'];
    $mcan = $_GET['can'];
    $cant = $_GET['nume'];
	$op = $_GET['op']; // mas o menos
	if($_GET['nume'] < 1){$msg = "error_stock";exit();}
    $verificar = mysqli_query($mysqli, "SELECT * FROM detalle_venta WHERE id = $id_detalle");
    $datos = mysqli_fetch_assoc($verificar);
	
    if ($op == "mas") {

		//validar stock
		$sto = mysqli_query($mysqli, "SELECT stock FROM tb_productos where id ='".$datos["id_producto"]."'");
        $resultStock = mysqli_fetch_assoc($sto);
        $mtotal = $resultStock['stock'];
		//End: Validar stock
		if($cant <= $mtotal){
			
			//$total_precio = $cant * $datos["precio_venta"];
			$query = mysqli_query($mysqli, "UPDATE detalle_venta SET cantidad = '$cant' 
			WHERE id = $id_detalle");
			
			//
			if($datos['cantidad'] > $cant){
            $stockTotale = $datos['cantidad'] - $cant;
			$stockTotal = $mtotal + $stockTotale;
			}else{
			$valor = $cant - $datos['cantidad'];
			$stockTotal = $mtotal - $valor;
				}
            $stock = mysqli_query($mysqli, "UPDATE tb_productos SET stock = $stockTotal WHERE id = '".$datos["id_producto"]."'");
			//
		/////////////
	$consulta = mysqli_query($mysqli, "SELECT SUM(precio *cantidad) AS total_pagar FROM detalle_venta WHERE id_venta = '".$datos["id_venta"]."'");
    $result = mysqli_fetch_assoc($consulta); 
    $total = $result['total_pagar']; 
	$insertar = mysqli_query($mysqli, "UPDATE ventas SET total = '$total' WHERE id ='".$datos["id_venta"]."'");
		/////////////
			if ($query) {
				$msg = "sumado";
			}else{
				$msg = "Error al ingresar";
			}
		}else{
			$msg = "error_stock";
			}
    }elseif($op == "menos" and $datos['cantidad'] >1){
		$cantidad = $datos['cantidad'] - 1;
		$total_precio = $cantidad * $datos['precio_venta'];
        $query = mysqli_query($mysqli, "UPDATE detalle_venta SET cantidad = '$cantidad'
		 WHERE id = $id_detalle");
		 
		 
		
        if ($query) {
            $msg = "ok";
        } else {
            $msg = "Error";
        }
    }
    echo $msg;
    die();

}else if (isset($_GET['procesarVenta'])) {
    $idventa = $_GET['idventa'];
    $id_cliente = $_GET['id'];
	$obs = $_GET['obs'];
	$tipo = $_GET['tipo'];
    $id_user = $_SESSION['id'];
    $consulta = mysqli_query($mysqli, "SELECT SUM(precio *cantidad) AS total_pagar FROM detalle_venta WHERE id_venta = $idventa");
    $result = mysqli_fetch_assoc($consulta); 
    $total = $result['total_pagar']; 
    /*$insertar = mysqli_query($mysqli, "INSERT INTO ventas(id_cliente, total, id_usuario,obs,metodo) VALUES ($id_cliente, '$total', '$id_user', '$obs', '$tipo')");*/
	$insertar = mysqli_query($mysqli, "UPDATE ventas SET id_cliente = $id_cliente, total = '$total',
	id_usuario = '$id_user', obs = '$obs', metodo = '$tipo' WHERE id = $idventa");
    if ($insertar) {
       /* $id_maximo = mysqli_query($mysqli, "SELECT MAX(id) AS total FROM ventas");
        $resultId = mysqli_fetch_assoc($id_maximo);
        $ultimoId = $resultId['total'];
        $consultaDetalle = mysqli_query($mysqli, "SELECT * FROM detalle_temp WHERE id_usuario = $id_user");
        while ($row = mysqli_fetch_assoc($consultaDetalle)) {
            $id_producto = $row['id_producto'];
            $cantidad = $row['cantidad'];
            $precio = $row['precio_venta'];
            $insertarDet = mysqli_query($mysqli, "INSERT INTO detalle_venta(id_producto, id_venta, cantidad, precio) VALUES ($id_producto, $ultimoId, $cantidad, '$precio')");
            $stockActual = mysqli_query($mysqli, "SELECT * FROM tb_productos WHERE id = $id_producto");
            $stockNuevo = mysqli_fetch_assoc($stockActual);
            $stockTotal = $stockNuevo['stock'] - $cantidad;
            $stock = mysqli_query($mysqli, "UPDATE tb_productos SET stock = $stockTotal WHERE id = $id_producto");
        } 
        if ($insertarDet) {
            $eliminar = mysqli_query($mysqli, "DELETE FROM detalle_temp WHERE id_usuario = $id_user");
            $msg = array('id_cliente' => $id_cliente, 'id_venta' => $ultimoId);
        } */
		$msg = array('mensaje' => 'ok');
    }else{
        $msg = array('mensaje' => 'error');
    }
    echo json_encode($msg);
    die();
}




if (isset($_POST['action'])) {
    $id = $_POST['id'];
	$idventa = $_POST['idventa'];
    $cant = $_POST['cant'];
    $precio = $_POST['precio'];
    $id_user = $_SESSION['id'];
    $total = $precio * $cant;
	
    $verificar = mysqli_query($mysqli, "SELECT * FROM detalle_venta WHERE id_producto = $id AND id_venta = $idventa");
    $result = mysqli_num_rows($verificar);
    $datos = mysqli_fetch_assoc($verificar);
    if ($result > 0) {
        $cantidad = $datos['cantidad'] + 1;
        $total_precio = $cantidad * $total;
		//validar stock
		$sto = mysqli_query($mysqli, "SELECT stock FROM tb_productos where id ='".$datos["id_producto"]."'");
        $resultStock = mysqli_fetch_assoc($sto);
        $mtotal = $resultStock['stock'];
		//End: Validar stock
		$cant = $cantidad;
		if($cant <= $mtotal){
        $query = mysqli_query($mysqli, "UPDATE detalle_venta SET cantidad = $cantidad
		WHERE id_producto = $id AND id_venta = $idventa");
		
//
			
			$stockTotal = $mtotal - 1;
            $stock = mysqli_query($mysqli, "UPDATE tb_productos SET stock = '$stockTotal' WHERE id = '".$datos["id_producto"]."'");
			//
		
		
		/////////////
	$consulta = mysqli_query($mysqli, "SELECT SUM(precio *cantidad) AS total_pagar FROM detalle_venta WHERE id_venta = '".$datos["id_venta"]."'");
    $result = mysqli_fetch_assoc($consulta); 
    $total = $result['total_pagar']; 
	$insertar = mysqli_query($mysqli, "UPDATE ventas SET total = '$total' WHERE id ='".$datos["id_venta"]."'");
		/////////////
			  if ($query) {
				  $msg = "actualizado";
			  } else {
				  $msg = "Error al ingresar";
			  }
		}else{
			$msg = "error_stock";
		}
    }else{
		//validar stock
		$sto = mysqli_query($mysqli, "SELECT stock FROM tb_productos where id ='".$id."'");
        $resultStock = mysqli_fetch_assoc($sto);
        $mtotal = $resultStock['stock'];
		//End: Validar stock
		if($cant <= $mtotal){
			$query = mysqli_query($mysqli, "INSERT INTO detalle_venta(id_producto, cantidad, precio, id_venta) VALUES ($id, $cant, '$precio', '$idventa')");
			
			//
            $stockTotal = $mtotal - 1;
            $stock = mysqli_query($mysqli, "UPDATE tb_productos SET stock = $stockTotal WHERE id = $id");
			//
		/////////////
	$consulta = mysqli_query($mysqli, "SELECT SUM(precio *cantidad) AS total_pagar FROM detalle_venta WHERE id_venta = '".$datos["id_venta"]."'");
    $result = mysqli_fetch_assoc($consulta); 
    $total = $result['total_pagar']; 
	$insertar = mysqli_query($mysqli, "UPDATE ventas SET total = '$total' WHERE id ='".$datos["id_venta"]."'");
		/////////////
			if ($query) {
				$msg = "registrado";
			}else{
				$msg = "Error al ingresar";
			}
		}else{
			$msg = "error_stock";
			}
    }
    echo json_encode($msg);
    die();
}







if (isset($_POST['cambio'])) {
    if (empty($_POST['actual']) || empty($_POST['nueva'])) {
        $msg = 'Los campos estan vacios';
    } else {
        $id = $_SESSION['id'];
        $actual = md5($_POST['actual']);
        $nueva = md5($_POST['nueva']);
        $consulta = mysqli_query($mysqli, "SELECT * FROM usuario WHERE clave = '$actual' AND idusuario = $id");
        $result = mysqli_num_rows($consulta);
        if ($result == 1) {
            $query = mysqli_query($mysqli, "UPDATE usuario SET clave = '$nueva' WHERE idusuario = $id");
            if ($query) {
                $msg = 'ok';
            }else{
                $msg = 'error';
            }
        } else {
            $msg = 'dif';
        }
        
    }
    echo $msg;
    die();
    
}

