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
?>
