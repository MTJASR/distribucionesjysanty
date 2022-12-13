<?php
	
	require "conexion.php";
	
	session_start();
	
	if($_POST){
		
		$usuario = $_POST['usuario'];
		$password = $_POST['password'];
		
		$sql = "SELECT id, password, nombre, tipo_usuario, rol, sona FROM tb_usuarios WHERE usuario='$usuario'";
		//echo $sql;
		$resultado = $mysqli->query($sql);
		$num = $resultado->num_rows;
		
		if($num>0){
			$row = $resultado->fetch_assoc();
			$password_bd = $row['password'];
			
			$pass_c = sha1($password);
			
			if($password_bd == $pass_c){
				
				$_SESSION['id'] = $row['id'];
				$_SESSION['nombre'] = $row['nombre'];
				$_SESSION['tipo_usuario'] = $row['tipo_usuario'];
                $_SESSION['rol'] = $row['rol'];
                $_SESSION['sona'] = $row['sona'];
				
            header("Location: principal.php");
				
			} else {
			
			echo '<?php ?>
            
            <div class="alert alert-danger alert-dismissible fade show mb-0 text-center "
            role="alert" >
            <button type="button" class="close" data-dismiss="alert"
                aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Ops</strong> Al parecer tu contraseña es incorrecta &#128274;
        </div> 
            
            <?php ?>';
			
			}
			
			
			} else {
				echo '<?php ?>
            
            <div class="alert alert-primary alert-dismissible fade show mb-0 text-center "
            role="alert" >
            <button type="button" class="close" data-dismiss="alert"
                aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Lo siento</strong> Este usuario no esta en nuestra base de datos &#128148;
        </div>
            
            <?php ?>';
		}
		
		
		
	}
	
	
	
?>
<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Distribuciones J&SANTI</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="assets/images/logo.png">
    

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">

</head>


<body class="fixed-left">



    <!-- Begin page -->
    <div class="accountbg">

        <div class="content-center">
            <div class="content-desc-center">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-8">
                            <div class="card">
                                <div class="card-body">

                                    <h3 class="text-center mt-0 m-b-15">
                                        <a href="index.html" class="logo logo-admin"><img src="assets/images/logo.png"
                                                height="200" alt="logo"></a>
                                    </h3>

                                    <h4 class="text-muted text-center font-18"><b>Iniciar sesión</b></h4>

                                    <div class="p-2">
                                        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" class="form-horizontal m-t-20" action="index.html">

                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <input class="form-control" type="text" required=""
                                                        placeholder="Nombre de usuario" name="usuario">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <input class="form-control" type="password" required=""
                                                        placeholder="password" name="password">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customCheck1">
                                                        <label class="custom-control-label"
                                                            for="customCheck1">Recordarme</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group text-center row m-t-20">
                                                <div class="col-12">
                                                    <button class="btn btn-primary btn-block waves-effect waves-light"
                                                        type="submit">Iniciar sesión</button>
                                                </div>
                                            </div>
                                            <!--CREAR CUENTA / OLVIDO SU CLAVE-->
                                            <!-- <div class="form-group m-t-10 mb-0 row">
                                                    <div class="col-sm-7 m-t-20">
                                                        <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> ¿Olvidaste tu contraseña?</a>
                                                    </div>
                                                    <div class="col-sm-5 m-t-20">
                                                        <a href="pages-register.html" class="text-muted"><i class="mdi mdi-account-circle"></i> Create an account</a>
                                                    </div>-->
                                    </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
    </div>

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

    <!-- App js -->
    <script src="assets/js/app.js"></script>

</body>

</html>