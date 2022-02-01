<!DOCTYPE html>
<html>

<head>
	<title>DATOS</title>
	<link rel="icon" type="image/jpg" href="public/img/favicon.webp">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php require_once "dependencias.php"; ?>
</head>

<body>

	<?php require_once "menu.php"; ?>
	<div class="container">
		<h1 class="mt-4">DATOS</h1>
		<div class="card mb-4">
			<button type="button" class="btn btn_agregar " data-toggle="modal" data-target="#modalAgregarCategoria" >
				Nuevo Dato <span><i class="fas fa-plus-circle"></i></span>
			</button>
			<div class="card-header"><i class="fas fa-layer-group"></i>Origen Del DATO</div>
			<div class="card-body">

				<div id="cargaTablaCategorias"></div>

			</div>
		</div>
	</div>
	</div>
	<?php
	require_once "vistas/Datos/modalAgregar.php";
	require_once "vistas/Datos/modalActualizar.php";
	?>
	</div>

	<script src="public/js/datos.js"></script>
</body>

</html>