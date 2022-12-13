<?php

  // print_r($_POST);
   if (empty($_POST["codigo"])|| empty($_POST["nombre_pro"]) || empty($_POST["prc_compra"]) || empty($_POST["prc_venta_1"])
   || empty($_POST["prc_venta_2"]) || empty($_POST["stock"]) || empty($_POST["proveedor_fk"]) || empty($_POST["categoria_fk"])) {
     header('Location: productos.php?mensaje=falta');
     exit();
       }

    include_once 'conexion.php';

    $codigo = $_POST["codigo"];
    $nombre = $_POST["nombre_pro"];
    $precio_compra = $_POST["prc_compra"];
    $precio1 = $_POST["prc_venta_1"];
    $precio2 = $_POST["prc_venta_2"];
    $stock = $_POST["stock"];
    $proveedor = $_POST["proveedor_fk"];
    $categoria = $_POST["categoria_fk"];


    $sentencia = $bd->prepare("INSERT INTO tb_productos(codigo, nombre_pro, prc_compra, prc_venta_1, prc_venta_2, stock, proveedor_fk, categoria_fk)
     VALUES (?,?,?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$codigo,$nombre,$precio_compra,$precio1,$precio2,$stock,$proveedor,$categoria]);

    if ($resultado === TRUE) {
       header('Location: productos.php?mensaje=registrado');
    } else {
        header('Location: productos.php?mensaje=error');
        exit();
    }
    

?>