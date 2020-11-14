<?php
    function trimestre($trimestreID)
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
?>
