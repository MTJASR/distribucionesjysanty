<?php
session_start();
require 'conexion.php';
include 'registrar.php';

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

$sql = "SELECT * FROM tb_proveedor $where";
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



                        <!--Aqui-->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="float-right page-breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="principal.php">Inicio</a></li>
                                        <li class="breadcrumb-item"><a href="proveedores.php">Proveedores</a></li>

                                    </ol>
                                </div>
                                <h5 class="page-title">Registrar Proveedores</h5>
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
                                <strong style="color: black;">EL proveedor fue editado correctamente</strong>
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
                                <strong style="color: black;">EL proveedor fue eliminado correctamente</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                        <?php
                        }
                        ?>
                        <!--Fin Alerta-->
                        <!-- end row formulario -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card m-b-30">
                                    <div class="card-body">

                                        <!-- <h4 class="mt-0 header-title">Llena los campos requeridos para hacer el registro</h4>-->


                                        <form action="registrar_proveedor.php" method="post">


                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">C.C</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" name="cc_prv" placeholder="Numero de cedula" id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Nombre</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" name="nombre_prv" placeholder="Dijite el nombre del cliente" id="example-search-input">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-url-input" class="col-sm-2 col-form-label">Correo</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="email" name="correo_prv" placeholder="ejemplo@gmail.com" id="example-url-input">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-tel-input" class="col-sm-2 col-form-label">Celular</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="tel" name="celular_prv" placeholder="310-000-0000" id="example-tel-input">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-password-input" class="col-sm-2 col-form-label">Direccion</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" name="direccion_prv" placeholder="Dije la direccion del cliente" id="example-password-input">
                                                </div>
                                            </div>


                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row formulario -->

                        <!-- end row botones -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card m-b-30">
                                    <div class="card-body">

                                        <!-- <h4 class="mt-0 header-title">Llena los campos requeridos para hacer el registro</h4>-->

                                        <button type="submit" name="registrar" class="btn btn-success btn-lg btn-block">Guardar</button>


                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row botones-->
                        </form>




                        <div class="row">
                            <div class="col-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <?php

                                        require 'conexion.php';
                                        $query = "SELECT id FROM tb_proveedor ORDER BY id";
                                        $query_run = mysqli_query($mysqli, $query);

                                        $row = mysqli_num_rows($query_run);

                                        echo '<h1 class="text-center"> ' . $row . ' <h6 class="text-center" > </h6> </h1>'

                                        ?>

                                        <h4 class="mt-0 header-title text-center h2 bold"><strong>PROVEEDORES REGISTRADOS
                                                <br>
                                                <br>

                                            </strong></h4>


                                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr class="text-center">

                                                    <th>C.C</th>
                                                    <th>NOMBRE</th>
                                                    <th>CORREO</th>
                                                    <th>CELULAR</th>
                                                    <th>DIRECCION</th>
                                                    <th>FECHA Y HORA</th>
                                                    <th>EDITAR</th>
                                                    <th>ELIMINAR</th>



                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php while ($row = $resultado->fetch_assoc()) { ?>

                                                    <tr class="text-center">

                                                        <td><?php echo $row['cc_prv']; ?></td>
                                                        <td><?php echo $row['nombre_prv']; ?></td>
                                                        <td><?php echo $row['correo_prv']; ?></td>
                                                        <td><?php echo $row['celular_prv']; ?></td>
                                                        <td><?php echo $row['direccion_prv']; ?></td>
                                                        <td><?php echo $row['fecha_hora_prv']; ?></td>
                                                        <td class="text-center">
                                                            <!-- BOTON PARA LLAMAR EL ID PARA ELIMINAR-->
                                                            <form action="" method="get">

                                                                <a href="editar_proveedor.php?id=<?php echo $row['id']; ?>"><span class="btn btn-warning mdi mdi-lead-pencil"></span></a>
                                                            </form>
                                                            <!-- BOTON PARA LLAMAR EL ID PARA ELIMINAR-->
                                                        </td>
                                                        <td class="text-center">
                                                            <!-- BOTON PARA LLAMAR EL ID PARA ELIMINAR-->
                                                            <form action="eliminar_proveedor.php" method="get">

                                                                <a onclick="return confirm('Estas seguro de eliminar?');" href="eliminar_proveedor.php?id=<?php echo $row['id']; ?>"><span class="btn btn-danger waves-effect waves-light  mdi mdi-delete-forever"></span></a>

                                                            </form>
                                                            <!-- BOTON PARA LLAMAR EL ID PARA ELIMINAR-->
                                                        </td>


                                                    </tr>
                                                <?php } ?>

                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

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

</body>

</html>