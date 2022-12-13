<?php

   if(!isset($_GET['id'])){
header('Location: productos.php?mensaje=error');
exit();
}
include_once 'conexion.php';

$codigo =  $_GET['id'];

$sentencia = $bd->prepare("DELETE FROM tb_productos WHERE id = ?;");
$resultado = $sentencia->execute([$codigo]);


if ($resultado === TRUE) {
    header('Location: productos.php?mensaje=eliminado');
}else {
    header('Location: productos.php?mensaje=error');
}
   
?>