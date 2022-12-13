<?php
session_start();
$_SESSION['detalle'] = array();
require 'conexion.php';
require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/ventas.controlador.php";

require_once "modelos/usuarios.modelo.php";
require_once "modelos/categorias.modelo.php";
require_once "modelos/productos.modelo.php";
require_once "modelos/clientes.modelo.php";
require_once "modelos/ventas.modelo.php";
require_once "extensiones/vendor/autoload.php";




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

$sql = "SELECT * FROM tb_cliente $where";
$resultado1 = $mysqli->query($sql);

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}

$nombre = $_SESSION['nombre'];
$tipo_usuario = $_SESSION['tipo_usuario'];





?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>REPORTE DE PRODUCTOS</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="assets/images/logo.png">

    <!-- DataTables -->
    <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">




</head>


<body class="fixed-left">


    <!-- Begin page -->
    <div id="wrapper">

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
                <i class="ion-close"></i>
            </button>

            <div class="left-side-logo d-block d-lg-none">
                <div class="text-center">

                    <a href="principal.php" class="logo"><img src="assets/images/logo.png" height="100" alt="logo"></a>
                </div>
            </div>

            <div class="sidebar-inner slimscrollleft">

                <div id="sidebar-menu">
                    <ul>
                        <li class="menu-title">Menu</li>

                        <li>
                            <a href="principal.php" class="waves-effect">
                                <i class="dripicons-meter"></i>
                                <span> Inicio <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                            </a>
                        </li>

                        <li>

                            <a href="cliente1.php" class="waves-effect">
                                <i class="mdi mdi-account-network"></i>
                                <span> Clientes <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                            </a>

                        </li>

                        <li>

                            <a href="proveedores.php" class="waves-effect">
                                <i class="mdi mdi-account-multiple"></i>
                                <span> Proveedores <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                            </a>

                        </li>

                        <li>

                            <a href="productos.php" class="waves-effect">
                                <i class="mdi mdi-shopping"></i>
                                <span> Productos <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                            </a>

                        </li>

                        <li>
                            <a href="categoria.php" class="waves-effect">
                                <i class="dripicons-graph-pie"></i>
                                <span> Categorias<span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                            </a>
                        </li>



                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-cart"></i><span>
                                    Ventas </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="precio1.php">Precio 1</a></li>
                                <li><a href="precio2.php">Precio 2</a></li>
                                <li><a href="Reporte de ventas.php">Reporte de ventas</a></li>
                            </ul>
                        </li>
                        <li class="menu-title">Extra</li>
                        <li>

                            <a href="contacto.php" class="waves-effect">
                                <i class="mdi mdi-contact-mail"></i>
                                <span> Contactos<span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                            </a>
                        </li>

                        <!-- <li class="menu-title">Extra</li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-location"></i><span>
                                    Maps </span> <span class="badge badge-danger badge-pill float-right">2</span></a>
                            <ul class="list-unstyled">
                                <li><a href="maps-google.html"> Google Map</a></li>
                                <li><a href="maps-vector.html"> Vector Map</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-brightness-max"></i>
                                <span> Icons </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="icons-material.html">Material Design</a></li>
                                <li><a href="icons-ion.html">Ion Icons</a></li>
                                <li><a href="icons-fontawesome.html">Font Awesome</a></li>
                                <li><a href="icons-themify.html">Themify Icons</a></li>
                                <li><a href="icons-dripicons.html">Dripicons</a></li>
                                <li><a href="icons-typicons.html">Typicons Icons</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="calendar.html" class="waves-effect"><i class="dripicons-calendar"></i><span>
                                    Calendar </span></a>
                        </li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-copy"></i><span>
                                    Pages </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="pages-blank.html">Blank Page</a></li>
                                <li><a href="pages-login.html">Login</a></li>
                                <li><a href="pages-register.html">Register</a></li>
                                <li><a href="pages-recoverpw.html">Recover Password</a></li>
                                <li><a href="pages-lock-screen.html">Lock Screen</a></li>
                                <li><a href="pages-404.html">Error 404</a></li>
                                <li><a href="pages-500.html">Error 500</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-jewel"></i><span>
                                    Extras </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="extras-pricing.html">Pricing</a></li>
                                <li><a href="extras-invoice.html">Invoice</a></li>
                                <li><a href="extras-timeline.html">Timeline</a></li>
                                <li><a href="extras-faqs.html">FAQs</a></li>
                                <li><a href="extras-maintenance.html">Maintenance</a></li>
                                <li><a href="extras-comingsoon.html">Coming Soon</a></li>
                            </ul>
                        </li>

                    </ul>-->
                </div>
                <div class="clearfix"></div>
            </div> <!-- end sidebarinner -->
        </div>
        <!-- Left Sidebar End -->

        <!-- Start right Content here -->

        <div class="content-page">
            <!-- Start content -->
            <div class="content">

                <!-- Top Bar Start -->
                <div class="topbar">

                    <div class="topbar-left	d-none d-lg-block">
                        <div class="text-center">

                            <a href="principal.php" class="logo"><img src="assets/images/logo.png" height="80" alt="logo"></a>
                        </div>
                    </div>

                    <nav class="navbar-custom">

                        <ul class="list-inline float-right mb-0">
                            <li class="list-inline-item notification-list dropdown d-none d-sm-inline-block">

                            </li>




                            <li class="list-inline-item dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <img src="assets/images/users/astronaut.png" alt="user" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                                    <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> <?php echo $nombre; ?> </a>

                                    <a class="dropdown-item" href="logout.php"><i class="mdi mdi-logout m-r-5 text-muted"></i>
                                        Salir</a>
                                </div>
                            </li>

                        </ul>

                        <ul class="list-inline menu-left mb-0">
                            <li class="list-inline-item">
                                <button type="button" class="button-menu-mobile open-left waves-effect">
                                    <i class="ion-navicon"></i>
                                </button>
                            </li>
                        </ul>

                        <div class="clearfix"></div>

                    </nav>

                </div>
                <!-- Top Bar End -->

                <div class="page-content-wrapper ">

                    <div class="container-fluid">



                        <!--Aqui-->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="float-right page-breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="principal.php">Inicio</a></li>
                                        <li class="breadcrumb-item"><a href="productos.php">Productos</a></li>

                                    </ol>
                                </div>
                                <h5 class="page-title h1"></h5>
                            </div>
                        </div>

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
                                <strong style="color: black;">EL producto fue editado correctamente</strong>
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
                                <strong style="color: black;">EL producto fue eliminado correctamente</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                        <?php
                        }
                        ?>
                        <!--Fin Alerta-->


                        <!-- end row formulario -->
                 
                        <!--TABLA DE PRODUCTOS -->
                        <div class="row">

                            <div class="col-xl-12 col-md-6">
                                <div class="col-12">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                      


                                            <?php



                                            ?>

                                            <div class="content-wrapper">

                                                <section class="content-header">

                                                    <h1>

                                                        Crear venta - Aguachica

                                                    </h1>

                                                    <br>
                                                    <br>


                                                </section>

                                                <section class="content">

                                                    <div class="row">

                                                        <!--=====================================
      EL FORMULARIO
      ======================================-->

                                                        <div class="col-lg-5 col-xs-12">

                                                            <div class="box box-success">

                                                                <div class="box-header with-border"></div>

                                                                <form role="form" method="post" class="formularioVenta">

                                                                    <div class="box-body">

                                                                        <div class="box">

                                                                            <!--=====================================
                ENTRADA DEL VENDEDOR
                ======================================-->

                                                                            <div class="form-group">

                                                                                <div class="input-group">

                                                                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                                                                    <input type="text" class="form-control" id="nuevoVendedor" value="<?php echo $_SESSION["nombre"]; ?>" readonly>

                                                                                    <input type="hidden" name="idVendedor" value="<?php echo $_SESSION["id"]; ?>">

                                                                                </div>

                                                                            </div>


                                                                            <!--=====================================
                                                                            ENTRADA DEL CÓDIGO
                                                                            ======================================-->

                                                                            <div class="form-group">

                                                                                <div class="input-group">

                                                                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                                                                                    <?php

                                                                                    $item = null;
                                                                                    $valor = null;

                                                                                    $ventas = ControladorVentas::ctrMostrarVentas($item, $valor);

                                                                                    if (!$ventas) {

                                                                                        echo '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="10001" readonly>';
                                                                                    } else {

                                                                                        foreach ($ventas as $key => $value) {
                                                                                        }

                                                                                        $codigo = $value["codigo"] + 1;



                                                                                        echo '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="' . $codigo . '" readonly>';
                                                                                    }

                                                                                    ?>


                                                                                </div>

                                                                            </div>

                                                                            <!--=====================================
                ENTRADA DEL CLIENTE
                ======================================-->

                                                                            <div class="form-group">

                                                                                <div class="input-group">

                                                                                    <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                                                                    <select class="form-control" id="seleccionarCliente" name="seleccionarCliente" required>

                                                                                        <option value="">Seleccionar cliente</option>

                                                                                        <?php

                                                                                        $item = null;
                                                                                        $valor = null;

                                                                                        $categorias = ControladorClientes::ctrMostrarClientes($item, $valor);

                                                                                        foreach ($categorias as $key => $value) {

                                                                                            echo '<option value="' . $value["id"] . '">' . $value["nombre_clie"] ."  ". $value["apellido_clie"] . '</option>';
                                                                                        }

                                                                                        ?>

                                                                                    </select>

                                                                                  

                                                                                </div>

                                                                            </div>

                                                          

                          

                                                                            <!--=====================================
                                                                            ENTRADA PARA AGREGAR PRODUCTO
                                                                            ======================================-->

                                                                            <div class="form-group row nuevoProducto">



                                                                            </div>

                                                                            <input type="hidden" id="listaProductos" name="listaProductos">

                                                                            <!--=====================================
                                                                            BOTÓN PARA AGREGAR PRODUCTO
                                                                            ======================================-->

                                                                            <button type="button" class="btn btn-primary hidden-lg btnAgregarProducto">Agregar producto</button>

                                                                            <hr>

                                                                            <div class="row">

                                                                                <!--=====================================
                  ENTRADA IMPUESTOS Y TOTAL
                  ======================================-->

                                                                                <div class="col-xs-8 pull-right">

                                                                                    <table class="table">

                                                                                        <thead>

                                                                                            <tr>
                                                                                                <th>Impuesto</th>
                                                                                                <th>Total</th>
                                                                                            </tr>

                                                                                        </thead>

                                                                                        <tbody>

                                                                                            <tr>

                                                                                                <td style="width: 50%">

                                                                                                    <div class="input-group">

                                                                                                        <input type="number" class="form-control input-lg" min="0" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" placeholder="0" required>

                                                                                                        <input type="hidden" name="nuevoPrecioImpuesto" id="nuevoPrecioImpuesto" required>

                                                                                                        <input type="hidden" name="nuevoPrecioNeto" id="nuevoPrecioNeto" required>

                                                                                                        <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                                                                                                    </div>

                                                                                                </td>

                                                                                                <td style="width: 50%">

                                                                                                    <div class="input-group">

                                                                                                        <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                                                                                                        <input type="text" class="form-control input-lg" id="nuevoTotalVenta" name="nuevoTotalVenta" total="" placeholder="00000" readonly required>

                                                                                                        <input type="hidden" name="totalVenta" id="totalVenta">


                                                                                                    </div>

                                                                                                </td>

                                                                                            </tr>

                                                                                        </tbody>

                                                                                    </table>

                                                                                </div>

                                                                            </div>

                                                                            <hr>

                                                                            <!--=====================================
                                                                            ENTRADA MÉTODO DE PAGO
                                                                            ======================================-->

                                                                            <div class="form-group row">

                                                                                <div class="col-xs-6" style="padding-right:0px">

                                                                                    <div class="input-group">

                                                                                        <select class="form-control" id="nuevoMetodoPago" name="nuevoMetodoPago" required>
                                                                                            <option value="">Seleccione método de pago</option>
                                                                                            <option value="Efectivo">Efectivo</option>
                                                                                            <option value="TC">Tarjeta Crédito</option>
                                                                                            <option value="TD">Tarjeta Débito</option>
                                                                                        </select>

                                                                                    </div>

                                                                                </div>

                                                                                <div class="cajasMetodoPago"></div>

                                                                                <input type="hidden" id="listaMetodoPago" name="listaMetodoPago">

                                                                            </div>

                                                                            <br>

                                                                        </div>

                                                                    </div>

                                                                    <div class="box-footer">

                                                                        <button type="submit" class="btn btn-primary pull-right">Guardar venta</button>

                                                                    </div>

                                                                </form>

                                                                <?php

                                                                $guardarVenta = new ControladorVentas();
                                                                $guardarVenta->ctrCrearVenta();

                                                                ?>

                                                            </div>

                                                        </div>

                                                        <!--=====================================
                                                            LA TABLA DE PRODUCTOS
                                                            ======================================-->

                                                        <div class="col-lg-7 hidden-md hidden-sm hidden-xs">

                                                            <div class="box box-warning">

                                                                <div class="box-header with-border"></div>

                                                                <div class="box-body">

                                                                    <table class="table table-bordered table-striped dt-responsive tablaVentas">

                                                                        <thead>

                                                                            <tr>
                                                                                <th style="width: 10px">#</th>
                                                                                <th>Código</th>
                                                                                <th>Nombre</th>
                                                                                <th>Stock</th>
                                                                                <th>Acciones</th>
                                                                            </tr>

                                                                        </thead>

                                                                    </table>

                                                                </div>

                                                            </div>


                                                        </div>

                                                    </div>

                                                </section>

                                            </div>

                                            <!--=====================================
