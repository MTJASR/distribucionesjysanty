<?php

  // print_r($_POST);
   if (empty($_POST["nombre_cat"])) {
     header('Location: categoria.php?mensaje=falta');
     exit();
       }

    include_once 'conexion.php';

    $nombre = $_POST["nombre_cat"];
  


    $sentencia = $bd->prepare("INSERT INTO tb_categoria(nombre_cat)
     VALUES (?);");
    $resultado = $sentencia->execute([$nombre]);

    if ($resultado === TRUE) {
       header('Location: categoria.php?mensaje=registrado');
    } else {
        header('Location: categoria.php?mensaje=error');
        exit();
    }
    

?>