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

$sql = "SELECT * FROM tb_cliente $where";
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

                    <?php
                        //FUNCION EDITAR
                        if (!isset($_GET['id'])) {
                            header('Location: cliente1.php?mensaje=error');
                            exit();
                        }


                        include_once 'conexion.php';

                        $ID = $_GET['id'];

                        $sentencia = $bd->prepare("SELECT * FROM tb_cliente where id = ?;");
                        $sentencia->execute([$ID]);
                        $cliente = $sentencia->fetch(PDO::FETCH_OBJ);
                        
                        ?>

                        <!--Aqui-->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="float-right page-breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="principal.php">Inicio</a></li>
                                        <li class="breadcrumb-item"><a href="clientes.php">Clientes</a></li>

                                    </ol>
                                </div>
                                <h5 class="page-title">Editar El Cliente <?php echo $cliente->nombre_clie; ?> </h5>
                            </div>
                        </div>

                        <!--Inicio Alerta-->
                        <?php
                        if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta') {

                        ?>
                            <!--registrado-->
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error</strong> Rellena todos los campos
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
                                <strong>Registro Exitoso</strong> Felicitaciones
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

                            <div class="alert alert-warning  alert-dismissible fade show" role="alert" style="color: black;">
                                <strong style="color: black;">Parcero Error al guardar en la base de datos</strong> Ponerse en contacto con su programador
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
                        <!--Fin Alerta-->
                        <!--FUNCION EDITAR-->
                      
                        <!-- end row formulario -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card m-b-30">
                              
                                    <div class="card-body">

                                        <!-- <h4 class="mt-0 header-title">Llena los campos requeridos para hacer el registro</h4>-->


                                       
                                        <form action="editar_proceso_cliente.php" method="post">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">C.C</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" name="cc_clie" placeholder="Numero de cedula" id="example-text-input"
                                                    value="<?php echo $cliente->cc_clie; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Nombre</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" name="nombre_clie" placeholder="Dijite el nombre del cliente" id="example-search-input"
                                                    value="<?php echo $cliente->nombre_clie; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Apellido</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="Text" name="apellido_clie" placeholder="Dijite el apellido del cliente" id=""
                                                    value="<?php echo $cliente->apellido_clie; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-url-input" class="col-sm-2 col-form-label">Correo</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="email" name="correo_clie" placeholder="ejemplo@gmail.com" id="example-url-input"
                                                    value="<?php echo $cliente->correo_clie; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-tel-input" class="col-sm-2 col-form-label">Celular</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="tel" name="celular_clie" placeholder="310-000-0000" id="example-tel-input"
                                                    value="<?php echo $cliente->celular_clie; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-password-input" class="col-sm-2 col-form-label">Direccion</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" name="direccion_clie" placeholder="Dije la direccion del cliente" id="example-password-input"
                                                    value="<?php echo $cliente->direccion_clie; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-number-input" class="col-sm-2 col-form-label">Barrio</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" name="barrio_clie" placeholder="Dijete el barrio del cliente" id="example-number-input"
                                                    value="<?php echo $cliente->barrio_clie; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-datetime-local-input" class="col-sm-2 col-form-label">Negocio</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" name="nombre_negocio_clie" placeholder="Dijite el nombre del negocio" id="example-datetime-local-input"
                                                    value="<?php echo $cliente->nombre_negocio_clie; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-date-input" class="col-sm-2 col-form-label">Cada cuanto compra</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" name="fch_cada_compra_clie" placeholder="Cada cuanto compra el cliente" id="example-date-input"
                                                    value="<?php echo $cliente->fch_cada_compra_clie; ?>">
                                                    <input type="hidden" name="id" value=" <?php echo $cliente->id; ?>">
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

                                        <button type="submit" name="registrar" class="btn btn-warning btn-lg btn-block">Editar</button>


                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row botones-->
                        </form>

                    </div><!-- container fluid -->

                </div> <!-- Page content Wrapper -->

            </div> <!-- content -->

            <footer class="footer">
                ?? 2022 <b>Distribuciones J & SANTI </b> <span class="d-none d-sm-inline-block"> - Desarrollada con <i class="mdi mdi-heart text-danger"></i> Por MT JASR COMPANY</span>
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