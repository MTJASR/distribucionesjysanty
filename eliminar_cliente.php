<?php

   if(!isset($_GET['id'])){
header('Location: cliente1.php?mensaje=error');
exit();
}
include_once 'conexion.php';

$codigo =  $_GET['id'];

$sentencia = $bd->prepare("DELETE FROM tb_cliente WHERE id = ?;");
$resultado = $sentencia->execute([$codigo]);


if ($resultado === TRUE) {
    header('Location: cliente1.php?mensaje=eliminado');
}else {
    header('Location: cliente1.php?mensaje=error');
}
   
?>