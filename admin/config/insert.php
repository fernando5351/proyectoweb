<?php
$txtid = (isset($_POST['id']))?$_POST['id']:"";
$txtnombre = (isset($_POST['nombre']))?$_POST['nombre']:"";
$txtimg = (isset($_FILES['img']['name']))?$_FILES['img']['name']:"";
$accion = (isset($_POST['accion']))?$_POST['accion']:"";

echo $txtid. "<br>";
echo $txtnombre. "<br>";
echo $txtimg. "<br>";
echo $accion. "<br>";

#include ("DB.php");
$host = "localhost";
$bd = "animes";
$usuario = "root";
$contrasena = "";
#conexion a base de dato
try {
    $conexion = new PDO("mysql: host=$host; dbname=$bd", $usuario, $contrasena);
    if ($conexion) {
        echo "conectado a sistema";
    }
} catch (Exception $ex) {
    echo $ex->getMessage();
}

switch($accion){
    case "Agregar":
        $conexion = $sentenciaSQL::singleton_conexion();
      $sentenciaSQL = $conexion -> prepare("INSERT INTO animes (nombre, img) VALUES ('fernando' , 'img.jpg');");
      $sentenciaSQL -> bindParam(':nombre',$txtnombre);
      $sentenciaSQL -> bindParam(':img',$txtimg);
      $sentenciaSQL -> execute();
      break;
      case "Modificar":
      echo "Presionado boton modificar";
      break;
      case "Cancelar":
      echo "Presionado boton cancelar";
      break;
   }

  #$sentenciaSQL = $conexion -> prepare("select  * from animes");
  #$sentenciaSQL -> execute();
  #$listanimes = $sentenciaSQL -> fetchAll(PDO::FETCH_ASSOC);
  ?>