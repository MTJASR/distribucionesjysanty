<?php

$rol = $_SESSION['rol'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>
        <?php
        if (isset($titulo)) {
            echo $titulo;
        } else {
            echo "SISTEMA SANTI";
        }
        ?>
    </title>
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
    <link rel="stylesheet" href="./assets/jse/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">




</head>


<body class="fixed-left">

    <?php
    if ($rol == 'ADMINISTRADOR') {
        # MUESTRE TODAS LAS OPCIONES SI ES ADMINISTRADOR
    ?>
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

                            <li class="menu-title">La zona de hoy es <strong style="font-weight:bold ;"><?= $_SESSION['sona']?></strong></li>

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
                                    <li><a href="ventas.php">Nueva venta</a></li>
                                    <li><a href="misventas.php">Mis ventas</a></li>

                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-file-text-o" aria-hidden="true"></i><span>
                                        Reportes </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="ventasDiaria.php">Ventas diarias</a></li>
                                    <li><a href="ventasUsuario.php">Ventas usuarios</a></li>
                                    <li><a href="ventasCliente.php">Reporte de compras clientes</a></li>
                                    <li><a href="productos_vendidos.php">Reporte de productos vendidos</a></li>
                                    <!-- <li><a href="misventas.php">Mis ventas</a></li>-->
                                </ul>
                            </li>


                            <li class="menu-title">Extra</li>
                            <li>

                                <a href="contacto.php" class="waves-effect">
                                    <i class="mdi mdi-contact-mail"></i>
                                    <span> Contactos<span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                                </a>
                            </li>

                            <li class="has_sub">
                                <a  class="waves-effect"><i class="ion-gear-b" aria-hidden="true"></i><span>
                                        Configuracion </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="zona.php">Asignar zona</a></li>
                                    <!-- <li><a href="misventas.php">Mis ventas</a></li>-->
                                </ul>
                            </li>


                    </div>
                    <div class="clearfix"></div>
                </div> <!-- end sidebarinner -->
            </div>

        <?php
    }
        ?>

        <!--OPCIONES PARA VENDEDORES-->

        <?php
        if ($rol == 'VENDEDOR') {
            # MUESTRE TODAS LAS OPCIONES
        ?>
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

                                <li class="menu-title">La zona de hoy es <strong style="font-weight:bold ;"><?= $_SESSION['sona']?></strong></li>

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

                                    <a href="productos.php" class="waves-effect">
                                        <i class="mdi mdi-shopping"></i>
                                        <span> Productos <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                                    </a>

                                </li>


                                <li class="has_sub">
                                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-cart"></i><span>
                                            Ventas </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                    <ul class="list-unstyled">
                                        <li><a href="ventas.php">Nueva venta</a></li>
                                        <li><a href="misventas.php">Mis ventas</a></li>

                                    </ul>
                                </li>

                                
                        </div>
                        <div class="clearfix"></div>
                    </div> <!-- end sidebarinner -->
                </div>

            <?php
        }
            ?>
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