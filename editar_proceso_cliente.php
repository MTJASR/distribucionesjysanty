<?php

print_r($_POST);
if (!isset($_POST['id'])) {
    header('Location: cliente1.php?mensaje=error');
}


include_once 'conexion.php';
$id = $_POST["id"];
$cc = $_POST["cc_clie"];
$nombre = $_POST["nombre_clie"];
$apellido = $_POST["apellido_clie"];
$correo = $_POST["correo_clie"];
$celular = $_POST["celular_clie"];
$direccion = $_POST["direccion_clie"];
$barrio = $_POST["barrio_clie"];
$negocio = $_POST["nombre_negocio_clie"];
$fecha = $_POST["fch_cada_compra_clie"];


$sentencia = $bd->prepare("UPDATE tb_cliente SET cc_clie = ?, nombre_clie = ?, apellido_clie = ?, correo_clie = ?, celular_clie = ?, direccion_clie = ?, barrio_clie = ?, nombre_negocio_clie = ?, fch_cada_compra_clie = ?
 WHERE id = ?;");
$resultado = $sentencia->execute([$cc,$nombre,$apellido,$correo,$celular,$direccion,$barrio,$negocio,$fecha,$id]);




if ($resultado === TRUE) {
    header('Location: cliente1.php?mensaje=editado');
} else {
    header('Location: cliente1.php?mensaje=error');
    exit();
}
