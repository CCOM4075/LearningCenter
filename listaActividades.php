<?php  
    session_start();
    include './includes/connection.php';
    include_once './functions/functions.php';
    verificarBibliotecario($_SESSION['rol_usuario']);
    
    $validacion = false;
    if(!empty($_POST))
	{
        $yearID = $_POST['fiscalYear'];
        if(!empty($yearID))
            header("location: listaActividades.php?fiscalYear=$yearID");
        else
            header("location: listaActividades.php");
    }

    if(!empty($_REQUEST['fiscalYear']))
    {
        $fiscalYear = $_REQUEST['fiscalYear'];
        $query = mysqli_query($connection, "SELECT fecha, nombre, participantes, actividadID FROM actividades WHERE fiscalYear = $fiscalYear ORDER BY fecha DESC");
        $result = mysqli_num_rows($query);
        if($result>0)
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
                
                <div class="table-data__tool">
                    <div class="table-data__tool-left">
                        <h3 class="title-5">Actividades</h3>
                    </div>
                    <div class="table-data__tool-right">
                    <form action="" method="post">    
                        <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                    <!--rs-select2--light rs-select2--sm-->
                            <select class="js-select2" id="fiscalYear" name="fiscalYear" required> 
                                <option value="">Año Fiscal </option>
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


                </div>
 
                    <div class="container-fluid">
                        <div class="row">
                        <div class="col-lg-10"></div>
                                <div class="table-responsive table--no-card m-b-30">
                                    <!--tabla blanca-->
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                            <th class="text-left">#</th>
                                                <th class="text-left">Fecha</th>
                                                <th class="text-left">Nombre</th>
                                                <th class="text-left">Cantidad de Participantes</th>
                                            </tr>
                                        </thead>
 
                                        <tbody>
                                            <?php 
                                                if($validacion == true)
                                                {
                                                    $i = 1;
                                                    while($actividad = mysqli_fetch_array($query))
                                                    {    
                                            ?>          
                                                        <tr>
                                                            <td><?php echo $i?></td>
                                                            <td><?php echo $actividad['fecha']?></td>
                                                            <td><a href="actividad.php?id=<?php echo $actividad['actividadID'];?>"><?php echo $actividad['nombre']?></a>
                                                            <td><?php echo $actividad['participantes']?></td>                                             
                                                        </tr>
                                                <?php
                                                        $i++;
                                                    }
                                                }
                                                ?>
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
 
