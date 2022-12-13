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

$sql = "SELECT * FROM usuarios $where";
$resultado = $mysqli->query($sql);

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
    <title>Distribuciones J&SANTI</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="assets/images/logo.png">

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="assets/plugins/morris/morris.css">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">

</head>


<body class="fixed-left">

    <!-- Loader -->


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

                            <a href="clientes.php" class="waves-effect">
                                <i class="mdi mdi-account-network"></i>
                                <span> Clientes <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                            </a>

                        </li>

                        <li >

                            <a href="principal.php" class="waves-effect">
                                <i class="mdi mdi-account-multiple"></i>
                                <span> Proveedores <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                            </a>

                        </li>

                        <li >

                            <a href="principal.php" class="waves-effect">
                                <i class="mdi mdi-shopping"></i>
                                <span> Productos <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                            </a>

                        </li>

                        <li >
                            <a href="principal.php" class="waves-effect">
                                <i class="dripicons-graph-pie"></i>
                                <span> Categorias<span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                            </a>
                        </li>

                        <li >

                            <a href="principal.php" class="waves-effect">
                                <i class="mdi mdi-cart"></i>
                                <span> Ventas<span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
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

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="float-right page-breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Distribuciones J & Santi</a></li>
                                        <li class="breadcrumb-item active">Inicio</li>
                                    </ol>
                                </div>
                                <h5 class="page-title">Inicio</h5>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
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

                                                    require 'conexion.php';
                                                    $query = "SELECT id FROM usuarios ORDER BY id";
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
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat m-b-30">
                                    <div class="p-3 bg-primary text-white">
                                        <div class="mini-stat-icon">
                                            <i class="mdi mdi-account-network float-right mb-0"></i>
                                        </div>
                                        <h6 class="text-uppercase mb-0">Usuarios</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="border-bottom pb-4">
                                            <div class="mt-4 text-muted">

                                                <h5 class="m-0">
                                                    <!--FUNCION PARA SABER CUANTOS DATOS HAY REGISTRADOS EN UNA TABLA-->
                                                    <?php

                                                    require 'conexion.php';
                                                    $query = "SELECT id FROM usuarios ORDER BY id";
                                                    $query_run = mysqli_query($mysqli, $query);

                                                    $row = mysqli_num_rows($query_run);

                                                    echo '<h1 class="text-center"> ' . $row . ' <h6 class="text-center" >USUARIOS REGISTRADOS </h6> </h1>'

                                                    ?>

                                                    <i></i>
                                                </h5>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat m-b-30">
                                    <div class="p-3 bg-primary text-white">
                                        <div class="mini-stat-icon">
                                            <i class="mdi mdi-account-multiple float-right mb-0"></i>
                                        </div>
                                        <h6 class="text-uppercase mb-0">Proveedores</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="border-bottom pb-4">
                                            <div class="mt-4 text-muted">

                                                <h5 class="m-0">
                                                    <!--FUNCION PARA SABER CUANTOS DATOS HAY REGISTRADOS EN UNA TABLA-->
                                                    <?php

                                                    require 'conexion.php';
                                                    $query = "SELECT id FROM usuarios ORDER BY id";
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
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat m-b-30">
                                    <div class="p-3 bg-primary text-white">
                                        <div class="mini-stat-icon">
                                            <i class="mdi mdi-cart float-right mb-0"></i>
                                        </div>
                                        <h6 class="text-uppercase mb-0">Ventas</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="border-bottom pb-4">
                                            <div class="mt-4 text-muted">

                                                <h5 class="m-0">
                                                    <!--FUNCION PARA SABER CUANTOS DATOS HAY REGISTRADOS EN UNA TABLA-->
                                                    <?php

                                                    require 'conexion.php';
                                                    $query = "SELECT id FROM usuarios ORDER BY id";
                                                    $query_run = mysqli_query($mysqli, $query);

                                                    $row = mysqli_num_rows($query_run);

                                                    echo '<h1 class="text-center"> ' . $row . ' <h6 class="text-center" >VENTAS REGISTRADOS </h6> </h1>'

                                                    ?>

                                                    <i></i>
                                                </h5>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- end row -->
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

                        </div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title mb-4">Monthly Earning</h4>
                                        <div class="">

                                            <div class="row align-items-center mb-5">
                                                <div class="col-md-6">
                                                    <div class="pl-3">
                                                        <h3>$6451</h3>
                                                        <h6>Monthly Earning</h6>
                                                        <p class="text-muted">Sed ut perspiciatis unde omnis</p>
                                                        <a href="#" class="text-primary">Learn more...</a>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="text-center">
                                                        <span class="peity-pie" data-peity='{ "fill": ["#508aeb", "#f2f2f2"]}' data-width="84" data-height="84">6/8</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row text-center">
                                                <div class="col-6">
                                                    <div>
                                                        <div class="mb-4">
                                                            <span class="peity-donut" data-peity='{ "fill": ["#508aeb", "#f2f2f2"], "innerRadius": 22, "radius": 32 }' data-width="60" data-height="60">2,4</span>
                                                        </div>
                                                        <h4>42%</h4>
                                                        <p class="mb-0 text-muted">Online Earning</p>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div>
                                                        <div class="mb-4">
                                                            <span class="peity-donut" data-peity='{ "fill": ["#508aeb", "#f2f2f2"], "innerRadius": 22, "radius": 32 }' data-width="60" data-height="60">8,4</span>
                                                        </div>
                                                        <h4>58%</h4>
                                                        <p class="text-muted mb-0">Offline Earning</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card m-b-30 blog-wid">
                                    <div class="card-body">
                                        <div class="float-left p-1 mr-3">
                                            <div class="text-center bg-primary rounded p-3">
                                                <p class="text-white-50 mb-4">October</p>
                                                <h2 class="text-white mb-0">24</h2>
                                            </div>
                                        </div>
                                        <div class="post-details p-2">
                                            <h6 class="mt-0"><a href="#" class="text-dark">It will be as simple as
                                                    Occidental</a></h6>
                                            <p class="text-muted">Everyone realizes why a new common language would be
                                                desirable.</p>
                                            <p class="mb-0">By <a href="#" class="text-primary">Daniel Sons</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title mb-4">Recent Activity Feed</h4>
                                        <ul class="list-unstyled activity-list">
                                            <li class="activity-item">
                                                <span class="activity-date">12 Oct</span>
                                                <span class="activity-text">Responded to need “Volunteer
                                                    Activities”</span>
                                                <p class="text-muted mt-2">Everyone realizes why a new common language
                                                    would be desirable common words.</p>
                                            </li>
                                            <li class="activity-item">
                                                <span class="activity-date">13 Oct</span>
                                                <span class="activity-text">Uploaded this Images</span>
                                                <p class="text-muted mt-2">Their separate existence is a myth</p>
                                                <div>
                                                    <a href="#" class="activity-item-img"><img src="assets/images/small/img-1.jpg" alt="" class="rounded mb-2"></a>
                                                    <a href="#" class="activity-item-img"><img src="assets/images/small/img-2.jpg" alt="" class="rounded mb-2"></a>
                                                </div>
                                            </li>
                                            <li class="activity-item">
                                                <span class="activity-date">14 Oct</span>
                                                <span class="activity-text">Uploaded this File</span>
                                                <p class="text-muted mt-2 mb-4">The new common language will be more
                                                    simple and regular their pronunciation.</p>
                                                <div>
                                                    <a href="#" class="text-muted">
                                                        <i class="ion-ios7-folder h1 p-3 bg-light rounded"></i>
                                                        <p class="mt-2 mb-0">background.psd</p>
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card bg-primary m-b-30 text-white weather-box">
                                            <div class="card-body">
                                                <div class="text-center">
                                                    <div>
                                                        <canvas id="rain" width="56" height="56"></canvas>
                                                    </div>
                                                    <div>
                                                        <h3>28° c</h3>
                                                        <h6>Heavy rain</h6>
                                                        <h4 class="mt-4">New York</h4>
                                                    </div>
                                                </div>
                                                <div class="weather-icon">
                                                    <i class="mdi mdi-weather-pouring"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="card bg-warning m-b-30 text-white weather-box">
                                            <div class="card-body">
                                                <div class="text-center">
                                                    <div>
                                                        <canvas id="partly-cloudy-day" width="56" height="56"></canvas>
                                                    </div>
                                                    <div>
                                                        <h3>32° c</h3>
                                                        <h6>Partly cloudy</h6>
                                                        <h4 class="mt-4">California</h4>
                                                    </div>
                                                </div>
                                                <div class="weather-icon">
                                                    <i class="mdi mdi-weather-partlycloudy"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card m-b-30">
                                            <div class="card-body">
                                                <h4 class="mt-0 header-title mb-4">Sales Analytics</h4>
                                                <div id="morris-donut-example" class="morris-charts" style="height: 265px"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title mb-4">Usuarios activos en el sistema</h4>
                                        <div class="table-responsive">
                                            <table class="table table-hover mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Usuario</th>
                                                        <th>Contraseña</th>
                                                        <th>Nombre</th>
                                                        <th>Tipo Usuario</th>
                                                        <th>Descargar</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Usuario</th>
                                                        <th>Contraseña</th>
                                                        <th>Nombre</th>
                                                        <th>Tipo Usuario</th>
                                                        <th>Descargar</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <?php while ($row = $resultado->fetch_assoc()) { ?>

                                                        <tr>
                                                            <td><?php echo $row['usuario']; ?></td>
                                                            <td><?php echo $row['password']; ?></td>
                                                            <td><?php echo $row['nombre']; ?></td>
                                                            <td><?php echo $row['tipo_usuario']; ?></td>
                                                            <td>

                                                                <button type="button" class="btn btn-outline-success waves-effect waves-light mdi mdi-file-excel-box"></button>
                                                                <button type="button" class="btn btn-outline-danger waves-effect waves-light mdi mdi-file-pdf"></button>
                                                                <button type="button" class="btn btn-outline-primary waves-effect waves-light mdi mdi-file-word"></button>

                                                            </td>
                                                        </tr>
                                                    <?php } ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

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

    <!-- App js -->
    <script src="assets/js/app.js"></script>

<!-- Code injected by live-server -->
<script type="text/javascript">
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script></body>

</html>