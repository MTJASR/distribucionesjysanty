<?php

                    include 'conexion.php';


                    if (isset($_POST['registrar'])) {
                        if (strlen($_POST['RUT']) >= 1 &&
                            strlen($_POST['NOMBRE']) >= 1 &&
                            strlen($_POST['CORREO']) >= 1 &&
                            strlen($_POST['CELULAR']) >= 1 &&
                            strlen($_POST['DIRECCION']) >= 1)
                            {

                                $cedula = trim($_POST['RUT']);
                                $nombre = trim($_POST['NOMBRE']);
                                $correo = trim($_POST['CORREO']);
                                $celular = trim($_POST['CELULAR']);
                                $direccion = trim($_POST['DIRECCION']);

                                $consulta = "INSERT INTO tb_proveedor(ID, RUT, NOMBRE, CORREO, CELULAR, DIRECCION) VALUES
                                    ('','$cedula','$nombre','$correo','$celular','$direccion')";


                                $resultado = mysqli_query($mysqli, $consulta);

                        
                            }
                        }
                        
                        ?>
