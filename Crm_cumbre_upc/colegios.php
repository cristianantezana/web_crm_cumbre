<!DOCTYPE html>
<html>

<head>
	<title>Colegios</title>
	<link rel="icon" type="image/jpg" href="public/img/favicon.webp">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php require_once "dependencias.php"; ?>
</head>

<body>

	<?php require_once "menu.php"; ?>
	<div class="container">
		<h1 class="mt-4">Colegios</h1>
		<div class="card mb-4">
			<button type="button" class="btn btn_agregar" data-toggle="modal" data-target="#modalAgregarColegio">
				Nuevo Colegio<span><i class="fas fa-plus-circle"></i></span>
			</button>
			<!-- <a href="procesos/excel.php" class="btn btn-success">Descarcar En EXCEL <samp><i class="fas fa-file-excel"></i></samp></a> -->
			<div class="card-header"><i class="fas fa-graduation-cap"></i>Colegios</div>
			<div class="card-body">

				<div id="cargaTablaColegios"></div>

			</div>
		</div>
	</div>
	</div>
	<?php
	require_once "vistas/colegios/modalAgregar.php";
	require_once "vistas/colegios/modalActualizarColegio.php";
	?>
	</div>

	<script src="public/js/colegios.js"></script>
</body>

</html>