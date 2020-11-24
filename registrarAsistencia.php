<!DOCTYPE html>
 
<?php
    session_start();
    include './includes/connection.php';
    include './functions/functions.php';
    verificarUsuario($_SESSION['rol_usuario']);

    if(!empty($_POST))
    {  
        if(empty($_POST['nombre']) || empty($_POST['proposito']) )
        {
            $alert='<p class="msg_error">Todos los Campos son Obligatorios.</p>';
        }
        else
        {
            $nombre = $_POST['nombre'];

            $queryParticipanteID =  mysqli_query($connection, "SELECT participanteid FROM participantes WHERE CONCAT(nombre , ' ', apellidos) = '$nombre'");
            $resultIDParticipante = mysqli_num_rows($queryParticipanteID);
            
            if($resultIDParticipante==0)
            {
                $alert='<p class="msg_error">No se encontro al Participante.</p>';
            }
            else
            {
                $participanteID = mysqli_fetch_array($queryParticipanteID);
                $idParticipante = $participanteID['participanteid'];
                $proposito = $_POST['proposito'];
                
                $existeHojaAsistencia = todayHojaAsistenciaExist();

                if($existeHojaAsistencia == false)
                {
                    createHojaAsistencia();  
                }

                $hojaAsistencia = getUltimaHojaAsistencia();
                $queryParticipante =  mysqli_query($connection, "SELECT nombre, apellidos, genero, birthday, edificio, unidad FROM `participantes` WHERE participanteID = '$idParticipante'");
                $participante = mysqli_fetch_array($queryParticipante);
                $edad = getEdad($participante['birthday']);

                $queryValidacionAsistenciaHoy =  mysqli_query($connection, "SELECT id FROM asistencia WHERE participanteid = '$idParticipante' AND hojaAsistencia = '$hojaAsistencia'");
                $result = mysqli_num_rows($queryValidacionAsistenciaHoy);
                if($result>0)
                {
                    $alert='<p class="msg_error">Ya ha realizado asistencia hoy.</p>';
                }
                else
                {
                    $query = mysqli_query($connection, "INSERT INTO asistencia(participanteid, proposito, edad, horaDeEntrada, hojaAsistencia) values('$idParticipante', '$proposito', '$edad', NOW(), '$hojaAsistencia')");  
                    $alert='<p class="msg_error">Se ha Registrado la Asistencia.</p>';
                }
            }
        }
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
        <div class="page-content--bgoh">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">

                        <div class="login-logo">
                            <a href="#">
                                <img src="images/icon/LC_icon175x55.png" alt="CoolAdmin">
                            </a>
                        </div>

                        <div class="login-form">
                        <?php
                            if(!empty($_POST))
                            {
                        ?>
                                <div class="alert"><?php echo isset($alert) ? $alert : '' ?></div>
                        <?php } ?>

                        <form action="" method="post">
                            <div class="form-row">
                                
                                <div class="form-group col-md-6">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" id="busca" placeholder="Nombre Completo" name="nombre">
                                    </input>
                                </div>

                                <div class="form-group col-md-6">
                                    
                                    <label>Propósito</label>

                                    <div class="rs-select2--dark rs-select2--md rs-select2--border">
                                        <select class= "js-select2" name="proposito" id="proposito" class="form-row">
                                            <option value="0">Propósito</option>
                                            <?php
                                                $queryProposito = mysqli_query($connection, "SELECT * FROM propositos");
                                                while($propositos = mysqli_fetch_array($queryProposito))
                                                {
                                                    $propositoNombre = $propositos['proposito'];
                                                    $idProposito = $propositos['id'];
                                                    echo "<option value='$idProposito'> $propositoNombre</option>";
                                                }
                                            ?>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>

                                </div>
                                <button type="submit" class="au-btn au-btn--block au-btn--green">Someter Asistencia</button>
                                </div>
                            </form>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <p style="text-align:right;">
                <a href="signout.php">Salir</a>
            </p>
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