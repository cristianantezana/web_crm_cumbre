<?php
$consulta = ConsultarContacto($_GET['no']);
function ConsultarContacto($no_prod)
{
    require_once "clases/Conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();

    $sql = "SELECT c.id_contacto, c.nombre,
    c.apellido, pa.parentesco, c.colegio_instituto,
    c.telefono, tu.turno,ti.tipo, se.carrera_secundaria,
    c.telefono_padre,c.descripcion, ca.carrera,
    i.instancia, o.datos
    FROM contactos c 
    INNER JOIN carrera_interesada ca on c.carrera_interesada = ca.id_carrera
    INNER JOIN parentesco pa on c.parentesco = pa.id 
    INNER JOIN producto_secundario se on c.carrera_secundaria = se.id_secundario 
    INNER JOIN turno_llamada tu on c.turno_llamada = tu.id_llamada 
    INNER JOIN tipo_colegio ti on c.tipo_colegio = ti.id_colegio 
    INNER JOIN instancias i ON c.instancia = i.id_instancia 
    INNER JOIN origen_dato o ON c.origen_contacto = o.id_dato 
    WHERE c.id_contacto='" . $no_prod . "'  ";
    $result = mysqli_query($conexion, $sql);

    $fila = $result->fetch_assoc();
    return [
        $fila['id_contacto'],
        $fila['nombre'],
        $fila['apellido'],
        $fila['colegio_instituto'],
        $fila['telefono'],
        $fila['telefono_padre'],
        $fila['descripcion'],
        $fila['carrera'],
        $fila['instancia'],
        $fila['parentesco'],
        $fila['tipo'],
        $fila['carrera_secundaria'],
        $fila['turno'],
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
        <h1 class="mt-4 r">Actividades</h1>

        <div class="card mb-4">
            <button type="button" class="btn btn_agregar" data-toggle="modal" data-target="#modalAgregarActividad" >
                Crear Actividad <span><i class="fas fa-briefcase"></i></span>
            </button>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header text-center">
                        <i class="fas fa-table mr-1 "></i>Detalles del Contacto
                    </div>
                    <div class="card-body">
                        <div class="row gx-2">
                            <div class="col-6 mt-2">
                                <tr> <b>
                                        <td><label> Nombre: </label></td>
                                    </b>
                                    <td> <?php echo $consulta[1] ?></td>
                                </tr>
                            </div>
                            <div class="col- mt-2">
                                <tr> <b>
                                        <td><label> Apeliido: </label></td>
                                    </b>
                                    <td> <?php echo $consulta[2] ?></td>
                                </tr>
                            </div>
                        </div>
                        <div class="row gx-2">
                            <div class="col-6 mt-2">
                                <tr> <b>
                                        <td><label> Colegio: </label></td>
                                    </b>
                                    <td> <?php echo $consulta[3] ?></td>
                                </tr>
                            </div>
                            <div class="col- mt-2">
                                <tr> <b>
                                        <td><label> Telefono: </label></td>
                                    </b>
                                    <td> <?php echo $consulta[4] ?></td>
                                </tr>
                            </div>
                        </div>
                        <div class="row gx-2">
                            <div class="col-6 mt-2">
                                <tr> <b>
                                        <td><label> Telefono_padre:</label></td>
                                    </b>
                                    <td> <?php echo $consulta[5] ?></td>
                                </tr>
                            </div>
                            <div class="col- mt-2">
                                <tr> <b>
                                        <td><label> Descripcion: </label></td>
                                    </b>
                                    <td> <?php echo $consulta[6] ?></td>
                                </tr>
                            </div>
                        </div>
                        <div class="row gx-2">
                            <div class="col-6 mt-2">
                                <tr> <b>
                                        <td><label> Carrera Interesada: </label></td>
                                    </b>
                                    <td> <?php echo $consulta[7] ?></td>
                                </tr>
                            </div>
                            <div class="col- mt-2">
                                <tr> <b>
                                        <td><label> Instancia: </label></td>
                                    </b>
                                    <td> <?php echo $consulta[8] ?></td>
                                </tr>
                            </div>
                        </div>
                        <div class="row gx-2">
                            <div class="col-6 mt-2">
                                <tr> <b>
                                        <td><label> Parentesco: </label></td>
                                    </b>
                                    <td> <?php echo $consulta[9] ?></td>
                                </tr>
                            </div>
                            <div class="col- mt-2">
                                <tr> <b>
                                        <td><label> Tipo Colegio: </label></td>
                                    </b>
                                    <td> <?php echo $consulta[10] ?></td>
                                </tr>
                            </div>
                        </div>
                        <div class="row gx-2">
                            <div class="col-6 mt-2">
                                <tr> <b>
                                        <td><label>Segunda Carrera Interesada: </label></td>
                                    </b>
                                    <td> <?php echo $consulta[11] ?></td>
                                </tr>
                            </div>
                            <div class="col- mt-2">
                                <tr> <b>
                                        <td><label> Turno LLamada: </label></td>
                                    </b>
                                    <td> <?php echo $consulta[12] ?></td>
                                </tr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            require_once "clases/Conexion.php";
            $objCon = new Conexion();
            $conexion = $objCon->conectar();
            $usuario = $_GET['no'];
            $sql = "SELECT a.id, ac.actividad, a.descripcion, a.fecha FROM avtividades a INNER JOIN actividad_realizada ac on a.actividad = ac.id WHERE a.contacto_id= $usuario ORDER BY fecha DESC ";
            $result = mysqli_query($conexion, $sql);
            ?>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header text-center">
                        <i class="fas fa-hand-point-right"></i> Ultimas Actividades
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-condensed" id="tablaac">
                            <thead class="encabezado">
                                <tr>
                                    <th>Actividad</th>
                                    <th>Fecha</th>
                                    <th>Descripcion</th>
                                    <th>Ver</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                while ($mostrar = mysqli_fetch_array($result)) {
                                    $idContacto = $mostrar['id'];
                                ?>
                                    <tr>

                                        <td class="text-center"> <?php echo $mostrar['actividad'] ?></td>
                                        <td><?php echo $mostrar['fecha'] ?></td>
                                        <td><?php echo $mostrar['descripcion'] ?></td>
                                        <td>
                                            <input type="button" name="view" value="ver" id="<?php echo $idContacto ?>" class="btn btn_ver btn-xs view_data" />
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
                    <form id="frmAgregarActividad">
                        <select name="id_contactoo" id="id_contactoo" hidden>
                            <option> <?php echo $consulta[0] ?></option>
                        </select>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <div id="actividad_realizada"></div>
                            </div>
                            <div class="form-group col-md-4">
                                <div id="resultado_llamada"></div>
                            </div>

                            <div class="form-group col-md-4">
                                <div id="tipo_actividad"></div>

                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="">Descripcion</label>
                                <textarea class="form-control" placeholder="Comenta La Actividad" id="descripcion_actividad" name="descripcion_actividad"></textarea>
                            </div>
                            <div class="form-group col-md-4">
                                <div id="estado"></div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for=""> Fecha de sig. Actividad</label>
                                <input type="date" name="fecha" id="fecha" class="form-control" />

                            </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnAgregarActividad">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <script src="public/js/Actividades.js"></script>
</body>

<script type="text/javascript">
    $(document).ready(function() {
        $('#actividad_realizada').load("vistas/actividades/select_actividad.php");
        $('#resultado_llamada').load("vistas/actividades/select_resultado_llamada.php");
        $('#tipo_actividad').load("vistas/actividades/select_tipo_actividad.php");
        $('#estado').load("vistas/actividades/select_estado.php");
        $('#cargaTablaActividades').load('vistas/Tablas/tabla_actividades.php');
    });
</script>

</html>