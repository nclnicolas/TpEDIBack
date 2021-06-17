<?php

    $mysql_host = 'localhost';  //Donde esta el host
    $mysql_usuario = 'root';    //nombre de usuario que por defecto es root
    $mysql_clave = '';      //contraseña que por defecto es root
    $mysql_BD = 'usuarios';     //nombre de nuestra base de datos

    $con = mysqli_connect($mysql_host , $mysql_usuario , $mysql_clave , $mysql_BD); //conexion

    if(mysqli_connect_error()){ //Si hubo un error en nuestra conexion
        echo "Error con la conexion ". mysqli_connect_error();
    }
    else{
        echo "Conectado";
    }
    





?>