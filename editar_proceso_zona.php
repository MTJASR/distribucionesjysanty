<?php

print_r($_POST);
if (!isset($_POST['id'])) {
    header('Location: zona.php?mensaje=error');
}


include_once 'conexion.php';
$id = $_POST["id"];
$sona = $_POST["sona"];



$sentencia = $bd->prepare("UPDATE tb_usuarios SET  sona = ? WHERE  id = ?;");
$resultado = $sentencia->execute([$sona,$id]);




if ($resultado === TRUE) {
    header('Location: zona.php?mensaje=editado');
} else {
    header('Location: zona.php?mensaje=error');
    exit();
}
