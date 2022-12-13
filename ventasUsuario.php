<?php 
session_start();
require 'conexion.php';


if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}

$id = $_SESSION['id'];
$tipo_usuario = $_SESSION['tipo_usuario'];

if ($tipo_usuario == 1) {
    $where = "";
} else if ($tipo_usuario == 2) {
    $where = "WHERE id=$id";
}

$sql = "SELECT * FROM tb_productos $where";
$resultado = $mysqli->query($sql);

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}

$nombre = $_SESSION['nombre'];
$tipo_usuario = $_SESSION['tipo_usuario'];



?>
<?php include_once "includes/header.php"; ?>
 <div class="page-content-wrapper ">
     <div class="container-fluid">
     <div class="row">
<div class="col-lg-12"> 
     <div class="form-group">
            <h4 class="text-center">Ventas diarias</h4>
        </div>
 </div>
 </div>
<div class="row">
<div class="col-md-6"> 
<form action="venta_usuario.php" class="form-horizontal" role="form" method="get" target="_blank">
                                    <div class="input-group">
                                       
                                        <div class="input-group-append">
                                            <span class="input-group-text">Periodo: </span>
                                        </div>
                                        <input type="date" class="form-control form-control-lg" id="diaria" name="diaria">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary btn-s" name="reporte">Filtrar</button>
                                            <button type="reset" class="btn btn-danger btn-sm">Limpiar</button>
                                        </div>
                                    </div>
                                </form>

</div>
</div>

</div>
</div>
<?php include_once "includes/footer.php"; ?>