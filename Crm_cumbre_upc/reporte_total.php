<?php
require_once "clases/Conexion.php";
$objCon = new Conexion();
$conexion = $objCon->conectar();
$sql = "SELECT id_carrera,carrera, count(carrera_interesada) as cantidad, i.instancia,i.id_instancia
FROM carrera_interesada ci INNER JOIN contactos c ON ci.id_carrera=c.carrera_interesada
INNER JOIN instancias i ON c.instancia=i.id_instancia
GROUP BY carrera_interesada,c.instancia;";

$lista = array();
$carreras = array();
$instancias = array();
if ($resultado = $conexion->query($sql)) {
    while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)) {
        array_push($lista, $fila);
    }
}

$sql = "SELECT * FROM instancias";
if ($resultado = $conexion->query($sql)) {
    while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)) {
        array_push($instancias, $fila);
    }
}


$sql = "SELECT * FROM carrera_interesada";
if ($resultado = $conexion->query($sql)) {
    while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)) {
        array_push($carreras, $fila);
    }
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
        <h1 class="mt-4 r">REPORTES DETALLADO</h1>



        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-center">
                    <i class="fas fa-chart-bar"></i> TOTAL REGISTRO
                </div>
                <div class="card-body">
                    <div class="col-12">
                        <table class="table table-striped table-bordered">
                            <thead class="encabezado" style="text-align: center;">
                                <tr>
                                    <th></th>
                                    <?php
                                    foreach ($instancias as $instanci) {
                                    ?>
                                        <th> <?php echo $instanci['instancia'] ?> </th>
                                    <?php
                                    }
                                    ?>
                                    <th class="colum-total" > TOTAL</th>
                                </tr>
                                <tr>
                                    <th>Produncto Preferencial</th>
                                    <?php
                                    for ($i = 0; $i <= count($instancias) - 1; $i++) {

                                    ?>
                                        <th>Cantidad</th>
                                    <?php
                                    }
                                    ?>
                                    <th class="colum-total" >Cantidad</th>
                                </tr>

                            </thead>
                            <tbody id="resumen" class="resumen" >
                                <?php
                                foreach ($carreras as $carrera) {
                                    $suma = 0;
                                ?>
                                    <tr>
                                        <td> <?php echo $carrera['carrera'] ?> </td>

                                        <?php
                                        foreach ($instancias as $intancia) {
                                            $band = false;
                                            $valor = 0;
                                            foreach ($lista as $value) {
                                                $valor = 0;
                                                if ($value['id_carrera'] == $carrera['id_carrera'] && $value['id_instancia'] == $intancia['id_instancia']) {
                                                    $valor = $value['cantidad'];
                                        ?>
                                                    <td> <?php echo $value['cantidad'] ?> </td>
                                                <?php
                                                    $band = true;
                                                    break;
                                                }
                                            }
                                            if ($band == false) {
                                                ?>
                                                <td>0</td>
                                        <?php
                                            }
                                            $suma += $valor;
                                        }
                                        ?>
                                        <td class="colum-total" >  <?php echo $suma; ?> </td>
                                    </tr>
                                <?php
                                }

                                ?>


                            </tbody>
                            <tfoot id="totales" class="totales">
                                <tr>
                                    <th>Total</th>
                                    <?php
                                    for ($i = 0; $i <= count($instancias); $i++) {
                                    ?>
                                        <th ></th>
                                    <?php
                                    }
                                    ?>
                                </tr>
                            </tfoot>
                        </table>

                    </div>

                </div>

            </div>
        </div>
    </div>
    </div>
    </div>

</html>
<script>
    var tabla_resumen = document.getElementById("resumen");
    let totales = document.getElementById("totales");
    let total = 0;
    for (let i = 1; i < tabla_resumen.rows[0].cells.length - 1; i++) { //numero de columnas del body de la tabla
        total = 0;
        for (let j = 0; j < tabla_resumen.rows.length; j++) { //numero de filas del body de la tabla
            total += parseInt(tabla_resumen.rows[j].cells[i].innerHTML);
        }

        //agregando a la fila del footer la sumas dadas en cada columna
        totales.rows[0].cells[i].innerHTML = total;
    }
</script>