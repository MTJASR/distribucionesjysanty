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

$sql = "SELECT * FROM tb_usuarios $where";
$resultado = $mysqli->query($sql);

$sql = "SELECT * FROM tb_cliente $where";
$resultado1 = $mysqli->query($sql);

$sql = "SELECT * FROM tb_proveedor $where";
$resultado2 = $mysqli->query($sql);

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
                            <div class="col-sm-12">
                                <div class="float-right page-breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Distribuciones J & Santi</a></li>
                                        <li class="breadcrumb-item active">Contacto</li>
                                    </ol>
                                </div>
                                <h5 class="page-title">Lista de contacto</h5>
                            </div>
                        </div>
                        <!-- end row -->

                  

                        <div class="row">
                            <div class="col-xl-7 col-md-6">
                                <div class="card mini-stat m-b-30">
                                    <div class="p-3 bg-primary text-white">
                                        <div class="mini-stat-icon">
                                            <i class="mdi mdi-arrow-down-bold-circle float-right mb-0"></i>
                                        </div>
                                        <h6 class="text-uppercase mb-0 font-weight-bold">CONTACTO DE CLIENTES</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="border-bottom pb-4">
                                            <div class="mt-4 text-muted">

                                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr class="text-center">

                                                    <th>C.C</th>
                                                    <th>NOMBRE</th>
                                                    <th>APELLIDO</th>
                                                    <th>CORREO</th>
                                                    <th>CELULAR</th>
                                                    <th>DIRECCION</th>
                                                    <th>BARRIO</th>
                                                    <th>NEGOCIO</th>
                                                    <th>EXTRAS</th>

                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php while ($row = $resultado1->fetch_assoc()) { ?>

                                                    <tr class="text-center">

                                                        <td><?php echo $row['cc_clie']; ?></td>
                                                        <td><?php echo $row['nombre_clie']; ?></td>
                                                        <td><?php echo $row['apellido_clie']; ?></td>
                                                        <td><?php echo $row['correo_clie']; ?></td>
                                                        <td><?php echo $row['celular_clie']; ?></td>
                                                        <td><?php echo $row['direccion_clie']; ?></td>
                                                        <td><?php echo $row['barrio_clie']; ?></td>
                                                        <td><?php echo $row['nombre_negocio_clie']; ?></td>
                                                        <td>
                                                            <a class="btn btn-success waves-effect waves-light mdi mdi-whatsapp" href="https://api.whatsapp.com/send?phone=+57<?php echo $row['celular_clie']; ?>&text="></a>
                                                            <a class="btn btn-danger waves-effect waves-light mdi mdi-gmail" href="mailto:<?php echo $row['correo_clie']; ?>"></a>
                                                            <a class="btn btn-primary waves-effect waves-light mdi mdi-phone" href="tel:+57<?php echo $row['celular_clie']; ?>"></a>
                                                            <!--  <a class="btn btn-primary waves-effect waves-light mdi mdi-google-maps" href="https://goo.gl/maps/Rieuc9G9vNbEjEfg9"></a>-->
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
                            <div class="col-xl-5 col-md-6">
                                <div class="card mini-stat m-b-30">
                                    <div class="p-3 bg-primary text-white">
                                        <div class="mini-stat-icon">
                                            <i class="mdi mdi-bookmark-check float-right mb-0"></i>
                                        </div>
                                        <h6 class="text-uppercase mb-0 font-weight-bold">CONTACTO PROVEEDOR</h6>
                                    </div>
                                    <div class="card-body">

                                        <div class="border-bottom pb-4">
                                            <div class="mt-4 text-muted">
                                            <table id="example1" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr class="text-center">

                                                    <th>ID</th>
                                                    <th>C.C</th>
                                                    <th>NOMBRE</th>
                                                    <th>CORREO</th>
                                                    <th>CELULAR</th>
                                                    <th>DIRECCION</th>
                                                    <th>EXTRAS</th>

                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php while ($row = $resultado2->fetch_assoc()) { ?>

                                                    <tr class="text-center">

                                                    <td><?php echo $row['id']; ?></td>
                                                        <td><?php echo $row['cc_prv']; ?></td>
                                                        <td><?php echo $row['nombre_prv']; ?></td>
                                                        <td><?php echo $row['correo_prv']; ?></td>
                                                        <td><?php echo $row['celular_prv']; ?></td>
                                                        <td><?php echo $row['direccion_prv']; ?></td>
                                                        <td>
                                                            <a class="btn btn-success waves-effect waves-light mdi mdi-whatsapp" href="https://api.whatsapp.com/send?phone=+57<?php echo $row['celular_prv']; ?>&text="></a>
                                                            <a class="btn btn-danger waves-effect waves-light mdi mdi mdi-gmail" href="mailto:<?php echo $row['correo_prv']; ?>"></a>
                                                            <a class="btn btn-primary waves-effect waves-light mdi mdi-phone" href="tel:+57<?php echo $row['celular_prv']; ?>"></a>
                                                            <!--  <a class="btn btn-primary waves-effect waves-light mdi mdi-google-maps" href="https://goo.gl/maps/Rieuc9G9vNbEjEfg9"></a>-->
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

                        </div>
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

    <!-- App js -->
    <script src="assets/js/app.js"></script>



</body>

</html>