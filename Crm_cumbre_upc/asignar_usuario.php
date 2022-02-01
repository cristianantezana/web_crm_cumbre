<?php

$consulta = ConsultarContacto($_GET['no']);

function ConsultarContacto($no_prod)
{
  require_once "clases/Conexion.php";
  $con = new Conexion();
  $conexion = $con->conectar();

  $sql = "SELECT nombre FROM usuario_cumbre WHERE id_usuario='" . $no_prod . "' ";
  $result = mysqli_query($conexion, $sql);

  $fila = $result->fetch_assoc();
  return [
    $fila['nombre'],
  ];
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
          <h3 class="mb-2 text-center"><?php echo $consulta[0] ?></h3>
        </div>
      </div>
      <div class="col-4">

        <div class="card mb-4">

          <button type="button" class="btn btn_agregar " data-toggle="modal" data-target="#modalAgregarActividad">
            ASIGNAR CONTACTO <span><i class="fas fa-plus-circle"></i></span>
          </button>
        </div>
      </div>

      <div class="col-4">

        <div class="card mb-4">
          <a href="procesos/excel_usuario_asignado.php?no=<?php echo $_GET['no'] ?>" class="btn btn_excel" >EXPORTAR EXCEL <samp>
              <i class="fas fa-file-excel"></i></samp></a>
        </div>
      </div>


    </div>

    <?php
    require_once "clases/Conexion.php";
    $objCon = new Conexion();
    $conexion = $objCon->conectar();

    $usuario = $_GET['no'];

    $sql = "SELECT a.id, c.nombre,c.apellido,c.descripcion,c.id_contacto
  FROM asignado a 
  INNER JOIN contactos c on a.contacto_id = c.id_contacto
  

  WHERE a.usuario_id= $usuario ORDER BY a.id DESC ";
    $result = mysqli_query($conexion, $sql);

    ?>
    <div class=" col-sm-12 center-block">
      <div class="card">
        <div class="card-header text-center">
          <i class="fas fa-hand-point-right"></i>Contactos Asignados
        </div>
        <div class="card-body">
          <table class="table table-hover table-condensed" id="tablaac2">
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
              while ($mostrar = mysqli_fetch_array($result)) {
                $idContacto = $mostrar['id'];
              ?>
                <tr>

                  <td>
                    <?php echo "<a  class=nav-link href='actividades.php?no=" . $mostrar['id_contacto'] . "'><font color=black> "; ?>
                    <?php echo $mostrar['nombre'] ?></font> </a>
                  </td>
                  <td>
                    <?php echo "<a  class=nav-link href='actividades.php?no=" . $mostrar['id_contacto'] . "'><font color=black> "; ?>
                    <?php echo $mostrar['apellido'] ?></font> </a>
                  </td>
                  <td><?php echo $mostrar['descripcion'] ?></td>
                  <td>
                    <span class="btn btn-lg" onclick="eliminarCategoria('<?php echo $mostrar['id'] ?>')">
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
  </div> -->
  <!-- comienzo modal ver -->
  <div id="dataModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">

          <h4 class="modal-title " style="color:white">Detalle Actividad</h4>
        </div>
        <div class="modal-body" id="employee_detail">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      $('#tablaac2').DataTable({
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
          [3, "desc"]
        ]

      });

    });
  </script>

  <script>
    $(document).ready(function() {

      $('.view_data').click(function() {
        var employee_id = $(this).attr("id");
        $.ajax({
          url: "vistas/actividades/detalle_Actividad.php",
          method: "post",
          data: {
            employee_id: employee_id
          },
          success: function(data) {
            $('#employee_detail').html(data);
            $('#dataModal').modal("show");
          }
        });
      });
    });
  </script>
  <!-- fin -->
  <?php
  $id = $_GET['no'];

  require_once "clases/Conexion.php";
  $con = new Conexion();
  $conexion = $con->conectar();

  $sql = "SELECT id_contacto, nombre,apellido,descripcion FROM contactos ORDER BY id_contacto DESC LIMIT 10";
  $resulta = mysqli_query($conexion, $sql);

  ?>

  <div class="modal fade" id="modalAgregarActividad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" style="color:white">Agregar Actividad</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-4 ">
            <input class="form-control mb-4" type="text" placeholder="Buscar" aria-label="Search" id="buscar" name="buscar" onkeyup="buscar_ahora($('#buscar').val());">
          </div>
          <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
            <thead>
              <input type="text" id="id_usuario" name="id_usuario" value="<?php
                                                                          echo $id;
                                                                          ?>" hidden>
              <tr>
                <th style="width:15px" class="text-center">Seleciona</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Descripcion</th>
              </tr>
            </thead>
            <tbody>
              <?php
              while ($dataRegistro = mysqli_fetch_assoc($resulta)) { ?>
                <tr id="id<?php echo $dataRegistro['id_contacto']; ?>">
                  <td class="text-center">

                    <input type="checkbox" name="ids[]" value="<?php echo $dataRegistro['id_contacto']; ?>" class="delete_checkbox">
                  </td>
                  <td><?php echo $dataRegistro['nombre']; ?></td>
                  <td><?php echo $dataRegistro['apellido']; ?></td>
                  <td><?php echo $dataRegistro['descripcion']; ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" id="btn_borrar">Guardar</button>
        </div>
      </div>
    </div>
  </div>
  <script src="public/js/Actividades.js"></script>
</body>

<script>
  $(document).ready(function() {

    $(".delete_checkbox").prop("checked", this.checked);

    $("#btn_borrar").click(function() {

      /**OPCION 1 */
      var id = $("#id_usuario").val();
      var ids_array = [];
      $("input:checkbox[class=delete_checkbox]:checked").each(function() {
        ids_array.push($(this).val());
      });
      if (ids_array.length > 0) {
        //console.log(ids_array);

        url = "Asignar_mysql.php";
        $.ajax({
          type: "POST",
          url: url,
          data: {
            ids_array: ids_array,
            id: id
          },
          success: function(data) {

            data = data.trim();

            swal(":D", "Se asigno con exito!", "success");
            location.reload();
            //Para recorrer todos los ids seleccionado, y desaparecerlos
            $.each(ids_array, function(indice, id) {
              // console.log('Indice es ' + indice + ' y id es: ' + id);
              var fila = $("#id" + id).remove(); //Oculto las filas eliminadas
              //console.log(fila);
            });
          }
        });
      }
    });
  });
</script>
<script type="text/javascript">
  function buscar_ahora(buscar) {
    var parametros = {
      "buscar": buscar
    };
    $.ajax({
      data: parametros,
      type: 'POST',
      url: 'buscador_asignacion.php',
      success: function(data) {
        document.getElementById("datatables-example").innerHTML = data;
      }
    });
  }
</script>

</html>
<script>
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