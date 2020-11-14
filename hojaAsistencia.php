<?php
    include './includes/connection.php';
 
    if(!empty($_POST))
	{
        //$fechaAsistencia = strtotime($_POST['fechaAsistencia']);
        $fechaAsistencia = $_POST['fechaAsistencia'];

        if($fechaAsistencia)
            //echo "Hola";
            header("location: hojaAsistencia.php?fecha=$fechaAsistencia");
        else
            //echo "Mundo";
            header("location: hojaAsistencia.php");
    }

    if(!empty($_REQUEST['fecha']))
    {
        $fechaString = $_REQUEST['fecha'];
        $fechaFormato = new DateTime($fechaString);

        $query = mysqli_query($connection, "SELECT a.participanteID, p.nombre, p.apellidos, a.edad, a.horaDeEntrada, a.horaDeSalida, x.proposito
                                            FROM hojaasistencia h
                                            INNER JOIN asistencia a ON h.id = a.hojaAsistencia
                                            INNER JOIN participantes p ON a.participanteID = p.participanteID
                                            INNER JOIN propositos x ON a.proposito = x.id
                                            WHERE h.fecha = '$fechaString'");                            
        $result = mysqli_num_rows($query);
        if($result == 0)
        header("location: hojaAsistencia.php");
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
    <title>Hoja De Asistencia</title>
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
                
                <div class="table-data__tool">
                    <div class="table-data__tool-left">
                        <h3 class="title-1">Asistencia</h3>
                        <h2 class="title-7"><?php 
                                                if(!empty($_REQUEST['fecha']))
                                                {
                                                    include_once './functions/mes.php';
                                                    $numeroDia = $fechaFormato->format('d');
                                                    $numeroMes = $fechaFormato->format('m');
                                                    $year = $fechaFormato->format('yy');
                                                    $mes = getMes($numeroMes);
                                                    echo $numeroDia." de ".$mes." de ".$year;
                                                    
                                                }
                                            ?></h2>
                    </div>


                    <div class="table-data__tool-right">
                        <form action="" method="post">
                            <div class="row form-group">
                                <div class="col-12 col-md-8">
                                    <input type="date" id="fechaAsistencia" name="fechaAsistencia" class="form-control" href=>
                                </div>
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> Someter
                                    </button>
                            </div>
                        </form> 
                    </div>


                </div>
                <?php if(!empty($_REQUEST['fecha'])){echo $fechaString;}?>
                <div class="container-fluid">

                
                    <div class="row">
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
                                if(empty($_REQUEST['fecha'])||$result==0)
                                {
                                ?>
                                    <tr>
                                        <td>N/A</td>
                                        <td>N/A</td>
                                        <td>N/A</td>
                                        <td>N/A</td>
                                        <td>N/A</td>
                                    </tr>
                                <?php
                                }else{
                                    if($result > 0){
                                        while($asistencia = mysqli_fetch_array($query)){
                                ?>			
                                        <tr>
                                            <td><?php echo $asistencia['nombre']." ".$asistencia['apellidos']?></td>
                                            <td><?php echo $asistencia['edad']?></td>
                                            <td><?php echo $asistencia['horaDeEntrada']?></td>
                                            <td><?php echo $asistencia['proposito']?></td>
                                            <td><?php echo $asistencia['horaDeSalida']?></td>
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
