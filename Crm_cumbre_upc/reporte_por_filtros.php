<?php
$hoy = date('Y-m-d');
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
                            <label for="dato">Selecciona una instacias</label>
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
                                    <input id="f_inicial" name="f_inicial" type="date" class="form-control" value="<?php echo $hoy ?>">

                                </div>
                                <div class="form-group col-4">
                                    <label for="">HASTA LA FECHA</label>
                                    <input id="f_final" name="f_final" type="date" class="form-control" value="<?php echo $hoy ?>">

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

</html>
<script src="public/chart.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {

        $('#datos').load("vistas/contactos/Select_Dato.php");
        $('#propietarios').load("vistas/select_reportes/select_propetario.php");
        $('#instancia').load("vistas/select_reportes/select_instancia.php");


    });
</script>