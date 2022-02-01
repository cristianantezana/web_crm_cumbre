<?php
session_start();
require_once "clases/Conexion.php";
$con = new Conexion();
$conexion = $con->conectar();

$id = $_SESSION['id'];

$sql = "SELECT a.id, c.nombre,c.apellido,c.descripcion,c.id_contacto
	FROM asignado a 
	INNER JOIN contactos c on a.contacto_id = c.id_contacto
	WHERE a.usuario_id= $id ORDER BY a.id DESC";
$result = mysqli_query($conexion, $sql);
$mostrar = array();

while ($rows = mysqli_fetch_assoc($result)) {

  $mostrar[] = $rows;
}


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
    <div class="row">
      <div class="col-4">
        <div class="card mb-4">

        </div>
      </div>


    </div>


    <div class=" col-sm-12 center-block">
      <div class="card">

        <a href="procesos/excel_asignacion_contacto.php" class="btn btn-success" style=" background-color:#E6E6FA  ;color: black; font-weight: bold; "> EXPORTAR EXCEL <samp>
            <i class="fas fa-file-excel"></i></samp></a>




        </form>

        <div class="card-header text-center">
          <i class="fas fa-hand-point-right"></i>Contactos Asignados
        </div>
        <div class="card-body">
          <table class="table table-hover table-condensed" id="tablaac">
            <thead class="encabezado">
              <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Descripcion</th>
                <th>Eliminar</th>

              </tr>
            </thead>
            <tbody class="resumen">

              <?php
              foreach ($mostrar as $datos) {
                // $mostrar = $mostrar['id'];
              ?>
                <tr>

                  <td>
                    <?php echo "<a  class=nav-link href='actividades.php?no=" . $datos['id_contacto'] . "'><font color=black> "; ?>
                    <?php echo $datos['nombre'] ?></font> </a>
                  </td>
                  <td>
                    <?php echo "<a  class=nav-link href='actividades.php?no=" . $datos['id_contacto'] . "'><font color=black> "; ?>
                    <?php echo $datos['apellido'] ?></font> </a>
                  </td>
                  <td><?php echo $datos['descripcion'] ?></td>
                  <td>
                    <span class="btn " onclick="eliminarCategoria('<?php echo $datos['id'] ?>')">
                      <span class="far fa-trash-alt"></span>
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
  <!-- comienzo modal ver -->


</html>
<script>
  $(document).ready(function() {
    $('#tablaac').DataTable({
      language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
          "first": "Primero",
          "last": "Ultimo",
          "next": "Siguiente",
          "previous": "Anterior"
        }
      },

      "order": [
        [1, "desc"]
      ]

    });

  });

  function eliminarCategoria(idCategoria) {
    swal({
        title: "¿Esta seguro de eliminar este contacto asignado?",
        text: "Una vez eliminado no podra ser recuperado!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $.ajax({
            type: "POST",
            data: "idCategoria=" + idCategoria,
            url: "procesos/categorias/eliminar_asignacion.php",
            success: function(respuesta) {
              respuesta = respuesta.trim();
              if (respuesta == 1) {

                swal(":D", "Se elimino con exito!", "success");
                location.reload();
              } else {
                swal(":(", "No se pudo eliminar!", "error");
              }
            }
          });
        }
      });
  }
</script>