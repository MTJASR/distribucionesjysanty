<?php

use PHP_CodeSniffer\Tokenizers\PHP;

session_start();
require 'conexion.php';


if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}

$id = $_SESSION['id'];
$tipo_usuario = $_SESSION['tipo_usuario'];

$rol = $_SESSION['rol'];
$sona = $_SESSION['sona'];


if ($tipo_usuario == 1) {
    $where = "";
} else if ($tipo_usuario == 2) {
    $where = "WHERE id=$id";
}

$sql = "SELECT * FROM tb_usuarios $where";
$resultado = $mysqli->query($sql);

$sql = "SELECT * FROM tb_productos $where";
$resultado1 = $mysqli->query($sql);

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}
$id = $_SESSION['id'];
$nombre = $_SESSION['nombre'];
$tipo_usuario = $_SESSION['tipo_usuario'];


$sql = "SELECT  cl.cc_clie, cl.nombre_clie,cl.apellido_clie,ve.total,ve.fecha, ve.id_cliente,ve.id FROM ventas ve
	INNER JOIN tb_cliente cl ON cl.id = ve.id_cliente  $where";
$resultado2 = $mysqli->query($sql);


$sql = "SELECT  * from tb_usuarios  $where";
$usuarios_base = $mysqli->query($sql);

?>


<?php include_once "includes/header.php"; ?>

