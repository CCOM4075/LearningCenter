<?php
    session_start();
    if(empty($_REQUEST['asistenciaID']))
    {
        header("location: index.php");
    }else{
        include './includes/connection.php';
        $asistenciaID = $_REQUEST['asistenciaID'];

        $query = mysqli_query($connection,"SELECT horaDeSalida FROM asistencia WHERE id = '$asistenciaID'");
        $horaSalida = mysqli_fetch_array($query);

        if($horaSalida['horaDeSalida'] == '00:00:00')
        {
           $horaActual = getCurrentHour();
            $queryHoraSalida = mysqli_query($connection,"UPDATE asistencia SET horaDeSalida = '$horaActual' WHERE id = '$asistenciaID'");
            header("location: index.php"); 
        }
        else
            header("location: index.php"); 
        



    }

?>