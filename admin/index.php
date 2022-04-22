<?php
  if ($_POST) {
    header('location:inicio.php');
  }
?>
<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<body class="p-3 mb-2 bg-secondary">

  <div class="container">
    <div class="row">
      <div class="col-md-4">
      </div>
      <div class="col-md-4">
        <br> <br> <br> <br> <br>
        <div class="card p-3 mb-2 bg-dark text-white">
          <form action="" method="POST">
            <div class="card-header">
              <h4 class="text-info text-center">Login</h4>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label>Usuario</label>
                <input type="text" class="form-control" name="usuario" aria-describedby="emailHelpId" placeholder="EjemploDeCorreo@gmail.com">
              </div>
              <div class="form-group">
                <label>Contraseña</label>
                <input type="password" class="form-control" name="contraseña" placeholder="Ej: contraseñasegura">
              </div>
              <div class="">
                <button type="submit" class="btn btn-primary">Iniciar sesion</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>

</html>