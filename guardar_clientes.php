<?php

                    include 'conexion.php';


                    if (isset($_POST['registrar'])) {
                        if (strlen($_POST['cc']) >= 1 &&
                            strlen($_POST['nombre']) >= 1 &&
                            strlen($_POST['apellido']) >= 1 &&
                            strlen($_POST['correo']) >= 1 &&
                            strlen($_POST['celular']) >= 1 &&
                            strlen($_POST['direccion']) >= 1 &&
                            strlen($_POST['barrio']) >= 1 &&
                            strlen($_POST['negocio']) >= 1 &&
                            strlen($_POST['ciudad']) >= 1 )
                            {

                                $cedula = trim($_POST['cc']);
                                $nombre = trim($_POST['nombre']);
                                $apellido = trim($_POST['apellido']);
                                $correo = trim($_POST['correo']);
                                $celular = trim($_POST['celular']);
                                $direccion = trim($_POST['direccion']);
                                $barrio = trim($_POST['barrio']);
                                $negocio = trim($_POST['negocio']);
                                $ciudad = trim($_POST['ciudad']);

                                $consulta = "INSERT INTO tb_cliente(ID, CC, NOMBRE, APELLIDO, CORREO, CELULAR,DIRECCION,BARRIO,NOMBRE_NEGOCIO,CIUDAD) VALUES
                                    ('','$cedula','$nombre','$apellido','$correo','$celular','$direccion','$barrio','$negocio','$ciudad')";


                                $resultado = mysqli_query($mysqli, $consulta);

                        
                            }
                        }
                        
                        ?>
