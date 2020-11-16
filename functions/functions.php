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
            echo $idHoja['id'];
        }
        else
            echo "0";
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

    function convert24to12($hora)
    {
        echo "a";
    }


?>

