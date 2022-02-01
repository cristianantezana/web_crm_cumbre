<!DOCTYPE html>
<html>

<head>
    <title>CRM CUMBRE</title>
    <link rel="icon" type="image/jpg" href="public/img/favicon.webp">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php require_once "dependencias.php"; ?>
</head>

<body>

    <?php require_once "menu.php"; ?>
    <?php
        require_once "clases/Conexion.php";
        $objCon = new Conexion();
        $conexion = $objCon->conectar();
        $sql = "SELECT id_contacto FROM contactos ";
        $result = mysqli_query($conexion, $sql);

        $total['id_contacto'] = mysqli_num_rows($result);
        $clientes = mysqli_query($conexion, "SELECT nombre FROM `contactos` WHERE instancia=5");
        $total['nombre'] = mysqli_num_rows($clientes);
        $productos = mysqli_query($conexion, "SELECT apellido FROM `contactos` WHERE instancia=6");
        $total['apellido'] = mysqli_num_rows($productos);
    ?>
    <br>
    <!-- Content Row -->
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="fas fa-users fa-2x"></i>
                        </div>
                        <a href="contactos.php" class="card-category text-success font-weight-bold">
                            Contactos
                        </a>
                        <h3 class="card-title"><?php echo $total['id_contacto']; ?></h3>
                    </div>
                    <div class="card-footer bg-primary text-white">
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class=" fas fa-user fa-2x"></i>
                        </div>
                        <a href="interesados.php" class="card-category text-success font-weight-bold">
                            Contactos Interesados
                        </a>
                        <h3 class="card-title"><?php echo $total['nombre']; ?></h3>
                    </div>
                    <div class="card-footer bg-success text-white">
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                            <i class="fas fa-window-close fa-2x"></i>
                        </div>
                        <a href="#" class="card-category text-danger font-weight-bold">
                            Contactos No Interesado
                        </a>
                        <h3 class="card-title"><?php echo $total['apellido']; ?></h3>
                    </div>
                    <div class="card-footer bg-danger">
                    </div>
                </div>
            </div>
        </div>
</body>

</html>