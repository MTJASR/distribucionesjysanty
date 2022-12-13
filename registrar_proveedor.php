<?php

 // print_r($_POST);
   if (empty($_POST["cc_prv"])|| empty($_POST["nombre_prv"]) || empty($_POST["correo_prv"]) || empty($_POST["celular_prv"])
   || empty($_POST["direccion_prv"]) ) {
     header('Location: proveedores.php?mensaje=falta');
     exit();
       }

    include_once 'conexion.php';

    $cc = $_POST["cc_prv"];
    $nombre = $_POST["nombre_prv"];
    $correo = $_POST["correo_prv"];
    $celular = $_POST["celular_prv"];
    $direccion = $_POST["direccion_prv"];
   


    $sentencia = $bd->prepare("INSERT INTO tb_proveedor(cc_prv, nombre_prv, correo_prv, celular_prv, direccion_prv)
     VALUES (?,?,?,?,?);");
    $resultado = $sentencia->execute([$cc,$nombre,$correo,$celular,$direccion]);

    if ($resultado === TRUE) {
       header('Location: proveedores.php?mensaje=registrado');
    } else {
        header('Location: proveedores.php?mensaje=error');
        exit();
    }
    

?>