<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Distribuciones J & Santi</a></li>
                        <li class="breadcrumb-item active"> <?php echo $_SESSION['rol'];; ?> </li>
                        <li class="breadcrumb-item active"> <?php echo $_SESSION['sona'];; ?> </li>
                    </ol>
                </div>
                <h5 class="page-title">Inicio</h5>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <?php
            if ($rol == 'ADMINISTRADOR') {
                # DEJAR EDITAR TODAS LAS OPCIONES

            ?>
                <!--MENSAJE DIARIO-->
                <div class="col-xl-12 col-md-6">
                    <div class="card mini-stat m-b-30">
                        <div class="p-3 bg-primary text-white">
                            <div class="mini-stat-icon">
                                <i class="mdi mdi-message-text float-right mb-0"></i>
                            </div>
                            <h6 class="text-uppercase mb-0">MENSAJE DIARIO</h6>
                        </div>
                        <div class="card-body">
                            <div class="border-bottom pb-4">
                                <div class="mt-4 text-muted text-center">

                                    <h5 class="text-center">Que hoy todas tus metas se cumplan <strong class="uppercase text-success"> <?= $nombre ?></strong> y recuerda Que naciste para ser grande solo confia en Dios y todo saldra bien. Dios te bendiga <strong class="text-success">Att: Equipo MT JASR COMPANY</strong> </h5>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!--CLIENTES-->
                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat m-b-30">
                        <div class="p-3 bg-primary text-white">
                            <div class="mini-stat-icon">
                                <i class="mdi mdi-account-network float-right mb-0"></i>
                            </div>
                            <h6 class="text-uppercase mb-0">CLIENTES</h6>
                        </div>
                        <div class="card-body">
                            <div class="border-bottom pb-4">
                                <div class="mt-4 text-muted">

                                    <h5 class="m-0">
                                        <!--FUNCION PARA SABER CUANTOS DATOS HAY REGISTRADOS EN UNA TABLA-->
                                        <?php


                                        $query = "SELECT id FROM tb_cliente ORDER BY id";
                                        $query_run = mysqli_query($mysqli, $query);

                                        $row = mysqli_num_rows($query_run);

                                        echo '<h1 class="text-center"> ' . $row . ' <h6 class="text-center" >CLIENTES REGISTRADOS </h6> </h1>'

                                        ?>

                                        <i></i>
                                    </h5>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!--PROVEEDORES-->
                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat m-b-30">
                        <div class="p-3 bg-primary text-white">
                            <div class="mini-stat-icon">
                                <i class="mdi mdi-account-multiple float-right mb-0"></i>
                            </div>
                            <h6 class="text-uppercase mb-0 ">Proveedores</h6>
                        </div>
                        <div class="card-body">
                            <div class="border-bottom pb-4">
                                <div class="mt-4 text-muted">

                                    <h5 class="m-0">
                                        <!--FUNCION PARA SABER CUANTOS DATOS HAY REGISTRADOS EN UNA TABLA-->
                                        <?php


                                        $query = "SELECT id FROM tb_proveedor ORDER BY id";
                                        $query_run = mysqli_query($mysqli, $query);

                                        $row = mysqli_num_rows($query_run);

                                        echo '<h1 class="text-center"> ' . $row . ' <h6 class="text-center" >PROVEEDORES REGISTRADOS </h6> </h1>'

                                        ?>

                                        <i></i>
                                    </h5>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!--PRODUCTOS-->
                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat m-b-30">
                        <div class="p-3 bg-primary text-white">
                            <div class="mini-stat-icon">
                                <i class="mdi mdi-shopping float-right mb-0"></i>
                            </div>
                            <h6 class="text-uppercase mb-0">Productos</h6>
                        </div>
                        <div class="card-body">
                            <div class="border-bottom pb-4">
                                <div class="mt-4 text-muted">

                                    <h5 class="m-0">
                                        <!--FUNCION PARA SABER CUANTOS DATOS HAY REGISTRADOS EN UNA TABLA-->
                                        <?php


                                        $query = "SELECT id FROM tb_productos ORDER BY id";
                                        $query_run = mysqli_query($mysqli, $query);

                                        $row = mysqli_num_rows($query_run);

                                        echo '<h1 class="text-center"> ' . $row . ' <h6 class="text-center" >PRODUCTOS REGISTRADOS </h6> </h1>'

                                        ?>

                                        <i></i>
                                    </h5>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!--FACTURAS-->
                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat m-b-30">
                        <div class="p-3 bg-primary text-white">
                            <div class="mini-stat-icon">
                                <i class="mdi mdi-file-pdf float-right mb-0"></i>
                            </div>
                            <h6 class="text-uppercase mb-0">FACTURAS</h6>
                        </div>
                        <div class="card-body">
                            <div class="border-bottom pb-4">
                                <div class="mt-4 text-muted">

                                    <h5 class="m-0">
                                        <!--FUNCION PARA SABER CUANTOS DATOS HAY REGISTRADOS EN UNA TABLA-->
                                        <?php


                                        $query = "SELECT id,id_usuario FROM ventas ORDER BY id ";
                                        $query_run = mysqli_query($mysqli, $query);

                                        $row = mysqli_num_rows($query_run);

                                        echo '<h1 class="text-center"> ' . $row . ' <h6 class="text-center" > </h6> </h1>'

                                        ?>

                                        <h4 class="mt-0 header-title text-center h2">FACTURAS REGISTRADAS </h4>

                                        <i></i>
                                    </h5>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!--CATEGORIAS-->
                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat m-b-30">
                        <div class="p-3 bg-primary text-white">
                            <div class="mini-stat-icon">
                                <i class="mdi mdi-format-list-bulleted float-right mb-0"></i>
                            </div>
                            <h6 class="text-uppercase mb-0">CATEGORIAS</h6>
                        </div>
                        <div class="card-body">
                            <div class="border-bottom pb-4">
                                <div class="mt-4 text-muted">

                                    <h5 class="m-0">
                                        <!--FUNCION PARA SABER CUANTOS DATOS HAY REGISTRADOS EN UNA TABLA-->
                                        <?php


                                        $query = "SELECT id FROM tb_categoria ORDER BY id";
                                        $query_run = mysqli_query($mysqli, $query);

                                        $row = mysqli_num_rows($query_run);

                                        echo '<h1 class="text-center"> ' . $row . ' <h6 class="text-center" > </h6> </h1>'

                                        ?>

                                        <h4 class="mt-0 header-title text-center h2">CATEGORIAS REGISTRADAS </h4>

                                        <i></i>
                                    </h5>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!--VENTA DIARIA-->
                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat m-b-30">
                        <div class="p-3 bg-primary text-white">
                            <div class="mini-stat-icon">
                                <i class="mdi mdi-cash float-right mb-0"></i>
                            </div>
                            <h6 class="text-uppercase mb-0">MIS VENTAS ACTALES</h6>
                        </div>
                        <div class="card-body">
                            <div class="border-bottom pb-4">
                                <div class="mt-4 text-muted">

                                    <h5 class="m-0">
                                        <!--FUNCION PARA SABER CUANTOS DATOS HAY REGISTRADOS EN UNA TABLA-->
                                        <?php

                                        $hoy = date("Y-m-d");

                                        $query = "SELECT sum(total) as total_diario, id_usuario FROM ventas where id_usuario = $id AND DATE  (fecha) = '" . $hoy . "'";
                                        $query_run = mysqli_query($mysqli, $query);
                                        $total_day = mysqli_fetch_array($query_run);
                                        if (!empty($total_day["total_diario"])) {
                                            $total_diario = number_format($total_day["total_diario"], 0, ",", ".");
                                        } else {
                                            $total_diario = " 0.00";
                                        }

                                        echo '<h1 class="text-center"> ' . $total_diario . ' <h6 class="text-center" > </h6> </h1>'

                                        ?>

                                        <h4 class="mt-0 header-title text-center h2">SUMA DE VENTAS DIARIA </h4>
                                        <i></i>
                                    </h5>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!--VENTA MENSUAL POR USUARIO-->
                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat m-b-30">
                        <div class="p-3 bg-primary text-white">
                            <div class="mini-stat-icon">
                                <i class="mdi mdi-cash-100 float-right mb-0"></i>
                            </div>
                            <h6 class="text-uppercase mb-0">VENTAS MENSUALES <?= $_SESSION['nombre'] ?></h6>
                        </div>
                        <div class="card-body">
                            <div class="border-bottom pb-4">
                                <div class="mt-4 text-muted">

                                    <h5 class="m-0">
                                        <!--FUNCION PARA SABER CUANTOS DATOS HAY REGISTRADOS EN UNA TABLA-->
                                        <?php
                                        $querym = "SELECT sum(total) as total_mes, id_usuario FROM ventas WHERE 													YEAR(fecha) = YEAR(CURRENT_DATE()) 
       												AND MONTH(fecha)  = MONTH(CURRENT_DATE()) AND id_usuario = $id";
                                        $query_mes = mysqli_query($mysqli, $querym);

                                        $total_m = mysqli_fetch_array($query_mes);

                                        if (!empty($total_m["total_mes"])) {
                                            $total_mes = number_format($total_m["total_mes"], 0, ",", ".");
                                        } else {
                                            $total_mes = " 0.00";
                                        }
                                        echo '<h1 class="text-center"> ' . $total_mes . ' <h6 class="text-center" > </h6> </h1>'
                                        ?>

                                        <h4 class="mt-0 header-title text-center h2">SUMA DE VENTAS MES A MES </h4>

                                        <i></i>
                                    </h5>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!--VENTA MENSUAL EN GENERAL-->
                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat m-b-30">
                        <div class="p-3 bg-primary text-white">
                            <div class="mini-stat-icon">
                                <i class="mdi mdi-cash-multiple float-right mb-0"></i>
                            </div>
                            <h6 class="text-uppercase mb-0">VENTAS MENSUALES EN GENERAL</h6>
                        </div>
                        <div class="card-body">
                            <div class="border-bottom pb-4">
                                <div class="mt-4 text-muted">

                                    <h5 class="m-0">
                                        <!--FUNCION PARA SABER CUANTOS DATOS HAY REGISTRADOS EN UNA TABLA-->
                                        <?php
                                        $querym = "SELECT sum(total) as total_mes, id_usuario FROM ventas WHERE 													YEAR(fecha) = YEAR(CURRENT_DATE()) 
       												AND MONTH(fecha)  = MONTH(CURRENT_DATE()) ";
                                        $query_mes = mysqli_query($mysqli, $querym);

                                        $total_m = mysqli_fetch_array($query_mes);

                                        if (!empty($total_m["total_mes"])) {
                                            $total_mes = number_format($total_m["total_mes"], 0, ",", ".");
                                        } else {
                                            $total_mes = " 0.00";
                                        }
                                        echo '<h1 class="text-center"> ' . $total_mes . ' <h6 class="text-center" > </h6> </h1>'
                                        ?>

                                        <h4 class="mt-0 header-title text-center h2">SUMA DE VENTAS MES A MES </h4>

                                        <i></i>
                                    </h5>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!--INVERSION-->
                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat m-b-30">
                        <div class="p-3 bg-primary text-white">
                            <div class="mini-stat-icon">
                                <i class="mdi mdi-cash-multiple float-right mb-0"></i>
                            </div>
                            <h6 class="text-uppercase mb-0">INVERSION</h6>
                        </div>
                        <div class="card-body">
                            <div class="border-bottom pb-4">
                                <div class="mt-4 text-muted">

                                    <h5 class="m-0">
                                        <!--FUNCION PARA SABER CUANTOS DATOS HAY REGISTRADOS EN UNA TABLA-->
                                        <?php
                                        $queryin = "SELECT sum(prc_compra * stock) as total_invertido FROM tb_productos ";
                                        $query_inv = mysqli_query($mysqli, $queryin);

                                        $total_inv = mysqli_fetch_array($query_inv);

                                        if (!empty($total_inv["total_invertido"])) {
                                            $total_inversion = number_format($total_inv["total_invertido"], 0, ",", ".");
                                        } else {
                                            $total_inversion = " 0.00";
                                        }
                                        echo '<h1 class="text-center"> ' . $total_inversion . ' <h6 class="text-center" > </h6> </h1>'
                                        ?>

                                        <h4 class="mt-0 header-title text-center h2">CONSOLIDADO DE BODEGA</h4>

                                        <i></i>
                                    </h5>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>


            <?php
            }
            ?>
        </div>
        <!-- end row -->
        <!--TARGETAS ADMINISTRADOR-->
        <div class="row">
            <?php
            if ($rol == 'VENDEDOR') {
                # DEJAR EDITAR TODAS LAS OPCIONES

            ?>
                <!--VENTA DIARIA-->
                <div class="col-xl-6 col-md-6">
                    <div class="card mini-stat m-b-30">
                        <div class="p-3 bg-primary text-white">
                            <div class="mini-stat-icon">
                                <i class="mdi mdi-cash float-right mb-0"></i>
                            </div>
                            <h6 class="text-uppercase mb-0">VENTAS DIARIA</h6>
                        </div>
                        <div class="card-body">
                            <div class="border-bottom pb-4">
                                <div class="mt-4 text-muted">

                                    <h5 class="m-0">
                                        <!--FUNCION PARA SABER CUANTOS DATOS HAY REGISTRADOS EN UNA TABLA-->
                                        <?php

                                        $hoy = date("Y-m-d");

                                        $query = "SELECT sum(total) as total_diario, id_usuario FROM ventas where id_usuario = $id AND  DATE  (fecha) = '" . $hoy . "'";
                                        $query_run = mysqli_query($mysqli, $query);
                                        $total_day = mysqli_fetch_array($query_run);
                                        if (!empty($total_day["total_diario"])) {
                                            $total_diario = number_format($total_day["total_diario"], 0, ",", ".");
                                        } else {
                                            $total_diario = " 0.00";
                                        }

                                        echo '<h1 class="text-center"> ' . $total_diario . ' <h6 class="text-center" > </h6> </h1>'

                                        ?>

                                        <h4 class="mt-0 header-title text-center h2">LO QUE LLEVAS VENDIDO</h4>
                                        <i></i>
                                    </h5>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!--VENTA MENSUAL-->
                <div class="col-xl-6 col-md-6">
                    <div class="card mini-stat m-b-30">
                        <div class="p-3 bg-primary text-white">
                            <div class="mini-stat-icon">
                                <i class="mdi mdi-cash-100 float-right mb-0"></i>
                            </div>
                            <h6 class="text-uppercase mb-0">VENTAS MENSUALES</h6>
                        </div>
                        <div class="card-body">
                            <div class="border-bottom pb-4">
                                <div class="mt-4 text-muted">

                                    <h5 class="m-0">
                                        <!--FUNCION PARA SABER CUANTOS DATOS HAY REGISTRADOS EN UNA TABLA-->
                                        <?php
                                        $querym = "SELECT sum(total) as total_mes, id_usuario FROM ventas WHERE 													YEAR(fecha) = YEAR(CURRENT_DATE()) 
       												AND MONTH(fecha)  = MONTH(CURRENT_DATE()) AND id_usuario = $id";
                                        $query_mes = mysqli_query($mysqli, $querym);

                                        $total_m = mysqli_fetch_array($query_mes);

                                        if (!empty($total_m["total_mes"])) {
                                            $total_mes = number_format($total_m["total_mes"], 0, ",", ".");
                                        } else {
                                            $total_mes = " 0.00";
                                        }
                                        echo '<h1 class="text-center"> ' . $total_mes . ' <h6 class="text-center" > </h6> </h1>'
                                        ?>

                                        <h4 class="mt-0 header-title text-center h2">SUMA DE VENTAS MES A MES </h4>

                                        <i></i>
                                    </h5>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!--MENSAJE DIARIO-->
                <div class="col-xl-6 col-md-6">
                    <div class="card mini-stat m-b-30">
                        <div class="p-3 bg-primary text-white">
                            <div class="mini-stat-icon">
                                <i class="mdi mdi-message-text float-right mb-0"></i>
                            </div>
                            <h6 class="text-uppercase mb-0">MENSAJE DIARIO</h6>
                        </div>
                        <div class="card-body">
                            <div class="border-bottom pb-4">
                                <div class="mt-4 text-muted text-center">

                                    <h5 class="text-center">Que hoy todas tus metas se cumplan <strong class="uppercase text-success"> <?= $nombre ?></strong> y recuerda Que naciste para ser grande solo confia en Dios y todo saldra bien. Dios te bendiga <strong class="text-success">Att: Equipo MT JASR COMPANY</strong> </h5>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            <?php
            }
            ?>
        </div>
        <!-- end row -->
        <div class="row">


            <!--REPORTE DE VENTAS MENSUALES DE CADA VENDEDOR-->
            <div class="col-xl-12 col-md-12">
                <div class="card mini-stat m-b-30">
                    <div class="p-3 bg-danger text-white">
                        <div class="mini-stat-icon">
                            <i class="mdi mdi-file-pdfK float-right mb-0"></i>
                        </div>
                        <h6 class="text-uppercase mb-0 font-weight-bold">REPORTE DE VENTAS MENSUALES DE CADA VENDEDOR</h6>
                    </div>
                    <div class="card-body">



                        <div class="border-bottom pb-4">
                            <div class="mt-4 text-muted">
                                <table id="example1_1" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr class="text-center">
                                            <th>NOMBRE</th>
                                            <th>ROL</th>
                                            <th>ZONA</th>
                                            <th>VENTA MENSUAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = $usuarios_base->fetch_assoc()) {
                                            $id_usu = $row['id'];
                                            $querym = "SELECT sum(total) as total_mes, id_usuario FROM ventas WHERE 													YEAR(fecha) = YEAR(CURRENT_DATE()) 
                                                 AND MONTH(fecha)  = MONTH(CURRENT_DATE()) AND id_usuario = $id_usu ";
                                            $query_mes = mysqli_query($mysqli, $querym);

                                            $total_m = mysqli_fetch_array($query_mes);

                                            if (!empty($total_m["total_mes"])) {
                                                $total_mes1 = number_format($total_m["total_mes"], 0, ",", ".");
                                            } else {
                                                $total_mes1 = " 0.00";
                                            }
                                        ?>
                                            <tr class=" font-weight-bold">
                                                <td><?php echo $row['nombre']; ?></td>
                                                <td><?php echo $row['rol']; ?></td>
                                                <td><?php echo $row['sona']; ?></td>
                                                <td><?php echo $total_mes1 ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

          

        <!-- end row -->


        <!-- end row -->

        <!-- end row 
                        <div class="row">
                            <div class="col-xl-8">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title">Email Sent</h4>

                                        <ul class="list-inline widget-chart m-t-20 text-center">
                                            <li>
                                                <h4 class=""><b>3652</b></h4>
                                                <p class="text-muted m-b-0">Marketplace</p>
                                            </li>
                                            <li>
                                                <h4 class=""><b>5421</b></h4>
                                                <p class="text-muted m-b-0">Last week</p>
                                            </li>
                                            <li>
                                                <h4 class=""><b>9652</b></h4>
                                                <p class="text-muted m-b-0">Last Month</p>
                                            </li>
                                        </ul>

                                        <div id="morris-area-example" style="height: 300px"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title">Revenue</h4>

                                        <ul class="list-inline widget-chart m-t-20 text-center">
                                            <li>
                                                <h4 class=""><b>5248</b></h4>
                                                <p class="text-muted m-b-0">Marketplace</p>
                                            </li>
                                            <li>
                                                <h4 class=""><b>321</b></h4>
                                                <p class="text-muted m-b-0">Last week</p>
                                            </li>
                                            <li>
                                                <h4 class=""><b>964</b></h4>
                                                <p class="text-muted m-b-0">Last Month</p>
                                            </li>
                                        </ul>
                                        <div id="morris-bar-example" style="height: 300px"></div>
                                    </div>
                                </div>
                            </div>

                        </div>-->
        <!-- end row -->

        <!-- end row -->



    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->

</div> <!-- content -->

<footer class="footer">
    © 2022 <b>Distribuciones J & SANTI </b> <span class="d-none d-sm-inline-block"> - Desarrollada con <i class="mdi mdi-heart text-danger"></i> Por MT JASR COMPANY</span>
</footer>

</div>
<!-- End Right content here -->

</div>
<!-- END wrapper -->


<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/modernizr.min.js"></script>
<script src="assets/js/detect.js"></script>
<script src="assets/js/fastclick.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/jquery.blockUI.js"></script>
<script src="assets/js/waves.js"></script>
<script src="assets/js/jquery.nicescroll.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>

<!-- skycons -->
<script src="assets/plugins/skycons/skycons.min.js"></script>

<!-- skycons -->
<script src="assets/plugins/peity/jquery.peity.min.js"></script>

<!--Morris Chart-->
<script src="assets/plugins/morris/morris.min.js"></script>
<script src="assets/plugins/raphael/raphael-min.js"></script>

<!-- dashboard -->
<script src="assets/pages/dashboard.js"></script>

<!-- Required datatable js -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables/jszip.min.js"></script>
<script src="assets/plugins/datatables/pdfmake.min.js"></script>
<script src="assets/plugins/datatables/vfs_fonts.js"></script>
<script src="assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables/buttons.print.min.js"></script>
<script src="assets/plugins/datatables/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="assets/pages/datatables.init.js"></script>
<script src="codigo.js"></script>
<script src="codigo1.js"></script>
<script src="tabla_venta_vendedores.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>




</body>

</html>