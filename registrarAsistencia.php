<!DOCTYPE html>

<?php
    include './includes/connection.php';

    if(!empty($_POST))
    {  
        $nombre = $_POST['nombre'];
		$proposito = $_POST['proposito'];
        
        $query = mysqli_query($connection, "INSERT INTO asistencia(participanteID, proposito)
		                                    values(10, '$proposito')");
    }
?>

<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Registro De Asistencia</title>

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
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">

                        <div class="login-logo">
                            <a href="#">
                                <img src="images/icon/LC_icon175x55.png" alt="CoolAdmin">
                            </a>
                        </div>

                        <div class="login-form">


                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nombre">Nombre</label>
                                    <input type="nombre" class="form-control" id="nombre" placeholder="Nombre Completo">
                                </div>

                                <div class="form-group col-md-6">
                                    
                                    <label>Propósito</label>

                                    <div class="rs-select2--dark rs-select2--md rs-select2--border">
                                        <select class= "js-select2" name="proposito" id="proposito" class="form-row">
                                            <option value="0">Propósito</option>
                                            <option value="1">Asignación</option>
                                            <option value="2">Computadora</option>
                                            <option value="3">Proyecto</option>
                                            <option value="4">Re-Exámen</option>
                                            <option value="5">Resumé</option>
                                            <option value="6">Tutorías</option>
                                            <option value="7">Internet</option>
                                            <option value="8">Copia</option>
                                            <option value="9">Actividad</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>

                                </div>

                                <!--<button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Iniciar Sección</button>-->
                              
                                <!-- <button class="au-btn au-btn--block au-btn--green" type="submit">
                                    <a>Someter</a>
                                </button>-->
                                <input type="submit" value="Create User" class ="au-btn au-btn--block au-btn--green">

                                

                                <!--
                                <div class="social-login-content">
                                    <div class="social-button">
                                        <button class="au-btn au-btn--block au-btn--blue m-b-20">sign in with facebook</button>
                                        <button class="au-btn au-btn--block au-btn--blue2">sign in with twitter</button>
                                    </div>
                                -->

                                </div>
                            </form>
                           
                        </div>
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