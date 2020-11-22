<?php
    session_start();
    include './includes/connection.php';
    include_once './functions/functions.php';

    if(!empty($_POST))
    {  
        if(empty($_POST['nombre']) || empty($_POST['hora']) || empty($_POST['fecha'])
            || empty($_POST['proposito']) || empty($_POST['tipoActividad']) || empty($_POST['recurso'])
            || empty($_POST['lugar']) || empty($_POST['promocion']) || empty($_POST['fotos']))
        {
            $alert='<p class="msg_error">Todos los campos son Obligatorios.</p>';
        } 
        
        else{
            $nombre = $_POST['nombre'];
            $hora = $_POST['hora'];
            $fecha = $_POST['fecha'];
            $proposito = $_POST['proposito'];
            $tipoActividad = $_POST['tipoActividad'];
            $recurso = $_POST['recurso'];
            $lugar = $_POST['lugar'];
            $promocion = $_POST['promocion'];
            $fotos = $_POST['fotos'];
            $fiscalYear = getCurrentFiscalYear();


            //getting the image from the field
            $promocionActividad = $_FILES['promocion']['name'];
            $promocionActividadTemp = $_FILES['promocion']['tmp_name'];

            move_uploaded_file($promocionActividadTemp,"promociones/$promocion");


            
            $queryRegistrarActividad = mysqli_query($connection, "INSERT INTO actividades(nombre, hora, fecha, proposito, tipo, recurso, lugar, promocion, fiscalyear)
            values('$nombre', '$hora', '$fecha', '$proposito', '$tipoActividad', '$recurso', '$lugar', '$promocionActividad', $fiscalYear)");
            
            //Funcion para escoger el id incrementado que tiene el ultimo query
            $idActividad = mysqli_insert_id($connection);

            if($queryRegistrarActividad){
                header("location: actividad.php?id=$idActividad"); 
            }else{
                $alert='<p class="msg_error">Error al Registrar la Actividad.</p>';
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
    <title>Actividades | Registrar</title>
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
                                        <strong>Registrar</strong> Actividad
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
                                                    <label for="nombre" class=" form-control-label">Nombre de Actividad</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="nombre" name="nombre" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hora" class=" form-control-label">Hora</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="time" id="hora" name="hora" class="form-control">
                                                    
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="fecha" class=" form-control-label">Fecha</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="date" id="fecha" name="fecha" class="form-control" href=>
                                                   
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="proposito" class=" form-control-label">Propósito</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="proposito" id="proposito" rows="5" placeholder="Propósito..." class="form-control"></textarea>
                                                </div>
                                            </div>

                                            <div class="row form-group" >
                                                <div class="col col-md-3">
                                                    <label for="tipoActividad" class=" form-control-label">Tipo de Actividad</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                        <select name="tipoActividad" id="tipoActividad" class="form-control">
                                                            <option>Tipo de Actividad</option>
                                                            <?php
                                                                $get_tipoActividad= "SELECT * FROM tipoActividad";
                                                                $run_tipoActividad = mysqli_query($connection,$get_tipoActividad);

                                                                while($row_cats=mysqli_fetch_array($run_tipoActividad))
                                                                {
                                                                    $tipo = $row_cats['tipo'];
                                                                    $id = $row_cats['id'];
                                                                    echo "<option value='$id'> $tipo</option>";
                                                                }
                                                            ?>
                                                            
                                                        </select>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="recurso" class=" form-control-label">Recurso</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="recurso" name="recurso" class="form-control">
                                                    <small class="form-text text-muted"></small>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="lugar" class=" form-control-label">Lugar</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="lugar" name="lugar" class="form-control">
                                                    <small class="form-text text-muted"></small>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="promocion" class=" form-control-label">Promoción Del Evento</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="promocion" name="promocion" class="form-control-file">
                                                </div>
                                            </div>

                                            <div class="row form-group">

                                                <div class="col col-md-3">
                                                    <label for="fotos" class=" form-control-label">Fotos Del Evento</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="fotos" name="fotos" multiple="" class="form-control-file">
                                                </div>
                                            </div>

                                            <div class="">
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-dot-circle-o"></i> Registrar Actividad
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
