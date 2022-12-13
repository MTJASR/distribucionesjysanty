<?php
require_once "conexion.php";
session_start();
$sona = $_SESSION['sona'];
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
        $data['label'] = $row['nombre_pro']. ' - '. 'Stock:  '.$row['stock'];
        $data['value'] = $row['nombre_pro'];
        if ($sona == 'AGUACHICA') {
            $data['precio'] = $row['prc_venta_1'];  
          }elseif ($sona == 'GAMARRA') {
              $data['precio'] = $row['prc_venta_2'];  
          }
        $data['existencia'] = $row['stock'];
        array_push($datos, $data);
    }
    echo json_encode($datos);
    die();
}else if (isset($_GET['detalle'])) {
    $id = $_SESSION['id'];
    $datos = array();
    $detalle = mysqli_query($mysqli, "SELECT d.*, p.codigo, p.nombre_pro FROM detalle_temp d INNER JOIN tb_productos p ON d.id_producto = p.id WHERE d.id_usuario = $id");
    $sumar = mysqli_query($mysqli, "SELECT total, SUM(total) AS total_pagar FROM detalle_temp WHERE id_usuario = $id");
	$to = mysqli_fetch_array($sumar);
	$tota = $to["total_pagar"];
    while ($row = mysqli_fetch_assoc($detalle)) {
        $data['id'] = $row['id'];
        $data['descripcion'] = $row['nombre_pro'];
        $data['cantidad'] = $row['cantidad'];
        $data['precio_venta'] = number_format($row['precio_venta']);
        $da = $row['precio_venta'] * $row['cantidad'];
		$data['sub_total'] = number_format($da);
		$data['total'] = number_format($tota);
        array_push($datos, $data);
    }
    echo json_encode($datos);
    die();
	
} else if (isset($_GET['delete_detalle'])) {
    $id_detalle = $_GET['id'];
    $verificar = mysqli_query($mysqli, "SELECT * FROM detalle_temp WHERE id = $id_detalle");
    $datos = mysqli_fetch_assoc($verificar);
    if ($datos['cantidad'] > 1) {
        $cantidad = $datos['cantidad'] - 1;
		$total_precio = $cantidad * $datos['precio_venta'];
        $query = mysqli_query($mysqli, "UPDATE detalle_temp SET cantidad = $cantidad, total = '$total_precio' WHERE id = $id_detalle");
        if ($query) {
            $msg = "restado";
        } else {
            $msg = "Error";
        }
    }else{
        $query = mysqli_query($mysqli, "DELETE FROM detalle_temp WHERE id = $id_detalle");
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
    $verificar = mysqli_query($mysqli, "SELECT * FROM detalle_temp WHERE id = $id_detalle");
    $datos = mysqli_fetch_assoc($verificar);
	
    if ($op == "mas") {

		//validar stock
		$sto = mysqli_query($mysqli, "SELECT stock FROM tb_productos where id ='".$datos["id_producto"]."'");
        $resultStock = mysqli_fetch_assoc($sto);
        $mtotal = $resultStock['stock'];
		//End: Validar stock
		if($cant <= $mtotal){
			
			$total_precio = $cant * $datos["precio_venta"];
			$query = mysqli_query($mysqli, "UPDATE detalle_temp SET cantidad = '$cant', total = '$total_precio' WHERE id = $id_detalle");
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
        $query = mysqli_query($mysqli, "UPDATE detalle_temp SET cantidad = '$cantidad', total = '$total_precio' WHERE id = $id_detalle");
		
        if ($query) {
            $msg = "ok";
        } else {
            $msg = "Error";
        }
    }
    echo $msg;
    die();

}else if (isset($_GET['procesarVenta'])) {
    $id_cliente = $_GET['id'];
	$obs = $_GET['obs'];
	$tipo = $_GET['tipo'];
    $id_user = $_SESSION['id'];
    $consulta = mysqli_query($mysqli, "SELECT total, SUM(total) AS total_pagar FROM detalle_temp WHERE id_usuario = $id_user");
    $result = mysqli_fetch_assoc($consulta);
    $total = $result['total_pagar'];
	$fecha_hora = date('Y-m-d H:i:s');
    $insertar = mysqli_query($mysqli, "INSERT INTO ventas(id_cliente, total, id_usuario,obs,metodo,fecha) VALUES ($id_cliente, '$total', '$id_user', '$obs', '$tipo', '$fecha_hora')");
    if ($insertar) {
        $id_maximo = mysqli_query($mysqli, "SELECT MAX(id) AS total FROM ventas");
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
        } 
    }else{
        $msg = array('mensaje' => 'error');
    }
    echo json_encode($msg);
    die();
}




if (isset($_POST['action'])) {
    $id = $_POST['id'];
    $cant = $_POST['cant'];
    $precio = $_POST['precio'];
    $id_user = $_SESSION['id'];
    $total = $precio * $cant;
	
    $verificar = mysqli_query($mysqli, "SELECT * FROM detalle_temp WHERE id_producto = $id AND id_usuario = $id_user");
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
        $query = mysqli_query($mysqli, "UPDATE detalle_temp SET cantidad = $cantidad, total = '$total_precio' WHERE id_producto = $id AND id_usuario = $id_user");
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
			$query = mysqli_query($mysqli, "INSERT INTO detalle_temp(id_usuario, id_producto, cantidad, precio_venta, total) VALUES ($id_user, $id, $cant, '$precio', $total)");
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

