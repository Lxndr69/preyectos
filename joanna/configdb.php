<?php

$nombre_server="localhost";
$user_db="root";
$pwd_db="";
$dbname="outlet";

// Creamos la conexión
$conexion = mysqli_connect($nombre_server, $user_db, $pwd_db, $dbname);

if(!$conexion){
    die("Problemas al conectar a la base, intente nuevamente");
}
// mysqli_set_charset($conexion,"utf8mb4");
?>