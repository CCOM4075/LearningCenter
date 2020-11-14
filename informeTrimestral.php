<?php
    include './includes/connection.php';
    $validacion = false;
 
    if(!empty($_POST))
	{
        $trimestre = $_POST['trimestre'];
        $year = $_POST['year'];;


        if((!empty($trimestre))&&(!empty($year)))
            header("location: informeTrimestral.php?trimestre=$trimestre&year=$year");
        else
            header("location: informeTrimestral.php");
    }

    if(!empty($_REQUEST['trimestre']) && !empty($_REQUEST['year']))
    {
        $trimestre = $_REQUEST['trimestre'];
        $year = $_REQUEST['year'];
        include_once './functions/trimestre.php';
        $meses= getTrimestre($trimestre);

        $queryTrimestral = mysqli_query($connection, "SELECT DISTINCT a.id, a.participanteID, p.nombre, p.apellidos, p.edificio, p.unidad, x.proposito, a.edad, p.genero, h.fecha 
                                                            FROM asistencia a 
                                                            INNER JOIN participantes p ON p.participanteID = a.participanteID
                                                            INNER JOIN propositos x ON x.id = a.proposito
                                                            INNER JOIN hojaasistencia h ON h.id = a.hojaAsistencia
                                                            WHERE h.fiscalYear = $year AND (month(h.fecha) = $meses[0] OR month(h.fecha) = $meses[1] OR month(h.fecha) = $meses[2])");
 
        $trimestral = mysqli_num_rows($queryTrimestral);
        if($trimestral>0)
            $validacion = true;
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
    <title>Actividades | Lista De Actividades</title>
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
                
                <div class="table-data__tool ">
                    <div class="table-data__tool-left">
                        <h3 class="title-1">Informe Trimestral</h3>
                    </div>

                    <div class="table-data__tool-right">
                        <form action="" method="post">
                            <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                        <!--rs-select2--light rs-select2--sm-->
                                <select class="js-select2" name="year" required>
                                    <option value="0">Año</option>
                                    <?php
                                        
                                        $runFiscalYear = mysqli_query($connection,"SELECT * FROM fiscalYear");

                                        while($fiscalYear = mysqli_fetch_array($runFiscalYear))
                                        {
                                            $fYear = $fiscalYear['year'];
                                            $id = $fiscalYear['id'];
                                            echo "<option value='$id'> $fYear</option>";
                                        }
                                    ?>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                            <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                        <!--rs-select2--light rs-select2--sm-->
                                <select class="js-select2" name="trimestre">
                                    <option value="0">Trimestre</option>
                                    <option value="1">Jul-Sept</option>
                                    <option value="2">Oct-Dic</option>
                                    <option value="3">Ene-Mar</option>
                                    <option value="4">Abr-Jun</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                        <button type="submit" class="btn btn-primary btn-sm">Ingresar</button>
                    </div>   
                        </form> 
                </div>



                    <div class="container-fluid">
                        <div class="row">
                        <div class="col-lg-10"></div>
                                <div class="table-responsive table--no-card m-b-30">
                                    <!--tabla blanca-->
                                    <table class="table table-borderless table-striped table-earning2">
                                        <thead>
                                            <tr>
                                                <th class="text-left">Nombre</th>
                                                <th class="text-left">Edif</th>
                                                <th class="text-left">Apto</th>
                                                <th class="text-left">Fecha De Servicio</th>
                                                <th class="text-left">0-4</th>
                                                <th class="text-left">5-8</th>
                                                <th class="text-left">9-13</th>
                                                <th class="text-left">14-17</th>
                                                <th class="text-left">18-61</th>
                                                <th class="text-left">62+</th>
                                                <th class="text-left">F</th>
                                                <th class="text-left">M</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        <?php
                                            $participantesID = array();
                                            

                                            if($validacion == true)
                                            {
                                                while($trimestral = mysqli_fetch_array($queryTrimestral))
                                                {
                                                    if(!(in_array($trimestral['participanteID'], $participantesID)))
                                                    {
                                                        array_push($participantesID, $trimestral['participanteID']);
                                                        ?>
                                                         <tr>
                                                            <td class="text-left"><?php echo $trimestral['nombre']." ".$trimestral['apellidos']?></td>
                                                            <td class="text-left"><?php echo $trimestral['edificio'] ?></td>
                                                            <td class="text-left"><?php echo $trimestral['unidad']?></td>
                                                            <td class="text-left"><?php echo $trimestral['fecha']?></td>
                                                            <td class="text-center"><?php
                                                                                        if($trimestral['edad']>=0 && $trimestral['edad']<=4)
                                                                                            echo "x";
                                                                                    ?></td><!--0-4-->
                                                            <td class="text-center"><?php
                                                                                        if($trimestral['edad']>=5 && $trimestral['edad']<=8)
                                                                                            echo "x";
                                                                                    ?></td><!--5-8-->
                                                            <td class="text-center"><?php
                                                                                        if($trimestral['edad']>=9 && $trimestral['edad']<=13)
                                                                                            echo "x";
                                                                                    ?></td><!--9-13-->
                                                            <td class="text-center"><?php
                                                                                        if($trimestral['edad']>=14 && $trimestral['edad']<=17)
                                                                                            echo "x";
                                                                                    ?></td><!--14-17-->
                                                            <td class="text-center"><?php
                                                                                        if($trimestral['edad']>=18 && $trimestral['edad']<=61)
                                                                                            echo "x";
                                                                                    ?></td><!--18-61-->
                                                            <td class="text-center"><?php
                                                                                        if($trimestral['edad']>61)
                                                                                            echo "x";
                                                                                    ?></td><!--62+-->
                                                            <td class="text-center"><?php if($trimestral['genero']=='F')echo "x";?></td><!--F-->
                                                            <td class="text-center"><?php if($trimestral['genero']=='M')echo "x";?></td><!--M-->
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                            }
                                        ?> 
                                           
                                                                                                                    
                                        </tbody>
                                    </table>
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