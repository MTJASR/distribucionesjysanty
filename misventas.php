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

$sql = "SELECT  cl.cc_clie, cl.nombre_clie,cl.apellido_clie,ve.total,ve.fecha, ve.id_cliente,ve.id FROM ventas ve
 INNER JOIN tb_cliente cl ON cl.id = ve.id_cliente where ve.id_usuario = $id;";
$resultado = $mysqli->query($sql);

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}

$nombre = $_SESSION['nombre'];
$tipo_usuario = $_SESSION['tipo_usuario'];

$titulo = "Ventas Realizadas";

?>
<?php include_once "includes/header.php"; ?>
<!-- Datatable CSS -->
<style>
    #empTable_info {
        float: left;
    }
</style>

<!-- Top Bar End -->

<div class="page-content-wrapper ">

    <div class="container-fluid">



        <!--Aqui-->
        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="principal.php">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="ventas.php">Nueva venta</a></li>

                    </ol>
                </div>
                <h5 class="page-title">Mis ventas</h5>
            </div>
        </div>
        <!--Editado-->
        <?php
        if (isset($_GET['confirma']) and $_GET['confirma'] == 'ok') {
        ?>

            <div class="alert alert-danger  alert-dismissible fade show" role="alert" style="color: black;">
                <strong style="color: black;">Esta seguro de anular la factura? </strong>
                <a href="misventas.php?idv=<?= $_GET['idv'] ?>&anular=ok">
                    <button type="button" class="btn btn-danger btn-sm">
                        Si, confirmo anular la factura!
                    </button>
                </a>
            </div>

        <?php
        }
        ?>
        <!--Editado-->
        <!--Anulado-->
        <?php
        if (isset($_GET['idv']) and isset($_GET['anular'])) {
            $idv = filter_var($_GET['idv'], FILTER_SANITIZE_NUMBER_INT);
            $sql_de = "SELECT * FROM detalle_venta where id_venta = '$idv'";
            $resultados = $mysqli->query($sql_de);

            $sql_ve = "SELECT * FROM ventas where id= '$idv' and estado='A'";
            $result = mysqli_query($mysqli, $sql_ve);

            $contador = mysqli_num_rows($result);
            if ($contador > 0) {
                while ($row = $resultados->fetch_assoc()) {
                    $sqlp = "SELECT * FROM tb_productos where id = '" . $row["id_producto"] . "'";
                    $rstock = mysqli_query($mysqli, $sqlp);
                    $roc = mysqli_fetch_array($rstock);
                    $stock_actual = $roc["stock"]; // stock actual del producto

                    $can = $stock_actual + $row["cantidad"];
                    $sqlu = "UPDATE tb_productos SET stock='$can' WHERE id='" . $row["id_producto"] . "'";
                    $resultado = mysqli_query($mysqli, $sqlu);
                }
                $sqlv = "UPDATE ventas SET estado='I' WHERE id='" . $idv . "'";
                $resultadov = mysqli_query($mysqli, $sqlv);
        ?>
                <div class="alert alert-success  alert-dismissible fade show" role="alert" style="color: black;">
                    <strong style="color: black;">El comprobante ha sido anulado! </strong>
                </div>

        <?php
            }
        }
        ?>

        <!--Anulado-->
        <!--Inicio Alerta-->
        <?php
        if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta') {

        ?>
            <!--registrado-->
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong style="color: black;">Error Rellena todos los campos</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        <?php
        }
        ?>

        <!--registrado-->
        <?php
        if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
        ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong style="color: black;">Registro Exitoso Felicitaciones</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        <?php
        }
        ?>

        <!--Error-->
        <?php
        if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {

        ?>

            <div class="alert alert-danger  alert-dismissible fade show" role="alert" style="color: black;">
                <strong style="color: black;">Error</strong> Ponerse en contacto con su programador
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        <?php
        }
        ?>

        <!--Editado-->
        <?php
        if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') {
        ?>
            <div class="alert alert-success  alert-dismissible fade show" role="alert" style="color: black;">
                <strong style="color: black;">La categoria fue editado correctamente</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        <?php
        }
        ?>

        <!--Editado-->
        <?php
        if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {

        ?>

            <div class="alert alert-success  alert-dismissible fade show" role="alert" style="color: black;">
                <strong style="color: black;">La categoria fue eliminado correctamente</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        <?php
        }
        ?>
        <!--Fin Alerta-->





        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <?php

                        require 'conexion.php';
                        $query = "SELECT id FROM ventas ORDER BY id";
                        $query_run = mysqli_query($mysqli, $query);

                        $row = mysqli_num_rows($query_run);

                        echo '<h1 class="text-center"> ' . $row . ' <h6 class="text-center" > </h6> </h1>'

                        ?>

                        <h4 class="mt-0 header-title text-center h2">VENTAS REALIZADAS </h4>

                        <div class="row">
                            <div class="col-md-8" style="margin-bottom:-38px;">
                                <form id="formFecha">
                                    <div class="input-group input-group-sm">
                                        <input type="date" class="form-control form-control-lg" id='search_fromdate'>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Desde</span>
                                        </div>
                                        <input type="date" class="form-control form-control-lg" id='search_todate'>
                                        <div class="input-group-append">
                                        <span class="input-group-text">Hasta</span>
                                            <button id="btn_search" class="btn btn-primary btn-s" type="button">Filtrar</button>
                                            <button type='button' id="btnLimpiar" class="btn btn-danger btn-sm">Limpiar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <table id="empTable" class="display dataTable table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr class="text-center">

                                    <th>CODIGO</th>
                                    <th>NOMBRES</th>
                                    <th>APELLIDOS</th>
                                    <th>MONTO</th>
                                    <th>FECHA Y HORA</th>
                                    <th>ESTADO</th>
                                    <th>VER</th>
                                </tr>
                            </thead>


                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->

<?php include_once "includes/footer.php"; ?>
<script>
    $(document).ready(function() {
        $("#btnLimpiar").click(function(event) {
            $("#formFecha")[0].reset();
            dataTable.ajax.reload();
        });
        // Datapicker 
        $(".datepicker").datepicker({
            "dateFormat": "yy-mm-dd",
            changeYear: true
        });

        // DataTable
        var dataTable = $('#empTable').DataTable({
            'processing': true,
            "order": [
                [4, "desc"]
            ],
            dom: 'Bfrtip',
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
            'serverSide': true,
            'serverMethod': 'post',
            'searching': true, // Set false to Remove default Search Control
            'ajax': {
                'url': 'ajaxfile.php',
                'data': function(data) {
                    // Read values
                    var from_date = $('#search_fromdate').val();
                    var to_date = $('#search_todate').val();

                    // Append to data
                    data.searchByFromdate = from_date;
                    data.searchByTodate = to_date;
                }
            },

            'columns': [{
                    data: 'cc_clie'
                },
                {
                    data: 'nombre_clie'
                },
                {
                    data: 'apellido_clie'
                },
                {
                    data: 'total'
                },
                {
                    data: 'fecha'
                },
                {
                    data: 'estado'
                },
                {
                    data: 'op'
                },
            ]
        });

        // Search button
        $('#btn_search').click(function() {
            dataTable.draw();
        });

    });
</script>