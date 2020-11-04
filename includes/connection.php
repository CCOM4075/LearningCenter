<?php
    $usuario = "root";
    $contrasena = "";
    $servidor = "localhost";
    $basededatos = "learning_center_flg";
    $connection = mysqli_connect($servidor, $usuario, "", $basededatos)
    or die ("No se ha podido conectar al servidor de Base de datos");	
?>