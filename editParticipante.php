<!DOCTYPE html>
<html lang="en">

<?php
    include './includes/connection.php';
    if(empty($_REQUEST['id']))
    {
        header("location: listaParticipantes.php");
    }else{
        $participanteID = $_REQUEST['id'];
    }
    
		
		
		$query = mysqli_query($connection,"SELECT * FROM participantes WHERE participanteID='$participanteID'");

		$data = mysqli_fetch_array($query);


    if(!empty($_POST))
    {  
        if(empty($_POST['nombre']) || empty($_POST['apellidos']) || empty($_POST['genero'])
            || empty($_POST['edificio']) || empty($_POST['unidad']) || empty($_POST['birthday']))
        {
            $alert='<p class="msg_error">Todos los campos son Obligatorios</p>';
        }
        
        else{
            $participanteNombre = $_POST['nombre'];
            $participanteApellidos = $_POST['apellidos'];
            $participanteGenero = $_POST['genero'];
            $participanteEdificio = $_POST['edificio'];
            $participanteUnidad = $_POST['unidad'];
            $participanteNacimiento = $_POST['birthday'];
            
            $query = mysqli_query($connection, "UPDATE participantes set nombre ='$participanteNombre', apellidos='$participanteApellidos',
             genero='$participanteGenero', edificio='$participanteEdificio', unidad='$participanteUnidad', birthday='$participanteNacimiento' 
             WHERE participanteID='$participanteID'");
        }
    }
?>

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Editar Participante</title>
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
        <!-- HEADER MOBILE-->
        
        <!-- END HEADER MOBILE-->


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
                                        <strong>Registro de</strong> Participante
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
                                                    <label for="genero" class=" form-control-label">Género</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                        <select name="genero" id="genero" class="form-control"   name="genero">
                                                            <?php if($data["genero"]=='F') { ?>  
                                                        
                                                            <option value="F">Femenino</option>
                                                            
                                                            <option value="M">Masculino</option>
                                                            <?php }else{?>
                                                                <option value="M">Masculino</option>
                                                                <option value="F">Femenino</option>
                                                            <?php }?>
                                                            
                                                            
                                                        </select>
                                                </div>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="edificio" class=" form-control-label">Edificio</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input class="form-control" type="number" id="edificio" value="<?php echo $data["edificio"] ?>" name="edificio" min="101" max="111">
                                                    <small class="form-text text-muted"></small>
                                                </div>
                                            </div>
                                                
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="unidad" class=" form-control-label">Unidad</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input class="form-control" type="number" id="unidad" value="<?php echo $data["unidad"] ?>" name="unidad" min="1" max="100">
                                                    <small class="form-text text-muted"></small>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="birthday" class=" form-control-label">Fecha de Nacimiento</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input class="form-control" type="date" id="birthday" value="<?php echo $data["birthday"] ?>" name="birthday">
                                                </div>
                                            </div>

                                            <div class="">
                                                <button type="submit" name="someter" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-dot-circle-o"></i> Someter
                                                </button>
                                                <?php
                                                 if(isset($_POST['someter'])){
                                                     echo "<script>window.open('listaParticipantes.php','_self')</script>";
                            
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

            <!--Footer-->
            <?php
                include './includes/footer.php';
            ?>
            <!--End Footer-->

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