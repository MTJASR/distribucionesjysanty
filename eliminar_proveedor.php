<?php

   if(!isset($_GET['id'])){
header('Location: proveedores.php?mensaje=error');
exit();
}
include_once 'conexion.php';

$codigo =  $_GET['id'];

$sentencia = $bd->prepare("DELETE FROM tb_proveedor WHERE id = ?;");
$resultado = $sentencia->execute([$codigo]);


if ($resultado === TRUE) {
    header('Location: proveedores.php?mensaje=eliminado');
}else {
    header('Location: proveedores.php?mensaje=error');
}
   
?>