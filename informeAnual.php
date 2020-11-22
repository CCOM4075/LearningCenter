<?php
    include './includes/connection.php';

    if(!empty($_POST))
	{
        $yearID = $_POST['fiscalYear'];
        if(!empty($yearID))
            header("location: informeAnual.php?fiscalYear=$yearID");
        else
            header("location: informeAnual.php");
    }

    if(!empty($_REQUEST['fiscalYear']))
    {
        $fiscalYear = $_REQUEST['fiscalYear'];

        $meses = array (array(0,0,0,0),
        array(0,0,0,0),
        array(0,0,0,0),
        array(0,0,0,0),
        array(0,0,0,0),
        array(0,0,0,0),
        array(0,0,0,0),
        array(0,0,0,0),
        array(0,0,0,0),
        array(0,0,0,0), 
        array(0,0,0,0),
        array(0,0,0,0));
        $total = array(0,0,0,0);
        $queryEdades = mysqli_query($connection, "SELECT h.fecha, a.edad FROM hojaasistencia h
                            INNER JOIN asistencia a ON h.id = a.hojaAsistencia
                            WHERE h.fiscalYear = '$fiscalYear'");
        $edades = mysqli_num_rows($queryEdades);
        if($edades>0)
        {
            while($edades = mysqli_fetch_array($queryEdades))
            {
                $fecha = new DateTime($edades['fecha']);
                $mes = $fecha->format('m');

                if($edades['edad']>=0 && $edades['edad']<=12)
                {
                    $meses[$mes-1][0] += 1;
                    $meses[$mes-1][3] += 1;
                }
                else if($edades['edad']>=13 && $edades['edad']<=17)
                {
                    $meses[$mes-1][1] += 1;
                    $meses[$mes-1][3] += 1;

                }
                else if($edades['edad']>=18)
                {
                    $meses[$mes-1][2] += 1;
                    $meses[$mes-1][3] += 1;

                }
            }
        }
        for($i=0; $i<4; $i++)
        {
            for($j=0; $j<12; $j++)
            {
                $total[$i] += $meses[$j][$i];
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
    <title>Informes | Informe Anual</title>
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
                        <h3 class="title-1">Informe Anual</h3>
                    </div>
                    <div class="table-data__tool-right">
                    <form action="" method="post">    
                        <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                    <!--rs-select2--light rs-select2--sm-->
                            <select class="js-select2" id="fiscalYear" name="fiscalYear" required> 
                                <option value="">Año Fiscal</option>
                                <?php
                                    $runFiscalYear = mysqli_query($connection,"SELECT * FROM fiscalyear");

                                    while($fiscalYear = mysqli_fetch_array($runFiscalYear))
                                    {
                                        $year = $fiscalYear['year'];
                                        $id = $fiscalYear['id'];
                                        echo "<option value=$id> $year</option>";
                                    }
                                ?>
                                    }
                                        ?>
                            </select>
                                <div class="dropDownSelect2"></div>
                        </div>
                        <button type="submit" class="btn btn-primary">Ingresar</button>
                    </div>   
                    </form> 
                </div>

                <?php
                    
                     
                ?>
                    <div class="container-fluid">
                        <div class="row">
                        <div class="col-lg-10"></div>
                                <div class="table-responsive table--no-card m-b-30">
                                    <!--tabla blanca-->
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th class="text-left">Mes</th>
                                                <th class="text-left">0-12</th>
                                                <th class="text-left">13-17</th>
                                                <th class="text-left">18+</th>
                                                <th class="text-left">Total</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php
                                                $i = 6 ;
                                                $exit = false;
                                                while($exit!=true)
                                                {
                                            ?>
                                            <tr>
                                                <th class="text-left">
                                                <?php
                                                    include_once './functions/mes.php';
                                                    $mes = getMes($i+1);
                                                    echo "$mes";
                                                ?>
                                                </th>
                                                <td class="text-left"><?php if(!empty($_REQUEST['fiscalYear']))
                                                                                echo $meses[$i][0] ?></td>
                                                <td class="text-left"><?php if(!empty($_REQUEST['fiscalYear']))
                                                                                echo $meses[$i][1] ?></td>
                                                <td class="text-left"><?php if(!empty($_REQUEST['fiscalYear']))
                                                                                echo $meses[$i][2] ?></td>
                                                <td class="text-left"><?php if(!empty($_REQUEST['fiscalYear']))
                                                                                echo $meses[$i][3] ?></td>
                                            </tr>

                                            <?php 
                                                    $i++; 
                                                    if($i==12)
                                                        $i=0;
                                                 
                                                    if($i==6)
                                                        $exit = true; 
                                                }
                                            ?> 
                                        </tbody>

                                        <tbody>
                                            <tr>
                                                <th class="text-left">Total</th>
                                                <?php
                                                    for($i=0; $i<4; $i++)
                                                    {
                                                ?>
                                                        <th class="text-left"><?php echo $total[$i] ?></th>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                        </tbody>

                                    </table>
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
