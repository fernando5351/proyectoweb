<?php include("../template/cabecera.php"); ?>

<?php
$txtid = (isset($_POST['id'])) ? $_POST['id'] : "";
$txtnombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "";
$txtimg = (isset($_FILES['img']['name'])) ? $_FILES['img']['name'] : "";
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

#echo $txtid, "<br>";
#echo $txtnombre, "<br>";
#echo $txtimg, "<br>";
#echo $accion, "<br>";

include('../config/DB.PHP');
$opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

switch ($accion) {
    case "Agregar":
        $sentenciaSQL = $conexion->prepare("INSERT INTO animes (nombre, img) VALUES (:nombre, :img);");
        $
        $sentenciaSQL->bindParam(':nombre', $txtnombre, PDO::PARAM_STR);
        $sentenciaSQL->bindParam(':img', $txtimg, PDO::PARAM_STR);
        $sentenciaSQL->execute();
        break;
    case "Modificar":
        //echo "Presionado boton modificar";
        $sentenciaSQL = $conexion->prepare("update animes set nombre=:nombre where idanime=:id");
        $sentenciaSQL -> bindParam(':nombre', $txtnombre);
        $sentenciaSQL -> bindParam(':id', $txtid);
        $sentenciaSQL->execute();
        if ($txtimg != ''){
            $sentenciaSQL = $conexion->prepare("update animes set img=:img where idanime=:id");
            $sentenciaSQL -> bindParam(':img', $txtimg);
            $sentenciaSQL -> bindParam(':id', $txtid);
            $sentenciaSQL->execute();
        }
        break;
    case "Cancelar":
        echo "Presionado boton cancelar";
        break;
    case "Seleccionar":
        //echo "Presionado boton seleccionar";
        $sentenciaSQL = $conexion->prepare("select * from animes where idanime=:id");
        $sentenciaSQL -> bindParam(':id', $txtid);
        $sentenciaSQL->execute();
        $anime = $sentenciaSQL->fetch(PDO::FETCH_LAZY);
        $txtnombre =$anime['nombre'];
        $txtimg =$anime['img'];
        break;
    case "Borrar":
        //echo "Presionado boton borrar";
        $sentenciaSQL = $conexion->prepare("delete from animes where idanime=:id");
        $sentenciaSQL->bindParam(':id', $txtid);
        $sentenciaSQL->execute();
        break;
}

$sentenciaSQL = $conexion->prepare("select * from animes");
$sentenciaSQL->execute();
$listanimes = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="col-md-4">
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">
                Datos de animes
            </h2>
        </div>
        <div class="card-body">
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="id">ID</label>
                    <input type="text" class="form-control" value="<?php echo $txtid; ?>" name="id" id="id" placeholder="ID">
                </div>
                <div class="form-group">
                    <label for="nombre">NOMBRE</label>
                    <input type="text" class="form-control"  value="<?php echo $txtnombre; ?>" name="nombre" id="nombre" placeholder="NOMBRE">
                </div>
                <div class="form-group">
                    <label for="img">IMAGEN</label> <br>
                    <?php echo $txtimg; ?>
                    <input type="file" class="form-contro" name="img" id="img" placeholder="IMG">
                </div>
                <div class="btn-group" role="group" aria-label="">
                    <button type="submit" name="accion" value="Agregar" class="btn btn-success">Agregar</button>
                    <button type="submit" name="accion" value="Modificar" class="btn btn-warning">Modificar</button>
                    <button type="submit" name="accion" value="Cancelar" class="btn btn-info">Cancelar</button>
                </div>
            </form>
        </div>
    </div>

</div>
<div class="col-md-8">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($listanimes as $animes) {
            ?>
                <tr>
                    <td><?php echo $animes['idanime']; ?></td>
                    <td><?php echo $animes['nombre']; ?></td>
                    <td><?php echo $animes['img']; ?></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="id" value="<?php echo $animes['idanime']; ?>" class="btn btn-primary">
                            <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary">
                            <input type="submit" name="accion" value="Borrar" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
<?php
include("../template/pie.php");
?>