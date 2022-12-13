<?php

print_r($_POST);
if(!isset($_POST['id'])){
    header('Location: categoria.php?mensaje=error');
}


include_once 'conexion.php';
$id = $_POST["id"];
$nombre = $_POST["nombre_cat"];



$sentencia = $bd->prepare("UPDATE tb_categoria SET nombre_cat = ? WHERE id = ?;");
$resultado = $sentencia->execute([$nombre,$id]);

if ($resultado === TRUE) {
    header('Location: categoria.php?mensaje=editado');
}else {
    header('Location: categoria.php?mensaje=error');
    exit();
}
