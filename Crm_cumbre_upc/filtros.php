<?php
require_once "clases/Conexion.php";
$objCon = new Conexion();
$conexion = $objCon->conectar();


// if (isset($_REQUEST['dato3']) || isset($_REQUEST['propietario2'])){
//    if ($_REQUEST['dato3']== '0' || $_REQUEST['propietario2']=='0'){
//        header ("location: reporte_por_filtros.php");
//    }

// }

?>
<!DOCTYPE html>
<html>

<head>
    <title>Reportes</title>
    <link rel="icon" type="image/jpg" href="public/img/favicon.webp">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,
     initial-scale=1, shrink-to-fit=no">
    <?php require_once "dependencias.php"; ?>
    <script src="public/chart.min.js"></script>
</head>

<body>
    <?php require_once "menu.php"; ?>
    <div class="container mt-4">
        <h1 class="mt-4 r">REPORTES</h1>
        <div class="card mb-4">
            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarActividad">
						Crear Actividad  <span><i class="fas fa-briefcase"></i></span>
				</button> -->
        </div>

        <div class="col-sm-12">
            <div class="card">
                <div class="card-header text-center">
                    <i class="fas fa-chart-bar"></i> FILTROS
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <form method="get" action="filtros.php">

                                <div id="propietarios"></div>
                        </div>
                        <div class="form-group col-3">
                            <?php

                            require_once "clases/Conexion.php";
                            $con = new Conexion();
                            $conexion = $con->conectar();

                            $sql = "SELECT id_instancia, instancia
                            FROM instancias ORDER BY instancia";
                            $result = mysqli_query($conexion, $sql);
                            ?>
                            <label for="dato">Selecciona una instacia</label>
                            <select id="propietario2" name="propietario2" class="form-control">
                                <option value="0">Selecciona un Dato</option>
                                <?php while ($ver = mysqli_fetch_row($result)) : ?>
                                    <option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
                                <?php endwhile; ?>
                            </select>

                        </div>
                        <div class="form-group col-3">
                            <?php

                            require_once "clases/Conexion.php";
                            $con = new Conexion();
                            $conexion = $con->conectar();

                            $sql = "SELECT id_dato, datos
                                    FROM origen_dato 
                                    ORDER BY datos";
                            $result = mysqli_query($conexion, $sql);
                            ?>
                            <label for="dato">Selecciona un Dato</label>
                            <select id="dato3" name="dato3" class="form-control">
                                <option value="0">Selecciona un Dato</option>
                                <?php while ($ver = mysqli_fetch_row($result)) : ?>
                                    <option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
                                <?php endwhile; ?>
                            </select>

                        </div>
                        <div class="form-group col-3">
                            <button type="submit" class="btn btn_ver" BUSCAR <span><i class="fas fa-search"></i></span>
                            </button>
                        </div>

                        <div class="container">
                            <div class="row">
                                <div class="form-group col-4">
                                    <label for="">DESDE LA FECHA</label>
                                    <input id="f_inicial" name="f_inicial" type="date" class="form-control">

                                </div>
                                <div class="form-group col-4">
                                    <label for="">HASTA LA FECHA</label>
                                    <input id="f_final" name="f_final" type="date" class="form-control">

                                </div>
                            </div>
                        </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
    </div>
    </div>
    </div>

    <?php
    require_once "clases/Conexion.php";
    $objCon = new Conexion();
    $conexion = $objCon->conectar();
    $dato = $_GET['dato3'];
    $usuario = $_GET['propietario'];
    $instancia = $_GET['propietario2'];
    $f_inicial = $_GET['f_inicial'];
    $f_final = $_GET['f_final'];
    $incial = $f_inicial . ' 00:00:00';
    $final = $f_final . ' 23:59:59';

    $where = " WHERE c.id_usuario = $usuario AND o.id_dato= $dato AND c.created_at BETWEEN '$incial' AND '$final' ";
    if (($_GET['propietario2'] == 0) && ($_GET['dato3'] == 0)) {

        $sql = "SELECT c.id_contacto,u.nombre AS propietario, c.nombre,c.apellido,c.telefono,c.created_at,o.datos,i.instancia 
        FROM `contactos` c INNER JOIN origen_dato o ON c.origen_contacto = o.id_dato INNER JOIN instancias i 
        ON c.instancia = i.id_instancia INNER JOIN usuario_cumbre u ON c.id_usuario = u.id_usuario 
        WHERE c.id_usuario = $usuario AND c.created_at BETWEEN '$incial' AND '$final'";
        $result = mysqli_query($conexion, $sql);
    } else if ($_GET['dato3'] == 0) {
        $sql = "SELECT c.id_contacto,u.nombre AS propietario, c.nombre,c.apellido,c.telefono,c.created_at,o.datos,i.instancia FROM `contactos` c INNER JOIN origen_dato o ON c.origen_contacto = o.id_dato INNER JOIN instancias i ON c.instancia = i.id_instancia INNER JOIN usuario_cumbre u ON c.id_usuario = u.id_usuario WHERE c.id_usuario = $usuario AND i.id_instancia = $instancia  AND c.created_at BETWEEN '$incial' AND '$final'";
        $result = mysqli_query($conexion, $sql);
    } else if ($_GET['propietario2'] == 0) {


        $sql = "SELECT c.id_contacto,u.nombre AS propietario, c.nombre,c.apellido,c.telefono,c.created_at,o.datos,i.instancia FROM `contactos` c INNER JOIN origen_dato o ON c.origen_contacto = o.id_dato INNER JOIN instancias i ON c.instancia = i.id_instancia INNER JOIN usuario_cumbre u ON c.id_usuario = u.id_usuario WHERE c.id_usuario = $usuario AND  o.id_dato= $dato AND c.created_at BETWEEN '$incial' AND '$final'";
    } else

        $sql = "SELECT c.id_contacto,u.nombre AS propietario, c.nombre,c.apellido,c.telefono,c.created_at,o.datos,i.instancia FROM `contactos` c INNER JOIN origen_dato o ON c.origen_contacto = o.id_dato INNER JOIN instancias i ON c.instancia = i.id_instancia INNER JOIN usuario_cumbre u ON c.id_usuario = u.id_usuario WHERE c.id_usuario = $usuario AND i.id_instancia = $instancia AND o.id_dato= $dato AND c.created_at BETWEEN '$incial' AND '$final'";
    $result = mysqli_query($conexion, $sql);

    $result = mysqli_query($conexion, $sql);

    ?>
    <div class="container">
        <div class="col-sm-12 mt-4">
            

            <div class="card">
            <a href="procesos/excel_reporte_filtros.php?no=<?php echo $_GET['dato3'] ?>&no2=<?php echo $_GET['propietario'] ?>&no3=<?php echo $_GET['propietario2'] ?>&no4=<?php echo $_GET['f_inicial'] ?>&no5=<?php echo $_GET['f_final'] ?>" class="btn btn_excel" > EXPORTAR EXCEL <samp>
                    <i class="fas fa-file-excel"></i></samp></a>
                <div class="card-header text-center">
                    <i class="fas fa-hand-point-right"></i> CONTACTOS
                </div>
                <div class="card-body">
                    <table class="table table-hover table-condensed" id="tablaac">
                        <thead class="totales">
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Instancia</th>
                                <th>Propietario</th>
                                <th>Fecha de Creacion</th>
                                <th>Datos</th>
                                <th>Instancia</th>
                            </tr>
                        </thead>
                        <tbody class="resumen">

                            <?php
                            while ($mostrar = mysqli_fetch_array($result)) {
                                $idContacto = $mostrar['id_contacto'];
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
                                    <td><?php echo $mostrar['telefono'] ?></td>
                                    <td><?php echo $mostrar['propietario'] ?></td>
                                    <td><?php echo $mostrar['created_at'] ?></td>
                                    <td><?php echo $mostrar['datos'] ?></td>
                                    <td><?php echo $mostrar['instancia'] ?></td>

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

<script type="text/javascript">
    $(document).ready(function() {

        $('#datos').load("vistas/contactos/Select_Dato.php");
        $('#propietarios').load("vistas/select_reportes/select_propetario.php");
        $('#instancia').load("vistas/select_reportes/select_instancia.php");


    });
</script>