MODAL AGREGAR CLIENTE
======================================-->

                                            <div id="modalAgregarCliente" class="modal fade" role="dialog">

                                                <div class="modal-dialog">

                                                    <div class="modal-content">

                                                        <form role="form" method="post">

                                                            <!--=====================================
                                                            CABEZA DEL MODAL
                                                            ======================================-->

                                                            <div class="modal-header" style="background:#3c8dbc; color:white">

                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                                <h4 class="modal-title">Agregar cliente</h4>

                                                            </div>

                                                            <!--=====================================
                                                            CUERPO DEL MODAL
                                                            ======================================-->

                                                            <div class="modal-body">

                                                                <div class="box-body">

                                                                    <!-- ENTRADA PARA EL NOMBRE -->

                                                                    <div class="form-group">

                                                                        <div class="input-group">

                                                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                                                            <input type="text" class="form-control input-lg" name="nuevoCliente" placeholder="Ingresar nombre" required>

                                                                        </div>

                                                                    </div>

                                                                    <!-- ENTRADA PARA EL DOCUMENTO ID -->

                                                                    <div class="form-group">

                                                                        <div class="input-group">

                                                                            <span class="input-group-addon"><i class="fa fa-key"></i></span>

                                                                            <input type="number" min="0" class="form-control input-lg" name="nuevoDocumentoId" placeholder="Ingresar documento" required>

                                                                        </div>

                                                                    </div>

                                                                    <!-- ENTRADA PARA EL EMAIL -->

                                                                    <div class="form-group">

                                                                        <div class="input-group">

                                                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                                                                            <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar email" required>

                                                                        </div>

                                                                    </div>

                                                                    <!-- ENTRADA PARA EL TELÉFONO -->

                                                                    <div class="form-group">

                                                                        <div class="input-group">

                                                                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                                                                            <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar teléfono" data-inputmask="'mask':'(999) 999-9999'" data-mask required>

                                                                        </div>

                                                                    </div>

                                                                    <!-- ENTRADA PARA LA DIRECCIÓN -->

                                                                    <div class="form-group">

                                                                        <div class="input-group">

                                                                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                                                                            <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar dirección" required>

                                                                        </div>

                                                                    </div>

                                                                    <!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->

                                                                    <div class="form-group">

                                                                        <div class="input-group">

                                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                                                                            <input type="text" class="form-control input-lg" name="nuevaFechaNacimiento" placeholder="Ingresar fecha nacimiento" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

                                                                        </div>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                            <!--=====================================
        PIE DEL MODAL
        ======================================-->

                                                            <div class="modal-footer">

                                                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                                                                <button type="submit" class="btn btn-primary">Guardar cliente</button>

                                                            </div>

                                                        </form>

                                                        <?php

                                                        $crearCliente = new ControladorClientes();
                                                        $crearCliente->ctrCrearCliente();

                                                        ?>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div>



                        </div>




                        <!-- end row botones-->






                    </div> <!-- end row formulario -->
                    <!-- end row botones -->




                    <!-- end row botones-->






                </div> <!-- end row formulario -->
                <!-- end row botones -->








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

    <!-- App js -->
    <script src="assets/js/app.js"></script>

    <script src="vistas/js/plantilla.js"></script>
<script src="vistas/js/usuarios.js"></script>
<script src="vistas/js/categorias.js"></script>
<script src="vistas/js/productos.js"></script>
<script src="vistas/js/clientes.js"></script>
<script src="vistas/js/ventas.js"></script>
<script src="vistas/js/reportes.js"></script>

</body>

</html>