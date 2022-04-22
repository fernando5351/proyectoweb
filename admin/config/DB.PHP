<?php
$host = "localhost";
$bd = "animes";
$usuario = "root";
$contrasena = "";
#conexion a base de dato
$opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

try {
    $conexion = new PDO("mysql: host=$host; dbname=$bd", $usuario, $contrasena, $opciones);
    
} catch (Exception $ex) {
    echo $ex->getMessage();
}

?>