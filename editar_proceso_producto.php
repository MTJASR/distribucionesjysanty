<?php

print_r($_POST);
if(!isset($_POST['id'])){
    header('Location: productos.php?mensaje=error');
}


include_once 'conexion.php';
$id = $_POST["id"];
$codigo = $_POST["codigo"];
$nombre = $_POST["nombre_pro"];
$precio_compra = $_POST["prc_compra"];
$precio1 = $_POST["prc_venta_1"];
$precio2 = $_POST["prc_venta_2"];
$stock = $_POST["stock"];
$proveedor = $_POST["proveedor_fk"];
$categoria = $_POST["categoria_fk"];


$sentencia = $bd->prepare("UPDATE tb_productos SET codigo = ?, nombre_pro = ?, prc_compra = ?, prc_venta_1 = ?, prc_venta_2 = ?, stock = ?, proveedor_fk = ?, categoria_fk = ?
 WHERE id = ?;");
$resultado = $sentencia->execute([$codigo,$nombre,$precio_compra,$precio1,$precio2,$stock,$proveedor,$categoria,$id]);

if ($resultado === TRUE) {
    header('Location: productos.php?mensaje=editado');
}else {
    header('Location: productos.php?mensaje=error');
    exit();
}
