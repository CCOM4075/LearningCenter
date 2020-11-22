<?php
    function getEdad($fechaNacimiento)
    {
        $naci = $fechaNacimiento;
        $fecha_nacimiento = new DateTime($naci) ;
        $hoy = new DateTime();
        $edad = $hoy->diff($fecha_nacimiento);  
        return $edad->y;
    }

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
        $fiscalYear = getCurrentFiscalYear();

        $ultimaHojaAsistencia = getUltimaHojaAsistencia();
        $queryHoraSalidaDefault = mysqli_query($connection, "UPDATE asistencia SET horaDeSalida = '19:00:00' WHERE hojaAsistencia = '$ultimaHojaAsistencia' AND horaDeSalida = '00:00:00'");

        $query_insert = mysqli_query($connection, "INSERT INTO hojaasistencia(fecha, fiscalYear) VALUES('$fechaHoy','$fiscalYear')");
        
        
    }

    function todayHojaAsistenciaExist()
    {
        $fechaHoy = getTodayDate();
        $hojaAsistencia = getHojaDeAsistencia($fechaHoy);

        if($hojaAsistencia > 0){
            return true;
        }
        else{
            return false;
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

    function getCurrentHourForInsert()
    {
        $gmtTimezone = new DateTimeZone('GMT-4');//Optener el time zone de P.R.

        $hoy = new DateTime('now',$gmtTimezone);  //Obtener la fecha usando el timezone
        $horaActual = $hoy->format('His');

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
        $fiscalYear = getCurrentFiscalYear();
        $queryCantidadMes = mysqli_query($connection, "SELECT a.id
        FROM hojaasistencia h
        INNER JOIN asistencia a ON h.id = a.hojaAsistencia
        WHERE month(h.fecha) = '$mesActual' AND h.fiscalyear = '$fiscalYear'");

        $cantidadMes = mysqli_num_rows($queryCantidadMes);

        return $cantidadMes;
    }

    function cantidadParticipantesYear()
    {
        include './includes/connection.php';

        $fiscalYear = getCurrentFiscalYear();
        $queryCantidadYear = mysqli_query($connection, "SELECT a.id
        FROM hojaasistencia h
        INNER JOIN asistencia a ON h.id = a.hojaAsistencia
        WHERE h.fiscalYear = '$fiscalYear'");

        $cantidadYear = mysqli_num_rows($queryCantidadYear);

        return $cantidadYear;
    }

    function cantidadParticipantesTrimestre()
    { 
        include './includes/connection.php';
        $fiscalYear = getCurrentFiscalYear();
        $meses= getTrimestreMeses(getTrimestre(getCurrentMonthNumber()));

        $queryTrimestral = mysqli_query($connection, "SELECT a.id
                                                            FROM asistencia a 
                                                            INNER JOIN participantes p ON p.participanteID = a.participanteID
                                                            INNER JOIN propositos x ON x.id = a.proposito
                                                            INNER JOIN hojaasistencia h ON h.id = a.hojaAsistencia
                                                            WHERE h.fiscalYear = $fiscalYear AND (month(h.fecha) = $meses[0] OR month(h.fecha) = $meses[1] OR month(h.fecha) = $meses[2])");
 
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

    function getCurrentFiscalYear()
    {
        include './includes/connection.php';
        $year = getCurrentYear();
        $mes = getCurrentMonthNumber();
        $fiscalYear = '';
        
        if($mes == '07' || $mes == '08' || $mes == '09' || $mes == '10' || $mes == '11' || $mes == '12')
            $fiscalYear = $year."-".($year+1);

        else if($mes == '01' || $mes == '02' || $mes == '03' || $mes == '04' || $mes == '05' || $mes == '06')
            $fiscalYear = ($year-1)."-".$year;
        
        $query = mysqli_query($connection, "SELECT id FROM fiscalyear WHERE year = '$fiscalYear'");
        $fiscalYearID = mysqli_fetch_array($query);

       
        if($fiscalYearID>1)
        {
            $fiscalYearID = $fiscalYearID['id'];
        }
        else
        {
            //Funcion Para Crear un nuevo año fiscal
            $fiscalYear = $year."-".($year+1);
            $query = mysqli_query($connection, "INSERT INTO fiscalyear(year) VALUES ('$fiscalYear')");

            $query2 = mysqli_query($connection, "SELECT MAX(id) AS id FROM fiscalyear");
            $id = mysqli_fetch_array($query2);
            $fiscalYearID = $id['id'];
        }

        return $fiscalYearID;   
    }

    function getUserName($userID)
    {
        include './includes/connection.php';
        $query = mysqli_query($connection, "SELECT nombre, apellidos, rol FROM usuarios WHERE userid = '$userID'");
        $user = mysqli_fetch_array($query);

        if($user['rol'] == 1)
        {
            $nombre = $user['nombre']." ".$user['apellidos'];
        }
        else
        {
            $nombre = $user['nombre'];
        }

        return $nombre;
    }

    function getUserRole($userID)
    {
        include './includes/connection.php';
        $query = mysqli_query($connection, "SELECT rol FROM usuarios WHERE userid = '$userID'");
        $rol = mysqli_fetch_array($query);
        $rol = $rol['rol'];
        return $rol;
    }
    
    function getUserUsuario($userID)
    {
        include './includes/connection.php';
        $query = mysqli_query($connection, "SELECT usuario FROM usuarios WHERE userid = '$userID'");
        $usuario = mysqli_fetch_array($query);
        $usuario = $usuario['usuario'];
        return $usuario;
    }

    function setSessionVariable($id, $rol)
    {
        $userID = $_SESSION['id_usuario'];
        $userType = $_SESSION['rol_usuario'];
    }

?>

