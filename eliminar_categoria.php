<?php

   if(!isset($_GET['id'])){
header('Location: categoria.php?mensaje=error');
exit();
}
include_once 'conexion.php';

$codigo =  $_GET['id'];

$sentencia = $bd->prepare("DELETE FROM tb_categoria WHERE id = ?;");
$resultado = $sentencia->execute([$codigo]);


if ($resultado === TRUE) {
    header('Location: categoria.php?mensaje=eliminado');
}else {
    header('Location: categoria.php?mensaje=error');
}
   
?>