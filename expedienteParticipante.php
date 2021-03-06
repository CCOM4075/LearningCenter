<?php
    session_start();   
    include './includes/connection.php';
    include_once './functions/functions.php';
    verificarBibliotecario($_SESSION['rol_usuario']);

    if(empty($_REQUEST['id']))
        {
            header("location: listaParticipante.php");
        }else{
            $participanteID = $_REQUEST['id'];
            $query = mysqli_query($connection, "SELECT * FROM `participantes` WHERE participanteID = '$participanteID'");
            $query2 = mysqli_query($connection, "SELECT h.fecha, p.proposito FROM `asistencia` a INNER JOIN propositos p 
                    ON a.proposito = p.id INNER JOIN hojaasistencia h ON a.hojaAsistencia = h.id WHERE a.participanteID = $participanteID ORDER BY h.id DESC");
            $participante = mysqli_fetch_array($query);
            $edad = getEdad($participante['birthday']);
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
    <title>Expediente | Participante</title>
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
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <h2 class="title-2">Expediente De Participante</h2>
                    <div class="row m-t-25"></div>
                        <div class="row"></div>
                            <div class="col-lg-10"></div>
                                <div class="table-responsive table--no-card m-b-30">
                                    <!--tabla blanca-->
                                    <?php

                                    ?>
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th class="text-left">Información</th>
                                                <th class="text-left"></th>
                                            </tr>
                                        </thead>
                                            <tr>
                                                <th class="text-left">Nombre</th>
                                                <td class="text-left"><?php echo $participante['nombre']." ".$participante['apellidos']?></td>
                                            </tr>
                                            <tr>
                                                <th class="text-left">Edad</th>
                                                <td class="text-left"><?php echo getEdad($participante['birthday'])?></td>
                                            </tr>
                                                <th class="text-left">Género</th>
                                                <td class="text-left"><?php echo $participante['genero']?></td>
                                            </tr>
                                            </tr>
                                                <th class="text-left">Edificio</th>
                                                <td class="text-left"><?php echo $participante['edificio']?></td>
                                            </tr>
                                            </tr>
                                                <th class="text-left">Unidad</th>
                                                <td class="text-left"><?php echo $participante['unidad']?></td>
                                            </tr>
                                            </tr>
                                                <th class="text-left">Fecha De Nacimiento
                                                    <br>
                                                    <h6 class="title-7">(YYYY-MM-DD)</h6>
                                                </th>
                                                <td class="text-left"><?php echo $participante['birthday']?></td>
                                            </tr>
                                            </tr>
                                                <th class="text-left">Fecha De Inscripción
                                                    <br>
                                                    <h6 class="title-7">(YYYY-MM-DD)</h6>
                                                </th>
                                                <td class="text-left"><?php echo $participante['inscripcion']?></td>
                                            </tr>
                                    </table>
                                </div>
                            </div>
                                <!-- END DATA TABLE-->

                                
                            <div class="col-lg-10"></div>
                            <h2 class="title-2">Registro de Visitas</h2>
                                <div class="row m-t-25"></div>
                                <div class="table-responsive table--no-card m-b-30">
                                    <!--tabla blanca-->
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th class="text-left">Fecha</th>
                                                <th class="text-left">Propósito</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php 
                                                
                                                $result = mysqli_num_rows($query2);
                                                if($result > 0){
                                                    while($datos = mysqli_fetch_array($query2)){
                                            ?>			
                                                    <tr>
                                                        <td><?php echo $datos['fecha']?></td>
                                                        <td><?php echo $datos['proposito']?></td>
                                                    </tr>
                                            <?php
                                                    }
                                                }
                                                else{
                                                    ?>
                                                    <tr>
                                                        <td>N/A</td>
                                                        <td>N/A</td>
                                                    </tr>   
                                                    <?php                                             
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-10"></div>
                            <h2 class="title-2">Asistencia de Actividad:</h2>
                                <div class="row m-t-25"></div>
                                <div class="table-responsive table--no-card m-b-30">
                                    <!--tabla blanca-->
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th class="text-left">Fecha</th>
                                                <th class="text-left">Nombre</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php 
                                            $queryActividad = mysqli_query($connection, "SELECT b.fecha, b.nombre 
                                            FROM asistenciaactividad a 
                                            INNER JOIN actividades b ON a.actividadID =  b.actividadID
                                            WHERE a.participanteID = '$participanteID' ORDER BY b.actividadID ASC");

                                                $result1 = mysqli_num_rows($queryActividad);
                                                if($result1 > 0){
                                                    while($datos = mysqli_fetch_array($queryActividad)){
                                            ?>			
                                                    <tr>
                                                        <td><?php echo $datos['fecha']?></td>
                                                        <td><?php echo $datos['nombre']?></td>
                                                    </tr>
                                            <?php
                                                    }
                                                }
                                                else{
                                                    ?>
                                                    <tr>
                                                        <td>N/A</td>
                                                        <td>N/A</td>
                                                    </tr>   
                                                    <?php                                             
                                                }
                                            ?>
                                        </tbody>
                                    </table>
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
