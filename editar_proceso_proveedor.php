<?php

print_r($_POST);
if (!isset($_POST['id'])) {
    header('Location: proveedores.php?mensaje=error');
}


include_once 'conexion.php';
$id = $_POST["id"];
$cc = $_POST["cc_prv"];
$nombre = $_POST["nombre_prv"];
$correo = $_POST["correo_prv"];
$celular = $_POST["celular_prv"];
$direccion = $_POST["direccion_prv"];


$sentencia = $bd->prepare("UPDATE tb_proveedor SET cc_prv = ?, nombre_prv = ?, correo_prv = ?, celular_prv = ?, direccion_prv = ? WHERE id = ?;");
$resultado = $sentencia->execute([$cc,$nombre,$correo,$celular,$direccion,$id]);




if ($resultado === TRUE) {
    header('Location: proveedores.php?mensaje=editado');
} else {
    header('Location: proveedores.php?mensaje=error');
    exit();
}
