<?php
require_once "clases/Conexion.php";
$objCon = new Conexion();
$conexion = $objCon->conectar();
$sql = "SELECT id_usuario, usuario,nombre FROM usuario_cumbre ORDER BY nombre DESC; ";
$result = mysqli_query($conexion, $sql);
?>

<!DOCTYPE html>
<html>

<head>
  <title>Contactos agenda</title>
  <link rel="icon" type="image/jpg" href="public/img/favicon.webp">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,
     initial-scale=1, shrink-to-fit=no">
  <?php require_once "dependencias.php"; ?>
</head>

<body>
  <?php require_once "menu.php"; ?>
  <div class="container mt-4">
    <h1 class="mt-4 r">Administrador</h1>
    <div class="card mb-4">
      <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarActividad">
						Crear Actividad  <span><i class="fas fa-briefcase"></i></span>
				</button> -->
    </div>

    <div class="col-sm-12">
      <div class="card">
        <div class="card-header text-center">
          <i class="fas fa-users"></i> Usuarios
        </div>
        <div class="card-body">
          <table class="table table-hover table-condensed">
            <thead class="totales">
              <tr>
                <th>Usuario</th>
                <th>Nombre Usuario</th>
                <th>Asignar</th>
              </tr>
            </thead>
            <tbody class="resumen">

              <?php
              while ($mostrar = mysqli_fetch_array($result)) {
                $idCategoria = $mostrar['id_usuario'];
              ?>
                <tr>
                  <td><?php echo $mostrar['usuario'] ?></td>
                  <td><?php echo $mostrar['nombre'] ?></td>

                  <td>
                    <?php echo "<a  class=nav-link href='asignar_usuario.php?no=" . $mostrar['id_usuario'] . "'><font color=black> "; ?>

                    <span class=" btn btn_ver btn-sm"><i class="fas fa-plus-circle"></i></span>
                    </span>
                  </td>

                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
  </div>

</html>