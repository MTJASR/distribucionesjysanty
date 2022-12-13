<?php
session_start();
require 'conexion.php';
include 'guardar_clientes.php';

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}

$id = $_SESSION['id'];
$tipo_usuario = $_SESSION['tipo_usuario'];
$sona = $_SESSION['sona'];

if ($tipo_usuario == 1) {
    $where = "";
} else if ($tipo_usuario == 2) {
    $where = "WHERE id=$id";
}

$sql = "SELECT * FROM tb_usuarios $where";
$resultado = $mysqli->query($sql);

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}

$nombre = $_SESSION['nombre'];
$tipo_usuario = $_SESSION['tipo_usuario'];
$rol = $_SESSION['rol'];





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
                        <li class="breadcrumb-item"><a href="zona.php"> <?php echo $_SESSION['sona'];?> </a></li>

                    </ol>
                </div>
                <h5 class="page-title">Asignar zona a los vendedores</h5>
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
                <strong style="color: black;">La zona del vendedor fue editado correctamente</strong>
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

            <div class="alert alert-danger  alert-dismissible fade show" role="alert" style="color: black;">
                <strong style="color: black;">EL vendedor fue eliminado correctamente</strong>
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
                        $query = "SELECT id FROM tb_usuarios ORDER BY id";
                        $query_run = mysqli_query($mysqli, $query);

                        $row = mysqli_num_rows($query_run);

                        echo '<h1 class="text-center"> ' . $row . ' <h6 class="text-center" > </h6> </h1>'

                        ?>

                        <h4 class="mt-0 header-title text-center h2">VENDEDORES ACTIVOS </h4>



                        <table id="example1_1_1" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr class="text-center">

                                    <th>ID</th>
                                    <th>NOMBRE</th>
                                    <th>ROL</th>
                                    <th>ZONA</th>
                                    <?php
                                       if ($rol == 'ADMINISTRADOR') {
                                        # DEJAR EDITAR TODAS LAS OPCIONES
                                
                                    ?>
                                    <th>EDITAR</th>
                                    <?php
                                      }
                                    ?>

                                </tr>
                            </thead>

                            <tbody>
                                <?php


                                while ($row = $resultado->fetch_assoc()) { ?>

                                    <tr class="text-center">

                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['nombre']; ?></td>
                                        <td><?php echo $row['rol']; ?></td>
                                        <td><?php echo $row['sona']; ?></td>

                                        <?php
                                        if ($rol == 'ADMINISTRADOR') {
                                            # DEJAR EDITAR TODAS LAS OPCIONES
                                    
                                        ?>
                                        <td class="text-center">
                                            <!-- BOTON PARA LLAMAR EL ID PARA ELIMINAR-->
                                            <form action="" method="get">

                                                <a href="editar_zona.php?id=<?php echo $row['id']; ?>"><span class="btn btn-warning mdi mdi-lead-pencil"></span></a>
                                            </form>
                                            <!-- BOTON PARA LLAMAR EL ID PARA ELIMINAR-->
                                        </td>

                                        <?php
                                            }
                                        ?>
                                    </tr>
                                <?php } ?>



                                <!--eliminar-->
                                <?php





                                function db_query($query)
                                {
                                    $connection = mysqli_connect("localhost", "root", "", "distribuciones_santi");
                                    $result = mysqli_query($connection, $query);

                                    return $result;
                                }


                                function delete($id)
                                {

                                    $sql = "DELETE FROM tb_cliente where ID=" . $id . "";

                                    return db_query($sql);
                                }



                                ?>
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
<script src="sona.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>

</body>

</html>