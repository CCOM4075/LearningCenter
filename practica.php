<!DOCTYPE html>
<html>
<body>

<?php
session_start();     
    
     
include './includes/connection.php';
include './functions/functions.php';
    //echo todayHojaAsistenciaExist();
    //$hojaAsistencia = getUltimaHojaAsistencia();
    //echo $hojaAsistencia;
    //$query = mysqli_query($connection, "INSERT INTO asistencia(participanteID, proposito, horaDeEntrada, hojaAsistencia) values('10', '1', ', '$hojaAsistencia')");

    echo getCurrentFiscalYear();

    echo getUserName(2);
    echo getUserRole(2);
?> 

</body>
</html>
