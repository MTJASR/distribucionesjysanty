<?php

 // print_r($_POST);
   if (empty($_POST["cc_clie"])|| empty($_POST["nombre_clie"]) || empty($_POST["apellido_clie"]) || empty($_POST["correo_clie"])
   || empty($_POST["celular_clie"]) || empty($_POST["direccion_clie"]) || empty($_POST["barrio_clie"]) || empty($_POST["nombre_negocio_clie"])
    || empty($_POST["fch_cada_compra_clie"])) {
     header('Location: cliente1.php?mensaje=falta');
     exit();
       }

    include_once 'conexion.php';

    $cc = $_POST["cc_clie"];
    $nombre = $_POST["nombre_clie"];
    $apellido = $_POST["apellido_clie"];
    $correo = $_POST["correo_clie"];
    $celular = $_POST["celular_clie"];
    $direccion = $_POST["direccion_clie"];
    $barrio = $_POST["barrio_clie"];
    $negocio = $_POST["nombre_negocio_clie"];
    $fecha = $_POST["fch_cada_compra_clie"];


    $sentencia = $bd->prepare("INSERT INTO tb_cliente(cc_clie, nombre_clie, apellido_clie, correo_clie, celular_clie, direccion_clie, barrio_clie, nombre_negocio_clie, fch_cada_compra_clie)
     VALUES (?,?,?,?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$cc,$nombre,$apellido,$correo,$celular,$direccion,$barrio,$negocio,$fecha]);

    if ($resultado === TRUE) {
       header('Location: cliente1.php?mensaje=registrado');
    } else {
        header('Location: cliente1.php?mensaje=error');
        exit();
    }
    

?>