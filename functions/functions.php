<?php
    function getMes($mesID)
    {
        if($mesID==1)
            return "Enero";

        else if($mesID==2)
            return "Febrero";

        else if($mesID==3)
            return "Marzo";

        else if($mesID==4)
            return "Abril";

        else if($mesID==5)
            return "Mayo";

        else if($mesID==6)
            return "Junio";
            
        else if($mesID==7)
            return "Julio";

        else if($mesID==8)
            return "Agosto";

        else if($mesID==9)
            return "Septiembre";
            
        else if($mesID==10)
            return "Octubre";

        else if($mesID==11)
            return "Noviembre";

        else if($mesID==12)
            return "Diciembre";
        
        else
            return "";
    }

    function getHojaDeAsistencia($fecha)
    {
        include './includes/connection.php';

        $queryBuscarHojaDeAsistencia = mysqli_query($connection, "SELECT id FROM hojaasistencia WHERE fecha = '$fecha'");

        $result = mysqli_num_rows($queryBuscarHojaDeAsistencia);

        if($result > 0)
        {
            $idHoja = mysqli_fetch_array($queryBuscarHojaDeAsistencia);
            return $idHoja['id'];
        }
        else
            return 0;

            
    }

    function createHojaAsistencia()
    {
        include './includes/connection.php';
        $fechaHoy = getTodayDate();
        $fiscalYear = 1;

        $hojaAsistencia = getHojaDeAsistencia($fechaHoy);

        if($hojaAsistencia == 0)
        {
            $ultimaHojaAsistencia = getUltimaHojaAsistencia();
            $queryHoraSalidaDefault = mysqli_query($connection, "UPDATE asistencia SET horaDeSalida = '19:00:00' WHERE hojaAsistencia = '$ultimaHojaAsistencia'");
            
            $query_insert = mysqli_query($connection, "INSERT INTO hojaasistencia(fecha, fiscalYear) VALUES('$fechaHoy','$fiscalYear')");
        }
        else
        {

        }
    }

    function getUltimaHojaAsistencia()
    {
        include './includes/connection.php';
        $query = mysqli_query($connection, "SELECT MAX(id) AS id FROM hojaasistencia");
        $idHoja = mysqli_fetch_array($query);
        return $idHoja['id'];
    }

    function getTodayDate()
    {
        $gmtTimezone = new DateTimeZone('GMT-4');//Optener el time zone de P.R.
        $hoy = new DateTime('now',$gmtTimezone);  //Obtener la fecha usando el timezone
        $fechaHoy = $hoy->format('Y-m-d'); //cambiar la fecha en string
        return $fechaHoy;
    }

    function getCurrentMonth()
    {
        $numeroMes = getCurrentMonthNumber();
        $mesName = getMes($numeroMes);
        return $mesName;
    }

    function getCurrentMonthNumber()
    {
        $gmtTimezone = new DateTimeZone('GMT-4');//Optener el time zone de P.R.
        $hoy = new DateTime('now',$gmtTimezone);  //Obtener la fecha usando el timezone
        $mesNumber = $hoy->format('m');
        return $mesNumber;
    }

    function getCurrentDay()
    {
        $gmtTimezone = new DateTimeZone('GMT-4');//Optener el time zone de P.R.
        $hoy = new DateTime('now',$gmtTimezone);  //Obtener la fecha usando el timezone
        $numeroDia = $hoy->format('d');
        return $numeroDia;
    }
    
    function getCurrentYear()
    {
        $gmtTimezone = new DateTimeZone('GMT-4');//Optener el time zone de P.R.
        $hoy = new DateTime('now',$gmtTimezone);  //Obtener la fecha usando el timezone
        $year = $hoy->format('yy');
        return $year;
    }

    function getCurrentHour()
    {
        $gmtTimezone = new DateTimeZone('GMT-4');//Optener el time zone de P.R.

        $hoy = new DateTime('now',$gmtTimezone);  //Obtener la fecha usando el timezone
        $horaActual = $hoy->format('H:i:s');

        return $horaActual;
    }

    function convert24to12($hora)
    {
        $hora = date("g:i a", strtotime($hora));
        return $hora;
    }

    function cantidadParticipantesDia()
    {
        include './includes/connection.php';
        $fechaHoy = getTodayDate();
        $queryCantidadHoy = mysqli_query($connection, "SELECT a.id
        FROM hojaasistencia h
        INNER JOIN asistencia a ON h.id = a.hojaAsistencia
        WHERE h.fecha = '$fechaHoy'");

        $cantidadHoy = mysqli_num_rows($queryCantidadHoy);

        return $cantidadHoy;

    }

    function cantidadParticipantesMes()
    {
        include './includes/connection.php';

        $mesActual = getCurrentMonthNumber();
        $queryCantidadMes = mysqli_query($connection, "SELECT a.id
        FROM hojaasistencia h
        INNER JOIN asistencia a ON h.id = a.hojaAsistencia
        WHERE month(h.fecha) = '$mesActual'");

        $cantidadMes = mysqli_num_rows($queryCantidadMes);

        return $cantidadMes;
    }

    function cantidadParticipantesYear()
    {
        include './includes/connection.php';

        $yearActual = getCurrentYear();
        $queryCantidadYear = mysqli_query($connection, "SELECT a.id
        FROM hojaasistencia h
        INNER JOIN asistencia a ON h.id = a.hojaAsistencia
        WHERE year(h.fecha) = '$yearActual'");

        $cantidadYear = mysqli_num_rows($queryCantidadYear);

        return $cantidadYear;
    }

    function cantidadParticipantesTrimestre()
    { 
        include './includes/connection.php';
        $year = 1;
        $meses= getTrimestreMeses(getTrimestre(getCurrentMonthNumber()));

        $queryTrimestral = mysqli_query($connection, "SELECT a.id
                                                            FROM asistencia a 
                                                            INNER JOIN participantes p ON p.participanteID = a.participanteID
                                                            INNER JOIN propositos x ON x.id = a.proposito
                                                            INNER JOIN hojaasistencia h ON h.id = a.hojaAsistencia
                                                            WHERE h.fiscalYear = $year AND (month(h.fecha) = $meses[0] OR month(h.fecha) = $meses[1] OR month(h.fecha) = $meses[2])");
 
        $participantesTrimestre = mysqli_num_rows($queryTrimestral);
        return $participantesTrimestre; 
    }

    function addZero($cantidad)
    {
        if($cantidad<10)
        {
            $cantidad = "00".$cantidad;
        }
        else if($cantidad >=10 && $cantidad<100)
        {
            $cantidad = "0".$cantidad;
        }
        return $cantidad;
    }

    function getTrimestreMeses($trimestreID)
    {
        if($trimestreID==1)
            return array('07','08','09');

        else if($trimestreID==2)
            return array('10','11','12');

        else if($trimestreID==3)
            return array('01','02','03');

        else if($trimestreID==4)
            return array('04','05','06');

        else
            return "";
    }

    function getTrimestre($mesID)
    {
        if($mesID==7 || $mesID==8 || $mesID==9)
            return 1;

        else if($mesID==10 || $mesID==11 || $mesID==12)
            return 2;
        
        else if($mesID==1 || $mesID==2 || $mesID==3)
            return 3;

        else if($mesID==4 || $mesID==5 || $mesID==6)
            return 4;

        else
            return "";
    }

  

    


?>

