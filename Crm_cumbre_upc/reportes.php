<?php
    $hoy = date('Y-m-d');
    $f_de1 = $hoy . '  00:00:00 ';
    $f_f2 = $hoy . ' 23:59:59';
    require_once "clases/Conexion.php";
    $objCon = new Conexion();
    $conexion = $objCon->conectar();
    $sql = "SELECT i.instancia, count(i.instancia) as cantidad FROM contactos c INNER JOIN  instancias i
    ON c.instancia = i.id_instancia 
    WHERE uptated_at BETWEEN '$f_de1' AND '$f_f2' GROUP BY i.instancia"; // Consulta SQL

    $data = array(); // Array donde vamos a guardar los datos
    $result = mysqli_query($conexion, $sql); // Ejecutar la consulta SQL
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
                                <input type="date" class="form-control" id="fechaini" name="fechaini" placeholder="Username" value="<?php echo $hoy ?>">
                        </div>
                        <div class="col-4">
                            <label for="">Fecha Final</label>
                            <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" placeholder="Username" value="<?php echo $hoy ?>">
                        </div>
                        <div class="col-4">
                            <div class="card mt-4">
                                <button type="submit" class="btn btn_ver" BUSCAR <span><i class="fas fa-search"></i></span>
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

                    <i class="fas fa-chart-bar"></i> REPORTE GRAFICO DE HOY
                </div>
                <div class="card-body">
                    <canvas id="chart1" style="width:100%;" height="100"></canvas>

                </div>

            </div>


            <?php
                $hoy = date('Y-m-d');
                $f_de = $hoy . '  00:00:00 ';
                $f_f = $hoy . ' 23:59:59';
                require_once "clases/Conexion.php";
                $objCon = new Conexion();
                $conexion = $objCon->conectar();

                $sql = "SELECT i.instancia, count(i.instancia) as cantidad FROM contactos c INNER   JOIN instancias i ON c.instancia = i.id_instancia 
                WHERE uptated_at BETWEEN '$f_de' AND '$f_f' GROUP BY i.instancia ";
                $result = mysqli_query($conexion, $sql);

            ?>

            <div class="container">
                <div class="col-sm-12 mt-4">
                    <div class="card">
                        <div class="card-header text-center">

                            <i class="fas fa-chart-bar"></i> REPORTE DE HOY
                        </div>
                        <div class="card-body">
                            <table>
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
                                                <th colspan="2"> <?php echo $mostrar['instancia'] ?> </th>
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