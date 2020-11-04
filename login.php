<?php
$alert = '';
session_start();
if(!empty($_SESSION['active']))
{
	if($_SESSION['rol_usuario'] == '1')
	{
		header('location: index.php');
	}else{
		header('location: registrarAsistencia.php');	
	}

}else{

	if(!empty($_POST))
	{
		if(empty($_POST['email']) || empty($_POST['password']))
		{
			$alert = 'Ingrese su Email y Password';
		}else{
            
			include './includes/connection.php';

			
			$email = $_POST['email'];
			$password = $_POST['password'];

			$query = mysqli_query($connection, "SELECT * FROM usuarios WHERE email = '$email' AND password = '$password'");
			$result = mysqli_num_rows($query);
			if($result>0)
			{
				$data = mysqli_fetch_array($query);
				$_SESSION['active'] = true;
				$_SESSION['id_usuario'] = $data['userID'];
				$_SESSION['rol_usuario'] = $data['rol'];
				if($_SESSION['rol_usuario'] == '1')
				{
					header('location: index.php');
				}else{
					header('location: registrarAsistencia.php');	
				}
				
			}else{
				$alert = 'El Email o la Contraseña son incorrectos.';
				session_destroy();
			}

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
    <title>Iniciar Sessión</title>
    <link rel="icon"  href="images/icon/LC_icon16clear.ico" type="icon" sizes="16x16">

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
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
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="images/icon/LC_icon175x55.png" alt="LC Logo">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Correo Electrónico</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="">
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Recordar Datos
                                    </label>
                                    <label>
                                        <a href="forget-pass.html">¿Olvidaste tu contraseña?</a>
                                    </label>
                                </div>
                                <div clas="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">
                                    <a>Iniciar Sección
                                    </a>
                                </button>
                                
                                </div>
                            </form>
                            <div class="register-link">
                                <p>
                                    ¿No tienes una cuenta?
                                    <a href="#">Contactar Administrador</a>
                                </p>
                            </div>
                        </div>
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