<?php
session_start();
require 'conexion.php';


if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}

$id = $_SESSION['id'];
$zona = $_SESSION['sona'];
$rol = $_SESSION['rol'];
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
$zona = $_SESSION['sona'];
$tipo_usuario = $_SESSION['tipo_usuario'];



?>
<?php include_once "includes/header.php"; ?>
<div class="page-content-wrapper ">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <h4 class="text-center">Datos del Cliente</h4>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form method="post">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div>
                                        <input type="hidden" id="idcliente" value="" name="idcliente" required>
                                        <label><i class="fa fa-street-view" aria-hidden="true"></i> Nombre</label>
                                        <input style="text-transform: uppercase;" type="text" name="nom_cliente" id="nom_cliente" class="form-control" placeholder="Ingrese nombre del cliente" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label><i class="fa fa-mobile" aria-hidden="true"></i> Teléfono</label>
                                        <input type="number" name="tel_cliente" id="tel_cliente" class="form-control" disabled required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label><i class="fa fa-map-marker" aria-hidden="true"></i> Dirección</label>
                                        <input type="text" name="dir_cliente" id="dir_cliente" class="form-control" disabled required>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        Datos Venta
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">

                                <div class="form-group">
                                    <label><i class="fa fa-user-circle" aria-hidden="true"></i> VENDEDOR</label>
                                    <p style="font-size: 16px; text-transform: uppercase; color: red; font-weight: bold;"><?php echo $_SESSION['nombre']; ?></p>
                                </div>

                                <div class="form-group">
                                    <label><i class="mdi mdi-map-marker-radius" aria-hidden="true"></i> ZONA DE VENTA</label>
                                    <p style="font-size: 16px; text-transform: uppercase; color: red; font-weight: bold;"><?php echo $_SESSION['sona']; ?></p>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-header">
                                        <i class="fa fa-window-maximize" aria-hidden="true"></i> Con cual precio desea facturar
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">

                                            <?php
                                            $sql = "SELECT * FROM opciones where opcion = 'mpago'";
                                            $metodo = $mysqli->query($sql);
                                            ?>
                                            <select id="tipo_pago" class="form-control" name="tipo_pago" required>
                                                <option value="">Seleccione..</option>
                                                <?php while ($rom = $metodo->fetch_assoc()) {
                                                    echo "<option value='" . $rom['valor'] . "'>" . $rom['valor'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-header">
                                        <i class="fa fa-archive" aria-hidden="true"></i> Buscar Producto
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <input id="producto" class="form-control" type="text" name="producto" placeholder="Ingresa el código o nombre">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                if (isset($_POST["editar"]) and $_POST["editar"] != "") {
                    $can = $_POST["can"];
                    $id = $_POST["idd"];
                    $sql = "UPDATE detalle_temp SET cantidad='$can' WHERE id=$id";
                    $resultado = $mysqli->query($sql);
                }
                ?>
                <!--  <script
			  src="https://code.jquery.com/jquery-2.2.4.min.js"
			  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
			  crossorigin="anonymous"></script>-->
                <div class="table-responsive">
                    <table class="table table-hover" id="tblDetalle">
                        <thead class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>Descripción</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Precio Total</th>
                                <th>Accion</th>
                            </tr>
                        </thead>

                        <tbody id="detalle_venta">

                        </tbody>
                        <tfoot>
                            <tr class="font-weight-bold">
                                <td style="color:red !important; font-weight: bold;" colspan=3>Total Pagar</td>
                                <td>
                                    <div style="color:red ; font-weight: bold;" id="total"></div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>

            <br>
            <br>
            <br>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-archive" aria-hidden="true"></i> Observaciones
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <textarea id="obs" class="form-control" maxlength="225" rows="3" placeholder="Digita aqui las observaciones que el cliente tenga"></textarea>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-6 ">
                <a href="#" class="btn btn-primary" id="btn_generar"><i class="fa fa-floppy-o" aria-hidden="true"></i> Generar Venta</a>
            </div>

        </div>
    </div>
</div>
<?php include_once "includes/footer.php"; ?>