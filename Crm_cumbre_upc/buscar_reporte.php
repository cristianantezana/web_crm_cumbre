<?php
require_once "clases/Conexion.php";
$objCon = new Conexion();
$conexion = $objCon->conectar();
$fecha_i = "";
$fecha_fin = "";
if (isset($_REQUEST['fechaini']) || isset($_REQUEST['fecha_fin'])) {
    if ($_REQUEST['fechaini'] == '' || $_REQUEST['fecha_fin'] == '') {
        header("location: reportes.php");
    }
}

if (!empty($_REQUEST['fechaini']) && !empty($_REQUEST['fecha_fin'])) {
    $fecha_i = $_REQUEST['fechaini'];
    $fecha_fin = $_REQUEST['fecha_fin'];

    if ($fecha_i > $fecha_fin) {
        header("Location: reportes.php");
    } else {
        $f_de = $fecha_i . ' 00:00:00';
        $f_f = $fecha_fin . ' 23:59:59';
        $whre = "uptated_at BETWEEN '$f_de' AND '$f_f ' ";
    }
}
$con = new mysqli("localhost", "root", "", "crm"); // Conectar a la BD
$sql = "SELECT i.instancia, count(i.instancia) as cantidad FROM contactos c INNER JOIN instancias i
ON c.instancia = i.id_instancia 
WHERE $whre GROUP BY i.instancia"; // Consulta SQL
$result = mysqli_query($conexion, $sql);
$data = array(); // Array donde vamos a guardar los datos
while ($r = $result->fetch_object()) { // Recorrer los resultados de Ejecutar la consulta SQL
    $data[] = $r; // Guardar los resultados en la variable $data
}


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
                        <div class="col-4">
                            <form action="buscar_reporte.php" method="get" class="form_date">
                                <label for="">Fecha Incial</label>
                                <input type="date" class="form-control" id="fechaini" name="fechaini" placeholder="Username" value="<?php echo $fecha_i; ?>">
                        </div>
                        <div class="col-4">
                            <label for="">Fecha Final</label>
                            <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" placeholder="Username" value="<?php echo $fecha_fin; ?>">
                        </div>
                        <div class="col-4">
                            <div class="card mt-4">
                                <button type="submit" class="btn btn-primary" BUSCAR <span><i class="fas fa-search"></i></span>
                                </button>
                                </form>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="container">
        <div class="col-sm-12 mt-4">
            <div class="card">
                <div class="card-header text-center">
                    <i class="fas fa-chart-bar"></i> RESULTADO DE LA CONSULTA
                </div>
                <div class="card-body">
                    <canvas id="chart1" style="width:100%;" height="100"></canvas>

                </div>

            </div>

            <?php
            require_once "clases/Conexion.php";
            $objCon = new Conexion();
            $conexion = $objCon->conectar();



            $sql = "SELECT i.instancia, count(i.instancia) as cantidad FROM contactos c INNER JOIN instancias i
    ON c.instancia = i.id_instancia 
   WHERE $whre GROUP BY i.instancia ";
            $result = mysqli_query($conexion, $sql);

            ?>

            <div class="container">
                <div class="col-sm-12 mt-4">
                    <div class="card">
                        <div class="card-header text-center">
                            <i class="fas fa-chart-bar"></i> RESULTADO DE CONSULTA
                        </div>
                        <div class="card-body">

                            <table class="table table-striped">
                                <tbody>
                                    <?php
                                    $precio = 0;
                                    while ($mostrar = mysqli_fetch_array($result)) {
                                        $idContacto = $mostrar['cantidad'];
                                        $precio += $mostrar["cantidad"];
                                    ?>
                                        <tr>
                                            <th scope="row"> </th>
                                            <td colspan="2"> <?php echo $mostrar['instancia'] ?> </td>
                                            <td> <?php echo $mostrar['cantidad'] ?> </td>
                                        </tr>

                                    <?php
                                    }
                                    ?>
                                    <tr class="container" style="background-color:#808080;color: white; font-weight: bold;">


                                        <th scope="row"> </th>
                                        <th>TOTAL</th>
                                        <td colspan="2"><?php echo $precio; ?></td>
                        </div>
                        </tr>
                        </tbody>
                        </table>


                    </div>
                </div>



</html>
<script>
    var ctx = document.getElementById("chart1");
    var data = {
        labels: [
            <?php foreach ($data as $d) : ?> "<?php echo $d->instancia ?>",
            <?php endforeach; ?>
        ],
        datasets: [{
            label: 'CONTACTOS',
            data: [
                <?php foreach ($data as $d) : ?>
                    <?php echo $d->cantidad; ?>,
                <?php endforeach; ?>
            ],

            backgroundColor: [

                'rgba(255, 159, 64, 1)',
                'rgba( 11, 234, 221 )',
                'rgba( 31, 234, 11 )',
                'rgba(238, 24, 14)',
                'rgba( 224, 234, 11 )',
                'rgba( 1, 9, 82 )',
            ],
            borderColor: "#fff",
            borderWidth: 15
        }]
    };
    var options = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    };
    var chart1 = new Chart(ctx, {
        type: 'bar',
        /* valores: line, bar*/
        data: data,
        options: options
    });
</script>