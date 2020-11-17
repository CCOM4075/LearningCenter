<!DOCTYPE html>
<html lang="en">

<?php
    include './includes/connection.php';
    include_once './functions/functions.php';

    $fechaHoy = getTodayDate();                       
?>
 
<!-- Learning Center Register -->
 
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Inicio</title>
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
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-2">Resúmen</h2>
                                </div>
                            </div>
                        </div>

                        <!--Botones gradientes-->
                        <div class="row m-t-25">
                            
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <!--<div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="chart1Total"></div>
                                            -->
                                            <?php
                                                
                                            ?>
                                            <div class="text">
                                                <h2><?php 
                                                        $queryCantidadHoy = mysqli_query($connection, "SELECT a.id
                                                        FROM hojaasistencia h
                                                        INNER JOIN asistencia a ON h.id = a.hojaAsistencia
                                                        WHERE h.fecha = '$fechaHoy'");

                                                        $cantidadHoy = mysqli_num_rows($queryCantidadHoy);
                                                        echo $cantidadHoy;
                                                    ?></h2>
                                                <h6>participantes <br/> este día</h6>
                                            </div>
                                        </div>
                                        <!-- <div class="overview-chart">
                                            <canvas id="widgetChart1"></canvas>
                                        </div> -->
                                    </div>
                                </div>
                            </div>

                            <!--<div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="text">
                                                <h2>0253</h2>
                                                <h6>participantes <br/> esta semana</h6>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart2"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>-->

                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <!--<div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>-->
                                            <div class="text">
                                                <h2><?php
                                                        $mesActual = getCurrentMonthNumber();
                                                        $queryCantidadMes = mysqli_query($connection, "SELECT a.id
                                                        FROM hojaasistencia h
                                                        INNER JOIN asistencia a ON h.id = a.hojaAsistencia
                                                        WHERE month(h.fecha) = '$mesActual'");

                                                        $cantidadMes = mysqli_num_rows($queryCantidadMes);
                                                        echo $cantidadMes;
                                                    ?></h2>
                                                <h6>participantes <br/> este mes</h6>
                                            </div>
                                        </div>
                                        <!-- <div class="overview-chart">
                                            <canvas id="widgetChart3"></canvas>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            
                            <!--
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            
                                            <div class="text">
                                                <h2>0000</h2>
                                                <h6>dato <br/> 4</h6>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart4"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            -->

                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <!--<div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>-->
                                            <div class="text">
                                            <h2><?php
                                                    $yearActual = getCurrentYear();
                                                    $queryCantidadYear = mysqli_query($connection, "SELECT a.id
                                                    FROM hojaasistencia h
                                                    INNER JOIN asistencia a ON h.id = a.hojaAsistencia
                                                    WHERE year(h.fecha) = '$yearActual'");

                                                    $cantidadYear = mysqli_num_rows($queryCantidadYear);
                                                    echo $cantidadYear;
                                                ?></h2>
                                                <h6>participantes <br/> este año</h6>
                                            </div>
                                        </div>
                                        <!-- <div class="overview-chart">
                                            <canvas id="widgetChart4"></canvas>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <!--Chart 1-->
                        <div class="container-fluid">

                            <h2 class="title-2">Asistencia De Hoy</h2>
                            <h2 class="title-7"><?php echo getCurrentDay() ?> de <?php echo getCurrentMonth(); ?> </h2>
                                                
                            <div class="row m-t-25"></div>
                                <div class="table-responsive table--no-card m-b-30">
                                    <!--tabla blanca-->
                                    <table class="table table-borderless table-striped table-earning">
                                <thead>
                                    <tr>
                                        <th class="text-left">Nombre</th>
                                        <th class="text-left">Edad</th>
                                        <th class="text-left">Hora Entrada</th>
                                        <th class="text-left">Proposito</th>
                                        <th class="text-left">Hora Salida</th>
                                    </tr>
                                </thead>

                                <tbody>

                                <?php   
                                    
                                    
                                    //Buscar en la hoja de Asistencia si esta la fecha de hoy.
                                    $query2 = mysqli_query($connection, "SELECT * FROM `hojaasistencia` WHERE fecha = '$fechaHoy'");
                                    $result2 = mysqli_fetch_Array($query2);

                                    if($result2 > 0)
                                    {
                                        
                                        $query = mysqli_query($connection, "SELECT a.participanteID, p.nombre, p.apellidos, a.edad, a.horaDeEntrada, a.horaDeSalida, x.proposito, a.id
                                                                            FROM hojaasistencia h
                                                                            INNER JOIN asistencia a ON h.id = a.hojaAsistencia
                                                                            INNER JOIN participantes p ON a.participanteID = p.participanteID
                                                                            INNER JOIN propositos x ON a.proposito = x.id
                                                                            WHERE h.fecha = '$fechaHoy'");
                                    
                                        $result = mysqli_num_rows($query);
                                        if($result > 0){
                                            while($asistencia = mysqli_fetch_array($query)){
                                ?>			
                                            <tr>
                                                <td><?php echo $asistencia['nombre']." ".$asistencia['apellidos']?></td>
                                                <td><?php echo $asistencia['edad']?></td>
                                                <td><?php echo convert24to12($asistencia['horaDeEntrada'])?></td>
                                                <td><?php echo $asistencia['proposito']?></td>
                                                <td><?php
                                                        if($asistencia['horaDeSalida']=='00:00:00')
                                                        {
                                                            ?> 
                                                                <form action="someterSalida.php?asistenciaID=<?php echo $asistencia['id'] ?>" method="post">
                                                                        <input type="submit" name="submit" value="Someter Salida" class="au-btn au-btn--block au-btn--green" />
                                                                </form>
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            echo convert24to12($asistencia['horaDeSalida']);
                                                        }
                                                    ?></td>
                                            </tr>
                                    <?php
                                            }
                                        }
                                    }
                                ?>
                                </tbody>
                            </table>
                                </div>
                            <!--<div class="col-lg-3">-->
                        </div>

                       
                                </div>
                            <!--<div class="col-lg-3">-->
                        </div>
                        
                        <div class="row">
                            
                            <div class="col-lg-6">
                                <div class="au-card recent-report">
                                    <div class="au-card-inner">
                                        <h3 class="title-2">Reportes Recientes</h3>
                                        <div class="chart-info">
                                            <div class="chart-info__left">
                                                <div class="chart-note">
                                                    <span class="dot dot--blue"></span>
                                                    <span>products</span>
                                                </div>
                                                <div class="chart-note mr-0">
                                                    <span class="dot dot--green"></span>
                                                    <span>services</span>
                                                </div>
                                            </div>
                                            <div class="chart-info__right">
                                                <div class="chart-statis">
                                                    <span class="index incre">
                                                        <i class="zmdi zmdi-long-arrow-up"></i>25%</span>
                                                    <span class="label">products</span>
                                                </div>
                                                <div class="chart-statis mr-0">
                                                    <span class="index decre">
                                                        <i class="zmdi zmdi-long-arrow-down"></i>10%</span>
                                                    <span class="label">services</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="recent-report__chart">
                                            <canvas id="recent-rep-chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="au-card chart-percent-card">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 tm-b-5">char by percent</h3>
                                        <div class="row no-gutters">
                                            <div class="col-xl-6">
                                                <div class="chart-note-wrap">
                                                    <div class="chart-note mr-0 d-block">
                                                        <span class="dot dot--blue"></span>
                                                        <span>products</span>
                                                    </div>
                                                    <div class="chart-note mr-0 d-block">
                                                        <span class="dot dot--red"></span>
                                                        <span>services</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="percent-chart">
                                                    <canvas id="percent-chart"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                        </div>
                        <div class="row">
                            <div class="col-lg-9">
                            </div>
                            
                            <div class="col-lg-3">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
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
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
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
