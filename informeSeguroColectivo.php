<?php
    include './includes/connection.php';			
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
    <title>Informes | Seguro Colectivo</title>
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
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/icon/LC_icon175x55.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">

                        
                        <li>
                            <a href="index.html">
                                <i class="fas fa-chart-bar"></i>Inicio</a>
                        </li>

                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Registro</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="form.html">Registro De Participante</a>
                                </li>
                                <li>
                                    <a href="form2.php">Registro De Administrador</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="informes.html">
                                <i class="fas fa-table"></i>Informe</a>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="fas fa-calendar-alt"></i>Calendario</a>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>
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
                
                <div class="table-data__tool">
                    <div class="table-data__tool-left">
                        <h3 class="title-1">Informe Seguro Colectivo</h3>
                    </div>
                    <div class="table-data__tool-right">
                        <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                    <!--rs-select2--light rs-select2--sm-->
                            <select class="js-select2" name="type">
                                <option selected="selected">Año</option>
                                <option value="">2019-2020</option>
                                <option value="">2020-2021</option>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>
                        <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                    <!--rs-select2--light rs-select2--sm-->
                            <select class="js-select2" name="type">
                                <option selected="selected">Mes</option>
                                <option value="">Julio</option>
                                <option value="">Agosto</option>
                                <option value="">Septiembre</option>
                                <option value="">Octubre</option>
                                <option value="">Noviembre</option>
                                <option value="">Diciembre</option>
                                <option value="">Enero</option>
                                <option value="">Febrero</option>
                                <option value="">Marzo</option>
                                <option value="">Abril</option>
                                <option value="">Mayo</option>
                                <option value="">Junio</option>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>
                    </div>
                </div>

                <!--tabla1-->

                    <div class="container-fluid">
                        <div class="row">
                        <div class="col-lg-10"></div>
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th class="text-center">0-12</th>
                                                <th class="text-center">13-17</th>
                                                <th class="text-center">18+</th>
                                                <th class="text-center">Total</th>
                                            </tr>
                                        </thead>
                                            <?php
                                                $contador = array(0,0,0,0);
                                                $queryEdades = mysqli_query($connection, "SELECT a.id, a.edad FROM hojaasistencia h
                                                                                    INNER JOIN asistencia a ON h.id = a.hojaAsistencia
                                                                                    WHERE month(h.fecha) = 10 AND h.fiscalYear = 1");
                                                $edades = mysqli_num_rows($queryEdades);
                                                if($edades>0){
                                                    while($edades = mysqli_fetch_array($queryEdades)){
                                                        if($edades['edad']>=0 && $edades['edad']<=12)
                                                        {
                                                            $contador[0] = $contador[0] + 1;
                                                            $contador[3] = $contador[3] + 1;
                                                        }
                                                        else if($edades['edad']>=13 && $edades['edad']<=17)
                                                        {
                                                            $contador[1] = $contador[1] + 1;
                                                            $contador[3] = $contador[3] + 1;
                                                        }
                                                        else if($edades['edad']>=18)
                                                        {
                                                            $contador[2] = $contador[2] + 1;
                                                            $contador[3] = $contador[3] + 1;
                                                        }
                                                    }
                                                }
                                            ?> 
                                        <tbody>
                                            <tr>
                                                <td class="text-center"><?php echo $contador[0] ?></td>
                                                    <td class="text-center"><?php echo $contador[1] ?></td>
                                                    <td class="text-center"><?php echo $contador[2] ?></td>
                                                    <td class="text-center"><?php echo $contador[3] ?>
                                                </td>
                                            </tr>
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
