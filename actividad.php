<?php
    include './includes/connection.php';

    if(empty($_REQUEST['id']))
        {
            header("location: listaActividades.php");
        }else{
            $actividadID = $_REQUEST['id'];
        }

    $query = mysqli_query($connection, "SELECT actividadID FROM actividades where actividadID = '$actividadID'");
    $result = mysqli_num_rows($query);
    if($result == 0){
            header("location: listaActividades.php");
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
    <title>Actividad</title>
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
                    <h2 class="title-2">Actividad</h2>
                    <div class="row m-t-25"></div>
                        <div class="row"></div>
                            <div class="col-lg-10"></div>
                                <div class="table-responsive table--no-card m-b-30">
                                    <!--tabla blanca-->
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th class="text-left">Detalles</th>
                                                <th class="text-left"></th>
                                            </tr>
                                        </thead>
                                        <?php 
                                            $query = mysqli_query($connection, "SELECT fecha, nombre, recurso, lugar, participantes, hora, actividadID FROM actividades where actividadID = '$actividadID'");
                                            $result = mysqli_num_rows($query);
                                            if($result > 0){
 
                                                while($actividad = mysqli_fetch_array($query)){
                                        ?>  
                                            <tr>
                                                <th class="text-left">Actividad</th>
                                                <td class="text-left"><?php echo $actividad['nombre']?></td>
                                            </tr>
 
                                            <tr>
                                                <th class="text-left">Recurso</th>
                                                <td class="text-left"><?php echo $actividad['recurso']?></td>
                                            </tr>
                                            <tr>
                                                <th class="text-left">Lugar</th>
                                                <td class="text-left"><?php echo $actividad['lugar']?></td>
                                            </tr>
 
                                            <tr>
                                                <th class="text-left">Fecha
                                                    <br>
                                                    <h6 class="title-7">(YYYY-MM-DD)</h6>
                                                </th>
                                                <td class="text-left"><?php echo $actividad['fecha']?></td>
                                            </tr>
                                            <tr>
                                                <th class="text-left">Hora</th>
                                                <td class="text-left"><?php echo $actividad['hora']?></td>
                                            </tr>
                                            <tr>
                                            </tr>
                                            <?php
                                                }
                                            }
                                        ?>
                                    </table>
                                </div>
                            </div>
                            
                            <div class="section__content section__content--p30">
                            <h2 class="title-2">Galería</h2>
                            <div class="row m-t-25"></div>
                            <?php 
                              $query = mysqli_query($connection, "SELECT foto FROM fotosactividades WHERE actividad = '$actividadID'");
                                    $result = mysqli_num_rows($query);
                                        if($result > 0){
 
                                            while($foto = mysqli_fetch_array($query)){
                                                    
                            ?>  
 
                            <img src="<?php echo $foto['foto']?>"  style="width:350px; height:auto"/>
                            
                            <?php
                                                }
                                            }
                                        ?>
                                        <img src="images/actividades/actividadHalloween2.jpg" alt="actividadHalloween1" style="width:350px; height:auto"/>
                            <div class="row m-t-25"></div>
                            <img src="images/actividades/actividadHalloween3.jpg" alt="actividadHalloween1" style="width:350px; height:auto"/>
                            <img src="images/actividades/actividadHalloween4.jpg" alt="actividadHalloween1" style="width:350px; height:auto"/>
                            </br>
                            <div class="row m-t-25"></div>
 
                                <!-- END DATA TABLE-->
                                <div class="section__content section__content--p30">
                    <h2 class="title-2">Lista De Participantes</h2>
                    <div class="row m-t-25"></div>
                        <div class="row"></div>
                            <div class="col-lg-10"></div>
                                <div class="table-responsive table--no-card m-b-30">
                                    <!--tabla blanca-->
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                            <th class="text-left">#</th>
                                                <th class="text-left">Nombre</th>
                                                <th class="text-left">Edad</th>
                                                <th class="text-left">Edificio</th>
                                                <th class="text-left">Unidad</th>
                                            </tr>
                                        </thead>
 
                                        <tbody>
                                        <?php 
                                            $query = mysqli_query($connection, "SELECT p.participanteID, p.nombre, p.apellidos, p.birthday, p.edificio, p.unidad 
                                            FROM asistenciaactividad a INNER JOIN participantes p ON a.participanteID = p.participanteID
                                            WHERE a.actividadID = '$actividadID'");
                                            $result = mysqli_num_rows($query);
                                            if($result > 0){
 
                                                while($participante = mysqli_fetch_array($query)){
                                                    $naci = $participante['birthday'];
                                                    $fecha_nacimiento = new DateTime($naci) ;
                                                    $hoy = new DateTime();
                                                    $edad = $hoy->diff($fecha_nacimiento);
                                        ?>  
                                            <tr>
                                                <td class="text-left"><?php echo $participante['participanteID']?></td>
                                                <td class="text-left">
                                                    <a href="expedienteParticipante.php?id=<?php echo $participante['participanteID'];?>"><?php echo $participante['nombre']." ".$participante['apellidos']?></a></td>
                                                <td class="text-left"><?php echo $edad->y?></td>
                                                <td class="text-left"><?php echo $participante['edificio']?></td>
                                                <td class="text-left"><?php echo $participante['unidad']?></td>
                                            </tr>
                                            <?php
                                                }
                                            }
                                        ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--<div class="col-lg-3">-->
                                <!-- END DATA TABLE-->
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
