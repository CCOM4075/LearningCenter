<?php
    session_start();     
    include './includes/connection.php';
    include_once './functions/functions.php';
    verificarBibliotecario($_SESSION['rol_usuario']);

    if(empty($_REQUEST['id']))
    {
        header("location: listaUsuarios.php");
    }else{
        $usuarioID = $_REQUEST['id'];
    }

    $query = mysqli_query($connection,"SELECT * FROM usuarios WHERE userID='$usuarioID'");

    $data = mysqli_fetch_array($query);
    
    if(!empty($_POST))
	{
        
		$alert='';
		if(empty($_POST['nombre']) || empty($_POST['usuario']) || empty($_POST['password']) 
            || empty($_POST['password2']) || empty($_POST['tipoCuenta']))
		{
			$alert='<p class="msg_error">Todos los campos son Obligatorios</p>';
		}else{
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];
            $password2 = $_POST['password2'];
            $tipoCuenta = $_POST['tipoCuenta'];

            if($password != $password2){
				$alert='<p class="msg_error">Las Contraseñas no coincide.</p>';
			}else{
                /* Query Para buscar si el usuario ya existe */
				/*$query = mysqli_query($connection, "SELECT * FROM usuarios WHERE usuario = '$usuario'");
                $result = mysqli_fetch_Array($query);
                
                if($result > 0){
					$alert='<p class="msg_error">EL Correo Electronico ya está registrado.</p>';
				}else{*/
                        $query_insert = mysqli_query($connection, "UPDATE usuarios SET nombre='$nombre', apellidos='$apellidos', usuario='$usuario',
                         password='$password', rol='$tipoCuenta' WHERE userID='$usuarioID'");
                    
                            if($query_insert){
                                $alert='<p class="msg_save">Se ha registrado el ususario.</p>';
                                header("location: listaUsuarios.php");
                            }else{
                                $alert='<p class="msg_error">Error al crear el usuario.</p>';

                            }
            
                    
              /*  } */
		    }
	    }
    }
			
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Registro De Usuario</title>
    <link rel="icon"  href="images/icon/LC_icon16clear.ico" type="icon" sizes="16x16">

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        

        <!-- MENU SIDEBAR-->
        <?php
	        include './includes/menuSideBar.php';
        ?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php
	            include './includes/header.php';
            ?>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Editar</strong> Usuario
                                    </div>
                                    <?php
                                        if(!empty($_POST))
                                        {
                                    ?>
                                            <div class="alert"><?php echo isset($alert) ? $alert : '' ?></div>
                                    <?php } ?>
                                    <div class="card-body card-block">
                                        <form action="" method="post">

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for= "nombre" class=" form-control-label" for="text-input" >Nombre</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input class="form-control" type="text" id="nombre" value="<?php echo $data["nombre"] ?>" name="nombre">
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="apellidos" class=" form-control-label">Apellidos</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input class="form-control" type="text" id="apellidos" value="<?php echo $data["apellidos"] ?>" name="apellidos">
                                                    <small class="form-text text-muted"></small>
                                                </div>
                                            </div>
                                                
                                            <div class="row form-group" >
                                                <div class="col col-md-3">
                                                    <label for="tipoCuenta" class=" form-control-label">Tipo de Cuenta</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                        <select name="tipoCuenta" id="tipoCuenta" class="form-control"  name="tipoCuenta">
                                                            <?php if($data["rol"]=='1'){ ?>
                                                            <option value="1">Bibliotecario</option>
                                                            <option value="2">Biblioteca</option>
                                                            <?php }else{?>
                                                            <option value="2">Biblioteca</option>
                                                            <option value="1">Bibliotecario</option>
                                                            <?php }?>
                                                        </select>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for= "usuario" class=" form-control-label" for="text-input" >Correo Electronico</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input class="form-control" type="text" id="usuario" value="<?php echo $data["usuario"] ?>" name="usuario">
                                                </div>
                                            </div>
                                                
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for= "password" class=" form-control-label" for="text-input" >Contraseña</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input class="form-control" type="password" id="password" value="<?php echo $data["password"] ?>" name="password">
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for= "password2" class=" form-control-label" for="text-input" >Validar Contraseña</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input class="form-control" type="password" id="password2" value="<?php echo $data["password"] ?>" name="password2">
                                                </div>
                                            </div>

                                            <div class="">
                                                <button type="submit" name="someter" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-dot-circle-o"></i> Someter
                                                </button>
                                                <?php
                                                $alert='';
                                                if(empty($_POST['nombre']) || empty($_POST['usuario']) || empty($_POST['password']) 
                                                    || empty($_POST['password2']) || empty($_POST['tipoCuenta']))
                                                {
                                                    
                                                        $alert='';
                                                }else{
                                                    if($password == $password2)
                                                    {
                                                 if(isset($_POST['someter'])){
                                                     echo "<script>window.open('listaUsuarios.php','_self')</script>";
                            
                                                      }
                                                    }
                                                }
                                                ?>
                                                <button type="reset" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-ban"></i> Reiniciar
                                                </button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>    
                        
                    </div>
                </div>
            </div>
                        <!--Footer-->
                        <?php
	                        include './includes/footer.php';
                        ?>
                        <!--End Footer-->
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
