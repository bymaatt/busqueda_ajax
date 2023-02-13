<?php


function connect (){
    $user="root";
    $pass= "";
    $server="localhost";
    $bd= "db";
    $con= mysqli_connect($user,$pass,$server, $bd) or die("No hay conexion a la base de datos");
    

    
    return $con;
}

/* $conn = new mysqli("127.0.0.1", "root", "date_base"); */

/* if ($conn-> connect_error){
    die ('Error de conexión' . $conn->connect_error);
} */